<?php
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["cpf"];
    $nroCartao = $_REQUEST["nroCartao"];
    $validade = $_REQUEST["validade"];
    $cvv = $_REQUEST["cvv"];
    $nomeCurso = $_REQUEST["nomeCurso"];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];

    //funções

    function validarNome($nome) {
        return strlen($nome) > 0 && strlen($nome) <= 15;
    }

    function validarCpf($cpf) {
        return strlen($cpf) == 11;
    }
    
    function validarNroCartao($nroCartao) {
        $primeroNum = substr($nroCartao, 0, 1);
        return $primeroNum == 4 || $primeroNum == 5 || $primeroNum == 6;
    }

    // Validar se a data inserida é maior que a data atual

    function validarData($validade) {
        $dataAtual = date("Y-m");
        return $validade >= $dataAtual;
    }

   function validarCvv($cvv) {
       return strlen($cvv) == 3;
   }


   function validarCompra($nome, $cpf, $nroCartao, $validade, $cvv) {
        global $erros;

        if (!validarNome($nome)){
            array_push($erros, "Preencha seu nome");
        }

        if (!validarCpf($cpf)){
            array_push($erros, "Seu CPF precisa ter 11 caracteres");
        }

        if (!validarNroCartao($nroCartao)){
            array_push($erros, "Seu cartão precisa começar com 4, 5 ou 6");
        }

        if (!validarData($validade)){
            array_push($erros, "A validade precisa ser maior que a data atual");
        }

        if (!validarCvv($cvv)){
            array_push($erros, "Seu CVV precisa ter 3 caracteres");
        }
   }


   
   validarCompra($nome, $cpf, $nroCartao, $validade, $cvv);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
        <?php if (count($erros) > 0) : ?>
            <div class="panel panel-danger">
                <div class="panel-heading">
                   <span> Preencha seus dados corretamente!</span>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php foreach ($erros as $chave => $valorErro) : ?>
                            <li class="list-group-item">
                            <?php echo $valorErro; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="center">
                        <a href="index.php">Voltar para home</a></div>
                    </div>
                </div> 
            </div>
        <?php else : ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                   <span> Compra realizada com sucesso!</span>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nome Curso: <?php echo $nomeCurso; ?></strong></li>
                        <li class="list-group-item"><strong>Nome Completo: </strong> <?php echo $nome; ?></li>
                        <li class="list-group-item"><strong>Preço: </strong> <?php echo $precoCurso; ?></li>
                    </ul>
                    <div class="center">
                        <a href="index.php">Voltar para home</a></div>
                    </div>
                </div> 
            </div>
        <?php endif; ?>
        </div>
    </div>
</body>
</html>