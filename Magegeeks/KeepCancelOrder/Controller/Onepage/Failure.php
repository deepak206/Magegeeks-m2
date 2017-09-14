<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_KeepCancelOrder
 * @author    Magegeeks <magegeeks@gmail.com>
 */
namespace Magegeeks\KeepCancelOrder\Controller\Onepage;

class Failure extends \Magento\Checkout\Controller\Onepage\Failure
{
    /**
     * @return \Magento\Framework\View\Result\Page|\Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        die('acha');
        $lastQuoteId = $this->getOnepage()->getCheckout()->getLastQuoteId();
        $lastOrderId = $this->getOnepage()->getCheckout()->getLastOrderId();

        if (!$lastQuoteId || !$lastOrderId) {
            return $this->resultRedirectFactory->create()->setPath('checkout/cart');
        }
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $quoteFactory = $objectManager->create('\Magento\Quote\Model\QuoteFactory');
        $quote = $quoteFactory->create()->load($lastQuoteId);
        $quote->setIsActive(true)->save();

        $checkoutSession = $objectManager->create('\Magento\Checkout\Model\Session')
        ->replaceQuote($quote);
        
        return $this->resultRedirectFactory->create()->setPath('checkout/cart');
        return parent::execute();
    }
}
