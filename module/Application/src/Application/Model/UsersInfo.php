<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class UsersInfo extends BaseModel
{

    public $user_id;
    public $username;
    public $display_name;
    public $password;
    public $user_salt;
    public $user_firstname;
    public $user_lastname;
    public $email;
    public $user_contact_no;
    public $user_dob;
    public $user_address;
    public $user_city;
    public $user_country;
    public $user_state;
    public $user_pincode;
    public $security_question_id;
    public $security_answer;
    public $user_otp;
    public $user_reset_password;
    public $state;
    public $news_letters;
    public $skip_local_registration;
    public $email_confirmed;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->username = (!empty($data['username'])) ? $data['username'] : null;
        $this->display_name = (!empty($data['display_name'])) ? $data['display_name'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
        $this->user_salt = (!empty($data['user_salt'])) ? $data['user_salt'] : null;
        $this->user_firstname = (!empty($data['user_firstname'])) ? $data['user_firstname'] : null;
        $this->user_lastname = (!empty($data['user_lastname'])) ? $data['user_lastname'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->user_contact_no = (!empty($data['user_contact_no'])) ? $data['user_contact_no'] : null;
        $this->user_dob = (!empty($data['user_dob'])) ? $data['user_dob'] : null;
        $this->user_address = (!empty($data['user_address'])) ? $data['user_address'] : null;
        $this->user_city = (!empty($data['user_city'])) ? $data['user_city'] : null;
        $this->user_country = (!empty($data['user_country'])) ? $data['user_country'] : null;
        $this->user_state = (!empty($data['user_state'])) ? $data['user_state'] : null;
        $this->user_pincode = (!empty($data['user_pincode'])) ? $data['user_pincode'] : null;
        $this->security_question_id = (!empty($data['security_question_id'])) ? $data['security_question_id'] : null;
        $this->security_answer = (!empty($data['security_answer'])) ? $data['security_answer'] : null;
        $this->user_otp = (!empty($data['user_otp'])) ? $data['user_otp'] : null;
        $this->user_reset_password = (!empty($data['user_reset_password'])) ? $data['user_reset_password'] : null;
        $this->state = (!empty($data['state'])) ? $data['state'] : null;
        $this->news_letters = (!empty($data['news_letters'])) ? $data['news_letters'] : null;
        $this->skip_local_registration = (!empty($data['skip_local_registration'])) ? $data['skip_local_registration'] : null;
        $this->email_confirmed = (!empty($data['email_confirmed'])) ? $data['email_confirmed'] : null;
        $this->created_by = (!empty($data['created_by'])) ? $data['created_by'] : null;
        $this->updated_by = (!empty($data['updated_by'])) ? $data['updated_by'] : null;
        $this->created_at = (!empty($data['created_at'])) ? $data['created_at'] : null;
        $this->updated_at = (!empty($data['updated_at'])) ? $data['updated_at'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        return $inputFilter;
    }

}

?>