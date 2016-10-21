<?php
namespace Infobeans\Techteam\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->eavConfig = $eavConfig;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'is_seller',
			[
				'type' => 'int',
				'label' => 'Is Seller?',
				'input' => 'select',
				'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
				'required' => true,
				'default' => '0',
				'sort_order' => 100,
				'system' => false,
				'position' => 100
			]
		);
		$sampleAttribute = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'is_seller');
		$sampleAttribute->setData(
			'used_in_forms',
			['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
		);
		$sampleAttribute->save();
	}
}
