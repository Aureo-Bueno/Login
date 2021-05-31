<?php
//INICIA A session_start E VERIFICA SE O USUÁRIO ESTÁ ONLINE
require_once("logado.php");

//VERIFICA QUAIS PERMISSOES CADA USUÁRIO TERIA
require_once("permissoes.php");

//BANCO DE DADOS EM FORMATO DE ARRAY 
require_once("App/Model/banco_de_dados.php");

//HEADER DO HTML
require_once("App/Elements/header.php");
//VERIFICA SE O EMAIL E SENHA FORAM SETADOS NOS CAMPOS DO FRONT END
if (array_key_exists("email", $_POST) && array_key_exists("senha", $_POST)) {
    //VERIFICA O TAMANHO DAS STRINGS INSERIDAS NOS CAMPOS DE EMAIL E SENHA
    if (strlen(trim($_POST["email"])) > 4 && strlen(trim($_POST["senha"])) > 1) {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        //FOR PARA VERIFICAR NO BD SE AS CREDENCIAIS DE LOGIN ESTÃO CORRETAS (EMAIL E SENHA)
        $retornou = 0;
        for ($k = 0; $k < count($tabela_usuarios); $k++) {
            if ($tabela_usuarios[$k]["email"] == $email && $tabela_usuarios[$k]["senha"] == $senha) {
                $_SESSION["USUARIOID"] = $tabela_usuarios[$k]["id"];
                $_SESSION["USUARIONOME"] = $tabela_usuarios[$k]["nome"];
                $_SESSION["USUARIOPERMISSAO"] = $tabela_usuarios[$k]["permissao"];
            }
        }
    }
}
if (!logado()) {
    echo '<div class="row">
              <div class="container bg-danger">
                 <div class="col-md-12 col-sm-12">
                    <h1 class="text-center text-light mt-3 mb-3">FAÇA LOGIN</h1>
                 </div>
              </div>
           </div>';
} else {
    echo '<div class="row">
              <div class="container bg-danger">
                 <div class="col-md-12 col-sm-12">
                     <h1 class="text-center text-light mt-5 mb-5">Bem-vindo '. $_SESSION["USUARIONOME"].'</h1>
                 </div>
              </div>
           </div>';
}
?>
<div class="row mt-5">
    <div class="container">
        <?php


        //SE A SESSAO FOR INICIADA OS DADOS SÃO EXECUTADOS, CASO CONTRARIOS FICAM EM NULL
        $form = null;
        $botao = null;
        $botao_sair = null;

        if (!logado()) {
            $form =  '<div class="row justify-content-md-center mt-5">
                         <div class="card" style="width: 22rem;">
                             <div class="card-body">
                                 <form method="POST">
                                     <div class="form-group mb-4">
                                         <label for="exampleInputEmail1">E-mail de Acesso</label>
                                         <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Digite seu e-mail">
                                     </div>
                                     <hr class="bg-dark">
                                     <div class="form-group mt-3">
                                         <label for="exampleInputPassword1">Senha</label>
                                         <input type="password" class="form-control" id="exampleInputPassword1"  name="senha" placeholder="Digite sua senha">
                                     </div>
                                     <button type="submit" class="btn btn-primary">Logar</button>
                                 </form>
                              </div> 
                          </div>
                        </div>';
        } else {


            if (Admin()) {
                require_once("App/Users/admin.php");
            }

            if (Coordenador()) {
                require_once("App/Users/coordenador.php");
            }

            if (Professor()) {
                require_once("App/Users/professor.php");
            }

            if (Aluno()) {
                require_once("App/Users/aluno.php");
            }
            echo '<div class="container"';

            $botao_sair = "<div><a type='button' class='btn btn-warning' href='destruir_sessao.php'>Sair</a></div>";

            echo '</div>';
        }

        echo $form . $botao . $botao_sair;
        ?>
        <?php
        require_once("App/Elements/script.php");
        ?>
    </div>
</div>

</body>

</html>