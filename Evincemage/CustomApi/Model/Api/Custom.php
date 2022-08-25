<?php
 
namespace Evincemage\CustomApi\Model\Api;
 
use Psr\Log\LoggerInterface;
 
class Custom implements \Evincemage\CustomApi\Api\CustomInterface
{
    protected $logger;
 
    public function __construct(
        LoggerInterface $logger
    )
    {
 
        $this->logger = $logger;
    }
 
    
 
    public function getPost($value)
    {
        echo"test";
        exit;
        $response = ['success' => false];
 
        try {
            // Your Code here
            
            $response = ['success' => true, 'message' => $value];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray; 
    }
}

/*

use Magento\Framework\App\Bootstrap;    

class Custom implements \Evincemage\CustomApi\Api\CustomInterface
{
protected $request;
    public function __construct(\Magento\Framework\App\Request\Http $request) {
       $this->request = $request;
    }

     
    public function getPost($value){
       // echo "test";
       // exit;

        $bootstrap = Bootstrap::create(BP, $_SERVER);
        $obj = $bootstrap->getObjectManager();
        $state = $obj->get('Magento\Framework\App\State');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $currentStoreId = $storeManager->getStore()->getId();
        $rating = $objectManager->get("Magento\Review\Model\ResourceModel\Review\CollectionFactory");

        $collection = $rating->create()->addStoreFilter($value
        )->addStatusFilter(\Magento\Review\Model\Review::STATUS_APPROVED);
            $allParameters=$this->request->getParams();
            if(array_key_exists("fromDate",$allParameters)){
                $collection=$collection->addFieldToFilter('created_at', ['gteq' => $allParameters['fromDate']]);
             }
             if(array_key_exists("toDate",$allParameters)){
                $collection=$collection->addFieldToFilter('created_at', ['lteq' => $allParameters['toDate']]);
             }
             if(array_key_exists("title",$allParameters)){
                 $title=$allParameters['title'];
                $collection=$collection->addFieldToFilter('title', ['like' => '%'.$title.'%']);
             }
             if(array_key_exists("text",$allParameters)){
                $collection=$collection->addFieldToFilter('detail', ['like' => '%'.$allParameters['text'].'%']);
             }
             if(array_key_exists("customerId",$allParameters)){
                $collection=$collection->addFieldToFilter('customer_id', ['eq' => $allParameters['customerId']]);
             }
             if(array_key_exists("productId",$allParameters)){
                $collection=$collection->addFieldToFilter('entity_pk_value', ['eq' => $allParameters['productId']]);
             }
             if(array_key_exists("pageSize",$allParameters)){
                $collection->setPageSize($allParameters['pageSize']);
             }
             if(array_key_exists("page",$allParameters)){
                $collection->setCurPage($allParameters['page']);
             }
            $result=$collection->getData();
            return $result;
    }

}
*/
/*

use Magento\Review\Model\Review  ;

class Custom implements \Evincemage\CustomApi\Api\CustomInterface
{
    private $review;

    public function __construct(Review $review)
    {
        $this->Review = $review;
    }

    public function getPost($value)
    {
       
        
       
            $review = $this->reviewFactory->create()->setData($value);
            $review->unsetData('review_id');

            $validate = $review->validate();
            if ($validate === true) {
                try {
                    $review->setEntityId($review->getEntityIdByCode(Review::ENTITY_PRODUCT_CODE))
                        ->setEntityPkValue($product->getId())
                        ->setStatusId(Review::STATUS_PENDING)
                        ->setCustomerId($this->customerSession->getCustomerId())
                        ->setStoreId($this->storeManager->getStore()->getId())
                        ->setStores([$this->storeManager->getStore()->getId()])
                        ->save();
                        $review->aggregate();
                        $this->messageManager->addSuccessMessage(__('You submitted your review for moderation.'));
                }
             catch (\Exception $e) {
                $this->reviewSession->setFormData($value);
                $this->messageManager->addErrorMessage(__('We can\'t post your review right now.'));
             }      
        }
        
    }
}
*/