<?php
// Inicia a sessão. Essencial para usar $_SESSION para armazenar alertas e outros dados temporários.
session_start();

// Inclui o arquivo de conexão com o banco de dados.
// O caminho "../" volta para a pasta raiz, depois entra em "includes" para encontrar o arquivo.
include("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de Projeto | AHR Engenharia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para o tema corporativo */
        body {
            background-color: #f8f9fa; /* Fundo cinza claro */
            color: #212529; /* Cor do texto padrão */
        }
        .navbar {
            background-color: #212529 !important; /* Cor de fundo da navbar: preto */
        }
        .navbar-brand, .nav-link {
            color: #e9ecef !important; /* Cor do texto da navbar: cinza claro */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #adb5bd !important; /* Cor do texto ao passar o mouse */
        }
        .card {
            border: 1px solid #dee2e6;
        }
        .btn-primary {
            background-color: #212529; /* Cor principal dos botões: preto */
            border-color: #212529;
        }
        .btn-primary:hover {
            background-color: #343a40; /* Cor ao passar o mouse: cinza escuro */
            border-color: #343a40;
        }
        
        /* Estilos para a transição suave de páginas */
        .page-content {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .page-content.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="ahr.png" alt="AHR Engenharia" height="40" class="d-inline-block align-text-top me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=novo">Novo Projeto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar Projetos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col mt-5 page-content" id="content-area">
                <?php
                // Verifica se há alguma mensagem de alerta na sessão
                if (isset($_SESSION['alert_message'])) {
                    // Exibe o alerta do Bootstrap com a mensagem e o tipo (sucesso ou perigo)
                    echo "<div class='alert alert-".$_SESSION['alert_type']." alert-dismissible fade show' role='alert'>";
                    echo $_SESSION['alert_message'];
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                    echo "</div>";
                    // Limpa a sessão para que o alerta não apareça novamente
                    unset($_SESSION['alert_message']);
                    unset($_SESSION['alert_type']);
                }
                
                // O roteador. Ele verifica a variável 'page' na URL para decidir qual arquivo incluir
                switch(@$_REQUEST["page"]){
                    case "novo":
                        include("../views/novo-projeto.php");
                        break;
                    case "listar":
                        include("../views/listar-projeto.php");
                        break;
                    case "salvar":
                        include("../actions/salvar-projeto.php");
                        break;
                    case "editar":
                        include("../views/editar-projeto.php");
                        break;
                    default:
                        // Conteúdo padrão da página inicial
                        print "<div class='p-5 rounded text-white' style='background-color: #343a40;'>
                                    <h1 class='display-4'><b>Bem-vindo ao Sistema de Projetos da AHR Engenharia</b></h1>
                                    <p class='lead'>Use o menu de navegação acima para gerenciar todos os projetos da empresa.</p>
                                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lógica da transição de páginas com JavaScript
        document.addEventListener('DOMContentLoaded', () => {
            const contentArea = document.getElementById('content-area');
            // Adiciona a classe 'active' para a animação de entrada
            contentArea.classList.add('active');

            // Itera sobre todos os links da barra de navegação
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = e.target.getAttribute('href');
                    // Verifica se é um link interno do seu projeto
                    if (href && href.startsWith('index.php')) {
                        e.preventDefault();
                        // Remove a classe 'active' para a animação de saída
                        contentArea.classList.remove('active');
                        // Redireciona a página após a animação
                        setTimeout(() => {
                            window.location.href = href;
                        }, 500); // O tempo da transição em milissegundos
                    }
                });
            });
        });
    </script>
</body>
</html>
