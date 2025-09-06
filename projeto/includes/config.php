<?php
    // Define as constantes de conexão com o banco de dados.
    // 'HOST' é o endereço do servidor, 'localhost' para ambiente local.
    define('HOST', 'localhost');
    // 'USER' é o usuário do banco de dados, 'root' é o padrão do XAMPP.
    define('USER', 'root');
    // 'PASS' é a senha, vazia por padrão no XAMPP.
    define('PASS', '');
    // 'BASE' é o nome do banco de dados que será utilizado.
    define('BASE', 'cadastro');

    // Cria a nova conexão com o banco de dados MySQL usando as constantes definidas.
    // A variável $conn armazena a conexão e será utilizada nas queries.
    $conn = new MySQLi(HOST,USER,PASS,BASE);
