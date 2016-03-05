<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class SecurityQuestions extends BaseModel
{

    public $security_question_id;
    public $security_question;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function exchangeArray($data)
    {
        $this->security_question_id = (!empty($data['security_question_id'])) ? $data['security_question_id'] : null;
        $this->security_question = (!empty($data['security_question'])) ? $data['security_question'] : null;
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