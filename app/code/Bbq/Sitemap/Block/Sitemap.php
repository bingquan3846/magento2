<?php

namespace Bbq\Sitemap\Block;



use Magento\Catalog\Helper\Category;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class Sitemap extends Template
{
    protected $_categoryHelper;

    public function __construct(Template\Context $context,Category $categoryHelper,  array $data)
    {
        $this->_categoryHelper = $categoryHelper;
        parent::__construct($context, $data);
    }

    public function getCategories()
    {
        return $this->_categoryHelper->getStoreCategories();
    }

    public function _prepareLayout()
    {
        // add Home breadcrumb
        if ($breadcrumbs = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbs->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            )->addCrumb(
                'sitemap',
                ['label' => __('Sitemap')]
            );
        }
        return parent::_prepareLayout();
    }

}