<?php

namespace Bbq\Filter\Block;


use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Framework\View\Element\Template;

class Product extends Template
{
    protected  $_attributeCollectionFactory;

    protected $_params ;

    public function __construct(Template\Context $context,  \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $collectionFactory, array $data)
    {
        $this->_attributeCollectionFactory = $collectionFactory;

        $this->_params = $context->getRequest()->getParams();
        parent::__construct($context, $data);

    }

    public function getAllAttributes()
    {
        $collection = $this->_attributeCollectionFactory->create()->addFieldToFilter(
            'is_filterable_frontend',
            ['eq' => 1]
        );
        $result = [];
        foreach ($collection->getItems() as $attribute){
            /** @var $attribute Attribute */
            $result[] = [
                'id' => $attribute->getId(),
                'label' => $attribute->getFrontendLabel(),
                'code'  => $attribute->getAttributeCode(),
                'options' => $attribute->getOptions(),
            ];
        }

        return $result;
    }


    public function isSelected($code, $value){
        if (isset($this->_params[$code]) && $this->_params[$code] == $value) {
            return true;
        }else{
            return false;
        }
    }

    public function getProducts(){

    }


}