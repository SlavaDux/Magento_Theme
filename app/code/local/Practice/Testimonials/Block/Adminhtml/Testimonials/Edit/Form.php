<?php
class Practice_Testimonials_Block_Adminhtml_Testimonials_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm() {
        $helper = Mage::helper('practicetestimonials');
        $model = Mage::registry('current_testimonials');
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));
        $this->setForm($form);
        $fieldset = $form->addFieldset('testimonials_form', array(
            'legend' => $helper->__('Testimonials Information')
        ));
        $fieldset->addField('author', 'text', array(
            'label' => $helper->__('Author'),
            'required' => true,
            'name' => 'author'
        ));
        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Content'),
            'required' => true,
            'name' => 'content'
        ));
        $form->setUseContainer(true);
        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }
        return parent::_prepareForm();
    }
}