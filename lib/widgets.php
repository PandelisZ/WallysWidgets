<?php

class Widget {

    public $_arrPackSizes = array();

    // Start from biggest pack to smallest
    public function __construct($arrPacks){
        
        //sort the array so that our pointers work
        sort($arrPacks);
        $this->_arrPackSizes = $arrPacks;

    }

    public function calcPacks($quantity){

        $packSizes = $this->_arrPackSizes;

        $pointer = count($packSizes) - 1;
        $order = array_fill(0 , count($packSizes), 0);
        $remainder = $quantity;
    
        //no extras for smaller quantities
        if (($remainder <= $packSizes[1]) AND ($remainder > 0 )){ 
            if ($remainder <= $packSizes[0]){
                //$order[] = $packSizes[0];
                $order[0] += 1;
            }
            else{
                // $order[] = $packSizes[1];
                $order[1] += 1;
            }    
        }
        
        //calculates how many packs to ship and adds them to an array
        else {
            while (($remainder > 0) AND ($pointer > 0)){
                while ($remainder < $packSizes[$pointer]){
                    $pointer--;
                }	  
                if ($pointer < 0){
                    $pointer=0;
                }
                    // $order[] = $packSizes[$pointer];
                    $order[$pointer] += 1;
                    $remainder = $remainder - $packSizes[$pointer];
                } 
        }
        
        return $order;
            


    }

    public function getPacks($packs){

                

    }

}




?>