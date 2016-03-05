<?php

namespace Application\Model;

use Zend\Db\Sql\Expression;

class UsersInfoTable extends BaseModelTable
{

    public function getMailIds()
    {
        $sql = $this->sql;
        $select = $sql->select();
        $select->from(array('ui' => 'users_info'));
        $select->columns(
            array('email')
        );

        $statement = $sql->prepareStatementForSqlObject($select);

        $resultSet = $statement->execute();
        $result = array();

        foreach ($resultSet as $row) {
            $result[] = $row['email'];
        }

        return $result;
    }

    public function addUser($email, $password, $first_name, $last_name, $phone, $dob, $address, $city, $state, $country, $zipcode, $security_question_id, $security_answer, $news_required){
        $userInfo = new UsersInfo();
        $userInfo->email = $email;
        $userInfo->password = $password;
        $userInfo->user_firstname = $first_name;
        $userInfo->user_lastname = $last_name;
        $userInfo->user_contact_no = $phone;
        $userInfo->user_dob = $dob;
        $userInfo->user_address = $address;
        $userInfo->user_city = $city;
        $userInfo->user_state = $state;
        $userInfo->user_country = $country;
        $userInfo->user_pincode = $zipcode;
        $userInfo->security_question_id = $security_question_id;
        $userInfo->security_answer = $security_answer;
        $userInfo->news_letters = $news_required;
        $userInfo->display_name = $first_name;
        $userInfo->skip_local_registration = 1;

        $id = $this->addRecord($userInfo);

        return $id;
    }
}
