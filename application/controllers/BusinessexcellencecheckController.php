<?php

class BusinessexcellencecheckController extends Zend_Controller_Action {

    protected $_form = null;
    protected $_namespace = 'RegistrationController';
    protected $_session = null;

    public function init() {
        $this->view->headTitle()->prepend('BusinessExcellence Check 2011');
    }

    public function indexAction() {

    }

    public function teil1Action() {
        $form = new Application_Form_Businessexcellencecheck();

        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            
        } else {
            $post = $this->getRequest()->getPost();

            if (isset($post['teil2']['auswertung'])) {
                //echo 'auswertung';
            }
        }
        $this->view->form = $form->render();
        //$this->view->teil2 = $form->getSubForm('teil2')->render();
    }

    public function teil2Action() {
        // action body
    }

    public function auswertungAction() {
        //$this->_helper->layout()->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(true);
    }

    private function getForm() {
        if (null === $this->_form) {
            $this->_form = new Application_Form_Businessexcellencecheck();
        }
        return $this->_form;
    }

    /**
     * Den Session Namespace erhalten den wir verwenden
     *
     * @return Zend_Session_Namespace
     *
     */
    private function getSessionNamespace() {
        if (null === $this->_session) {
            $this->_session =
                    new Zend_Session_Namespace($this->_namespace);
        }

        return $this->_session;
    }

    /**
     * Eine Liste von bereits in der Session gespeicherten Forms erhalten
     *
     * @return array
     *
     */
    private function getStoredForms() {
        $stored = array();
        foreach ($this->getSessionNamespace() as $key => $value) {
            $stored[] = $key;
        }

        return $stored;
    }

    /**
     * Eine Liste aller vorhandenen Subforms erhalten
     *
     * @return array
     *
     */
    private function getPotentialForms() {
        return array_keys($this->getForm()->getSubForms());
    }

    /**
     * Welche Subform wurde übermittelt?
     *
     * @return false|Zend_Form_SubForm
     *
     */
    private function getCurrentSubForm() {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return false;
        }

        foreach ($this->getPotentialForms() as $name) {
            if ($data = $request->getPost($name, false)) {
                if (is_array($data)) {
                    return $this->getForm()->getSubForm($name);
                    break;
                }
            }
        }

        return false;
    }

    /**
     * Die nächste Suboform für die Anzeige erhalten
     *
     * @return Zend_Form_SubForm|false
     *
     */
    private function getNextSubForm() {
        $storedForms = $this->getStoredForms();
        $potentialForms = $this->getPotentialForms();

        foreach ($potentialForms as $name) {
            if (!in_array($name, $storedForms)) {
                return $this->getForm()->getSubForm($name);
            }
        }

        return false;
    }

}

