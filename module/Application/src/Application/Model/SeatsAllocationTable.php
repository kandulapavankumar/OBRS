<?php

namespace Application\Model;

use Zend\Db\Sql\Expression;

class SeatsAllocationTable extends BaseModelTable
{

    public function insert($sessionId, $name)
    {
        $brand = new Brands();
        $brand->name = $name;
        $brand->session_id = $sessionId;

        $id = $this->addRecord($brand);

        return $id;
    }

}
