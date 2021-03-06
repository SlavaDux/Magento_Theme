<?php
class Practice_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();

        $head = $this->getLayout()->getBlock('head');
        $head->setTitle($this->getTitle());
        $head->setDescription($this->getDescription());
        $head->setKeywords($this->getKeywords());

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
                Mage::getSingleton('core/session')->addSuccess('Your testimonial will be added after checking the site administrator');
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
    public function getTitle() {
        return Mage::getStoreConfig('practicetestimonials/practicetestimonials/practicetestimonials_title');
    }
    public function getDescription() {
        if (empty($this->_data['description'])) {
            $this->_data['description'] = Mage::getStoreConfig('practicetestimonials/practicetestimonials/practicetestimonials_description');
        }
        return $this->_data['description'];
    }
    public function getKeywords() {
        if (empty($this->_data['keywords'])) {
            $this->_data['keywords'] = Mage::getStoreConfig('practicetestimonials/practicetestimonials/practicetestimonials_keywords');
        }
        return $this->_data['keywords'];
    }
}
