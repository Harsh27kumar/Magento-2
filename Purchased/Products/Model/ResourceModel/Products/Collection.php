<?php
namespace Purchased\Products\Model\ResourceModel\Products;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Purchased\Products\Model\Products','Purchased\Products\Model\ResourceModel\Products');
    }
}