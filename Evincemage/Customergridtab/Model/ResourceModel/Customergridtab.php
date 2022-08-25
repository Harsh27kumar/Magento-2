<?php
namespace Evincemage\Customergridtab\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customergridtab extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_grid_tab', 'id');
    }
}