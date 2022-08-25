<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Frontend\AJAXform\Model;

class Reviews extends \Magento\Framework\Model\AbstractModel
{

    public function _construct()
    {
        $this->_init('Frontend\AJAXform\Model\ResourceModel\Reviews');
    }
}