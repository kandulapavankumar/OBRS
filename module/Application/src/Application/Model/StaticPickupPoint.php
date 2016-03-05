<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class StaticPickupPoint extends BaseModel
{

    public $pickup_point_id;
    public $boarding_point_id;
    public $pickup_point_name;
    public $pickup_point_time;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->pickup_point_id = (!empty($data['pickup_point_id'])) ? $data['pickup_point_id'] : null;
        $this->boarding_point_id = (!empty($data['boarding_point_id'])) ? $data['boarding_point_id'] : null;
        $this->pickup_point_name = (!empty($data['pickup_point_name'])) ? $data['pickup_point_name'] : null;
        $this->pickup_point_time = (!empty($data['pickup_point_time'])) ? $data['pickup_point_time'] : null;
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