<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Buses extends BaseModel
{

    public $bus_id;
    public $travel_id;
    public $branch_id;
    public $bus_no;
    public $bus_type_id;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->bus_id = (!empty($data['bus_id'])) ? $data['bus_id'] : null;
        $this->travel_id = (!empty($data['travel_id'])) ? $data['travel_id'] : null;
        $this->branch_id = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->bus_no = (!empty($data['bus_no'])) ? $data['bus_no'] : null;
        $this->bus_type_id = (!empty($data['bus_type_id'])) ? $data['bus_type_id'] : null;
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