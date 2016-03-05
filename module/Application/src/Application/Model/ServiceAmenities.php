<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class ServiceAmenities extends BaseModel
{

    public $service_amenities_id;
    public $service_id;
    public $static_service_amenities_id;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->service_amenities_id = (!empty($data['service_amenities_id'])) ? $data['service_amenities_id'] : null;
        $this->service_id = (!empty($data['service_id'])) ? $data['service_id'] : null;
        $this->static_service_amenities_id = (!empty($data['static_service_amenities_id'])) ? $data['static_service_amenities_id'] : null;
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