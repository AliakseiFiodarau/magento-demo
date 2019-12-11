<?php

namespace Fiodarau\Demo\Block\Adminhtml\Category;

class Listing
{
    protected $categoryCollectionFactory;

    protected $config;

    public function __construct(
        \Fiodarau\Demo\Model\ResoourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Backend\Block\Template\Context $context,
        \Fiodarau\Demo\Model\Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->config = $config;
    }

    public function getFilteredCategories()
    {
        $categoryFilter = $this->config->getCategoryFilter();
        $categoryCollection = $this->categoryCollectionFactory
            ->create()
            ->addAttributeToFilterCaseSensitive('name', ['like' => '%' . $categoryFilter . '%'])
            ->addAttributeToSelect('name');
        $categories = $categoryCollection->getItems();
        return $categories;
    }
}
