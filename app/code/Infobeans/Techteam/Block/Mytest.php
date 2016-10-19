<?php 
namespace Infobeans\Techteam\Block;
 
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
