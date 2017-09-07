<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_AdminSaleOrderEditButton
 * @author    Magegeeks <magegeeks@gmail.com>
 */
namespace Magegeeks\AdminSaleOrderEditButton\Plugin;
use Magento\Framework\Controller\ResultFactory; 

class PluginBefore
{
    public function beforePushButtons(
    	\Magento\Backend\Block\Widget\Button\Toolbar\Interceptor $subject,
        \Magento\Framework\View\Element\AbstractBlock $context,
        \Magento\Backend\Block\Widget\Button\ButtonList $buttonList
    ) {
    	$this->_request = $context->getRequest();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->_backendUrl = $objectManager->get('\Magento\Framework\App\Response\RedirectInterface'); 
        $url = $this->_backendUrl->getRedirectUrl();//$this->_backendUrl->getUrl("adminhtml/sales/order");

    	if($this->_request->getFullActionName() == 'sales_order_edit_index'){
	          $buttonList->add(
	            'return',
	            ['label' => __('Return'), 'onclick' => "setLocation('".$url."')", 'class' => 'return'],
	            -1
	        );
      	}
    } 
}
