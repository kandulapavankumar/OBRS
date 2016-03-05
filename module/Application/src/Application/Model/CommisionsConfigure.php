<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class CommisionsConfigure extends BaseModel
{

    public $commisions_configure_id;
    public $travel_id;
    public $admin_id;
    public $admin_type;
    public $percentage;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->commisions_configure_id = (!empty($data['commisions_configure_id'])) ? $data['commisions_configure_id'] : null;
        $this->travel_id = (!empty($data['travel_id'])) ? $data['travel_id'] : null;
        $this->admin_id = (!empty($data['admin_id'])) ? $data['admin_id'] : null;
        $this->admin_type = (!empty($data['admin_type'])) ? $data['admin_type'] : null;
        $this->percentage = (!empty($data['percentage'])) ? $data['percentage'] : null;
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