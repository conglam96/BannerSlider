<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Block;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Widget
 * @package Mageplaza\BannerSlider\Block
 */
class Widget extends Slider
{
    /**
     * @return array|bool|AbstractCollection
     */
    public function getBannerCollection()
    {
        $sliderId = $this->getData('slider_id');
        if (!$sliderId || !$this->helperData->isEnabled()) {
            return [];
        }
        $sliderCollection = $this->helperData->getActiveSliders();
        $slider = $sliderCollection->addFieldToFilter('slider_id', $sliderId)->getFirstItem();
        $this->setSlider($slider);
        return parent::getBannerCollection();
    }
}