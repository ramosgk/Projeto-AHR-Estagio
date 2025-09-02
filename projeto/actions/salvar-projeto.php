<?php
    session_start();
    include("config.php");
    
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $cliente = $_POST["cliente"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];
            $status = $_POST["status"];
            $data_inicio = $_POST["data_inicio"];

            $sql = "INSERT INTO projeto (nome, cliente, contato, cidade, tipo, status, data_inicio) 
            VALUES ('{$nome}', '{$cliente}', '{$contato}', '{$cidade}', '{$tipo}', '{$status}', '{$data_inicio}')";

            $res = $conn->query($sql);

            if($res){
                $_SESSION['alert_message'] = 'Cadastro com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Não foi possível cadastrar.';
                $_SESSION['alert_type'] = 'danger';
            }
            header("Location: index.php?page=listar");
            exit;

        case 'editar':
            $nome = $_POST["nome"];
            $cliente = $_POST["cliente"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];
            $status = $_POST["status"];
            $data_inicio = $_POST["data_inicio"];

            $sql = "UPDATE projeto SET
                        nome='{$nome}',
                        cliente='{$cliente}',
                        contato='{$contato}',
                        cidade='{$cidade}',
                        tipo='{$tipo}',
                        status='{$status}',
                        data_inicio='{$data_inicio}'
                    WHERE
                        id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res){
                $_SESSION['alert_message'] = 'Editado com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Não foi possível editar.';
                $_SESSION['alert_type'] = 'danger';
            }
            header("Location: index.php?page=listar");
            exit;

        case 'excluir':
            $sql = "DELETE FROM projeto WHERE id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            if($res){
                $_SESSION['alert_message'] = 'Excluído com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Não foi possível excluir.';
                $_SESSION['alert_type'] = 'danger';
            }
            header("Location: index.php?page=listar");
            exit;
    }