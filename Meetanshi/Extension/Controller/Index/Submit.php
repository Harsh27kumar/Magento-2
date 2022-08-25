<?php

namespace Meetanshi\Extension\Controller\Index;
/*
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Meetanshi\Extension\Model\ExtensionFactory;

class Submit extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;
    private $url;

    public function __construct(
        UrlInterface $url,
        Context $context,
        PageFactory $resultPageFactory,
        ExtensionFactory $extensionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        $this->url = $url;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
        
            $data = (array)$this->getRequest()->getPost();

            if ($data) {
                $model = $this->extensionFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->url->getUrl('extension/index/showdata'));
        return $resultRedirect;
    }
}
*/
/*
 use Magento\Framework\Controller\ResultFactory; 
 use Magento\Framework\App\Action\Action;
  use Magento\Framework\App\Action\Context;
   use Magento\Framework\App\Request\DataPersistorInterface;
    use Magento\Framework\View\Element\Messages; 
    class Submit extends Action
     {
        protected $_inlineTranslation;
        protected $_transportBuilder; 
        protected $_scopeConfig;
        protected $_logLoggerInterface;
        public function __construct(
             \Magento\Framework\App\Action\Context $context,
              \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
               \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, 
               \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, 
               \Psr\Log\LoggerInterface $loggerInterface, 
               array $data = [] )
         {
              $this->_inlineTranslation = $inlineTranslation;
            $this->_transportBuilder = $transportBuilder;
    $this->_scopeConfig = $scopeConfig;
    $this->_logLoggerInterface = $loggerInterface;
    $this->messageManager = $context->getMessageManager();
     
     
    parent::__construct($context);
     
     
}
 
public function execute()
{
    $post = $this->getRequest()->getPost();
    try
    {
        // Send Mail
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;                          
        $sentToEmail = $this->_scopeConfig ->getValue('trans_email/ident_general/email',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);             
        $sentToName = $this->_scopeConfig ->getValue('trans_email/ident_general/name',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
       
            $fromEmail = $post['email'];
            $fromName = $post['name'];
            $templateOptions = array('area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID);		

            $templateVars = array(
                                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                                'name'  => $post['name'],
                                'telephone'  => $post['telephone'],
                                'email'  => $post['email'],
                            );
            $from = array('email' => $fromEmail, 'name' => $fromName);
            $this->_inlineTranslation->suspend();
            $to = $sentToEmail;     /* Set admin email here */
  /*
            $transport = $this->_transportBuilder->setTemplateIdentifier('Competitionform')
                            ->setTemplateOptions($templateOptions)
                            ->setTemplateVars($templateVars)
                            ->setFrom($from)
                            ->addTo($to)
                            ->getTransport();
            $transport->sendMessage();
            $this->_inlineTranslation->resume();
            $this->messageManager->addSuccess('Email has been sent successfully');
            $this->_redirect('extension/index/showdata');
             
    } catch(\Exception $e){
        $this->messageManager->addError($e->getMessage());
        $this->_logLoggerInterface->debug($e->getMessage());
        exit;
    }
     
}
}

*/


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Meetanshi\Extension\Model\ExtensionFactory ;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\Element\Messages;

class Submit extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;
    private $url;
    protected $_inlineTranslation;
    protected $_transportBuilder; 
    protected $_scopeConfig;
    protected $_logLoggerInterface;

    public function __construct(
        UrlInterface $url,
        Context $context,
        PageFactory $resultPageFactory,
        ExtensionFactory $extensionFactory,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, 
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, 
        \Psr\Log\LoggerInterface $loggerInterface, 
        array $data = [] )
    
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        $this->url = $url;
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
$this->_scopeConfig = $scopeConfig;
$this->_logLoggerInterface = $loggerInterface;
$this->messageManager = $context->getMessageManager();
        parent::__construct($context);

    }

    public function execute()
    {
        try {
        
            $data = (array)$this->getRequest()->getPost();

            if ($data) {
                $model = $this->extensionFactory->create();
                $model->setData($data)->save();
                 // Send Mail
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;                          
        $sentToEmail = $this->_scopeConfig ->getValue('trans_email/ident_general/email',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);             
        $sentToName = $this->_scopeConfig ->getValue('trans_email/ident_general/name',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
       
            $fromEmail = $post['email'];
            $fromName = $post['name'];
            $templateOptions = array('area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID);		

            $templateVars = array(
                                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                                'name'  => $post['name'],
                                'telephone'  => $post['telephone'],
                                'email'  => $post['email'],
                            );
            $from = array('email' => $fromEmail, 'name' => $fromName);
            $this->_inlineTranslation->suspend();
            $to = $sentToEmail;     /* Set admin email here */
  
            $transport = $this->_transportBuilder->setTemplateIdentifier('Competitionform')
                            ->setTemplateOptions($templateOptions)
                            ->setTemplateVars($templateVars)
                            ->setFrom($from)
                            ->addTo($to)
                            ->getTransport();
            $transport->sendMessage();
            $this->_inlineTranslation->resume();
            $this->messageManager->addSuccess('Email has been sent successfully');
           
             
    } 
     
}

         catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->url->getUrl('extension/index/showdata'));
        return $resultRedirect;
    }
}