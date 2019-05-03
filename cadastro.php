<?php
    require "req/database.php";  
    require "req/funcoesLogin.php";
    include "inc/head.php";
        
    if ($_REQUEST) {
        $nome = $_REQUEST["nome"]; // ou $_POST["nome"] para validação de formulário!!!
        $email = $_REQUEST["email"]; // ou $_POST["nome"] para validação de formulário!!!
        $senha = $_REQUEST["senha"]; // ou $_POST["nome"] para validação de formulário!!!
        $confirmarSenha = $_REQUEST["confirmarSenha"]; // ou $_POST["nome"] para validação de formulário!!!
        // teste criptografia de senha
        // $cadastro = md5($senha);
        // $login = md5($senha);
        // echo $cadastro . "<br>";
        // echo $login;
        // exit;
        // $hash = password_hash($senha, PASSWORD_DEFAULT);
        // echo $hash;
        // exit;

        // echo $nome . " " . $email . " " . $senha . " " . $confirmarSenha;
        // exit;

        // verifica se a senha é igual a confirmar senha
        if ($senha == $confirmarSenha) {
            //criptografando a senha
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
            // criando um novo usuario
            $novoUsuario = [
                "nome" => $nome,
                "email" => $email,
                "senha" => $senhaCrip
            ];      
           // cadastro seu usuário no json 
           $cadastrou = cadastrarUsuario($novoUsuario);
        } else {
            $erro = "Senhas incompativeis";
        }

    }
?>

<div class="page-center">
    <h2>Cadastre-se</h2>
    <!-- Verifica se a variavel cadastrou foi definida e se é verdadeira -->
    <?php
        if (isset($cadastrou) && $cadastrou  )  : ?>
        <div class="alert alert-success" role="alert">
            <span> Usuário cadastrado com sucesso!</span>
        </div>
        <!-- Verifica se a variavel erro foi definida -->
        <?php elseif (isset($erro)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php endif;  ?>
    <form action="cadastro.php" method="post" class="col-md-7">
        <div class="col-md-12">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome">
        </div>
        <div class="col-md-12">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">
        </div>
        <div class="col-md-12">
            <label for="inputConfirmarSenha">Confirme sua Senha</label>
            <input type="password" name="confirmarSenha" class="form-control" id="inputConfirmarSenha">
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
            <a href="login.php" class="col-md-offset-9">Fazer Login!</a>
        </div>
    </form>
</div>

<?php 
    include "inc/footer.php";
?>