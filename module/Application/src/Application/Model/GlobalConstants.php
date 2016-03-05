<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class GlobalConstants extends BaseModel
{

    public $global_constant_id;
    public $service_approvals;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->global_constant_id = (!empty($data['global_constant_id'])) ? $data['global_constant_id'] : null;
        $this->service_approvals = (!empty($data['service_approvals'])) ? $data['service_approvals'] : null;
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