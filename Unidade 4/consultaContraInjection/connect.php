<?php
function conectarBanco(){
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'mysql';
    return new PDO('mysql:host='.$host.';dbname='.$banco.';charset=utf8', $usuario, $senha);
}