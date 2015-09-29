<?php
class Practice_Testimonials_Block_Testimonials extends Mage_Core_Block_Template {
    public function getTestimonialsCollection() {
        $testimonialsCollection = Mage::getModel('practicetestimonials/testimonials')->getCollection();
        $testimonialsCollection->setOrder('testimonials_id', 'DESC');
        return $testimonialsCollection;
    }
}