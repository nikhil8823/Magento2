<?php 
namespace Infobeans\Techteam\Block;
use Magento\Customer\Block\Form\Register;

class Mytest extends \Magento\Framework\View\Element\Template
{
	public function _prepareLayout()
	{
		return parent::_prepareLayout();
	}
	
	public function getHelloWorldTxt()
	{
	    return 'My  Testing!';
	}
}
