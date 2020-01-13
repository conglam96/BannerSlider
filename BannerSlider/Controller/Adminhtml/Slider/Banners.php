<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml\Slider;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Mageplaza\BannerSlider\Block\Adminhtml\Slider\Edit\Tab\Banner;
use Mageplaza\BannerSlider\Controller\Adminhtml\Slider;
use Mageplaza\BannerSlider\Model\SliderFactory;
/**
 * Class Banners
 * @package Mageplaza\BannerSlider\Controller\Adminhtml\Slider
 */
class Banners extends Slider
{
    /**
     * Result layout factory
     *
     * @var LayoutFactory
     */
    protected $resultLayoutFactory;
    /**
     * Banners constructor.
     *
     * @param LayoutFactory $resultLayoutFactory
     * @param SliderFactory $bannerFactory
     * @param Registry $registry
     * @param Context $context
     */
    public function __construct(
        LayoutFactory $resultLayoutFactory,
        SliderFactory $bannerFactory,
        Registry $registry,
        Context $context
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($bannerFactory, $registry, $context);
    }
    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initSlider();
        $resultLayout = $this->resultLayoutFactory->create();
        /** @var Banner $bannersBlock */
        $bannersBlock = $resultLayout->getLayout()->getBlock('slider.edit.tab.banner');
        if ($bannersBlock) {
            $bannersBlock->setSliderBanners($this->getRequest()->getPost('slider_banners', null));
        }
        return $resultLayout;
    }
}