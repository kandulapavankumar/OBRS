<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class TravelsInfo extends BaseModel
{

    public $travel_id;
    public $travel_name;
    public $travel_website;
    public $travel_email;
    public $travel_contact_no;
    public $travel_address;
    public $travel_city;
    public $travel_country;
    public $travel_state;
    public $travel_pincode;
    public $travel_rating;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->travel_id = (!empty($data['travel_id'])) ? $data['travel_id'] : null;
        $this->travel_name = (!empty($data['travel_name'])) ? $data['travel_name'] : null;
        $this->travel_website = (!empty($data['travel_website'])) ? $data['travel_website'] : null;
        $this->travel_email = (!empty($data['travel_email'])) ? $data['travel_email'] : null;
        $this->travel_contact_no = (!empty($data['travel_contact_no'])) ? $data['travel_contact_no'] : null;
        $this->travel_address = (!empty($data['travel_address'])) ? $data['travel_address'] : null;
        $this->travel_city = (!empty($data['travel_city'])) ? $data['travel_city'] : null;
        $this->travel_country = (!empty($data['travel_country'])) ? $data['travel_country'] : null;
        $this->travel_state = (!empty($data['travel_state'])) ? $data['travel_state'] : null;
        $this->travel_pincode = (!empty($data['travel_pincode'])) ? $data['travel_pincode'] : null;
        $this->travel_rating = (!empty($data['travel_rating'])) ? $data['travel_rating'] : null;
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