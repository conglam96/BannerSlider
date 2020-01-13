<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml\Banner;
use Exception;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Mageplaza\BannerSlider\Controller\Adminhtml\Banner;
/**
 * Class Delete
 * @package Mageplaza\BannerSlider\Controller\Adminhtml\Banner
 */
class Delete extends Banner
{
    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            $this->bannerFactory->create()
                ->load($this->getRequest()->getParam('banner_id'))
                ->delete();
            $this->messageManager->addSuccess(__('The Banner has been deleted.'));
        } catch (Exception $e) {
            // display error message
            $this->messageManager->addErrorMessage($e->getMessage());
            // go back to edit form
            $resultRedirect->setPath(
                'mpbannerslider/*/edit',
                ['banner_id' => $this->getRequest()->getParam('banner_id')]
            );
            return $resultRedirect;
        }
        $resultRedirect->setPath('mpbannerslider/*/');
        return $resultRedirect;
    }
}