<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class AdminAccessLevels extends BaseModel
{

    public $admin_access_levels_id;
    public $admin_id;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->admin_access_levels_id = (!empty($data['admin_access_levels_id'])) ? $data['admin_access_levels_id'] : null;
        $this->admin_id = (!empty($data['admin_id'])) ? $data['admin_id'] : null;
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