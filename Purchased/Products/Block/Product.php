<?php
namespace Purchased\Products\Block;

class Items extends \Magento\Framework\View\Element\Template
{
    protected $_orderCollectionFactory;

    public function __construct(
    
        \Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
    ){
        $this->_orderCollectionFactory = $orderCollectionFactory;
        parent ::__construct($context);
    }

    public function getOrderCollection()
    {
        $collection = $this->_orderCollectionFactory->create()
        ->addAttributeToSelect('*')
        ->addFieldToFilter($field, $condition); //Add condition if you wish

        return $collection;
    }
    public function getOrderCollectionByOrderId($orderId)
    {
        $collection = $this->_orderCollectionFactory()->create($OrderId)
        ->addFieldToSelect('*')
        ->addFiledToFilter('status',
        ['in'=>$this->_orderConfig->getVisibleOnFrontStatuses()]
        )
        ->setOrder(
            'created_at',
            

        );
        return $collection;
    }
}