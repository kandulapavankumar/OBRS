<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class UserProvider extends BaseModel
{

    public $user_id;
    public $provider_id;
    public $provider;

    public function exchangeArray($data)
    {
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->provider_id = (!empty($data['provider_id'])) ? $data['provider_id'] : null;
        $this->provider = (!empty($data['provider'])) ? $data['provider'] : null;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        return $inputFilter;
    }

}

?>