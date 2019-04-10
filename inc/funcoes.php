<?php
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
?>   