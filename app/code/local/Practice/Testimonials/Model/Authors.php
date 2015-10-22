<?php
class Practice_Testimonials_Model_Authors extends Mage_Core_Model_Abstract {
    protected function _construct() {
        parent::_construct();
        $this->_init('practicetestimonials/authors');
    }
    protected function _afterDelete() {
        $testimonialsCollection = Mage::getModel('practicetestimonials/testimonials')->getCollection()
                                ->addFieldToFilter('customer_id', $this->getId());
        foreach($testimonialsCollection as $testimonials){
            $testimonials->setCustomerId(0)->save();
        }
        return parent::_afterDelete();
    }
}