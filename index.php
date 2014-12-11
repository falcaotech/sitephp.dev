    <?php require_once 'header.php'; ?>
    
    <div class="span10 conteudo">
        <div class="row">
            <?php
                
                // Pegando a URL completa
                $rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                              
                //caso contrario utilizo a requisição passada.
                $pageRequest = (String)trim($rota['path'], "/");
                
                // Quebrando a $pageRequest em um array
                $parametros = explode('/', $pageRequest);
                
                // Guarda o primeiro parametro na variavel pagina
                $pagina = (isset($parametros[0]) && !empty($parametros[0])) ? $parametros[0] : 'home';
                
                // Verifica se o arquivos referente a pagina existe
                if (file_exists($pagina . '.php')) {
                    // Se existir, inclui o arquivo
                    require_once $pagina . '.php';
                } else {
                    // Se no existir, inclui o 404.php
                    require_once '404.php';
                }
                
            ?>
        </div>
    </div>
    <?php require_once 'footer.php';?>