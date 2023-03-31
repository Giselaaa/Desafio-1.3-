<?php

if(isset($_POST['submit'])){

 include_once('config.php');   
 $nome = ($_POST['nome']);
 $cpf = ($_POST['cpf']);                    //conexao do php com o banco
 $cep = ($_POST['cep']);
 $endereco = ($_POST['endereco']);
 $numero = ($_POST['numero']);
 $bairro = ($_POST['bairro']);
 $cidade = ($_POST['cidade']); 
 
 $result = mysqli_query($conexao,"INSERT INTO pessoas(nome,cpf,cep,endereco,numero,bairro,cidade)
 VALUES('$nome','$cpf','$cep','$endereco','$numero','$bairro','$cidade')");
}

?>


<!DOCTYPE html> 
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <header>
    <ul>
  <li><a href="https://www.flashentregas.com.br/">Home</a></li>
    </ul>
    </header>
    <title>Cadastrar</title>
    <style>

        .bg {
            background-image: url(img/flash-logo.png);
            background-position: center;
            background-repeat: no-repeat;                       /*Estilo da página*/
            background-position: center;
          
            /*background-color: rgb(222, 184, 135);*/
        }

        h1{
            color: #787773;
        }

        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: rgb(0, 0, 0);
        }

        li {
        float: left;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;                
        }

        li a:hover {
        background-color: black;
        }
                

    </style>

      <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
  
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
       
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
         
                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };


    </script>
    
            <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        </div>
        </nav>
    
  </head>
  <body class="bg">
    
    <h1>Cadastro do entegrador</h1>
    <br><br>
    <br><br>
    <div class="container-sm">
    <!--img src="./img/flash-logo.png" alt="flash-logo"-->

            <div class="mb-3">
            <form method="POST" action="index.php">     <!--Coleta de dados via formulário -->
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
            </div>

            <div class="mb-3">
                <input type="number" name="cpf" class="form-control" id="cpf" placeholder="CPF">
                ex. <small>000.000.000-00</small>
            </div>

            <div class="mb-3">
                <input type="number" name="cep" value=""                                    
                class="form-control" maxlength="9" id="cep" placeholder="CEP" 
                onblur="pesquisacep(this.value);" /></label>                   <!-- Pesquisa do cep-->
                ex. <small>00000-000</small>  
            </div>

            <div class="mb-3">
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço">
            </div>
          
            <div class="mb-3">
                <input type="number" name="numero" class="form-control" id="numero" placeholder="Número">
            </div>

            <div class="mb-3">
                <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro">
            </div>

            <div class="mb-3">
                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade">
            </div>
          <br><br>
            <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-warning" value="dados">Enviar</button>
            </div>

        </form> 
     </div>
        </div>
            </div>
            </div>
        </div>
    </div>
</nav>   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
<footer><br><br><br></footer>

  </body>
</html>



  
