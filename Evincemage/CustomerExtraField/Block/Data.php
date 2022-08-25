<?php
namespace Evincemage\CustomerExtraField\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;

class Data extends Template
{
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        return $this->getUrl('socialform/index/submit', ['_secure' => true]);
    }

public function getInstagram()
{
    $om = \Magento\Framework\App\ObjectManager::getInstance(); 
    $customerSession = $om->get('Magento\Customer\Model\Session'); 
    $customerId = $customerSession->getCustomer()->getData(); //get all data of customerData
    $customerId = $customerSession->getCustomer()->getId();//get id of customer
    $customerId = $customerSession->getCustomer()->getInstaGram();
return $customerId;

}
public function getFacebook()
{
    $om = \Magento\Framework\App\ObjectManager::getInstance(); 
    $customerSession = $om->get('Magento\Customer\Model\Session'); 
    $customerId = $customerSession->getCustomer()->getData(); //get all data of customerData
    $customerId = $customerSession->getCustomer()->getId();//get id of customer
    $customerId = $customerSession->getCustomer()->getFaceBook();
    return $customerId;


}
public function getLinkedin()
{
    $om = \Magento\Framework\App\ObjectManager::getInstance(); 
    $customerSession = $om->get('Magento\Customer\Model\Session'); 
    $customerId = $customerSession->getCustomer()->getData(); //get all data of customerData
    $customerId = $customerSession->getCustomer()->getId();//get id of customer
    $customerId = $customerSession->getCustomer()->getLinkedIn();
    return $customerId;


}


}
