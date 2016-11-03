<?php


namespace Bbq\Filter\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements  InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
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