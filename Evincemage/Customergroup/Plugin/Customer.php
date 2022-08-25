<?php

namespace Evincemage\Customergroup\Plugin;  
/*declare block +*/
use Magento\Customer\Api\Data\GroupInterface;
use Magento\Framework\Api\ExtensionAttributesInterface\Config;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Customer
{
  /*declare class*/
    protected $_responseFactory;
    protected $_url;
      protected $_customerRepositoryInterface;
      protected $customer;
      protected $customerFactory;
      protected $customerRepository;

/*the root-level class (from which all other classes inherit) implements __construct, which PHP calls automatically whenever a class is constructed. Right now, this root-level class simply calls _construct, which contains the actual code. */
/* initialize the class (Constructor) */
    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
           \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
       
           \Magento\Customer\Model\Customer $customers,
           \Magento\Customer\Model\ResourceModel\CustomerFactory $customerFactory,
           CustomerRepositoryInterface $customerRepository,

           \Magento\Backend\Model\Auth\Session $authSession, 

           array $data = []
    ){
      
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
          $this->_customerRepositoryInterface = $customerRepositoryInterface;
   
          $this->customers = $customers;
          $this->customerFactory = $customerFactory; 
          $this->customerRepository = $customerRepository; 
       
       
          $this->authSession = $authSession;
       
        }

      
      /* before plugin function */

    public function beforeExecute(\Magento\Customer\Controller\Adminhtml\Index\Save $save)
    {
        $post = $save->getRequest()->getPostValue('customer_id');
        //$show = var_dump($post);
   //print_r($post); exit;    
        // Do your stuff

$customer = $this->_customerRepositoryInterface->getById($post);


 $groupId = $customer->getGroupId();
//print_r($customerId);

 //exit;
 
/** @var \Magento\User\Model\User $user*/
$user = $this->authSession->getUser()->getUsername();

//print_r($user);

//exit;


  $customer->setCustomAttribute('group_name', $groupId);

  $customer->setCustomAttribute('admin_name', $user);
        $this->customerRepository->save($customer);
 
       // return $this;
      
 
       
       
       return $this;
       


  
    }

}

