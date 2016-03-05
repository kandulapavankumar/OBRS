<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class StaticServiceAmenities extends BaseModel
{

    public $static_service_amenities_id;
    public $amenity_name;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->static_service_amenities_id = (!empty($data['static_service_amenities_id'])) ? $data['static_service_amenities_id'] : null;
        $this->amenity_name = (!empty($data['amenity_name'])) ? $data['amenity_name'] : null;
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