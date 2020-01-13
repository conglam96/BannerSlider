<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml\Banner;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
/**
 * Class NewAction
 * @package Mageplaza\BannerSlider\Controller\Adminhtml\Banner
 */
class NewAction extends Action
{
    /**
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}