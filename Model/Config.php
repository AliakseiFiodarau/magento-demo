<?php

namespace Fiodarau\Demo\Model;

class Config
{

    const XML_PATH_CATEGORY_FILTER = 'fiodarau_demo/category/filter';

    const XML_PATH_DISPLAY_REVIEW_COUNT = 'fiodarau_demo/product/review_count';

    protected $scopeConfig;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getCategoryFilter()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CATEGORY_FILTER);
    }

    public function isDisplayReviewCount()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_DISPLAY_REVIEW_COUNT);
    }
}
