<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;

class BaseModelTable
{

    protected $tableGateway;
    protected $log;
    protected $userEntity;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        $this->sql = $this->getSql();
    }

    public function getSql()
    {
        $dbAdapter = $this->tableGateway->adapter;
        $sql = new Sql($dbAdapter);

        return $sql;
    }

    public function getUserId(){

        if($this->getUserEntity()){
            $userId =  $this->getUserEntity()->getId();
            return $userId;
        }

        return 0;
    }

    public function setUserEntity($userEntity)
    {
        $this->userEntity = $userEntity;
    }

    public function getUserEntity()
    {
        return $this->userEntity;
    }

    protected function getSelectCount($table)
    {
        $totalSql = $this->getSql();
        $totalSelect = $totalSql->select();
        $totalSelect->from(array('t' => $table));
        $totalSelect->columns(
                array(
                    'total' => new \Zend\Db\Sql\Expression('COUNT(*)')
                )
        );
        $totalStatement = $totalSql->prepareStatementForSqlObject($totalSelect);
        $totalResultSet = $totalStatement->execute();
        $totalRow = $totalResultSet->current();

        return $totalRow['total'];
    }

    protected function addRecord($model)
    {
        $isValid = $model->isValid();
        $id = 0;

        if ($isValid === true) {
            $data = $model->getArrayCopy();
            $data['created_by'] = $this->getUserId();
            $data['updated_by'] = $this->getUserId();
            $data['created_at'] = new Expression('now()');
            $data['updated_at'] = new Expression('now()');

            $status = $this->tableGateway->insert($data);
            $id = $this->tableGateway->lastInsertValue;
        }

        return $id;
    }

    protected function addModel($model)
    {
        $isValid = $model->isValid();
        $defaultErrorMessage = "Error occurred while inserting into DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        try {
            if ($isValid === true) {
                $data = $model->getArrayCopy();
                $data['created_at'] = new Expression('now()');
                $data['updated_at'] = new Expression('now()');

                $status = $this->tableGateway->insert($data);
                $id = $this->tableGateway->lastInsertValue;
                if ($status) {
                    $returnArray["success"] = true;
                    $returnArray["message"] = "Record successfully inserted";
                    $returnArray["status"] = $status;
                    $returnArray["id"] = $id;
                }
            } else {
                $returnArray['message'] = $isValid;
            }
        } catch (\Exception $ex) {
            $returnArray['message'] = $ex->getMessage();
            return $returnArray;
        }
        return $returnArray;
    }

    protected function updateModel($data, $columnName, $columnValue)
    {
        $defaultErrorMessage = "Error occurred while updating into DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $data['updated_at'] = new Expression('now()');
        $status = $this->tableGateway->update($data, $whereArray);

        if ($status) {
            $returnArray["success"] = true;
            $returnArray["message"] = "Record successfully updated";
            $returnArray["status"] = $status;
            $returnArray["id"] = $columnValue;
        }

        return $returnArray;
    }

    public function deleteRecordCustomFieldsArray($array)
    {
        $defaultErrorMessage = "Error occurred while deleting into DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        $status = $this->tableGateway->delete($array);
        if ($status) {
            $returnArray["success"] = true;
            $returnArray["message"] = "Records successfully deleted";
            $returnArray["status"] = $status;
        }

        return $returnArray;
    }

    public function deleteRecord($columnName, $columnValue)
    {
        $defaultErrorMessage = "Error occurred while deleting from DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $status = $this->tableGateway->delete($whereArray);

        if ($status) {
            $returnArray["success"] = true;
            $returnArray["message"] = "Record successfully deleted";
            $returnArray["status"] = $status;
            $returnArray["id"] = $columnValue;
        }

        return $returnArray;
    }

    protected function getModelForAdd($model, $data)
    {
        $valuesArray = $model->getValuesArray();
        foreach ($valuesArray as $key => $value) {
            if (isset($data[$value])) {
                $model->$value = $data[$value];
            }
        }
    }

    protected function getModelDataForUpdate($model, $data)
    {
        $valuesArray = $model->getValuesArray();
        $returnArray = array();
        foreach ($valuesArray as $key => $value) {
            if (isset($data[$value])) {
                $returnArray[$value] = $data[$value];
            }
        }

        return $returnArray;
    }

    public function getRecordsCustomField($columnName, $columnValue)
    {
        $defaultErrorMessage = "Error occurred while retrieving from DataBase";
        $returnArray = array(
            'success' => false,
            'message' => $defaultErrorMessage
        );

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $result = $this->tableGateway->select($whereArray);

        $returnArray = array();
        foreach ($result as $projectRow) {
            $returnArray[] = $projectRow;
        }

        return $returnArray;
    }

    public function getFieldsWithCustomField($table, $columnName, $columnValue, $fields)
    {
        $totalSql = $this->getSql();
        $totalSelect = $totalSql->select();
        $totalSelect->from(array('t' => $table));
        $totalSelect->columns($fields);

        $whereArray = array();
        if (is_array($columnName)) {
            foreach ($columnName as $key => $value) {
                $whereArray[$columnName[$key]] = $columnValue[$key];
            }
        } else {
            $whereArray[$columnName] = $columnValue;
        }
        $totalSelect->where($whereArray);

        $totalStatement = $totalSql->prepareStatementForSqlObject($totalSelect);
        $totalResultSet = $totalStatement->execute();

        $result = array();
        foreach ($totalResultSet as $projectRow) {
            $result[] = $projectRow;
        }

        if (count($result) == 1 && count($result[0]) == 1) {

            $result = reset($result[0]);
        } elseif (count($result) > 1 && count($result[0]) == 1) {

            foreach ($result as $key => $value) {
                if (count($value) == 1) {
                    $result[$key] = reset($value);
                }
            }
        }

        return $result;
    }

    public function getById($sessionId)
    {
        $result = false;
        try {
            $whereArray = array();
            $whereArray['id'] = $sessionId;
            $tableData = $this->tableGateway->select($whereArray);
            $result = array();
            foreach ($tableData as $projectRow) {
                $result[] = $projectRow;
            }
        } catch (\Exception $e) {
            return $result;
        }
        return $result;
    }

    public function updateRecord($data, $where)
    {
        $data['updated_by'] = $this->getUserId();
        $data['updated_at'] = new Expression('now()');
        $status = $this->tableGateway->update($data, $where);

        return $status;
    }

}
