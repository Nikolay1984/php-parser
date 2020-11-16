<?php
function create_start_DomDocument(){
    $dom = new DomDocument('1.0','UTF-8');
    $dom->formatOutput = true;
    $dom->encoding = 'UTF-8';
    $dom->appendChild($dom->createElement('root'));
    return $dom;
}

function add_XML_tag($dom, $tagName){
    $newTag = $dom->documentElement->appendChild($dom->createElement($tagName));
    return $newTag;
}

function add_text_to_XML_tag($dom,$tag,$text){
    $tag->appendChild($dom->createTextNode($text));
}

function create_string_XML(){

}

function get_json($url,$limit=10,$page=1){
    $ch = curl_init($url);

    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "page=$page&limit=$limit&sortBy=newest&currency=any&lang=ru");
//curl_setopt ( $ch, CURLOPT_HEADER, true );
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36" );

    $jsonResults = curl_exec($ch);
    curl_close($ch);


    return $jsonResults ;


}

function get_limit_Apartments($url){
    $ch = curl_init($url);

    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "page=3&limit=1&sortBy=newest&currency=any&lang=ru");
//curl_setopt ( $ch, CURLOPT_HEADER, true );
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36" );

    $jsonResults = curl_exec($ch);
    curl_close($ch);
    $arrApartments = json_decode($jsonResults, true);
    return $arrApartments['found_results'];
}

function debug($arr, $die = false){
    echo "<pre>" . print_r($arr,true) . "</pre>";
    if($die){
        die("смертельный дебугер!");
    }
}

//
//$stuffs = $html->find('p');
//
//foreach ( $stuffs as $stuff ) {
//    $text =$stuff->plaintext;
//
//    $desc = $general->appendChild($dom->createElement('desc'));
//    $desc->appendChild($dom->createTextNode($text));
//}
//
//$html->clear();
//unset($html);
//
//
//$str = $dom->saveXML(); // передача строки в test1
//echo '<plaintext>';
//echo $str;
//echo '</plaintext>';
//
//
//
//$dom->save('wp-content/themes/twentytwenty/assets/my.xml');

?>

<?php
//
////Создает XML-строку и XML-документ при помощи DOM
//$dom = new DomDocument('1.0');
//
////добавление корня - <books>
//$books = $dom->appendChild($dom->createElement('books'));
//
////добавление элемента <book> в <books>
////$book = $books->appendChild($dom->createElement('book'));
////
////// добавление элемента <title> в <book>
////$title = $book->appendChild($dom->createElement('title'));
////
////// добавление элемента текстового узла <title> в <title>
////$title->appendChild(
////	$dom->createTextNode('Great American Novel'));
//
////генерация xml
//$dom->formatOutput = true; // установка атрибута formatOutput
//// domDocument в значение true
//// save XML as string or file
//$test1 = $dom->saveXML(); // передача строки в test1
//echo '<plaintext>';
//echo $test1;
//echo '</plaintext>';
//$dom->save('test1.xml'); // сохранение файла
//?>