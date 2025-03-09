<?php
session_start(); //sistema de devolver feedback ao usuário
unset($_SESSION['sucesso']); //vamos resetar para evitar enviar mensagem errada no retorno
unset($_SESSION['erro']);
try{
    if(isset($_FILES['arquivoUpload'])){ //sempre faço isso para evitar problemas de alguem acessar direto a pagina sem passar pelo formulario
        validacaoSimplesUpload($_FILES['arquivoUpload']);
        file_put_contents(__DIR__ . '/financas/MeuControle.xlsx', file_get_contents($_FILES['arquivoUpload']['tmp_name']));
        //dai aqui seria a parte que iria ler o arquivo e enviar os dados para o BD
        $_SESSION['sucesso'] = 'Arquivo ('.$_FILES['arquivoUpload']['name'].') foi Enviado ao Servidor com S U C E S S O';
    }else{
        throw new Exception('Requisição Inválida');
    }
}catch(Exception $ex){
    $_SESSION['erro'] = $ex->getMessage();
}
header('Location: formularioUploadExcel.php'); //redirecione sempre para a pagina do usuário com a resposta de feedback em sessão

/**
*   A Principio a validação é bem fraca, recomendo utilizar algum repo de composer para 
*   garantir validação de arquivos upload ao servidor
**/
function validacaoSimplesUpload($fileUpload){
    if(file_get_contents($fileUpload['tmp_name']) == null){
        throw new Exception('Arquivo está Vazio');
    }
    $nomeArquivo = $fileUpload['name'];
    $tmpExploded = explode('.', $fileUpload['name']);
    $extensaoArquivo = $tmpExploded[count($tmpExploded)-1];
    if($extensaoArquivo != 'xlsx'){
        throw new Exception('O Arquivo Enviado ('.$fileUpload['name'].') não é um .xlsx');
    }
}