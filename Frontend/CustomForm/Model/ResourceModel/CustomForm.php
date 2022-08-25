<?php
namespace Frontend\CustomForm\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomForm extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customform', 'id');
    }
}