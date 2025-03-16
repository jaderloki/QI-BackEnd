<?php
require_once __DIR__ . '/connect.php';

$conexaoPDO = conectarBanco();
$sql = '
    SELECT
        `Host`,
        Select_priv,
        Insert_priv,
        Update_priv,
        Delete_priv
    FROM `user`
    WHERE
        `User` = :user AND
        Select_priv = :select_priv
';
$stmt = $conexaoPDO->prepare($sql);

$userFiltro = 'root';
$selectPrivFiltro = 'Y';
$stmt->bindParam(':user', $userFiltro);
$stmt->bindParam(':select_priv', $selectPrivFiltro);

$stmt->execute();

while($linhaDado = $stmt->fetch()){
    var_dump($linhaDado);
    echo '<hr>';
}