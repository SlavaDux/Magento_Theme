<?php
class Practice_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function testAction() {
        $params = $this->getRequest()->getParams();
        $testimonials = Mage::getModel('practicetestimonials/testimonials');
        echo("Loading the testimonials with an ID of ".$params['id']);
        $testimonials->load($params['id']);
        $data = $testimonials->getData();
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}
