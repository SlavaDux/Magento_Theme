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
            'index' => 'testimonials_id'
        ));
        $this->addColumn('author', array(
            'header' => $helper->__('Author'),
            'index' => 'author',
            'type' => 'text',
        ));
        $this->addColumn('content', array(
            'header' => $helper->__('Content'),
            'index' => 'content',
            'type' => 'text',
        ));
        return parent::_prepareColumns();
    }
    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}