<?php
class Practice_Testimonials_Model_Resource_Testimonials extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct() {
        $this->_init('practicetestimonials/testimonials', 'testimonials_id');
    }
}