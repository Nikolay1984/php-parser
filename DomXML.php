<?php


class DomXML extends DomDocument
{
    public function __construct($rootTag = 'root')
    {
        parent::__construct('1.0','UTF-8');
        $this->formatOutput = true;
        $this->encoding = 'UTF-8';
        $this->root = $this->appendChild($this->createElement($rootTag));
        $this->objects = $this->root->appendChild($this->createElement('objects'));
        $this->number = 0;
    }

    public function add_XML_tag($targetTag,$tagName){
        $newTag = $targetTag->appendChild($this->createElement($tagName));
        return $newTag;
    }

    public function add_text_to_XML_tag($tag,$text){
        $tag->appendChild($this->createTextNode($text));
    }

    public function parsJson($json){
        $arrApartments = json_decode($json, true)['results'];
        foreach ($arrApartments as $apartment){

            $idText = $apartment['id'];
            $priceText = $apartment['price'][0]['price'];

            $object = $this->add_XML_tag($this->objects,'object');
            $id = $this->add_XML_tag($object,'id');
            $price = $this->add_XML_tag($object,'price');
            $number = $this->add_XML_tag($object,'number');


            $this->add_text_to_XML_tag($id, $idText);
            $this->add_text_to_XML_tag($price, $priceText);
            $this->add_text_to_XML_tag($number, ++$this->number);

        }


    }

}