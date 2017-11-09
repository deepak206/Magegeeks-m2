<?php
/**
 * Mage geeks
 *
 * @category  Magegeeks
 * @package   Magegeeks_Minicart
 * @author    Magegeeks <magegeeks@gmail.com>
 */
namespace Test\Minicart\Controller\Rewrite\Section;

class Load extends \Magento\Customer\Controller\Section\Load
{
    /**
     * @return \Magento\Framework\Controller\Result\Redirect|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();
        try {
            $sectionNames = $this->getRequest()->getParam('sections');
            $sectionNames = $sectionNames ? array_unique(\explode(',', $sectionNames)) : null;

            $updateSectionId = $this->getRequest()->getParam('update_section_id');
            if ('false' === $updateSectionId) {
                $updateSectionId = false;
            }
            $response = $this->sectionPool->getSectionsData($sectionNames, (bool)$updateSectionId);
        } catch (\Exception $e) {
            $resultJson->setStatusHeader(
                \Zend\Http\Response::STATUS_CODE_400,
                \Zend\Http\AbstractMessage::VERSION_11,
                'Bad Request'
            );
            $response = ['message' => $this->getEscaper()->escapeHtml($e->getMessage())];
        }

        return $resultJson->setData($response);
    }
}
