<?php 
    // definindo o nome do arquivo
    // $nomeArquivo = "usuarios.json";


    function cadastrarUsuario($usuario) {
        // // pegando a variável par dentro função
        // global $nomeArquivo;
        // // pegando o conteúdo do arquivo usuarios.json
        // $usuariosJson = file_get_contents($nomeArquivo);
        // // transformando o json em array associativo
        // $arrayUsuarios = json_decode($usuariosJson, true);
        // // adicionando um novo usuário para o array associativo
        // array_push($arrayUsuarios["usuarios"], $usuario);
        // // transformando o array associativo em json
        // $usuariosJson = json_encode($arrayUsuarios);
        // // colocando json de volta para o arquivo usuarios.json
        // $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);
        // // retronando true ou false
        // return $cadastrou;  

        try{
            global $conexao;    
            $query = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario_fk) VALUES (:nome, :email, :senha, 3)"); // adiona usuario

            $query->execute([
                ':nome' => $usuario['nome'],
                ':email' => $usuario['email'],
                ':senha' => $usuario['senha']
            ]);
            
            $usuario = $query->fetchAll(PDO::FETCH_ASSOC); // traz todas as linhas em array associativo
            
            $conexao = null; 
            // var_dump($cursos);
        } catch( PDOException $Exception ) {
            echo $Exception->getMessage();
        }
        
        return true;



    }

    function logarUsuario($email, $senha) {
        // global $nomeArquivo;
        // $nomeLogado = "";
        // //pegando o conteudo do arquivo usuarios.json
        // $usuariosJson = file_get_contents($nomeArquivo);
        // // transformando o json em array associativo
        // $arrayUsuarios = json_decode($usuariosJson, true);
        // // verificando se o usuario existe no arquivo usuarios.json
        // foreach($arrayUsuarios["usuarios"] as $chave => $valor) {
        //     // verificando se o email digitado é igual ao email do json
        //     if ($valor["email"] == $email && password_verify($senha, $valor["senha"])) {
        //         $nomeLogado = $valor["nome"];
        //         break;
        //     }
        // }
        // return $nomeLogado;

        try {
           global $conexao;

           $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email"); 
           $query->execute([
               ':email' => $email
           ]);

           $usuario = $query->fetch(PDO::FETCH_ASSOC);

           if($usuario['email'] == $email && password_verify($senha, $usuario["senha"])) {
                $infoLogado = [
                    "nomeUsuario" => $usuario['nome'],
                    "tipoUsuario" => $usuario['tipo_usuario_fk']
                ];

                var_dump($infoLogado);  
           }

        } catch (PDOException $Exception ) {
            echo $Exception->getMessage();
        }

        return $infoLogado;
    }
?>