<?php
require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="body">
    <div class="sidebar">
        <ul>
            <header>Projeto</header>
            <li><a href="#sobre"><i style='font-size:24px' class='far'>&#xf2b9;</i> Sobre</a></li>
            <li><a href="#galeria"><i style="font-size:24px" class="fa">&#xf03e;</i> Galeria</a></li>
            <li><a href="#contato"><i style='font-size:24px' class='fas'>&#xf674;</i> Contato</a></li>
            <li><a href="telaLogin.php"><i style='font-size:24px' class='fas'>&#xf2f5;</i> Login</a></li>
            <li><a href="cadUser.php"><i style='font-size:24px' class='fas'>&#xf234;</i> Cadastrar</a></li>
        </ul>
    </div>

    <section id="sobre" class="sobre">
        <h1>Sobre</h1>
        <div class="informacoes">
            <div class="texto">
                <h3>Missão</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore natus impedit eveniet, repellat ab ad est deleniti minima inventore facilis, odit commodi iste explicabo. Sapiente commodi reprehenderit quo quibusdam excepturi?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ratione placeat, perspiciatis porro qui vitae reprehenderit, rem, animi quisquam at iusto ex mollitia quos alias quod impedit dolorem dignissimos. Nisi?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error iste accusantium illo iure. Eos obcaecati eum commodi odit accusantium harum veniam quam rerum sunt quod quaerat, voluptatum quae reiciendis! Magnam!</p>
            </div>
            <div class="texto">
                <h3>Visão</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore natus impedit eveniet, repellat ab ad est deleniti minima inventore facilis, odit commodi iste explicabo. Sapiente commodi reprehenderit quo quibusdam excepturi?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ratione placeat, perspiciatis porro qui vitae reprehenderit, rem, animi quisquam at iusto ex mollitia quos alias quod impedit dolorem dignissimos. Nisi?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error iste accusantium illo iure. Eos obcaecati eum commodi odit accusantium harum veniam quam rerum sunt quod quaerat, voluptatum quae reiciendis! Magnam!</p>
            </div>
            <div class="texto">
                <h3>Valores</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore natus impedit eveniet, repellat ab ad est deleniti minima inventore facilis, odit commodi iste explicabo. Sapiente commodi reprehenderit quo quibusdam excepturi?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ratione placeat, perspiciatis porro qui vitae reprehenderit, rem, animi quisquam at iusto ex mollitia quos alias quod impedit dolorem dignissimos. Nisi?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error iste accusantium illo iure. Eos obcaecati eum commodi odit accusantium harum veniam quam rerum sunt quod quaerat, voluptatum quae reiciendis! Magnam!</p>
            </div>
        </div>


    </section>
    <section id="galeria" class="galeria">
        <h1>Galeria</h1>
        <div class="imgGaleria">
           <img src="img/azul.jpg">
           <img src="img/azul.jpg">
           <img src="img/azul.jpg">
           <img src="img/azul.jpg">
        </div>

    </section>
    <section id="contato" class="contato">
        <div class="contatoEmpresa">
            <h1>Contato</h1>
            <div class="infoContatos">
                <h4><i style='font-size:24px' class='fas'>&#xf879;</i> 3721-4489</h4>
                <h4><a href="mailto:empresa@example.com"><i class="material-icons">&#xe158;</i> empresa@example.com</a></h4>
                <h4><i style='font-size:24px' class='fas'>&#xf0ac;</i><a href="#"> www.empresa.com.br</a></h4>
            </div>
        </div>
        <div class="enderecoEmpresa">
            <h1>Endereço</h1>
            <div class="infoEndereco">
                <h4><i style='font-size:24px' class='fas'>&#xf279;</i> 36400-974</h4>
                <h4><i class="material-icons">&#xe0c8;</i> Rua Tavares de Melo 305 - Centro</h4>
                <h4><i class="material-icons">&#xe7f1;</i> Conselheiro Lafaiete - MG</h4>
            </div>
        </div>
        <div class="dadosEmpresa">
            <h1>Dados da Empresa</h1>
            <div class="infoDados">
                <h4><i style='font-size:24px' class='fas'>&#xf1b3;</i> 88.801.578/0001-98</h4>
                <h4><i style='font-size:24px' class='far'>&#xf2bb;</i> Empresa - Empresa 2</h4>
                <h4><i style='font-size:24px' class='fab'>&#xf16d;</i> @empresa</h4>
            </div>
        </div>
    </section>


    <a href="#" class="topo"><i style='font-size:24px' class='fas'>&#xf35b;</i></a>
    <footer class=" bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: black">
            <a class="text-light" href="https://github.com/hudwesley" target="blank">© 2022 Copyright: Hudwesley Morais</a>
        </div>
    </footer>

</body>
<script>
    jQuery(document).ready(function() {
        // Exibe ou oculta o botão
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.topo').fadeIn(200);
            } else {
                jQuery('.topo').fadeOut(200);
            }
        });

        // Faz animação para subir
        jQuery('.topo').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, 300);
        })
    });
</script>

</html>