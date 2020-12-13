<?php
$disponibilidad = 20;
$npersonas = 8;
$npersonasDis = 8;
$mesas = 0;
$c = 0;
for ($i=1; $i <= $npersonas; $i++) { 
    
    $npersonasDis--;
    $c= $c + 1;
    
    if($c == 4){
     
        
        $mesas=$mesas + 1;
        $c=0;
        
    }
}
if($c > 0 and $c <= 4 ){
    $mesas++;
}
echo "mesas ".$mesas." para ".$npersonas." personas";
?>