    <?php require_once 'header.php'; ?>
    
    <div class="span10 conteudo">
        <div class="row">
            <?php
            
                // Todas as informaçoes do servidor e da URL
                //print_r($_SERVER);

                // Pegando a URL completa
                $rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                
                // Parte da URL que vem depois do dominio (HTTP_HOST)
                //$uri = $_SERVER['REQUEST_URI'];
                
                // Retirando a primeira barra da URI
                //$uri = substr($uri, 1, strlen($uri)); 
                
                // Quebrando a URI em um array
                //$parametros = explode('/', $uri);
               
                //verifico se existe uma baseUrl a ser utilizada
                $posBaseUrl = strpos($rota['path'], $baseUrl);

                if($posBaseUrl){
                    //caso existe uma baseUrl, considero a requisição após a posição dessa base
                    $pageRequest = (String)substr(trim($rota['path'],"/"), $posBaseUrl + strlen($baseUrl));
                }else{
                    //caso contrario utilizo a requisição passada.
                    $pageRequest = (String)trim($rota['path'],"/");
                }
                // Quebrando a $pageRequest em um array
                $parametros = explode('/', $pageRequest);
                // Guarda o primeiro parametro na variavel pagina
                $pagina = $parametros[0];
                // Inclui o arquivo referente a variavel passada
                require_once $pagina . '.php';
            ?>
        </div>
    </div>
    <?php require_once 'footer.php';?>

<!--Esse é o código que ele usa no vídeo, mais diz que não é a maneira 100% correta de se fazer, então sugere que os alunos achem uma maneira melhor de utilizar isso
<!--?php $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$path = str_replace("/","",$rota['path']);?>

//Dentro do conteúdo
<!--<div>
    <!--?php require_once($path.".php"); ?>
</div>-->