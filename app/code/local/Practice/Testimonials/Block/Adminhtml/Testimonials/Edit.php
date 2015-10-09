<?php
class Practice_Testimonials_Block_Adminhtml_Testimonials_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    protected function _construct() {
        $this->_blockGroup = 'practicetestimonials';
        $this->_controller = 'adminhtml_testimonials';
    }
    public function getHeaderText() {
        $helper = Mage::helper('practicetestimonials');
        $model = Mage::registry('current_testimonials');
        if ($model->getId()) {
            return $helper->__("Edit Testimonials item", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Testimonials item");
        }
    }
}