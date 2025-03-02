<?php
$inicial = 1;
$final = 100;
for($a = $inicial; $a <= $final; $a++){
    $qtdDeVezesQueFoiDivisivel = 0;
    for($b = $inicial; $b <= $final; $b++){
        if($b > $a){
            break; //ultrapassou o valor, então break
        }else if($a % $b == 0){
            $qtdDeVezesQueFoiDivisivel++;
        }
    }
    if(
        $qtdDeVezesQueFoiDivisivel == min(2, $a)
    ){
        /**
        *   Coloquei um min() para lidar com a questão de que q o número 1 só ocorre uma % divisivel msm
        **/
        if($a == 43){
            //só para ficar bonitinho msm
            echo '<br>';
        }
        echo $a.' ';
    }
}