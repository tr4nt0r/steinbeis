<?php

class BusinessexcellencecheckController extends Zend_Controller_Action {

    protected $_form = null;
    protected $_namespace = 'RegistrationController';
    protected $_session = null;
    protected $_result = 0;
    protected $_antworten_checkbox13 = array('1', '5', '6');
    protected $_antworten_checkbox14 = array('3', '5', '6');
    protected $_antworten_checkbox15 = array('1', '4', '5');

    public function init() {
        $this->view->headTitle()->prepend('BusinessExcellence Check 2011');
    }

    public function indexAction() {

    }

    public function teil1Action() {
        $form = new Application_Form_Businessexcellencecheck();
        $postData = $this->getRequest()->getPost();

        if (
                $this->getRequest()->isPost() &&
                isset($postData['teil2']['auswertung']) &&
                $form->getSubForm('teil1')->isValid($postData) &&
                $form->getSubForm('teil2')->isValid($postData)
        ) {
            $params = $form->getValidValues($postData);

            //Punkte aus Teil1 zusammenzählen
            foreach ($params['teil1'] as $k => $v) {
                switch ($v) {
                    case 2: //30-49%
                        $this->_result += 2;
                        break;
                    case 3: //50-64%
                        $this->_result += 3;
                        break;
                    case 4: //65-79%
                        $this->_result += 5;
                        break;
                    case 5: //80-95%
                        $this->_result += 7;
                        break;
                    case 6: //95-100%
                        $this->_result += 10;
                        break;
                }
            }

            //Punkte aus Teil2 zusammenzählen
            foreach ($params['teil2'] as $k => $v) {
                if (isset($this->{'_antworten_' . $k})) {
                    switch (count(array_intersect($this->{'_antworten_' . $k}, $v))) {
                        case 1:
                            $this->_result += 1;
                            break;
                        case 2:
                            $this->_result += 3;
                            break;
                        case 3:
                            $this->_result += 7;
                            break;
                    }
                }
            }

            $this->view->result = round($this->_result / 1.41);
            $this->view->form = $form->render();
        } elseif (
                $this->getRequest()->isPost() &&
                isset($postData) &&
                $form->isValid($postData)
        ) {
            //Formular komplett validiert, alles per E-Mail senden

            $mail = new Zend_Mail('UTF-8');
            
            $mail->setFrom('manni@zapto.de', 'Steinbeis-Beratungszentrum');
            $mail->addTo('manni@zapto.de', 'Steinbeis-Beratungszentrum');
            $mail->setSubject('BUSINESS EXCELLENCE CHECK');
          
            $mail_contents = array();

            foreach ($form->getSubForms() as $subform) {
                foreach ($subform->getElements() as $formelement) {

                    if ($formelement instanceof Zend_Form_Element_Radio) {
                        $mail_contents['radio'][] = array(
                            'frage' => $formelement->getLabel(),
                            'antwort' => $formelement->getMultiOption($formelement->getValue())
                        );
                    } elseif ($formelement instanceof Zend_Form_Element_MultiCheckbox) {
                        $mail_contents['checkbox'][] = array(
                            'frage' => $formelement->getLabel(),
                            'antwort' => array_intersect_key($formelement->getMultiOptions(), array_flip($formelement->getValue())),
                        );
                    } elseif($formelement instanceof Zend_Form_Element_Text) {
                         $mail_contents['text'][] = array(
                            'frage' => $formelement->getLabel(),
                            'antwort' => $formelement->getValue()
                        );
                    }
                }
            }
            $mail->setBodyHtml($this->view->partial('businessexcellencecheck/mail.phtml',$mail_contents));
            die($this->view->partial('businessexcellencecheck/mail.phtml', $mail_contents));
              //$mail->send();
        } else {

            $this->view->form = $form->render();
        }
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

