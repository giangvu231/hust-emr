<?php

function createXML($data) {
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;

    $name = $xml->createElement("NAME", $data->full_name);

    $xml->appendChild($name);

    $datetime = now();
	$datetime = str_replace(" ", "", $datetime);
	$datetime = str_replace("-", "", $datetime);
	$datetime = str_replace(":", "", $datetime);

    $name =  $datetime;

    $xml->save(public_path("xml") . "/" . $name . ".xml");
}
