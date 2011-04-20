<?php

class Application_Form_Businessexcellencecheck extends Zend_Form {

    public function init() {
        $this->setMethod('post')
                ->setName('businessexcellencecheck')
                ->setAction('/businessexcellencecheck');

        $validatorNotEmpty = new Zend_Validate_NotEmpty();
        $validatorNotEmpty->setMessage('Bitte wählen Sie eine Antwort', Zend_Validate_NotEmpty::IS_EMPTY);

        $multi1 = new Zend_Form_Element_Radio('radio1');
        $multi1->setLabel('Die branchenweit herausfordernden Ziele der Geschäftskennzahlen (z.B. Marktanteil, ROCE, EBIT) des Unternehmens wurden im abgelaufenen Geschäftsjahr erreicht oder übertroffen.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi2 = new Zend_Form_Element_Radio('radio2');
        $multi2->setLabel('Die Ziele der Prozess- (z.B. Rücklaufquote, Produktivitäten) und Personalkennzahlen (z.B. Weiterbildungsstunden pro Mitarbeiter, Krankenstand) wurden im abgelaufenen Geschäftsjahr erreicht oder übertroffen.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired(true)
                ->addValidator($validatorNotEmpty, true);


        $multi3 = new Zend_Form_Element_Radio('radio3');
        $multi3->setLabel('Die Geschäfts- und Prozesskennzahlen werden mit den wichtigsten Wettbewerbern oder dem Branchendurchschnitt verglichen, reflektiert und entsprechende Ziele und Maßnahmen abgeleitet.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi4 = new Zend_Form_Element_Radio('radio4');
        $multi4->setLabel('Die Geschäfts-, Prozess- und Personalkennzahlen werden regelmäßig (z.B. monatlich) erhoben und jährlich ausgewertet und zur Ziel- und Strategiebildung verwendet.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);


        $multi5 = new Zend_Form_Element_Radio('radio5');
        $multi5->setLabel('Wie genau können die real anfallenden Kosten der verschiedenen Abteilungen (z.B. Werbe-, Entwicklungs-, Buchhaltungs-, Produktionskosten, Management, Büromaterial, Energie) pro verkaufter Einheit berechnet werden?')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi6 = new Zend_Form_Element_Radio('radio6');
        $multi6->setLabel('Die Kundenzufriedenheit wird auf verschiedene Weise (Fragebögen, Interviews, Rückmeldungen etc.) regelmäßig (z.B. monatlich) erfasst, aufgezeichnet und objektiv (externe Stelle) zur Ableitung von Maßnahmen ausgewertet.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);


        $multi7 = new Zend_Form_Element_Radio('radio7');
        $multi7->setLabel('Die verschiedenen Aspekte der Mitarbeiterzufriedenheit (Betriebsklima, Arbeitsbedingungen, Entlohnung etc.) werden regelmäßig (z.B. jährlich) durch externe Stellen schriftlich erfasst und zur Ableitung von Maßnahmen analysiert.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);


        $multi8 = new Zend_Form_Element_Radio('radio8');
        $multi8->setLabel('Wie weit werden die Produktivitäten (z.B. Stückzahl pro Mitarbeiter) der einzelnen Abteilungen regelmäßig (z.B. monatlich) gemessen, verglichen und zur Ableitung von Maßnahmen (z.B. Fortbildung, Prozessverbesserung) herangezogen?')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi9 = new Zend_Form_Element_Radio('radio9');
        $multi9->setLabel('Die jährlich angepasste Vision wird jedem Mitarbeiter kommuniziert. Die Mitarbeiter orientieren sich und ihre Arbeit daran und die Führungskräfte leben die kommunizierten Unternehmenswerte täglich in der Praxis vor.')
                ->addMultiOption(1)->addMultiOption(2)->addMultiOption(3)->addMultiOption(4)->addMultiOption(5)->addMultiOption(6)
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi10 = new Zend_Form_Element_Radio('radio10');
        $multi10->setLabel('Für jeden Mitarbeiter werden jährlich in einem persönlichen Gespräch seine persönlichen Firmenziele festgelegt. Diese passen genau zu den Abteilungszielen und unterstützen mit diesen die Gesamtziele des Unternehmens.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi11 = new Zend_Form_Element_Radio('radio11');
        $multi11->setLabel('Im Rahmen der Personalplanung, die sich an der kurz- bis mittelfristigen Strategie orientiert, wird in einem jährlichen Gespräch ein individuell auf die Qualifi kationen, Kenntnisse und Anforderungen des Mitarbeiters abgestimmter Plan zur Weiterbildung erstellt.')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);

        $multi12 = new Zend_Form_Element_Radio('radio12');
        $multi12->setLabel('Wie weit wird das Angebot von Produkten und Dienstleistungen regelmäßig (z.B. halbjährlich) unter Beteiligung von Kunden, Mitarbeitern und Lieferanten überprüft und angepasst?')
                ->addMultiOption(1, '0-29%')->addMultiOption(2, '30-49%')->addMultiOption(3, '50-64%')->addMultiOption(4, '65-79%')->addMultiOption(5, '80-95%')->addMultiOption(6, '96-100%')
                ->setSeparator("\n")
                ->setRequired()
                ->addValidator($validatorNotEmpty, true);


        $check1 = new Zend_Form_Element_MultiCheckbox('checkbox13');
        $check1->setLabel('Wie erfolgt in Ihrem Unternehmen die Entwicklung und Anpassung der Unternehmensstrategie?')
                ->addMultiOption(1, 'Unsere erfahrene Führungsmannschaft lebt unsere Strategie. Sie muss nicht explizit ausgedrückt oder umformuliert werden.')
                ->addMultiOption(2, 'Unser Know-how und unsere Partnerschaften mit Lieferanten fließen in unsere Strategie ein.')
                ->addMultiOption(3, 'Unsere Strategie hat sich über Jahre bewährt und muss nicht ständig angepasst werden.')
                ->addMultiOption(4, 'Unsere Strategie leitet sich ausschließlich von unseren Kernkompetenzen ab.')
                ->addMultiOption(5, 'Wir überprüfen unsere Strategie jährlich und machen viertel- bis halbjährlich ein kurzes Review.')
                ->addMultiOption(6, 'Politische und gesellschaftliche Änderungen sind Basis für unsere Strategie.')
                ->setRequired()
                ->addValidator(new Manni_Validate_CheckboxChecked(array('checkboxgroup' => 'checkbox13', 'max' => 3)));


        $check2 = new Zend_Form_Element_MultiCheckbox('checkbox14');
        $check2->setLabel('Wie werden bei Ihnen betriebliche Veränderungen wie beispielsweise die Umorganisation einer Abteilung oder eine Umstellung der Kundenkommunikation durchgeführt?')
                ->addMultiOption(1, 'Durch das Vertrauen der Mitarbeiter in unsere Führung können Veränderungen schnell umgesetzt werden, ohne dass sie langen Erklärungen bedürfen.')
                ->addMultiOption(2, 'Aufgrund der Erfahrung und des Wissens unserer Mitarbeiter müssen sie nicht explizit auf Veränderungen vorbereitet werden.')
                ->addMultiOption(3, 'Veränderungen werden intensiv an die Belegschaft kommuniziert. Auftretende Fragen werden ausgiebig beantwortet.')
                ->addMultiOption(4, 'Größere Änderungen sind bei uns nicht nötig, da unser Geschäftsmodell seit Jahren auf einer soliden Basis steht.')
                ->addMultiOption(5, 'Die Mitarbeiter werden auf die Veränderungen durch Maßnahmen wie Schulung oder Workshops vorbereitet.')
                ->addMultiOption(6, 'Interne und externe Treiber für die Veränderung unserer Organisation werden ständig erfasst und bewertet.')
                ->setRequired()
                ->addValidator(new Manni_Validate_CheckboxChecked(array('checkboxgroup' => 'checkbox14', 'max' => 3)));

        $check3 = new Zend_Form_Element_MultiCheckbox('checkbox15');
        $check3->setLabel('Was geschieht in Ihrem Unternehmen, um den Prozess der Produkt- und Dienstleistungsentstehung zur Sicherung der Qualität zu gestalten?')
                ->addMultiOption(1, 'Unsere Schlüsselprozesse haben jeweils ausgewiesene Prozesseigner, die sich um die Sicherstellung der Prozessqualität kümmern.')
                ->addMultiOption(2, 'Unsere bewährten Prozesse sind allen Mitarbeitern seit Jahren unverändert vertraut. Unsere Qualitätsabteilung sorgt für die entsprechende Qualität.')
                ->addMultiOption(3, 'Unsere erfahrenen Mitarbeiter wissen selbst am besten worauf es ankommt. Ein Regelwerk für Standards ist für das Tagesgeschäft nicht notwendig.')
                ->addMultiOption(4, 'Unsere Prozesse werden durch unsere Mitarbeiter anhand eines umfassenden Kennzahlensystems kontrolliert und analysiert.')
                ->addMultiOption(5, 'Unsere Mitarbeiter erarbeiten kontinuierlich kreative Prozessverbesserungen. Frischer Wind soll die Qualität vorwärts bringen.')
                ->addMultiOption(6, 'Unser starkes Führungsteam kennt die Prozesse genau. Unsere Mitarbeiter können sich dadurch voll auf ihre Arbeit konzentrieren und müssen nicht erst die Prozesse in Ordnung bringen.')
                ->addValidator(new Manni_Validate_CheckboxChecked(array('checkboxgroup' => 'checkbox15', 'max' => 3)))
                ->setRequired();




        $auswertung = new Zend_Form_Element_Submit('auswertung');
        $auswertung->setLabel('Auswertung');


        $firma = new Zend_Form_Element_Text('firma');
        $firma->setLabel('Name des Unternehmens')
                ->setRequired();

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Ihr Name')
                ->setRequired();

        $mail = new Zend_Form_Element_Text('mail');
        $mail->setLabel('Ihre E-Mail Adresse')
                ->setRequired()
                ->addValidator(new Zend_Validate_EmailAddress());

        $confirmation = new Zend_Form_Element_Checkbox('confirm');
        $confirmation->setLabel('JA, bitte werten Sie meine Antworten individuell aus und nehmen Sie unverbindlich Kontakt zu mir auf.')
                ->setUncheckedValue('')
                ->setRequired()
                ->setErrorMessages(array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'Bitte bestätigen Sie dieses Feld'
                ));
        $senden = new Zend_Form_Element_Submit('senden');
        $senden->setLabel('Senden');

        $teil1 = new Zend_Form_SubForm();
        $teil1->addElements(array(
            $multi1,
            $multi2,
            $multi3,
            $multi4,
            $multi5,
            $multi6,
            $multi7,
            $multi8,
            $multi9,
            $multi10,
            $multi11,
            $multi12,
        ));

        $teil2 = new Zend_Form_SubForm();
        $teil2->addElements(array(
            $check1,
            $check2,
            $check3,
            $auswertung
        ));


        $teil3 = new Zend_Form_SubForm();
        $teil3->addElements(array(
            $firma,
            $name,
            $mail,
            $confirmation,
            $senden
        ));

        $this->addSubForms(array(
            'teil1' => $teil1,
            'teil2' => $teil2,
            'teil3' => $teil3
        ));



        $teil1->setElementDecorators(array(
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formElementMultiselect.phtml'
            ))));

        $teil1->setDecorators(array(
            new Zend_Form_Decorator_FormElements (),
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formHeaderTeil1.phtml',
                'placement' => 'prepend'
            ))
        ));

        $teil2->setElementDecorators(array(
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formElementMulticheckbox.phtml'
            ))
        ));


