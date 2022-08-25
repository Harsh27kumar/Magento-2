<?php
namespace Frontend\CustomForm\Model\ResourceModel\CustomForm;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Frontend\CustomForm\Model\CustomForm','Frontend\CustomForm\Model\ResourceModel\CustomForm');
    }
}
