<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class AdminInfo extends BaseModel
{

    public $admin_id;
    public $admin_name;
    public $admin_password;
    public $admin_salt;
    public $admin_firstname;
    public $admin_lastname;
    public $admin_email;
    public $admin_contact_no;
    public $admin_dob;
    public $admin_address;
    public $admin_city;
    public $admin_country;
    public $admin_state;
    public $admin_pincode;
    public $admin_type;
    public $security_question_id;
    public $security_answer;
    public $admin_otp;
    public $admin_reset_password;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->admin_id = (!empty($data['admin_id'])) ? $data['admin_id'] : null;
        $this->admin_name = (!empty($data['admin_name'])) ? $data['admin_name'] : null;
        $this->admin_password = (!empty($data['admin_password'])) ? $data['admin_password'] : null;
        $this->admin_salt = (!empty($data['admin_salt'])) ? $data['admin_salt'] : null;
        $this->admin_firstname = (!empty($data['admin_firstname'])) ? $data['admin_firstname'] : null;
        $this->admin_lastname = (!empty($data['admin_lastname'])) ? $data['admin_lastname'] : null;
        $this->admin_email = (!empty($data['admin_email'])) ? $data['admin_email'] : null;
        $this->admin_contact_no = (!empty($data['admin_contact_no'])) ? $data['admin_contact_no'] : null;
        $this->admin_dob = (!empty($data['admin_dob'])) ? $data['admin_dob'] : null;
        $this->admin_address = (!empty($data['admin_address'])) ? $data['admin_address'] : null;
        $this->admin_city = (!empty($data['admin_city'])) ? $data['admin_city'] : null;
        $this->admin_country = (!empty($data['admin_country'])) ? $data['admin_country'] : null;
        $this->admin_state = (!empty($data['admin_state'])) ? $data['admin_state'] : null;
        $this->admin_pincode = (!empty($data['admin_pincode'])) ? $data['admin_pincode'] : null;
        $this->admin_type = (!empty($data['admin_type'])) ? $data['admin_type'] : null;
        $this->security_question_id = (!empty($data['security_question_id'])) ? $data['security_question_id'] : null;
        $this->security_answer = (!empty($data['security_answer'])) ? $data['security_answer'] : null;
        $this->admin_otp = (!empty($data['admin_otp'])) ? $data['admin_otp'] : null;
        $this->admin_reset_password = (!empty($data['admin_reset_password'])) ? $data['admin_reset_password'] : null;
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