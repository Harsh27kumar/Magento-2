<?php
namespace Evincemage\CustomRestApi\Model;

class CustomApi implements \Evincemage\CustomRestApi\Api\CustomApiInterface
{
    protected $_customerFactory;
    public function __construct(
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory
    ) {
        $this->_customerFactory = $customerFactory;
    }
    
    public function getCustomerList()
    {
        $customerCollection = $this->_customerFactory->create();
        $response = ['status' => false, 'message' => 'Error while fetching data'];
        if (count($customerCollection->getData())) {
            $customerList = $customerCollection->getData();
            $response = ['status' => true, 'data' => $customerList];
        } else {
            $response = ['status' => false, 'message' => 'No customer found'];
        }
        return json_encode($response);
    }
}