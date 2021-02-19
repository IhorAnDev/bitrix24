<?php

$product = array(

    'paper' => array(
        'copier' => "Copier & Multi",
        'inkjet' => "Inkjet Printer",
        'laser' => "Laser printer",
        'photo' => "Phpto Paper"),

    'pens' => array(

        'ball' => "Ball Point",
        'hilite' => "Highliters",
        'marker' => "Markers"),

    'misc' => array(

        'tape' => "Sticky Tape",
        'glue' => "Adhesives",
        'clips' => "Paperclips"
    )
);

echo "</pre>";

foreach ($product as $section => $items)
    foreach ($items as $key => $value)
        echo "$section:\t$key\t($value)<br>";

echo "</pre>";
