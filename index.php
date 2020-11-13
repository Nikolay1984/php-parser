<?php
require "simple_html_dom.php";
require "functions.php";


$res = get_DOM_html("https://www.levestates.com/properties/");
$p = $res->find("span",0);
var_dump($p->plaintext);
var_dump($p->plaintext);
