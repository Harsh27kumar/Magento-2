<?php

namespace Frontend\CustomForm\Controller\Index;
/*
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Frontend\CustomForm\Model\CustomFormFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Submit extends Action 
{
    protected $resultPageFactory;
    protected $customformFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CustomFormFactory $customformFactory 
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->customformFactory = $customformFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        try{
            $data = (array)$this->getRequest()->getPost();
            if ($data){
                $model = $this->customformFactory->create();
                $model->setData($data)->save();
               
               $this->messageManager->addSuccessMessage(__("Data saved successfully."));
               
            }
        } catch(\Exception $e){
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
            
        }
      
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl('customform/index/sendemail'));
        return $resultRedirect;
     
    }
}

*/

use Magento\Framework\App\Action\Context;
use Frontend\CustomForm\Model\CustomFormFactory;

class Submit extends \Magento\Framework\App\Action\Action
{

    /**
     * @var CustomFormFactory
     */
    protected $customformFactory;
    /**
     * [__construct description]
     * @param Context        $context [description]
     * @param CustomFormFactory $reviews [description]
     */
    public function __construct(
        Context $context,
        CustomFormFactory $customformFactory
    ) {
        $this->customformFactory = $customformFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $customformFactory = $this->customformFactory->create();
        $customformFactory->setData($data);
        $customformFactory->save();
        $response = $this->resultFactory
            ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
            ->setData([
                'status'  => "ok",
                'message' => "form submitted correctly"
            ]);
                    return $response;
    }
}
