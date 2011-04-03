<?php


set_include_path('../library' . PATH_SEPARATOR . get_include_path());

include '../library/Zend/Loader.php';
include '../library/Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('My_');

require ('../library/My/forms/Businessexcellencecheck.php');


$form = new Application_Form_Businessexcellencecheck;

$view = new Zend_View();

echo $form->render($view);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>:: Steinbeis :: BUSINESS EXCELLENCE ::</title>
        <meta name="author" content="" />
        <meta name="date" content="2011-01-11" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="content-language" content="com,de,at,ch" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="imagetoolbar" content="false" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="revisit-after" content="1 days" />
        <meta name="robots" content="index,follow" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Steinbeis Beratungszentrum, Business Excellence, Unternehmensberatung" />
        <meta name="keywords" content="Steinbeis Beratungszentrum, Business Excellence, Unternehmensberatung, Organisationsberatung, Innovationsmanagement, Personalberatung" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            $(function() {
               
            });
            // ]]>
        </script>
    </head>
    <body>
        <div id="containerBE_Check">
            <div id="headerGrey">
                <div id="headerGreyLogo"><img src="../pics/stw_logo_header1.png" alt="stw " width="190" height="25" /></div>
                <div id="headerGreySuche"></div>
            </div>
            <div id="headerContent"></div>
            <div id="navigation">
                <div id="main_menu">
                    <ul id="nav">
                        <li class="active"><a href="warum_beratung.html" onfocus="blurLink(this);">Warum Beratung?</a>
                            <ul class="menu2">
                                <li><a href="wer_braucht_beratung.html" onfocus="blurLink(this);">Wer braucht Beratung</a></li>
                                <li><a href="BE_Quick_Check.html" onfocus="blurLink(this);">BE Quick Check</a></li>
                            </ul>
                        </li>
                        <li><a href="wir_ueber_uns.html" onfocus="blurLink(this);">Wir über uns</a>
                            <ul class="menu2">
                                <li><a href="philosophie.html" onfocus="blurLink(this);">Philosophie</a></li>
                                <li><a href="team.html" onfocus="blurLink(this);">Team</a></li>
                                <li><a href="steinbeis.html" onfocus="blurLink(this);">Steinbeis</a></li>
                            </ul>
                        </li>
                        <li><a href="business.html" onfocus="blurLink(this);">Business</a>
                            <ul class="menu2">
                                <li><a href="strategie.html" onfocus="blurLink(this);">Strategie</a></li>
                                <li><a href="prozessmanagement.html" onfocus="blurLink(this);">Prozess-<br />management</a></li>
                                <li><a href="marketingmanagement.html" onfocus="blurLink(this);">Marketing-<br />management</a></li>
                            </ul>
                        </li>
                        <li><a href="innovation.html" onfocus="blurLink(this);">Innovation</a>
                            <ul class="menu2">
                                <li><a href="diversifikation.html" onfocus="blurLink(this);">Diversifikation</a></li>
                                <li><a href="produkt-marktentwicklung.html" onfocus="blurLink(this);">Produkt- und<br />Marktentwicklung</a></li>
                                <li><a href="changemanagement.html" onfocus="blurLink(this);">Change<br />Management</a></li>
                            </ul>
                        </li>
                        <li><a href="personal.html" onfocus="blurLink(this);">Personal</a>
                            <ul class="menu2">
                                <li><a href="recruiting.html" onfocus="blurLink(this);">Recruiting</a></li>
                                <li><a href="personalentwicklung.html" onfocus="blurLink(this);">Personal-<br />entwicklung</a></li>
                                <li><a href="organisationsentwicklung.html" onfocus="blurLink(this);">Organisations-<br />entwicklung</a></li>
                                <li><a href="mitarbeiterbindung.html" onfocus="blurLink(this);">Mitarbeiter-<br />bindung</a></li>
                            </ul>
                        </li>
                        <li><a href="../kontakt.html" onfocus="blurLink(this);">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            <div id="contentBereich">
                <div id="breadcrumb">
                    <ul id="breadcrumbListe">
                        <li><a href="../index_.html">Startseite </a></li>&raquo;
                        <li><a href="warum_beratung.html">Warum Beratung? </a></li>
                        &raquo;
                        <li>BE Quick Check </li>
                    </ul>
                </div>
                <div id="contentText">
                    <div id="contentWrapper">
                        <div id="contentLeft_OhneInfobox">
                            <div id="contentTextSpalteLinks_OhneInfobox">
                                <h3>Der BusinessExcellence Check 2011</h3>
                            </div>
                        </div>
                        <div id="contentRight_OhneInfobox">
                            <div id="contentTextSpalteRechts_OhneInfobox"></div>
                        </div>
                    </div>
                    <p class="clearFloat"></p>
                    <div id="contentWrapper">
                        <!-- Beitrag beginnt hier -->
                        <div id="contentLeft">

                            hallo

                            <p class="clearFloat"></p>
                            <!-- Beitrag endet hier -->
                        </div>
                        <div id="contentRight">
                            <div id="contentInfobox">
                                <h1>Ansprechpartner</h1>
                                <hr style="background-color:#CCCCCC; margin-top:10px; margin-bottom:10px;" />
                                <h3>Dr. G&uuml;nther Sch&ouml;ffner</h3>
                                <h3>Lerchenstraße 20</h3>
                                <h3>72336 Balingen</h3>
                                <br />
                                <h1><a href="mailto:kontakt@steinbeis-be.de">kontakt@steinbeis-be.de</a></h1>
                            </div>
                        </div>
                    </div>
                    <p class="clearFloat"></p>
                </div>
                <br />
                <br />
                <div id="contentFooter"></div>
                <div id="metaNavigation"><a href="impressum.html">Impressum</a></div>
            </div>
        </div>
        <br />
        <br />
    </body>
</html>
