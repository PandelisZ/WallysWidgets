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
    
        //sorts out the base case of anything less than the smallest value
        if (($remainder <= $packSizes[1]) AND ($remainder > 0 )){ 
            if ($remainder <= $packSizes[0]){
                $order[0] += 1;
            }
            else{
                $order[1] += 1;
            }    
        }
        
        //calculates the packs to ship
        else {
            while (($remainder > 0) AND ($pointer > 0)){
                while ($remainder < $packSizes[$pointer]){
                    $pointer--;
                }	  
                if ($pointer < 0){
                    $pointer=0;
                }
                    $order[$pointer] += 1;
                    $remainder = $remainder - $packSizes[$pointer];
                } 
        }
        
        return $order;
            


    }

    public function getTotal($quantity){
        $order = $this->calcPacks($quantity);
        $total = 0;

         foreach($order as $key => $value){
            if($value > 0) {
                $total += $this->_arrPackSizes[$key];
            }
        }

        return $total;
    }

    public function getPacks($quantity){

        $order = $this->calcPacks($quantity);

        $finalOrder = array();

        
        foreach($order as $key => $value){
            if($value > 0) {
                $finalOrder[$this->_arrPackSizes[$key]] = $value;
            }
        }

        return $finalOrder;
        



    }

}




?>