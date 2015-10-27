<?php
class Practice_Testimonials_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getAuthorsList() {
        $customers = Mage::getModel('customer/customer')->getCollection()
                        ->addAttributeToSelect('firstname')
                        ->addAttributeToSelect('lastname');
        $output = array();
        foreach($customers as $customer){
            $name = $customer->getName();
            $output[$customer->getId()] = $name;
        }
        return $output;
    }
    public function getAuthorsOptions() {
        $customers = mage::getModel('customer/customer')->getCollection()
                                ->addAttributeToSelect('firstname')
                                ->addAttributeToSelect('lastname');
        $options = array();
        $options[] = array(
            'label' => '',
            'value' => ''
        );
        foreach ($customers as $customer) {
            $name = $customer->getName();
            $options[] = array(
                'label' => $name,
                'value' => $customer->getId()
            );
        }
        return $options;
    }
}