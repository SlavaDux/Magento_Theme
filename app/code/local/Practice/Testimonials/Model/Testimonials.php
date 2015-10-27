<?php
class Practice_Testimonials_Model_Testimonials extends Mage_Core_Model_Abstract {
    protected function _construct() {
        $this->_init('practicetestimonials/testimonials');
    }
    public function getOptionArray() {
        $optionArray = array(
            1 => Mage::helper('practicetestimonials')->__('Enabled'),
            0 => Mage::helper('practicetestimonials')->__('Disabled')
        );
        return $optionArray;
    }
}