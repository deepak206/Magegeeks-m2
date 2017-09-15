<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_StockStatus
 * @author    Magegeeks <magegeeks@gmail.com>
 */

namespace Magegeeks\StockStatus\Block\Product\View;
use Magento\Catalog\Block\Product\AbstractProduct;
class Stock extends AbstractProduct
{
	public function getProductStatus()
	{
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();   
		$productCollection = $objectManager->create('Magento\Reports\Model\ResourceModel\Report\Collection\Factory'); 
		$collection = $productCollection->create('Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection');
        return $collection;
	}
}
