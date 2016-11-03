<?php
/**
 * Created by PhpStorm.
 * User: Bingquan Bao
 * Date: 03.11.2016
 * Time: 15:29
 */

namespace Bbq\Filter\Controller\Ajax;


use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Result extends Action
{
    protected  $_productFactory;

    public  function __construct(Context $context, ProductFactory $productFactory)
    {
        $this->_productFactory = $productFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        $collection = $this->_productFactory->create()->getCollection()
                        ->addAttributeToSelect('name')
                        ->addAttributeToSelect('price')
                        ->addAttributeToSelect('color')
                        ->addAttributeToSelect('size')
        ;

        $products = $collection->load()->getItems();
        $data = [];

        if (!empty($products)){
            foreach ($products as $product){
                /** @var $product \Magento\Catalog\Model\Product\Interceptor*/
                $data[] = [
                    'id' => $product->getId(),
                    'price' => $product->getPrice(),
                    'name'  => $product->getName(),
                ];
            }
        }

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($data);
        return $resultJson;
    }

}