<?php

namespace Evincemage\CustomerExtraField\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\ResourceModel\CustomerFactory;

class Submit extends \Magento\Framework\App\Action\Action
{

    protected $customer;

    protected $customerFactory;


    public function __construct(
        Context $context,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Customer\Model\ResourceModel\CustomerFactory $customerFactory

    ) {
        $this->customer = $customer;
        $this->customerFactory = $customerFactory;

        parent::__construct($context);
    }
    public function execute()
    {
         $facebook = $this->getRequest()->getPost('face_book');
        $instagram = $this->getRequest()->getPost('insta_gram');
        $linkedin = $this->getRequest()->getPost('linked_in');
       
        $om = \Magento\Framework\App\ObjectManager::getInstance(); 
        $customerSession = $om->get('Magento\Customer\Model\Session'); 
        $customerId = $customerSession->getCustomer()->getData(); //get all data of customerData
        $customerId = $customerSession->getCustomer()->getId();//get id of customer
       
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $customerData->setCustomAttribute('face_book',$facebook);
        $customer->updateData($customerData);
        $customerResource = $this->customerFactory->create();
        $customerResource->saveAttribute($customer, 'face_book');

        $customerData->setCustomAttribute('insta_gram',$instagram);
        $customer->updateData($customerData);
        $customerResource = $this->customerFactory->create();
        $customerResource->saveAttribute($customer, 'insta_gram');

        $customerData->setCustomAttribute('linked_in',$linkedin);
        $customer->updateData($customerData);
        $customerResource = $this->customerFactory->create();
        $customerResource->saveAttribute($customer, 'linked_in');
        $this->_redirect('socialform/index/index');
    }
}