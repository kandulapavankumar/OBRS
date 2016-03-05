<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class PaymentsInfo extends BaseModel
{

    public $payment_info_id;
    public $service_id;
    public $payment_request_time;
    public $payment_amount;
    public $payment_status;
    public $is_host;
    public $host_service_id;
    public $user_type;
    public $user_id;
    public $email;
    public $contact_no;
    public $payment_return_id;
    public $ticket_no;
    public $refund_status;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->payment_info_id = (!empty($data['payment_info_id'])) ? $data['payment_info_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->payment_request_time = (!empty($data['payment_request_time'])) ? $data['payment_request_time'] : null;
        $this->payment_amount = (!empty($data['payment_amount'])) ? $data['payment_amount'] : null;
        $this->payment_status = (!empty($data['payment_status'])) ? $data['payment_status'] : null;
        $this->is_host = (!empty($data['is_host'])) ? $data['is_host'] : null;
        $this->host_service_id = (!empty($data['host_service_id'])) ? $data['host_service_id'] : null;
        $this->user_type = (!empty($data['user_type'])) ? $data['user_type'] : null;
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->contact_no = (!empty($data['contact_no'])) ? $data['contact_no'] : null;
        $this->payment_return_id = (!empty($data['payment_return_id'])) ? $data['payment_return_id'] : null;
        $this->ticket_no = (!empty($data['ticket_no'])) ? $data['ticket_no'] : null;
        $this->refund_status = (!empty($data['refund_status'])) ? $data['refund_status'] : null;
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