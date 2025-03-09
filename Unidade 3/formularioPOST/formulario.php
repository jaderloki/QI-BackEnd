<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-auto mx-auto h1">
                            Formulário
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto">
                            <?php
                            if(isset($_POST['enviarDados'])){
                                try{
                                    ?>
                                    <div class="row">
                                        <div class="col-12">
                                            Nome: <span class="fw-bold"><?=$_POST['nome']?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            Idade: <span class="fw-bold"><?=$_POST['idade']?> Anos</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            Cidade que Mora: <span class="fw-bold"><?=$_POST['cidadeQueMora']?></span>
                                        </div>
                                    </div>
                                    <?php
                                    if(isset($_POST['estadosQueVisitou']) && $_POST['estadosQueVisitou'] != null){
                                        foreach($_POST['estadosQueVisitou'] as $siglaEstado){
                                            ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    UF: <span class="fw-bold"><?=$siglaEstado?></span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }catch(Exception $ex){
                                    echo 'Erro: '.$ex->getMessage();
                                }
                            }else{
                                gerarFormulario();
                            }
                            ?>
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
function gerarFormulario(){
    ?>
    <form 
        action=""
        method="POST"
        class="row"
    >
        <div class="col-12 my-2">
            <div class="row">
                <div class="col-12 col-lg-4 me-auto my-auto">
                    <label class="fw-bold" for="nome">Nome:</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" name="nome" id="nome" required class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12 my-2">
            <div class="row">
                <div class="col-12 col-lg-4 me-auto my-auto">
                    <label class="fw-bold" for="idade">Idade:</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" name="idade" id="idade" required class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12 my-2">
            <div class="row">
                <div class="col-12 col-lg-4 me-auto my-auto">
                    <label class="fw-bold" for="cidadeQueMora">Cidade que Mora:</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" name="cidadeQueMora" required id="cidadeQueMora" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12 my-2">
            <div class="row">
                <div class="col-12 col-lg-4 me-auto my-auto">
                    <label class="fw-bold" for="estadosQueVisitou">
                        <div class="row">
                            <div class="col-12">
                                Estados que Visitou:
                            </div>
                            <div class="col-12 text-muted">
                                (Segure CTRL/SHIFT para selecionar mais de um)
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-12 col-lg-8">
                    <?php
                    $estados = [
                        "AC" => "Acre",
                        "AL" => "Alagoas",
                        "AP" => "Amapá",
                        "AM" => "Amazonas",
                        "BA" => "Bahia",
                        "CE" => "Ceará",
                        "DF" => "Distrito Federal",
                        "ES" => "Espírito Santo",
                        "GO" => "Goiás",
                        "MA" => "Maranhão",
                        "MT" => "Mato Grosso",
                        "MS" => "Mato Grosso do Sul",
                        "MG" => "Minas Gerais",
                        "PA" => "Pará",
                        "PB" => "Paraíba",
                        "PR" => "Paraná",
                        "PE" => "Pernambuco",
                        "PI" => "Piauí",
                        "RJ" => "Rio de Janeiro",
                        "RN" => "Rio Grande do Norte",
                        "RS" => "Rio Grande do Sul",
                        "RO" => "Rondônia",
                        "RR" => "Roraima",
                        "SC" => "Santa Catarina",
                        "SP" => "São Paulo",
                        "SE" => "Sergipe",
                        "TO" => "Tocantins"
                    ];
                    ?>
                    <select class="form-control" name="estadosQueVisitou[]" required id="estadosQueVisitou" multiple>
                        <?php
                        if($estados != null){
                            foreach($estados as $sigla => $estadoString){
                                ?>
                                <option value="<?=$sigla?>"><?=$estadoString?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto">
                    <button type="submit" name="enviarDados" class="btn btn-warning border-dark w-100">
                        Enviar Dados
                    </button>
                </div>
            </div>
        </div>
    </form>
    <?php
}