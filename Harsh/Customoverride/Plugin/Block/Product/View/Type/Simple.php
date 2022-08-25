<?php
    namespace Harsh\Customoverride\Plugin\Catalog\Block;
    
    class Simple
    {
        public function beforeToHtml(\Magento\Catalog\Block\Product\View\Type\Simple $block)
        {
            $block->setTemplate('Harsh_Customoverride::product/view/type/default.phtml');
        }
    }