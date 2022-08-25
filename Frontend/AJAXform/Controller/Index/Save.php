<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Frontend\AJAXform\Controller\Index;
/*
use Magento\Framework\App\Action\Context;
use Frontend\AJAXform\Model\ReviewsFactory;

class Save extends \Magento\Framework\App\Action\Action
{

    protected $reviews;

    public function __construct(
        Context $context,
        ReviewsFactory $reviews
    ) {
        $this->reviews = $reviews;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $reviews = $this->reviews->create();
        $reviews->setData($data);
        if ($reviews->save()) {
            $this->messageManager->addSuccessMessage(__('You saved review'));
        } else {
            $this->messageManager->addErrorMessage(__('Review was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('reviews/index/index');
        return $resultRedirect;
    }
}
*/

use Magento\Framework\App\Action\Context;
use Frontend\AJAXform\Model\ReviewsFactory;

class Save extends \Magento\Framework\App\Action\Action
{

    /**
     * @var ReviewsFactory
     */
    protected $reviews;
    /**
     * [__construct description]
     * @param Context        $context [description]
     * @param ReviewsFactory $reviews [description]
     */
    public function __construct(
        Context $context,
        ReviewsFactory $reviews
    ) {
        $this->reviews = $reviews;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $reviews = $this->reviews->create();
        $reviews->setData($data);
        $reviews->save();
        $response = $this->resultFactory
            ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
           // ->setData($reviews->getData());
           ->setData([
            'status'  => "ok",
            'message' => "form submitted correctly"
        ]);
        return $response;
        
            
    }

}