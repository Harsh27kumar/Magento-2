<?php
namespace Evincemage\Customergridtab\Block\Adminhtml;

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_post';
		$this->_blockGroup = 'Evincemage_Customergridtab';
		$this->_headerText = __('Customer Grid Tab');
		$this->_addButtonLabel = __('Create New Post');
		parent::_construct();
	}
}
