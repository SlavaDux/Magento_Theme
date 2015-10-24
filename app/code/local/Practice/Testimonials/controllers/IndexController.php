<?php
class Practice_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function saveAction() {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $author = $customerData->getId();
            $content = $this->getRequest()->getPost('content');
            if(isset($author)&&($content!='') && isset($content)&&($author!='')) {
                $contact = Mage::getModel('practicetestimonials/testimonials');
                $contact->setData('customer_id', $author);
                $contact->setData('content', $content);
                $contact->save();
                Mage::getSingleton('core/session')->addSuccess('Your testimonial was successfully added');
            }
            else {
                Mage::getSingleton('core/session')->addError('You have not filled all the fields in the form, fill it and try again');
            }
        }
        $this->_redirect('testimonials/index/index');
    }
    protected function _prepareLayout() {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('practicetestimonials/html_testimonials', 'testimonials-content');
        $pager->setAvailableLimit(array(15=>15));
        $pager->setCollection($this->getResourceModel('practicetestimonials/testimonials/collection'));
        $this->setChild('pager', $pager);
        return $this;
    }
    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }
}
