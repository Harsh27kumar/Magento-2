<?php
namespace Evincemage\Customergridtab\Model\ResourceModel\Customergridtab;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Evincemage\Customergridtab\Model\Customergridtab','Evincemage\Customergridtab\Model\ResourceModel\Customergridtab');
    }
}
