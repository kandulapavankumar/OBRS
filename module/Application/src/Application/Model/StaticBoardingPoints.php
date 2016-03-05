<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class StaticBoardingPoints extends BaseModel
{

    public $static_boarding_point_id;
    public $static_boarding_point_name;
    public $static_boarding_point_state;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->static_boarding_point_id = (!empty($data['static_boarding_point_id'])) ? $data['static_boarding_point_id'] : null;
        $this->static_boarding_point_name = (!empty($data['static_boarding_point_name'])) ? $data['static_boarding_point_name'] : null;
        $this->static_boarding_point_state = (!empty($data['static_boarding_point_state'])) ? $data['static_boarding_point_state'] : null;
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