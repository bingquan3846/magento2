<?php


namespace Bbq\Filter\Controller\Index;


use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }

}