<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_AdminSaleOrderEditButton
 * @author    Magegeeks <magegeeks@gmail.com>
 */
namespace Magegeeks\AdminSaleOrderEditButton\Helper;
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\ObjectManagerInterface
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\ObjectManagerInterface $objectManager
    )
    {
        $this->_objectManager = $objectManager;
        parent::__construct($context);
    }
}