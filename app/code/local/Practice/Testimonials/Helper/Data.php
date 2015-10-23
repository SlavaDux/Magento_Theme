<?php
class Practice_Testimonials_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getAuthorsList() {
        $authors = Mage::getModel('practicetestimonials/testimonials')->getCollection()->load();
        $output = array();
        foreach($authors as $author){
            $output[$author->getCustomerId()] = $author->getCustomerId();
        }
        return $output;
    }
    public function getAuthorsOptions() {
        $authors = Mage::getModel('practicetestimonials/testimonials')->getCollection()->load();
        $options = array();
        $options[] = array(
            'label' => '',
            'value' => ''
        );
        foreach ($authors as $author) {
            $options[] = array(
                'label' => $author->getCustomerId(),
                'value' => $author->getId(),
            );
        }
        return $options;
    }
}