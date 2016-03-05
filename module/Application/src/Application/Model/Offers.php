<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Offers extends BaseModel
{

    public $offer_id;
    public $offer_name;
    public $offer_code;
    public $type_of_user;
    public $discount_type;
    public $amount;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public $usages_per_customer;
    public $usages_per_coupon;
    public $min_net_amount;
    public $max_discount_amount;
    public $status;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->offer_id = (!empty($data['offer_id'])) ? $data['offer_id'] : null;
        $this->offer_name = (!empty($data['offer_name'])) ? $data['offer_name'] : null;
        $this->offer_code = (!empty($data['offer_code'])) ? $data['offer_code'] : null;
        $this->type_of_user = (!empty($data['type_of_user'])) ? $data['type_of_user'] : null;
        $this->discount_type = (!empty($data['discount_type'])) ? $data['discount_type'] : null;
        $this->amount = (!empty($data['amount'])) ? $data['amount'] : null;
        $this->start_date = (!empty($data['start_date'])) ? $data['start_date'] : null;
        $this->end_date = (!empty($data['end_date'])) ? $data['end_date'] : null;
        $this->start_time = (!empty($data['start_time'])) ? $data['start_time'] : null;
        $this->end_time = (!empty($data['end_time'])) ? $data['end_time'] : null;
        $this->usages_per_customer = (!empty($data['usages_per_customer'])) ? $data['usages_per_customer'] : null;
        $this->usages_per_coupon = (!empty($data['usages_per_coupon'])) ? $data['usages_per_coupon'] : null;
        $this->min_net_amount = (!empty($data['min_net_amount'])) ? $data['min_net_amount'] : null;
        $this->max_discount_amount = (!empty($data['max_discount_amount'])) ? $data['max_discount_amount'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
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