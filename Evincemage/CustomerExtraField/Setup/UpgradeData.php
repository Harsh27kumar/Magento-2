<?php

namespace Evincemage\CustomerExtraField\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class UpgradeData implements UpgradeDataInterface
{
    
    protected $customerSetupFactory;
    
    private $attributeSetFactory;
   
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }
  public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
{
$customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
$customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
    $attributeSetId = $customerEntity->getDefaultAttributeSetId();
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

	

		


		$customerSetup->addAttribute(
			Customer::ENTITY,
			'face_book',
			[
				'type'         => 'varchar',
				'label'        => 'Facebook',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0,
                'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
			]
		);

        $sampleAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'face_book')
        ->addData(
        [
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => ['adminhtml_customer','customer_account_edit','customer_account_create','socialform_panel','customer_form'],
                ]
        // more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
        );
        $sampleAttribute->save();

        $customerSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'insta_gram',
			[
				'type'         => 'varchar',
				'label'        => 'Instagram',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0,
                'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
			]
		);
        $sampleAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'insta_gram')
        ->addData(
        [
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => ['adminhtml_customer','customer_account_edit','customer_account_create','socialform_panel','customer_form'],
                ]
        // more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
        );
        $sampleAttribute->save();

        $customerSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'linked_in',
			[
				'type'         => 'varchar',
				'label'        => 'LinkedIn',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0,
                'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
			]
		);
        $sampleAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'linked_in')
        ->addData(
        [
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => ['adminhtml_customer','customer_account_edit','customer_account_create','socialform_panel','customer_form'],
                ]
        // more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
        );
        $sampleAttribute->save();
	}
}



/*
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class UpgradeData implements UpgradeDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->eavConfig       = $eavConfig;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		
      
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'face_book',
			[
				'type'         => 'varchar',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => false,
				'position'     => 999,
				'system'       => 0,
				'label'        => 'Facebook',
				'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
                
			]
         );
         $customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'face_book');

		$customers->setData(
			'face_book',
			['adminhtml_customer','customer_account_edit','customer_account_create']
			
		);
      $eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'insta_gram',
			[
				'type'         => 'varchar',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => false,
				'position'     => 994,
				'system'       => 0,
				'label'        => 'Instagram',
				'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
                
			]
		);
      $customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'insta_gram');

		$customers->setData(
			'insta_gram',
			['adminhtml_customer','customer_account_edit','customer_account_create']
			
		);
      $eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'linked_in',
			[
				'type'         => 'varchar',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => false,
				'position'     => 996,
				'system'       => 0,
				'label'        => 'linked_in',
				'sort_order'   =>999,
                'is_used_in_grid' => 1,
                'is_visible_in_grid' =>1,
                'is_filterable_in_grid' =>1,
                'is_searchable_in_grid' =>1,
                
			]
		);
	$customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'linked_in');

		$customers->setData(
			'linked_in',
			['adminhtml_customer','customer_account_edit','customer_account_create']
			
		);
        
     
		
	}
}
*/





