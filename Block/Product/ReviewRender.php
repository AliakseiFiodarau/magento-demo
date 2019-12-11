<?php

namespace Fiodarau\Demo\Block\Product;

class ReviewRender extends \Magento\Review\Block\Product\Review
{
    protected $config;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $collectionFactory,
        \Fiodarau\Demo\Model\Config $config,
        array $data = []
    ) {
        parent::__construct($context, $registry, $collectionFactory, $data);
        $this->config = $config;
    }

    public function setPageTitleWithReviewsCount()
    {
        if ($this->config->isDisplayReviewCount()) {
            /** @var \Magento\Theme\Block\Html\Title $parentBlock */
            $parentBlock = $this->getParentBlock();
            $newTitle = $parentBlock->getPageTitle() . ' ' . $this->getCollectionSize();
            $parentBlock->setPageTitle($newTitle);
        }
    }
}
