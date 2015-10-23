<?php
$installer = $this;
$tableTestimonials = $installer->getTable('practicetestimonials/testimonials');
$installer->startSetup();
$installer->getConnection()->changeColumn($tableTestimonials, 'author', 'customer_id', array(
    'comment'   => 'Testimonials Author',
    'default'   => '0',
    'nullable'  => false,
    'type'      => 'text'
));
$installer->endSetup();
