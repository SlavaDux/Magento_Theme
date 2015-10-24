<?php
class Practice_Testimonials_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getAuthorsList() {
        $customers = Mage::getModel('customer/customer')->getCollection()
                        ->addAttributeToSelect('firstname')
                        ->addAttributeToSelect('lastname');
        $output = array();
        foreach($customers as $customer){
            $customerData = $customer->getData();
            $name = $customerData['firstname'] . " " . $customerData['lastname'];
            $output[$customer->getEntityId()] = $name;
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
            $customerData = $customer->getData();
            $name = $customerData['firstname'] . " " . $customerData['lastname'];
            $options[] = array(
                'label' => $name,
                'value' => $customerData['entity_id']
            );
        }
        return $options;
    }
}