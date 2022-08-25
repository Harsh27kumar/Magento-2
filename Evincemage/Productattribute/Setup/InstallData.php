<?php

namespace Evincemage\Productattribute\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
   private $eavSetupFactory;

   public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
 
   public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
   {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);



        $eavSetup->addAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
             'dropdown_option',
              [
                'group' => 'Groupe Name',
                 'label' => 'Dropdown Option',
                'type' => 'text',
                 'input' => 'select',
                'source' => 'Evincemage\Productattribute\Model\Config\Product\Productattributeoption',
                'required' => false,
                'sort_order' => 30,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'visible_on_front' => false
             ]
         );
         $eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'text_option',
			[
				'group' => 'Groupe Name',
                 'label' => 'Text Option',
                'type' => 'varchar',
                 'input' => 'text',
                'source' => 'Evincemage\Productattribute\Model\Config\Product\Productattributeoption',
                'required' => false,
                'sort_order' => 30,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'visible_on_front' => false
			]
         );


     $setup->endSetup();
    }
}