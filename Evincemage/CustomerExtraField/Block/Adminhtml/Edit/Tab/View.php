<?php
namespace Evincemage\CustomerExtraField\Block\Adminhtml\Edit\Tab;
/*
class View extends \Magento\Backend\Block\Template implements \Magento\Ui\Component\Layout\Tabs\TabInterface
{
   
  // protected $_template = 'tab/socialform.phtml';

    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    
    public function getCustomerId()
    {
        return $this->_coreRegistry->registry(\Magento\Customer\Controller\RegistryConstants::CURRENT_CUSTOMER_ID);
    }

    public function getTabLabel()
    {
        return __('Social Form');
    }

    
    public function getTabTitle()
    {
        return __('Social Form');
    }

    
    public function canShowTab()
    {
        if ($this->getCustomerId()) {
            return true;
        }
        return false;
    }

    
    public function isHidden()
    {
        if ($this->getCustomerId()) {
            return false;
        }
        return true;
    }

   
    public function getTabClass()
    {
        return '';
    }

    
    public function getTabUrl()
    {
        return '';
    }

    
    public function isAjaxLoaded()
    {
        return false;
    }
    public function initForm()
    {
        if (!$this->canShowTab()) {
            return $this;
        }
        
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('myform_');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$customerObj = $objectManager->create('Magento\Customer\Model\Customer')
        ->load($this->getCustomerId());
        
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Social Form')]);
            
            $fieldset->addField(
                'instagram',
                'text',
                [
                    'name' => 'instagram',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Instagram'),
                    'title' => __('Instagram'),
                    'value' =>$customerObj->getInstagram(),
                ]
            );
            $fieldset->addField(
                'facebook',
                'text',
                [
                    'name' => 'facebook',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Facebook'),
                    'title' => __('Facebook'),
                    'value' =>$customerObj->getFacebook(),
                ]
            );
            $fieldset->addField(
                'linkedin',
                'text',
                [
                    'name' => 'linkedin',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Linkedin'),
                    'title' => __('Linkedin'),
                    'value' =>$customerObj->getLinkedin(),

                ]
            );
        $this->setForm($form);
        return $this;
    }
    
    protected function _toHtml()
    {
        if ($this->canShowTab()) {
            $this->initForm();
            return parent::_toHtml();
        } else {
            return '';
        }
    }
   
// You can call other Block also by using this function if you want to add phtml file.
  
   }
   */
  


use Magento\Customer\Controller\RegistryConstants;
use Magento\Ui\Component\Layout\Tabs\TabInterface;
use Magento\Backend\Block\Widget\Form;
use Magento\Backend\Block\Widget\Form\Generic;

class View extends Generic implements TabInterface
{
     
    protected $_systemStore;
    
    protected $_coreRegistry;

    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,

        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    
    public function getCustomerId()
    {
        return $this->_coreRegistry->registry(RegistryConstants::CURRENT_CUSTOMER_ID);
    }
    

    
    public function getTabLabel()
    {
        return __('Social Form');
    }

    
    public function getTabTitle()
    {
        return __('Social Form');
    }

    
    public function canShowTab()
    {
        if ($this->getCustomerId()) {
            return true;
        }
        return false;
    }

    
    public function isHidden()
    {
       if ($this->getCustomerId()) {
            return false;
        }
        return true;
    }

    
    public function getTabClass()
    {
        return '';
    }

    
    public function getTabUrl()
    {
        return '';
    }

    
    public function isAjaxLoaded()
    {
        return false;
    }
    public function initForm()
    {
        if (!$this->canShowTab()) {
            return $this;
        }
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('myform_');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$customerObj = $objectManager->create('Magento\Customer\Model\Customer')
        ->load($this->getCustomerId());
        
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Social Form')]);
            
            $fieldset->addField(
                'insta_gram',
                'text',
                [
                    'name' => 'instagram',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Instagram'),
                    'title' => __('Instagram'),
                    'value' =>$customerObj->getInstaGram(),
                ]
            );
            $fieldset->addField(
                'face_book',
                'text',
                [
                    'name' => 'facebook',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Facebook'),
                    'title' => __('Facebook'),
                    'value' =>$customerObj->getFaceBook(),
                ]
            );
            $fieldset->addField(
                'linked_in',
                'text',
                [
                    'name' => 'linkedin',
                    'data-form-part' => $this->getData('target_form'),
                    'label' => __('Linkedin'),
                    'title' => __('Linkedin'),
                    'value' =>$customerObj->getLinkedIn(),

                ]
            );
        $this->setForm($form);
        return $this;
    }
    
    protected function _toHtml()
    {
        if ($this->canShowTab()) {
            $this->initForm();
            return parent::_toHtml();
        } else {
            return '';
        }
    }
  
}