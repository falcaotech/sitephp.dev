    <?php require_once 'header.php'; ?>
    
    <div class="span10 conteudo">
        <div class="row">
            <?php
                function pegaConteudo()
                {
                    // Pegando a URL completa
                    $rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

                    //caso contrario utilizo a requisição passada.
                    $pageRequest = (String)trim($rota['path'], "/");

                    // Quebrando a $pageRequest em um array
                    $parametros = explode('/', $pageRequest);

                    // guarda na variavel pagina o primeiro parametro acrescentado do '.php'
                    $pagina = (isset($parametros[0]) && !empty($parametros[0])) ? $parametros[0].'.php' : 'home.php';
                    
                    // Cria um arra com os arquivos possveis de serem carregados
                    $rotas = [
                        'home.php',
                        'empresa.php',
                        'produtos.php',
                        'servicos.php',
                        'contato.php',
                    ];
                    
                    // Verifica se a variavel pagina est no array definido
                    if (in_array($pagina, $rotas)) {
                        // Se estiver, inclui o arquivo
                        require_once $pagina;
                    } else {
                        // Se não estiver, inclui o 404.php
                        require_once '404.php';
                    }
                }
                // Executa a funço pegaConteudo 
                pegaConteudo();
                
            ?>
        </div>
    </div>

    <?php require_once 'footer.php';?>