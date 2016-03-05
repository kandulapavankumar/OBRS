<?php

namespace Application\Controller;

use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
use Zend\Mail;

class BaseController extends AbstractActionController
{
    protected $controllerTableName;
    protected $controllerTable;
    protected $container = null;

    public function getAdminContainer() {
        if (!$this->container) {
            $this->container = new Container('Admin');
        }
        return $this->container;
    }

    public function checkIsLoggedInAction()
    {
        $isLoggedIn = false;
        $container = $this->getAdminContainer();
        if ($container['isLoggedIn'] === true) {
            $isLoggedIn = true;
        }
        return $isLoggedIn;
    }

    public function getReturnData($returnArray)
    {
        $jsonModel = new JsonModel();
        $jsonModel->setVariables($returnArray);
        return $jsonModel;
    }

    public function getControllerTable()
    {
        $sm = $this->getServiceLocator();
        $this->controllerTable = $sm->get($this->controllerTableName);

        return $this->controllerTable;
    }

    public function determineSuccess($result)
    {
        $returnArray = array(
            'success' => false,
            'message' => "Server Error !"
        );

        if ($result) {
            $returnArray = $result;
        }

        return $returnArray;
    }
    
    public function getRequestParams($expectedDataArray) {
        $requestParams = array();
        $request = $this->getRequest();
        $error = 0;
        if ($request->isPost()){
            foreach ($expectedDataArray as $key => $value) {
                if ($request->getPost($value) != null) {
                    $requestParams[$value] = json_decode($request->getPost($value));
                    if (empty($requestParams[$value])) {
                        if ($request->getPost($value) !== '[]') {
                            $requestParams[$value] = $request->getPost($value);
                        }
                    }
                } else {
                    $error += 1;
                }
            }
        } else {
            return false;
        }
        if ($error > 0) {
            return false;
        }
        return $requestParams;
    }

    protected function getArrayValuesInData($arrayValues) {
        return array(
            'success'=>true,
            'data'=>$arrayValues
        );
    }
    
    public function getTable($tableName) {
        $this->controllerTableName = 'Application\Model\/'.$tableName.'Table';
        return $this->getControllerTable();
    }
    
    public function uploadFile($file, $acceptedExtension, $path) {

        $adapter = new \Zend\File\Transfer\Adapter\Http();

        $size = new Size(array('min' => '0.001KB'));
        $extension = new Extension(array('extension' => $acceptedExtension));
        $adapter->setValidators(array($size, $extension), $file['name']);

        if (!$adapter->isValid()) {
            $dataError = $adapter->getMessages();
            $error = array();
            foreach ($dataError as $key => $row) {
                $error[] = $row;
            }
            $result = $error;
            $result['success'] = FALSE;
        } else {
            $adapter->setDestination('./' . $path);
            $pathParts = pathinfo($file['name']);
            $finalName = date('dmyHis') . uniqid() . '.' . $pathParts['extension'];

            $newFile = $adapter->getDestination() . '/' . $finalName;
            $adapter->addFilter('Rename', array(
                'target' => $newFile,
                'overwrite' => true
                    )
            );

            $fileclass = new \stdClass();
            $fileclass->size = $adapter->getFileSize($file['name']);
            $fileclass->type = $adapter->getMimeType($file['name']);
            $adapter->receive($file['name']);
            $result['success'] = TRUE;
            $result['file_name'] = $finalName;
        }

        return $result;

    }
    
    public function getSessionId() {
        $container = $this->getAdminContainer();
        $productTypeId = $container['product_type_id'];
        
        $table = $this->getTable('Sessions');
        $fields = array('id');
        $sessionId = $table->getProductTypeSessionDetails($productTypeId, $fields);
        
        return $sessionId;
    }

    public function sendMail($emails, $emailDescription, $subject) {
        $mail = new Mail\Message();
        $mail->setBody($emailDescription);
        $mail->setFrom('empirico@empirico.org', 'Empirico');
        if (is_array($emails)) {
            foreach($emails as $key => $value) {
                $mail->addTo($value);
            }
        } else {
            $mail->addTo($emails);
        }
        $mail->setSubject($subject);

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }
}