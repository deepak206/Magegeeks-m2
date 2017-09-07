<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_AdminSaleOrderEditButton
 * @author    Magegeeks <magegeeks@gmail.com>
 */
namespace Magegeeks\AdminSaleOrderEditButton\Plugin;
 
class PluginBeforeView
{
    public function beforeGetOrderId(\Magento\Sales\Block\Adminhtml\Order\Create $subject){
        $subject->addButton(
                'return',
                ['label' => __('Return'), 'onclick' => 'setLocation(window.location.href)', 'class' => 'return'],
                -1
            );
        return null;
    }
}
