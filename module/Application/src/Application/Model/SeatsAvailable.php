<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class SeatsAvailable extends BaseModel
{

    public $seat_available_id;
    public $service_id;
    public $seat_id;
    public $available_to;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->seat_available_id = (!empty($data['seat_available_id'])) ? $data['seat_available_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->seat_id = (!empty($data['seat_id'])) ? $data['seat_id'] : null;
        $this->available_to = (!empty($data['available_to'])) ? $data['available_to'] : null;
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