<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class BusPhotosAndVideos extends BaseModel
{

    public $pv_id;
    public $bus_id;
    public $pv_type;
    public $pv_link;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->pv_id = (!empty($data['pv_id'])) ? $data['pv_id'] : null;
        $this->bus_id = (!empty($data['bus_id'])) ? $data['bus_id'] : null;
        $this->pv_type = (!empty($data['pv_type'])) ? $data['pv_type'] : null;
        $this->pv_link = (!empty($data['pv_link'])) ? $data['pv_link'] : null;
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