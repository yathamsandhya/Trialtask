<?php

$xml = simplexml_load_file("feed.xml")or die("cant load xml");
//print_r($xml);
echo dashes(strlen($row))."\n";
foreach($xml as $record){
    //print_r($record);
    $row = "| ".pad(5,$record->entity_id)."| ".pad(10,$record->CategoryName)."| ".pad(10,$record->sku)."| ".pad(10,$record->name)."| ".pad(50,$record->description)."| ".pad(20,$record->shortdesc)."| ".pad(10,$record->price)."| ".pad(50,$record->link)."| ".pad(50,$record->image)."| ".pad(10,$record->Brand)."| ".pad(5,$record->Rating)."| ".pad(10,$record->CaffeineType)."| ".pad(10,$record->Count)."| ".pad(10,$record->Flavored)."| ".pad(10,$record->Seasonal)."| ".pad(10,$record->Instock)."| ".pad(10,$record->Facebook)."| ".pad(10,$record->IsKCup)." |\n";
    //echo strlen($row)."\n";
    echo $row;
}
    //echo "------------------------------------------------------------------------------------------------------------------------------\n";
    echo dashes(strlen($row))."\n";
function pad($length, $value) {
    if(strlen($value) < $length) {
        for($i = strlen($value); $i <$length; $i++) {
            $value.=" ";
        }
    }
    return $value;
}

function dashes($length) {
    $str = "";
    for($i = 0; $i < $length-1; $i++){
        $str.="-";
    }
    return $str;
}


?>