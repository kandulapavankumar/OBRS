<?php

namespace Application\Model;

use Zend\Db\Sql\Expression;

class SecurityQuestionsTable extends BaseModelTable
{

    public function insert($sessionId, $name)
    {
        $brand = new Brands();
        $brand->name = $name;
        $brand->session_id = $sessionId;

        $id = $this->addRecord($brand);

        return $id;
    }

    public function getQuestions()
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('sq' => 'security_questions'));
        $select->columns(
            array('security_question_id','security_question')
        );

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();

        foreach ($resultSet as $row) {
            $result[$row['security_question_id']] = $row['security_question'];
        }

        return $result;
    }
}
