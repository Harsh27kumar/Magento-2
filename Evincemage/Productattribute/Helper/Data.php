<?php

namespace Evincemage\Productattribute\Helper;

use Magento\Catalog\Model\Product\Action as ProductAction;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    protected $messageManager;
    private $productCollection;
    private $productAction;
    private $storeManager;

    public function __construct(
        Context $context,
        CollectionFactory $collection,
        ProductAction $action,
        StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {
        $this->productCollection = $collection;
        $this->productAction = $action;
        $this->storeManager = $storeManager;
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }

    public function setAttributeData($value,$productId, $attributeValue)
    {
        $attributeCode = "text_option";

        $product = $this->productRepository->getById($productId);

        $product->setData($attributeCode, $attributeValue);
       
        try {
            $collection = $this->productCollection->create()->addFieldToFilter('*');
            $storeId = $this->storeManager->getStore()->getId();
            $ids = [];
            $i = 0;
            foreach ($collection as $item) {
                $ids[$i] = $item->getEntityId();
                $i++;
            }
        
/*
        $collection = $this->productCollection
        ->addAttributeToSelect('*')
        ->addAttributeToFilter('dropdown_option', 'value1')
        ->load();
        
*/

            $this->productAction->updateAttributes($ids, array('dropdown_option' => $value), $storeId);
            $this->productRepository->save($product);

        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
                               }
                               
    }
  

}