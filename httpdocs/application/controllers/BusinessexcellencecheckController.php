<?php

class BusinessexcellencecheckController extends Zend_Controller_Action {

    protected $_form = null;
    protected $_namespace = 'RegistrationController';
    protected $_session = null;
    protected $_result = 0;
    protected $_antworten_checkbox13 = array('2', '5', '6');
    protected $_antworten_checkbox14 = array('3', '5', '6');
    protected $_antworten_checkbox15 = array('1', '4', '5');

    public function init() {
        $this->view->headTitle()->prepend('BusinessExcellence Check 2011');
    }

    public function indexAction() {

        $form = new Application_Form_Businessexcellencecheck();
        $postData = $this->getRequest()->getPost();

        if (isset($postData['teil2']['auswertung'])) {
            $form->getSubForm('teil3')->getElement('firma')->setRequired(false);
            $form->getSubForm('teil3')->getElement('name')->setRequired(false);
            $form->getSubForm('teil3')->getElement('mail')->setRequired(false);
            $form->getSubForm('teil3')->getElement('confirm')->setRequired(false);
        }
        if (
                $this->getRequest()->isPost() &&
                isset($postData['teil2']['auswertung']) &&
                $form->getSubForm('teil1')->isValid($postData) &
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
                !isset($postData['teil2']['auswertung']) &&
                $form->isValid($postData)
        ) {
            //Formular komplett validiert, alles per E-Mail senden
            try {
                $mail = new Zend_Mail('UTF-8');

                $mail->setFrom('kontakt@steinbeis-be.de', 'Steinbeis-Beratungszentrum Business Excellence');
                $mail->addBcc('manni@zapto.de', 'Steinbeis-Beratungszentrum Business Excellence');
                $mail->addTo($form->getSubForm('teil3')->getElement('mail')->getValue(), $form->getSubForm('teil3')->getElement('name')->getValue());
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
                        } elseif ($formelement instanceof Zend_Form_Element_Text) {
                            $mail_contents['text'][] = array(
                                'frage' => $formelement->getLabel(),
                                'antwort' => $formelement->getValue()
                            );
                        }
                    }
                }
                $mail->setBodyHtml($this->view->partial('businessexcellencecheck/mail.phtml', $mail_contents));
                $mail->send();
                $this->_redirect('/businessexcellencecheck/success');
            } catch (Zend_Mail_Exception $e) {
                echo '<p>Es ist ein Fehler aufgetreten, bitte versuchen Sie es noch einmal. Sollte der Fehler weiterhin bestehen setzen Sie sich bitte mit uns in Verbindung. ( Fehler: ' . $e->getMessage() . ')';
            } catch (Zend_Exception $e) {
                echo '<p>Es ist ein Fehler aufgetreten, bitte versuchen Sie es noch einmal. Sollte der Fehler weiterhin bestehen setzen Sie sich bitte mit uns in Verbindung. ( Fehler: ' . $e->getMessage() . ')';
            }
        } else {

            $this->view->form = $form->render();
        }
    }

    public function teil1Action() {
        
    }

    public function teil2Action() {
        // action body
    }

    public function auswertungAction() {
        //$this->_helper->layout()->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(true);
    }

    public function successAction() {
        // action body
    }

}

