<?php

namespace Fiodararau\Demo\Controller\Adminhtml\Category;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Fiodarau_Demo::categories';

    protected $resultPageFactory;

    protected $config;

    public function __construct(
        Context $context,
        \Fiodarau\Demo\Model\Config $config,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->config = $config;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Fiodarau_Demo::test_categories');
        $resultPage->getConfig()->getTitle()->prepend(
            __('Categories, containing "%1" in name', $this->config->getCategoryFilter())
        );
        return $resultPage;
    }
}
