<?php
/**
 * Created by PhpStorm.
 * User: Bingquan Bao
 * Date: 02.11.2016
 * Time: 16:00
 */

namespace Bbq\Filter\Observer;

use Magento\Framework\Data\Form;
use Magento\Framework\Event\ObserverInterface;
use Magento\Config\Model\Config\Source\Yesno;

class AddFilterField implements ObserverInterface
{

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $form = $observer->getEvent()->getData('form');
        $fieldset = $form->addFieldset(
            'filter_fieldset',
            ['legend' => __('Filter Properties'), 'collapsable' => false]
        );

        $yesNo = new Yesno();
        $fieldset->addField(
            'is_filterable_frontend',
            'select',
            [
                'name'     => 'is_filterable_frontend',
                'label'    => __('Use in Filter Frontend'),
                'title'    => __('Use in Filter Frontend'),
                'values'   => $yesNo->toOptionArray(),
            ]
        );
    }


}