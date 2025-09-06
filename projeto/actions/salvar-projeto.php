<?php
    // Inicia a sessão para poder usar a variável superglobal $_SESSION.
    session_start();
    // Inclui o arquivo de conexão com o banco de dados. O caminho é relativo à pasta "actions".
    include("../includes/config.php");
    
    // O switch verifica o valor da variável "acao" que vem da URL ou do formulário.
    switch ($_REQUEST["acao"]) {
        // Caso a ação seja "cadastrar", este bloco de código é executado.
        case 'cadastrar':
            // Pega os dados enviados pelo formulário via método POST e os armazena em variáveis.
            $nome = $_POST["nome"];
            $cliente = $_POST["cliente"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];
            $status = $_POST["status"];
            $data_inicio = $_POST["data_inicio"];

            // Query SQL para inserir um novo registro na tabela 'projeto'.
            $sql = "INSERT INTO projeto (nome, cliente, contato, cidade, tipo, status, data_inicio) 
            VALUES ('{$nome}', '{$cliente}', '{$contato}', '{$cidade}', '{$tipo}', '{$status}', '{$data_inicio}')";

            // Executa a query no banco de dados.
            $res = $conn->query($sql);

            // Verifica se a query foi bem-sucedida.
            if($res){
                // Se sim, salva uma mensagem de sucesso na sessão para ser exibida na próxima página.
                $_SESSION['alert_message'] = 'Cadastro com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                // Se não, salva uma mensagem de erro na sessão.
                $_SESSION['alert_message'] = 'Não foi possível cadastrar.';
                $_SESSION['alert_type'] = 'danger';
            }
            // Redireciona o usuário para a página de listagem de projetos.
            header("Location: index.php?page=listar");
            // Termina a execução do script para garantir que o redirecionamento ocorra.
            exit;

        // Caso a ação seja "editar", este bloco de código é executado.
        case 'editar':
            // Pega os dados enviados pelo formulário via POST.
            $nome = $_POST["nome"];
            $cliente = $_POST["cliente"];
            $contato = $_POST["contato"];
            $cidade = $_POST["cidade"];
            $tipo = $_POST["tipo"];
            $status = $_POST["status"];
            $data_inicio = $_POST["data_inicio"];

            // Query SQL para atualizar um registro existente. A cláusula WHERE é crucial para especificar qual projeto será editado.
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

            // Executa a query no banco de dados.
            $res = $conn->query($sql);

            // Verifica se a query foi bem-sucedida e salva a mensagem na sessão.
            if($res){
                $_SESSION['alert_message'] = 'Editado com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Não foi possível editar.';
                $_SESSION['alert_type'] = 'danger';
            }
            // Redireciona o usuário para a página de listagem.
            header("Location: index.php?page=listar");
            exit;

        // Caso a ação seja "excluir", este bloco de código é executado.
        case 'excluir':
            // Query SQL para excluir um registro, usando o ID do projeto.
            $sql = "DELETE FROM projeto WHERE id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            // Verifica se a query foi bem-sucedida e salva a mensagem na sessão.
            if($res){
                $_SESSION['alert_message'] = 'Excluído com sucesso!';
                $_SESSION['alert_type'] = 'success';
            } else {
                $_SESSION['alert_message'] = 'Não foi possível excluir.';
                $_SESSION['alert_type'] = 'danger';
            }
            // Redireciona o usuário para a página de listagem.
            header("Location: index.php?page=listar");
            exit;
    }
