<?php
class Practice_Testimonials_Model_Testimonials extends Mage_Core_Model_Abstract {
    protected function _construct() {
        $this->_init('practicetestimonials/testimonials');
    }
    public function getOptionArray() {
        $optionArray = array();
        foreach($this->getCollection() as $option){
            $optionArray[$option->getAuthor()] = $option->getAuthor();
        }
        return $optionArray;
    }
}