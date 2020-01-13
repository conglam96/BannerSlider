<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\BannerSlider\Model\SliderFactory;
/**
 * Class Slider
 * @package Mageplaza\BannerSlider\Controller\Adminhtml
 */
abstract class Slider extends Action
{
    /**
     * Slider Factory
     *
     * @var SliderFactory
     */
    protected $sliderFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;
    /**
     * Slider constructor.
     *
     * @param SliderFactory $sliderFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        SliderFactory $sliderFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->sliderFactory = $sliderFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * Init Slider
     *
     * @return \Mageplaza\BannerSlider\Model\Slider
     */
    protected function initSlider()
    {
        $sliderId = (int)$this->getRequest()->getParam('slider_id');
        /** @var \Mageplaza\BannerSlider\Model\Slider $slider */
        $slider = $this->sliderFactory->create();
        if ($sliderId) {
            $slider->load($sliderId);
        }
        $this->coreRegistry->register('mpbannerslider_slider', $slider);
        return $slider;
    }
}