<?php
class Practice_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->_setActiveMenu('practicetestimonials');
        $contentBlock = $this->getLayout()->createBlock('practicetestimonials/adminhtml_testimonials');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }
    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('practicetestimonials/adminhtml_testimonials_grid')->toHtml()
        );
    }
}