        $teil2->setDecorators(array(
            new Zend_Form_Decorator_FormElements (),
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formHeaderTeil2.phtml',
                'placement' => 'prepend'
            ))
        ));


//        $teil3->setElementDecorators(array(
//            new Zend_Form_Decorator_Errors(),
//            new Zend_Form_Decorator_ViewHelper(),
//            new Zend_Form_Decorator_Label(array('class' => 'be-label')),
//            new Zend_Form_Decorator_HtmlTag(array('tag' => 'div'))
//        ));

        $teil3->setElementDecorators(array(
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formElementDefault.phtml'
            ))
        ));


        $teil3->setDecorators(array(
            new Zend_Form_Decorator_FormElements (),
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formHeaderTeil3.phtml',
                'placement' => 'prepend'
            )),            
        ));



        $auswertung->setDecorators(array(
            new Zend_Form_Decorator_ViewHelper(),
            new Zend_Form_Decorator_HtmlTag(array('tag' => 'div', 'class' => 'be-button')),
        ));

        $confirmation->setDecorators(array(            
            new Zend_Form_Decorator_ViewHelper(),            
            new Zend_Form_Decorator_Label(array('class' => 'be-label')),
            new Zend_Form_Decorator_HtmlTag(array('tag' => 'div')),
            new Zend_Form_Decorator_Errors(),
            
        ));

        $senden->setDecorators(array(
            new Zend_Form_Decorator_ViewHelper(),
            new Zend_Form_Decorator_HtmlTag(array('tag' => 'div', 'class' => 'be-button')),
        ));

        $this->addDecorators(array(
            new Zend_Form_Decorator_ViewScript(array(
                'viewScript' => 'businessexcellencecheck/_formError.phtml',
                'placement' => 'prepend'
            )),
            new Zend_Form_Decorator_FormElements(),
            new Zend_Form_Decorator_Form()
        ));
    }

}

