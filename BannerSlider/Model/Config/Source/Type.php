<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
/**
 * Class Type
 * @package Mageplaza\BannerSlider\Model\Config\Source
 */
class Type implements ArrayInterface
{
    const IMAGE = '0';
    const CONTENT = '1';
    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::IMAGE,
                'label' => __('Image')
            ],
            [
                'value' => self::CONTENT,
                'label' => __('Advanced')
            ]
        ];
        return $options;
    }
}