<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Frontend\AJAXform\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * [execute description]
     * @return [type] [description]
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}


