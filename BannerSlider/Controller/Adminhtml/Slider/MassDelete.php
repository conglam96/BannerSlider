<?php
/**
 
 */
namespace Mageplaza\BannerSlider\Controller\Adminhtml\Slider;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Mageplaza\BannerSlider\Model\ResourceModel\Slider\CollectionFactory;
use Mageplaza\BannerSlider\Model\Slider;
/**
 * Class MassDelete
 * @package Mageplaza\BannerSlider\Controller\Adminhtml\Slider
 */
class MassDelete extends Action
{
    /**
     * Mass Action Filter
     *
     * @var Filter
     */
    protected $filter;
    /**
     * Collection Factory
     *
     * @var CollectionFactory
     */
    protected $collectionFactory;
    /**
     * MassDelete constructor.
     *
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param Context $context
     */
    public function __construct(
        Filter $filter,
        CollectionFactory $collectionFactory,
        Context $context
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * @return Redirect|ResponseInterface|ResultInterface
     * @throws LocalizedException
     * @throws \Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $delete = 0;
        foreach ($collection as $item) {
            /** @var Slider $item */
            $item->delete();
            $delete++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $delete));
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}