<?php
namespace Purchased\Products\Model\ResourceModel;

class Products extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('sales_order_item', 'item_id');
    }
}