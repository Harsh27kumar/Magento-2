<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Frontend\AJAXform\Model\ResourceModel\Reviews;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Frontend\AJAXform\Model\Reviews', 'Frontend\AJAXform\Model\ResourceModel\Reviews');
    }
}