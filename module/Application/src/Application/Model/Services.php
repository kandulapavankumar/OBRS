<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Services extends BaseModel
{

    public $service_id;
    public $bus_type_id;
    public $bus_id;
    public $registration_type;
    public $departure_time;
    public $arraival_time;
    public $service_name;
    public $service_code;
    public $service_date;
    public $status;
    public $contact_no;
    public $contact_name;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->bus_type_id = (!empty($data['bus_type_id'])) ? $data['bus_type_id'] : null;
        $this->bus_id = (!empty($data['bus_id'])) ? $data['bus_id'] : null;
        $this->registration_type = (!empty($data['registration_type'])) ? $data['registration_type'] : null;
        $this->departure_time = (!empty($data['departure_time'])) ? $data['departure_time'] : null;
        $this->arraival_time = (!empty($data['arraival_time'])) ? $data['arraival_time'] : null;
        $this->service_name = (!empty($data['service_name'])) ? $data['service_name'] : null;
        $this->service_code = (!empty($data['service_code'])) ? $data['service_code'] : null;
        $this->service_date = (!empty($data['service_date'])) ? $data['service_date'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
        $this->contact_no = (!empty($data['contact_no'])) ? $data['contact_no'] : null;
        $this->contact_name = (!empty($data['contact_name'])) ? $data['contact_name'] : null;
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