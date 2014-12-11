<?php require_once 'header.php';?>
    <div class="span10 conteudo">
    <div class="row">
    

<?php
$dados_url  = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$rota = explode('/',$dados_url['path'],2);

function rotas( $param) {

$rotasValidas = array("home","empresa","produtos","servicos","contato");

if( in_array( $param[1], $rotasValidas)):
return require_once('includes/'.$param[1].".php");
elseif ( $param[1] == ""):
return require_once('includes/home.php');
else:
return "404";
endif;
}
?>
        </div>
</div>

    <?php require_once 'footer.php';?>