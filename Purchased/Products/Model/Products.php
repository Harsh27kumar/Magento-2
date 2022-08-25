<?php
namespace Purchased\Products\Model;

class Products extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Purchased\Products\Model\ResourceModel\Products');
    }
}