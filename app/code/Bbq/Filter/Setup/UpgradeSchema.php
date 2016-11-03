<?php
/**
 * Created by PhpStorm.
 * User: Bingquan Bao
 * Date: 02.11.2016
 * Time: 16:48
 */

namespace Bbq\Filter\Setup;


use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */

    public  function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer =   $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn($installer->getTable('catalog_eav_attribute'),
            'is_filterable_frontend',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Is Filerable Frontend'
        );
        $installer->endSetup();
    }
}