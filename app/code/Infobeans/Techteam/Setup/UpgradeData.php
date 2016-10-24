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

      /* Add the attribute for Bike */
       if ( version_compare( $context->getVersion(), '1.0.3', '<' ) ) {
            $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'brand_name',
                [
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Brand Name',
                    'input' => 'select',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => true,
                    'group' => 'Bike Configuration',
                    'user_defined' => true,
                    'default' => '',
                    'searchable' => true,
                    'filterable' => true,
                    'comparable' => true,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => '',
                    'option' => [
                        'values' => ['Bajaj','Honda', 'Hero','Mahindra','Yamaha','Royal Enfield','TVS','Suzuki','Harley Davidson','Kawasaki','Ducati','Hyosung'],
                    ],
                ]
            );
       }
       
       /* Add the attribute for Bike */
       if ( version_compare( $context->getVersion(), '1.0.4', '<' ) ) {
            $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);
            
            
            $attributes = array(
                'engine_type'=>
                        [
                            'type' => 'int',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Engine Type',
                            'input' => 'select',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Bike Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => '',
                            'option' => [
                                'values' => ['Four Stroke Engines','Two-Stroke Engines'],
                            ]
                        ],
                'power'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Power',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Bike Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'fuel_tank'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Fuel Tank',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Bike Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'top_speed'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Top Speed',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Bike Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'self _start'=>
                        [
                            'type' => 'int',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Self Start',
                            'input' => 'select',
                            'class' => '',
                            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Bike Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ]
                );
            
            foreach($attributes as $key => $attribute){
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,$key,$attribute);
            }
       }
       
       /* Add the attribute for Car */
       if ( version_compare( $context->getVersion(), '1.0.5', '<' ) ) {
            $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);
            $attributes = array(
                'car_type'=>
                        [
                            'type' => 'int',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Car Type',
                            'input' => 'select',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => '',
                            'option' => [
                                'values' => ['Sedan','Hatchback','SUV'],
                            ]
                        ],
                'engine_cc'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Engine cc',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'car_fuel_tank'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Car Fuel Tank ',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'seaters'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Seaters',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'no_of_gears'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'No Of Gears',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ]
                );
            
            foreach($attributes as $key => $attribute){
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,$key,$attribute);
            }
       }
       
       /* Add the attribute for Laptop */
       if ( version_compare( $context->getVersion(), '1.0.5', '<' ) ) {
            $eavSetup = $this->_eavSetupFactory->create([
               'setup' => $this->_moduleDataSetup
           ]);
            $attributes = array(
                'laptop_brand'=>
                        [
                            'type' => 'int',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Laptop Brand',
                            'input' => 'select',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => '',
                            'option' => [
                                'values' => ['Apple','Dell','Lenovo','HP','Sony','Asus','Acer','Samsung'],
                            ]
                        ],
                'laptop_series'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Laptop Series',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Car Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'laptop_color'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Laptop Color',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'screen_size'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Screen Size',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'laptop_weight'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Laptop Weight',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'laptop_model_number'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Laptop Model Number',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'processor_brand'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Processor Brand',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'processor_type'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Processor Type',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'ram_size'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'RAM Size',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'hard_drive_size'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Hard Drive Size',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'graphics_coprocessor'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Graphics Coprocessor',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'operating_system'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Operating System',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Laptop Configuration',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ]
                );
            
            foreach($attributes as $key => $attribute){
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,$key,$attribute);
            }
       }
       
       /* Add the attribute set Book */
       if ( version_compare( $context->getVersion(), '1.0.6', '<' ) ) {
	   $name = "Book";
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
           
           $attributes = array(
                'author'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Author',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' =>''
                        ],
                'isbn'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'ISBN',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'language'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Language',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'publish_date'=>
                        [
                            'type' => 'datetime',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Publish Date',
                            'input' => 'date',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'publisher'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'Publisher',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ],
                'no_of_pages'=>
                        [
                            'type' => 'text',
                            'backend' => '',
                            'frontend' => '',
                            'label' => 'No of pages',
                            'input' => '',
                            'class' => '',
                            'source' => '',
                            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                            'visible' => true,
                            'required' => true,
                            'group' => 'Book Details',
                            'user_defined' => true,
                            'default' => '',
                            'searchable' => true,
                            'filterable' => true,
                            'comparable' => true,
                            'visible_on_front' => true,
                            'used_in_product_listing' => true,
                            'unique' => false,
                            'apply_to' => ''
                        ]
                );
            
            foreach($attributes as $key => $attribute){
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,$key,$attribute);
            }
           
           
       }
   }
}