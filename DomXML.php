<?php


class DomXML extends DomDocument
{
    public function __construct($rootTag = 'root')
    {
        parent::__construct('1.0','UTF-8');
        $this->formatOutput = true;
        $this->encoding = 'UTF-8';
        $this->appendChild($this->createElement($rootTag));
    }

    public function add_XML_tag($tagName){
        $newTag = $this->documentElement->appendChild($this->createElement($tagName));
        return $newTag;
    }

    public function add_text_to_XML_tag($tag,$text){
        $tag->appendChild($this->createTextNode($text));
    }

}