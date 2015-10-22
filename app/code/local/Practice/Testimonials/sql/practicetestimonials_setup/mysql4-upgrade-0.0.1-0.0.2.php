<?php
$installer = $this;
$tableAuthors = $installer->getTable('practicetestimonials/authors');
$tableTestimonials = $installer->getTable('practicetestimonials/testimonials');
$installer->startSetup();
$installer->getConnection()->dropTable($tableAuthors);
$table = $installer->getConnection()
    ->newTable($tableAuthors)
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);
$installer->getConnection()->addColumn($tableTestimonials, 'customer_id', array(
    'comment'   => 'Testimonials Author',
    'default'   => '0',
    'nullable'  => false,
    'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
));
$installer->endSetup();




