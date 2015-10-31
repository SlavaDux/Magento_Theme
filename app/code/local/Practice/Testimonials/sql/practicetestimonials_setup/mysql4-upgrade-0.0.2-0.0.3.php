<?php
$installer = $this;
$tableTestimonials = $installer->getTable('practicetestimonials/testimonials');
$installer->startSetup();
$installer->getConnection()
    ->modifyColumn($tableTestimonials, 'customer_id', array(
        'comment'   => 'Testimonials Author',
        'unsigned'  => true,
        'nullable'  => false,
        'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER
    ))
    ->addColumn($tableTestimonials, 'status', array(
        'comment'   => 'Status',
        'default'   => '0',
        'nullable'  => false,
        'type'      => Varien_Db_Ddl_Table::TYPE_BOOLEAN
    ));
$installer->getConnection()
    ->addConstraint(
        'testimonials_fk',
        $installer->getTable('practicetestimonials/testimonials'),
        'customer_id',
        $installer->getTable('customer/entity'),
        'entity_id',
        'cascade',
        'cascade'
    );
$installer->endSetup();
