<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Crypt\Password\Bcrypt;
use Zend\Stdlib\Parameters;

class IndexController extends BaseController
{
    const CONTROLLER_NAME    = 'zfcuser';

    public function indexAction()
    {
        $this->setLayout();

        return new ViewModel();
    }

    public function getUserDisplayName(){

        $Details = $this->zfcUserAuthentication()->getIdentity();

        $displayName = $Details->getdisplayName();
        if($displayName == ''){
            $displayName = $Details->getusername();
        }

        if($displayName == ''){
            $displayName = $Details->getemail();
        }

        return $displayName;
    }

    public function profileAction()
    {
        $securityQuestions = $this->getTable('SecurityQuestions')->getQuestions();
        $this->setLayout();

        return new ViewModel(array(
            'security_questions' => $securityQuestions
        ));
    }

    public function setLayout(){

        $userName = '';
        if ($this->hasIdentity()) {
            $userName = $this->getUserDisplayName();
        }

        $layout = $this->layout();
        $layout->setTemplate('app/home/layout');
        $layout->setVariables(array(
            'user_name' => $userName,
            'has_identity' => $this->hasIdentity()
        ));


    }

    public function hasIdentity(){

        if ($this->zfcUserAuthentication()->hasIdentity()) {

            return 1;
        }

        return 0;
    }

    public function getUserId(){

        if ($this->zfcUserAuthentication()->hasIdentity()) {
            $identity = $this->zfcUserAuthentication()->getIdentity();

            return $identity->getId();
        }

        return 0;
    }

    public function isMailExistAction(){

        $result = array(
            'success' => false,
            'message' => "error"
        );

        $email = $this->params()->fromPost('email_id');
        $registeredMails = $this->getTable('UsersInfo')->getMailIds();

        if($this->mailExist($email)){
            $result = array(
                'success' => true,
                'email_exists' => 1
            );
        } else {
            $result = array(
                'success' => true,
                'email_exists' => 0
            );
        }

        $returnArray = $this->determineSuccess($result);
        $result = $this->getReturnData($returnArray);

        return $result;

    }

    public function mailExist($mail){
        $registeredMails = $this->getTable('UsersInfo')->getMailIds();

        if(in_array($mail,$registeredMails)){
            return 1;
        } else {
            return 0;
        }
    }

    public function updateProfileAction(){

        $email = $this->params()->fromPost('email');
        $password = $this->params()->fromPost('password');

        $bcrypt = new Bcrypt;
        $encryptedNewPassword = $bcrypt->create($password);

        $first_name = $this->params()->fromPost('first_name');
        $last_name = $this->params()->fromPost('last_name');
        $phone = $this->params()->fromPost('phone');
        $dob = $this->params()->fromPost('dob');
        $address = $this->params()->fromPost('address');
        $city = $this->params()->fromPost('city');
        $state = $this->params()->fromPost('state');
        $country = $this->params()->fromPost('country');
        $zipcode = $this->params()->fromPost('zipcode');
        $security_question_id = $this->params()->fromPost('security_question_id');
        $security_question_id = ($security_question_id) ? $security_question_id : null;
        $security_answer = $this->params()->fromPost('security_answer');
        $news_required = $this->params()->fromPost('news_required');

        if($this->hasIdentity()){
            $data = array('password'=>$encryptedNewPassword, 'user_firstname' => $first_name, 'user_lastname' => $last_name, 'user_contact_no' => $phone, 'user_dob'=>$dob,'user_address'=>$address,'user_city'=>$city, 'user_state'=>$state, 'user_country'=>$country, 'user_pincode'=>$zipcode, 'security_question_id' =>$security_question_id, 'security_answer' =>$security_answer, 'news_letters'=>$news_required);
            $status = $this->getTable('UsersInfo')->updateRecord($data, array('user_id' => $this->getUserId()));
        } else {
            if(!$this->mailExist($email)){
                $status = $this->getTable('UsersInfo')->addUser($email, $encryptedNewPassword, $first_name, $last_name, $phone, $dob, $address, $city, $state, $country, $zipcode, $security_question_id, $security_answer, $news_required);

                $post['identity'] = $email;
                $post['credential'] = $password;
                $request = $this->getRequest();
                $request->setPost(new Parameters($post));
                return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));
            }
        }

        return $this->redirect()->toRoute('home');
    }

    public function profileUpdateError($msg){

    }

    public function skipProfileUpdateAction(){
        if($this->hasIdentity()){
            $data = array('skip_local_registration' => 1);
            $status = $this->getTable('UsersInfo')->updateRecord($data, array('user_id' => $this->getUserId()));
        }

        return $this->redirect()->toRoute('home');
    }

    public function verifyLocalUserAction(){
        if($this->hasIdentity()){
            $skipLocalRegistration = $this->getTable('Users')->getFieldsWithCustomField('users_info', 'user_id', $this->getUserId(), array('skip_local_registration'));

            if(!$skipLocalRegistration){
                return $this->redirect()->toRoute('profile');
            }
        }

        return $this->redirect()->toRoute('home');
    }
}
