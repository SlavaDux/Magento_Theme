<?php
class Practice_Testimonials_Block_Adminhtml_Testimonials extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function _toHtml() {
        return '<h1>News Module: Admin section</h1>';
    }
    public function __construct() {
        $helper = Mage::helper('practicetestimonials');
        $this->_blockGroup = 'practicetestimonials';
        $this->_controller = 'adminhtml_testimonials';
        $this->_headerText = $helper->__('Testimonials Management');
        parent::__construct();
        $this->_addButtonLabel = $helper->__('Add Testimonials');

    }
}