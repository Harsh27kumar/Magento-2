<?php
namespace Harsh\Customoverride\Controller\Customer\Account;
 
class Index extends \Magento\Customer\Controller\Account\Index
{ 
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('My Dashboard'));
        return $resultPage;
    }
     
}