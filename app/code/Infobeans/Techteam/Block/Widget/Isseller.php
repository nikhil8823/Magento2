<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Infobeans\Techteam\Block\Widget;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\OptionInterface;

/**
 * Block to render customer's gender attribute
 *
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class Isseller extends \Magento\Framework\View\Element\Template
{
    /**
     * @var CustomerMetadataInterface
     */
    protected $customerMetadata;

    /**
     * @var \Magento\Customer\Helper\Address
     */
    protected $_addressHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Helper\Address $addressHelper
     * @param CustomerMetadataInterface $customerMetadata
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Helper\Address $addressHelper,
        CustomerMetadataInterface $customerMetadata,
        array $data = []
    ) {
        $this->_addressHelper = $addressHelper;
        $this->customerMetadata = $customerMetadata;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }
    /**
     * Initialize block
     *
     * @return void
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('Infobeans_Techteam::widget/is_seller.phtml');
    }

    /**
     * Check if gender attribute enabled in system
     * @return bool
     */
    public function isEnabled()
    {
        return $this->_getAttribute('is_seller') ? (bool)$this->_getAttribute('is_seller')->isVisible() : false;
    }

    
    /**
     * Retrieve customer attribute instance
     *
     * @param string $attributeCode
     * @return \Magento\Customer\Api\Data\AttributeMetadataInterface|null
     */
    protected function _getAttribute($attributeCode)
    {
        try {
            return $this->customerMetadata->getAttributeMetadata($attributeCode);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return null;
        }
    }
    
        /**
     * Check if gender attribute marked as required
     * @return bool
     */
    public function isRequired()
    {
        return $this->_getAttribute('is_seller') ? (bool)$this->_getAttribute('is_seller')->isRequired() : false;
    }
    
}
