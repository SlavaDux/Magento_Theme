<?php
class Practice_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function saveAction() {
        $author = $this->getRequest()->getPost('author');
        $content = $this->getRequest()->getPost('content');
        if(isset($author)&&($content!='') && isset($content)&&($author!='')) {
            $contact = Mage::getModel('practicetestimonials/testimonials');
            $contact->setData('author', $author);
            $contact->setData('content', $content);
            $contact->save();
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
