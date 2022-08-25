<?php

namespace Evincemage\Customergroup\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->eavConfig       = $eavConfig;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'group_name',
			[
				'type'         => 'varchar',
				//'label'        => 'Group Name',
				'input'        => 'text',
				'required'     => false,
				'visible'      => false,
				'user_defined' => false,
				'position'     => 999,
				'system'       => 0,

				'is_used_in_grid'=> false,
				'is_visible_in_grid'=>false,

               // 'source' => 'Evincemage\Customergroup\Model\Plugin\Customer', 
                
			]
         );
         $customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'group_name');

		// more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
		$customers->setData(
			'group_name',
			['adminhtml_customer']
			
		);
      $eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'admin_name',
			[
				'type'         => 'varchar',
				//'label'        => 'Group Name',
				'input'        => 'text',
				'required'     => false,
				'visible'      => false,
				'user_defined' => false,
				'position'     => 994,
				'system'       => 0,

				'is_used_in_grid'=> false,
				'is_visible_in_grid'=>false,

               // 'source' => 'Evincemage\Customergroup\Model\Plugin\Customer', 
                
			]
		);
      $customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'admin_name');

		// more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
		$customers->setData(
			'admin_name',
			['adminhtml_customer']
			
		);
      $eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'updated_at',
			[
				'type'         => 'varchar',
				//'label'        => 'Group Name',
				'input'        => 'text',
				'required'     => false,
				'visible'      => false,
				'user_defined' => false,
				'position'     => 996,
				'system'       => 0,

				'is_used_in_grid'=> false,
				'is_visible_in_grid'=>false,

               // 'source' => 'Evincemage\Customergroup\Model\Plugin\Customer', 
                
			]
		);
	$customers = $this->eavConfig->getAttribute(Customer::ENTITY, 'updated_at');

		// more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
		$customers->setData(
			'updated_at',
			['adminhtml_customer']
			
		);
        
     
		
	}
}

