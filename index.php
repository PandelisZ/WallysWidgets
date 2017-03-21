<?php

include 'lib/widgets.php';

$w = new Widget(array(250, 500, 1000, 2000, 5000));

foreach( $w->calcPacks(12001) as $key=>$value) {
    echo($value);
}

?>