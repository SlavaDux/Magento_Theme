<?php
class Practice_Testimonials_Block_Adminhtml_Testimonials_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    public function __construct() {
        parent::__construct();
        $this->setId('practice_testimonials_grid');
        $this->setDefaultSort('testimonials_id');
        $this->setDefaultDir('DESC');
    }
    protected function _prepareCollection() {
        $collection = Mage::getModel('practicetestimonials/testimonials')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns() {
        $helper = Mage::helper('practicetestimonials');
        $this->addColumn('testimonials_id', array(
            'header' => $helper->__('Id'),
            'index' => 'testimonials_id',
            'width' => '60px',
        ));
        $this->addColumn('content', array(
            'header' => $helper->__('Content'),
            'index' => 'content',
            'type' => 'text'
        ));
        $this->addColumn('author', array(
            'header' => $helper->__('Author'),
            'index' => 'customer_id',
            'type'  => 'options',
            'options' => $helper->getAuthorsList(),
            'width' => '150px'
        ));
        $this->addColumn('status', array(
            'header' => $helper->__('status'),
            'index' => 'status',
            'type'  => 'options',
            'width' => '150',
            'options' => array(
                1 => $helper->__('Enabled'),
                0 => $helper->__('Disabled')
            )
        ));
        return parent::_prepareColumns();
    }
    protected function _prepareMassaction() {
        $this->setMassactionIdField('testimonials_id');
        $this->getMassactionBlock()->setFormFieldName('testimonials');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('practicetestimonials')->__('Are you sure?')
        ));

        $statuses = Mage::getModel('practicetestimonials/testimonials')->getOptionArray();
        $this->getMassactionBlock()->addItem('status', array(
            'label'=> $this->__('Change status'),
            'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('practicetestimonials')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }

    public function getRowUrl($model) {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }
}