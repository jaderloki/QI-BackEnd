<?php
date_default_timezone_set('America/Sao_Paulo'); //só para nao dar timezone padrão
try{
    if(isset($_GET['dataInicial']) || isset($_GET['dataFinal'])){
        if(!isset($_GET['dataInicial'])){
            throw new Exception('Você não informou a Data Inicial');
        }
        if(!isset($_GET['dataFinal'])){
            throw new Exception('Você não informou a Data Final');
        }
        //seria bom um validador de data mas enfim
        loopDias($_GET['dataInicial'], $_GET['dataFinal']);
    }
}catch(Exception $ex){
    ?>
    <strong>Erro: <?=$ex->getMessage()?></strong>
    <?php
}
?>
Informe as datas que deseja executar:
<form action="" method="GET">
    <label for="dataInicial">Data Inicial</label>
    <input type="date" name="dataInicial" value="<?=(isset($_GET['dataInicial']) ? $_GET['dataInicial'] : date('Y-m-d'))?>">
    <hr>
    
    <label for="dataInicial">Data Inicial</label>
    <input type="date" name="dataFinal" value="<?=(isset($_GET['dataFinal']) ? $_GET['dataFinal'] : date('Y-m-d', strtotime('+31 days')))?>">
    <hr>
    <button type="submit">Executar</button>
</form>
<?php

function loopDias($dataInicial, $dataFinal){
    ?>
    <strong>Resposta:</strong>
    <br>
    <?php
    $intervalo = new DateInterval('P1D'); // Intervalo de 1 dia
    $dataFinalObjeto = new Datetime($dataFinal);
    for($a = new Datetime($dataInicial); strtotime($a->format('Y-m-d')) <= strtotime($dataFinalObjeto->format('Y-m-d')); $a->add($intervalo)){
        echo $a->format('d/m/Y').'<br>';
    }
    ?>
    <hr>
    <?php
}