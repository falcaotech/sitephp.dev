    <?php require_once 'header.php'; ?>
    
    <div class="span10 conteudo">
        <div class="row">
            <?php
            
                // Pegando a URL completa
                $rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
               
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