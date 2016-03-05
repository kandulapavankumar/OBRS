<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class OffersUsage extends BaseModel
{

    public $offer_usage_id;
    public $offer_id;
    public $user_id;
    public $user_type;
    public $email;
    public $contact_no;
    public $purchase_amount;
    public $discount_amount;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->offer_usage_id = (!empty($data['offer_usage_id'])) ? $data['offer_usage_id'] : null;
        $this->offer_id = (!empty($data['offer_id'])) ? $data['offer_id'] : null;
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->user_type = (!empty($data['user_type'])) ? $data['user_type'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->contact_no = (!empty($data['contact_no'])) ? $data['contact_no'] : null;
        $this->purchase_amount = (!empty($data['purchase_amount'])) ? $data['purchase_amount'] : null;
        $this->discount_amount = (!empty($data['discount_amount'])) ? $data['discount_amount'] : null;
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