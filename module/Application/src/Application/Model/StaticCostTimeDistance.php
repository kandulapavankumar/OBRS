<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class StaticCostTimeDistance extends BaseModel
{

    public $ctd_id;
    public $bus_type_id;
    public $static_boarding_point_id1;
    public $static_boarding_point_id2;
    public $ctd_adult_cost;
    public $ctd_child_cost;
    public $ctd_time;
    public $ctd_distance;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->ctd_id = (!empty($data['ctd_id'])) ? $data['ctd_id'] : null;
        $this->bus_type_id = (!empty($data['bus_type_id'])) ? $data['bus_type_id'] : null;
        $this->static_boarding_point_id1 = (!empty($data['static_boarding_point_id1'])) ? $data['static_boarding_point_id1'] : null;
        $this->static_boarding_point_id2 = (!empty($data['static_boarding_point_id2'])) ? $data['static_boarding_point_id2'] : null;
        $this->ctd_adult_cost = (!empty($data['ctd_adult_cost'])) ? $data['ctd_adult_cost'] : null;
        $this->ctd_child_cost = (!empty($data['ctd_child_cost'])) ? $data['ctd_child_cost'] : null;
        $this->ctd_time = (!empty($data['ctd_time'])) ? $data['ctd_time'] : null;
        $this->ctd_distance = (!empty($data['ctd_distance'])) ? $data['ctd_distance'] : null;
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