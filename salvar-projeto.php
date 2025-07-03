<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];

            $sql = "INSERT INTO projeto (nome, contato, cidade, tipo) 
            VALUES ('{$nome}', '{$contato}', '{$cidade}', '{$tipo}')";

            $res = $conn->query($sql);

           if($res == true){
                print "<script>alert('Cadastro com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
           }else {
                print "<script>alert('Não foi possível cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
}
            break;

        case 'editar':
            $nome = $_POST["nome"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];

            $sql = "UPDATE projeto SET
                        nome='{$nome}',
                        contato='{$contato}',
                        cidade='{$cidade}',
                        tipo='{$tipo}'
                    WHERE
                        id=".$_REQUEST["id"];

            $res = $conn->query($sql);

           if($res == true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
           }else {
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href='?page=listar';</script>";
           }
            break;

        case 'excluir':

            $sql = "DELETE FROM projeto WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

           if($res == true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
           }else {
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=listar';</script>";
           }
            break;
    }