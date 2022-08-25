<?php
namespace Evincemage\Customergridtab\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Customergridtab extends AbstractModel
{
    protected function _construct()
    {
        $this ->_init('Evincemage\Customergridtab\Model\ResourceModel\Customergridtab');
    }
}