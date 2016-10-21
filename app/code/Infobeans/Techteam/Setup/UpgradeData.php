<?php

namespace Infobeans\Techteam\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface {

   const ENTITY_TYPE = \Magento\Catalog\Model\Product::ENTITY;

   protected $_objectManager;
   protected $_moduleDataSetup;
   protected $_eavSetupFactory;

   public function __construct(
       ObjectManagerInterface $objectManager,
       ModuleDataSetupInterface $moduleDataSetup,
       EavSetupFactory $eavSetupFactory
   ) {

       $this->_objectManager = $objectManager;
       $this->_moduleDataSetup = $moduleDataSetup;
       $this->_eavSetupFactory = $eavSetupFactory;

   }
   public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
       $installer = $setup;
       /* Add the attribute set Bike */
       if ( version_compare( $context->getVersion(), '1.0.1', '<' ) ) {
	   $name = "Bike";
           $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);

           $defaultId = $eavSetup->getDefaultAttributeSetId(self::ENTITY_TYPE);

           $model = $this->_objectManager
           ->create('Magento\Eav\Api\Data\AttributeSetInterface')
           ->setId(null)
           ->setEntityTypeId(4)
           ->setAttributeSetName($name);

           $this->_objectManager
           ->create('Magento\Eav\Api\AttributeSetManagementInterface')
           ->create(self::ENTITY_TYPE, $model, $defaultId)
           ->save();
           
       }
       /* Add the attribute set Car and Laptop */
       if ( version_compare( $context->getVersion(), '1.0.2', '<' ) ) {
	   $name = array('Car','Laptop');
           $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);

           $defaultId = $eavSetup->getDefaultAttributeSetId(self::ENTITY_TYPE);
	   foreach($name as $name) {
           $model = $this->_objectManager
           ->create('Magento\Eav\Api\Data\AttributeSetInterface')
           ->setId(null)
           ->setEntityTypeId(4)
           ->setAttributeSetName($name);

           $this->_objectManager
           ->create('Magento\Eav\Api\AttributeSetManagementInterface')
           ->create(self::ENTITY_TYPE, $model, $defaultId)
           ->save();
           }
           
       }
       
   }
}