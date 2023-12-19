<?php
session_start();
require_once 'includes/functions.php';

if (!isUserLoggedIn()) {
    header('Location: index.php');
    exit();
}

// Exemplo de verificação adicional de permissão (opcional)
// if (!hasPermission('consult_cnpj')) {
//     header('Location: index.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>API Consultoria CNPJ</title>
    <style>
        /* Estilizando a lista */
        .horizontal-list {
            list-style-type: none; /* Remove a marcação da lista */
            display: flex; /* Faz com que os itens da lista se comportem como elementos flexíveis (em linha) */
            padding: 0; /* Remove o espaçamento padrão da lista */
        }
        
        .horizontal-list {
            list-style-type: none; /* Remove a marcação da lista */
            text-align: center; /* Centraliza os itens */
            padding: 0; /* Remove o espaçamento padrão da lista */
        }

        .horizontal-list li {
            display: inline-block; /* Faz com que os itens se comportem como elementos em linha */
            margin: 0 30px; /* Adiciona um espaçamento entre os itens */
        }

        ul, li {
            text-align: center;
        }
    </style>
</head>

<body>
    <!--HEADER / JUMBOTRON-->
    <header class="jumbotron">
        <div class="container">
            <h1 class="display-4 text-center text-muted"><strong>Consulta de CNPJ</strong></h1>
        </div>
    </header>

   
            <div class="row">
                <div class="col-md-4 col-sm-12 mx-auto my-auto">
                <div class="col-xl-9">
                     <ul class="horizontal-list">
                        <li><a href="#">home</a></li>
                        <li><a href="#">Empresas</a></li>
                        <li><a href="#">Graficos</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                     </ul>
                </div>
                </div>
            </div>

    <!--COLUNAS DA INTERFACE-->
    <div class="row">
        <div class="col-md-4"></div>
        
        <!--CAMPO DE PESQUISA DO CNPJ-->
        <div class="col-md-4">
            <div class="form-group row">
                <div class="col-md-12"><br><br>
                    <label>CNPJ</label>
                    <input type="text" onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" class="form-control"/>
                </div>
            </div>
            
            <!--RAZÃO SOCIAL-->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Razao Social</label>
                    <input type="text" id="razaosocial" class="form-control">
                </div>

                <!--FANTASIA-->
                <div class="col-md-6">
                    <label>Fantasia</label>
                    <input type="text" id="fantasia" class="form-control">
                </div>
            </div>

            <!--LOGRADOURO-->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Logradouro</label>
                    <input type="text" id="logradouro" class="form-control">
                </div>

                <!--NUMERO-->
                <div class="col-md-6">
                    <label>Numero</label>
                    <input type="text" id="numero" class="form-control">
                </div>
            </div>
            
            <!--BAIRRO/DISTRITO-->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Municipio</label>
                    <input type="text" id="municipio" class="form-control">
                </div>
               
                <!--UF-->
                <div class="col-md-6">
                    <label>UF</label>
                    <input type="text" id="uf" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-4"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
       function checkCnpj(cnpj){
    $.ajax({
        'url': 'https://receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
        'type': "GET",
        'dataType': 'jsonp',
        'success': function(data){
           if(data.nome == undefined){
            alert(data.status + ' '+ data.message)
           } else{
            document.getElementById('razaosocial').value = data.nome; // Alterei de 'name' para 'nome'
            document.getElementById('fantasia').value = data.fantasia;
            document.getElementById('logradouro').value = data.logradouro;
            document.getElementById('numero').value = data.numero;
            document.getElementById('municipio').value = data.municipio;
            document.getElementById('uf').value = data.uf;
           }
           console.log(data);
        }
    })
}

    </script>
</body>
</html>

