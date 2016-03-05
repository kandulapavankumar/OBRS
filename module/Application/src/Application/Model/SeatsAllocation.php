<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class SeatsAllocation extends BaseModel
{

    public $seats_allocation_id;
    public $service_id;
    public $payments_info_id;
    public $boarding_point_from_id;
    public $boarding_point_to_id;
    public $seat_no;
    public $allocation_status;
    public $age;
    public $name;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->seats_allocation_id = (!empty($data['seats_allocation_id'])) ? $data['seats_allocation_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->payments_info_id = (!empty($data['payments_info_id'])) ? $data['payments_info_id'] : null;
        $this->boarding_point_from_id = (!empty($data['boarding_point_from_id'])) ? $data['boarding_point_from_id'] : null;
        $this->boarding_point_to_id = (!empty($data['boarding_point_to_id'])) ? $data['boarding_point_to_id'] : null;
        $this->seat_no = (!empty($data['seat_no'])) ? $data['seat_no'] : null;
        $this->allocation_status = (!empty($data['allocation_status'])) ? $data['allocation_status'] : null;
        $this->age = (!empty($data['age'])) ? $data['age'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
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