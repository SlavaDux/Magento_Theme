<?php
class Practice_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->_setActiveMenu('practicetestimonials');
        $contentBlock = $this->getLayout()->createBlock('practicetestimonials/adminhtml_testimonials');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }
    public function newAction() {
        $this->_forward('edit');
    }
    public function editAction() {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_testimonials', Mage::getModel('practicetestimonials/testimonials')->load($id));
        $this->loadLayout()->_setActiveMenu('practicetestimonials');
        $this->_addContent($this->getLayout()->createBlock('practicetestimonials/adminhtml_testimonials_edit'));
        $this->renderLayout();
    }
    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('practicetestimonials/testimonials');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Testimonials was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'testimonials_id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction() {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('practicetestimonials/testimonials')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Testimonials was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }
    public function massDeleteAction() {
        $testimonials = $this->getRequest()->getParam('testimonials', null);
        if (is_array($testimonials) && sizeof($testimonials) > 0) {
            try {
                foreach ($testimonials as $id) {
                    Mage::getModel('practicetestimonials/testimonials')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d testimonials have been deleted', sizeof($testimonials)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select testimonials'));
        }
        $this->_redirect('*/*');
    }

    public function massStatusAction() {
        $testimonialsId = $this->getRequest()->getParam('testimonials');
        $status     = $this->getRequest()->getParam('status');
        $data = array('status'=>$status);
        try {
            foreach ($testimonialsId as $id) {
                $model = Mage::getModel('practicetestimonials/testimonials')->load($id)->addData($data);
                $model->setId($id)->save();
            }
            $this->_getSession()->addSuccess(
                $this->__('Total of %d testimonial(s) have been updated.', count($testimonialsId))
            );
        }
        catch (Mage_Core_Model_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        } catch (Exception $e) {
            $this->_getSession()
                ->addException($e, $this->__('An error occurred while updating the testimonial(s) status.'));
        }

        $this->_redirect('*/*');
    }
}