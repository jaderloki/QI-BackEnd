<?php
session_start(); //vou utilizar sessões para poder utilizar feedback de resposta do servidor no arquivo formulario
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Envio de Arquivo Upload EXCEL</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-auto mx-auto h1 fw-bold">
                            Formulário
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 mx-auto">
                            <fieldset class="container-fluid">
                                <legend class="col-12">
                                    <div class="row">
                                        <div class="col-auto">
                                            Enviador de Arquivo EXCEL para o Servidor
                                        </div>
                                        <div class="col border-top border-bottom border-dark my-auto">

                                        </div>
                                    </div>
                                </legend>
                                <form 
                                    method="POST" 
                                    action="formularioUploadExcel_exec.php"
                                    class="row"
                                    enctype="multipart/form-data"
                                >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Escolha seu Arquivo:</label>
                                                <input type="file" name="arquivoUpload" required id="arquivoUpload" class="form-control">
                                            </div>
                                        </div>
                                        <?php
                                        /**
                                        *   Aqui será utilizado o display de feedback do _exec.php
                                        **/
                                        informarFeedbackPosExecucao();
                                        ?>
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-warning w-100">
                                                    Enviar Arquivo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
function informarFeedbackPosExecucao(){
    if(isset($_SESSION['sucesso']) && $_SESSION['sucesso'] != null){
        ?>
        <div class="row">
            <div class="col-12 text-success">
                <?= $_SESSION['sucesso'] ?>
            </div>
        </div>
        <?php
    }else if(isset($_SESSION['erro']) && $_SESSION['erro'] != null){
        ?>
        <div class="row">
            <div class="col-12 text-danger">
                <?= $_SESSION['erro'] ?>
            </div>
        </div>
        <?php
    }
    unset($_SESSION['sucesso']);
    unset($_SESSION['erro']);
}
?>