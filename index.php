<?php
require "functions.php";
require "simple_html_dom.php";
require "DomXML.php";
error_reporting(E_ALL);


$domTarget = get_DOM_html("https://www.levestates.com/properties/");
//$arrObjDomTarget = $domTarget->find('#results div.mh-grid');
$body = $domTarget->find('body',0);
$mh_layout = $body->children(4);


//
//$dom = new DomXML();
//
//$bla = $dom->add_XML_tag('bla');
//$dom->add_text_to_XML_tag($bla,'Great American Novel111');
//
//
//
//$str = $dom->saveXML(); // передача строки в test1
//echo '<plaintext>';
//echo $domTarget;
//echo '</plaintext>';
$domTarget->clear(); // подчищаем за собой
unset($domTarget);

debug($mh_layout);

