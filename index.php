    <?php require_once 'header.php'; ?>
    
    <div class="span10 conteudo">
        <div class="row">
            <?php
            
                // Função que verifica se a página requisitada é permitida, ou seja,
                // está em um array pré-definido com as rotas possíveis
                function verificaRota($pagina) { // REQUISITO 3: Crie uma função para fazer a verificação das rotas
                       
                    // Cria um arra com os arquivos possíveis de serem carregados
                    $rotas = [ // REQUISITO 4: Registre cada uma das rotas em um array
                        'home.php',
                        'empresa.php',
                        'produtos.php',
                        'servicos.php',
                        'contato.php',
                        'contato_retorno.php',
                    ];
                    
                    // Verifica se a variavel pagina est no array definido
                    if (in_array($pagina, $rotas)) {
                        // Se estiver, retorna verdadeiro
                        return true;
                    } else {
                        // Se não estiver, retorna falso
                        return false;
                    }

                }
            
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
                    
                    // Verifica se o arquivo referente à página existe
                    if (file_exists($pagina)) { // REQUISITO 1: Você deverá verificar sempre se o arquivo acessado existe
                        
                        // Se o arquivo existir, verifica se está nos arquivos permitidos
                        if (verificaRota($pagina)) {
                            // Se estiver permitido, inclui o arquivo
                            require_once $pagina;
                        } else {
                            // Se NÃO estiver permitido, inclui o arquivo de permissão negada
                            require_once '403.php';
                            // envia uma mensagem de erro do tipo 404 para o servidor
                            http_response_code(403); 
                        }
                    } else {
                        // se o arquivo NÃO existir, inclui o arquivo de página não encontrada
                        require_once '404.php';
                        // envia uma mensagem de erro do tipo 404 para o servidor
                        http_response_code(404);
                        
                    }
                 
                }
                // Executa a funço pegaConteudo 
                pegaConteudo();
                
            ?>
        </div>
    </div>

    <?php require_once 'footer.php';?>