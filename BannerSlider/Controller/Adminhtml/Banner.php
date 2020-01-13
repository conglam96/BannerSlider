<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\Registry;
use Mageplaza\BannerSlider\Model\BannerFactory;
/**
 * Class Banner
 * @package Mageplaza\BannerSlider\Controller\Adminhtml
 */
abstract class Banner extends Action
{
    /**
     * Banner Factory
     *
     * @var BannerFactory
     */
    protected $bannerFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;
    /**
     * Result redirect factory
     *
     * @var RedirectFactory
     */
    /**
     * constructor
     *
     * @param BannerFactory $bannerFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        BannerFactory $bannerFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->bannerFactory = $bannerFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * Init Banner
     *
     * @return \Mageplaza\BannerSlider\Model\Banner
     */
    protected function initBanner()
    {
        $bannerId = (int)$this->getRequest()->getParam('banner_id');
        /** @var \Mageplaza\BannerSlider\Model\Banner $banner */
        $banner = $this->bannerFactory->create();
        if ($bannerId) {
            $banner->load($bannerId);
        }
        $this->coreRegistry->register('mpbannerslider_banner', $banner);
        return $banner;
    }
}