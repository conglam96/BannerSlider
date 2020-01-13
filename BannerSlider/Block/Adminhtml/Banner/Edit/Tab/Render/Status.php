<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
/**
 * Class Status
 * @package Mageplaza\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render
 */
class Status extends AbstractRenderer
{
    /**
     * Render Banner status
     *
     * @param DataObject $row
     *
     * @return string
     */
    public function render(DataObject $row)
    {
        $status = $row->getData($this->getColumn()->getIndex());
        return $status === '1' ? 'Enable' : 'Disable';
    }
}