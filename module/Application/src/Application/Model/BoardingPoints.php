<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class BoardingPoints extends BaseModel
{

    public $boarding_points_id;
    public $service_id;
    public $static_boarding_points_id;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->boarding_points_id = (!empty($data['boarding_points_id'])) ? $data['boarding_points_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->static_boarding_points_id = (!empty($data['static_boarding_points_id'])) ? $data['static_boarding_points_id'] : null;
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