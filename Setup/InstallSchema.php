<?php namespace Sparsh\ReferrerUrlTracking\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param  SchemaSetupInterface   $setup
     * @param  ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        //Add new column in 'sales_order_grid' table
        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            'referrer_url',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'nullable' => true,
                'default' =>  null,
                'comment' =>'Referrer URL'
            ]
        );

        //Create new table 'sparsh_referrer_url_report'
        $table = $installer->getConnection()
            ->newTable($installer->getTable('sparsh_referrer_url_report'))
            ->addColumn('domain_id', Table::TYPE_SMALLINT, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'Domain ID')
            ->addColumn('domain_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Domain Name')
            ->addColumn('order_count', Table::TYPE_INTEGER, null, ['nullable' => true], 'Order Count')
            ->addColumn('customer_count', Table::TYPE_INTEGER, null, ['nullable' => true], 'Customer Count')
            ->addColumn('created_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT], 'Created At')
            ->addColumn('updated_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE], 'Updated At')
            ->setComment('Sparsh Referrer URL Report');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
