<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class BusTypes extends BaseModel
{

    public $bus_type_id;
    public $bus_type_name;
    public $no_of_seats;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->bus_type_id = (!empty($data['bus_type_id'])) ? $data['bus_type_id'] : null;
        $this->bus_type_name = (!empty($data['bus_type_name'])) ? $data['bus_type_name'] : null;
        $this->no_of_seats = (!empty($data['no_of_seats'])) ? $data['no_of_seats'] : null;
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