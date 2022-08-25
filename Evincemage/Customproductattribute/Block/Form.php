<?php

namespace Evincemage\Customproductattribute\Block;
class Form extends \Magento\Framework\View\Element\Template
{  
    protected $productCollectionFactory;
    protected $categoryFactory;
    public function __construct(
       \Magento\Framework\View\Element\Template\Context $context,
       \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
       \Magento\Catalog\Model\CategoryFactory $categoryFactory,
             \Magento\Catalog\Block\Product\ListProduct $abstractProduct,

       array $data = []
    ){
       $this->productCollectionFactory = $productCollectionFactory;
       $this->categoryFactory = $categoryFactory;
       parent::__construct($context, $data);
               $this->absblock = $abstractProduct;

    }  
    public function getProductCollection(){
        
    $collection = $this->productCollectionFactory->create();
    $collection->addAttributeToSelect('*');

$collection->addAttributeToFilter('is_featured',['eq' =>1]);
$collection->setPageSize(10);
return $collection;
}        
}

