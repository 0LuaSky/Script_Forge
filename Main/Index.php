<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="icon" href="COMPS/WEB-INF/logo.png" type="image/png">
            <title>Script Forge</title>
            <?php
                require 'COMPS/WEB-INF/libs/BodyLibs.php';
                require 'COMPS/WEB-INF/libs/HeadLibs.php';
            ?> 
            <link rel="stylesheet" href="..\WEB-INF\styles.css"> 
            <link rel="stylesheet" href="COMPS\WEB-INF\styles.css"> 
        </head>
        <body class="d-flex flex-column min-vh-100">
            <?php require "COMPS/navbar/navbar_index.php"; ?>
                     
            <div style="margin-top: 3%; margin-left: 2%; margin-right: 2%;"> 
                <div class="h-auto bg-secondary-subtle mt-5 rounded-5">
                    <div class="my-auto">
                        <div class="row mx-auto">
                            <div class="col-sm-5 my-5 mx-5">
                                <img src="COMPS/WEB-INF/Logo.png" class="img-fluid d-block " alt="ScriptForge"  width="750" height="750">
                            </div>

                            <div class="col-xl-auto px-1 mx-auto md-1 my-5">
                                <div class="vr my-auto" style="height: 96%; width: 1px; margin:auto;"></div>
                            </div>

                            <div class="col-sm-6 my-auto">
                                <h1>
                                    Seja bem-vindo ao Script Forge!
                                </h1>
                                <br>
                                <h2 class="mb-2">
                                A ferramenta perfeita para criação de roteiro para jogos digitais por meio de IA.
                                </h2>
                                <h2 class="mx-5">
                                    <a class="btn btn-primary my-5" href="main.php" role="button">Começe agora</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto bg-dark-subtle mt-3 rounded-5">
                    <div class="my-auto">
                        <div class="row mx-auto">
                            <div class="col-sm-5 my-auto mx-5">
                                <h1>
                                    O que é Script Forge?
                                </h1>
                                <br>
                                <h3 class="mb-2">
                                    Script forge é a ferramenta que, com o auxílio da Open AI, te ajuda a criar um roteiro para o seu jogo, através do uso da inteligência
                                    artificial conhecida como chat-GPT. Crie roteiros, salve histórias e deixe a sua imaginação brilhar.
                                </h3>
                            </div>
                            
                            <div class="col-xl-auto px-1 mx-auto md-1 my-5">
                                <div class="vr my-auto" style="height: 96%; width: 1px; margin:auto;"></div>
                            </div>
                            
                            <div class="col-sm-5 my-5 mx-5">
                                <img src="COMPS/WEB-INF/exemplo.png" class="img-fluid d-block " alt="imagem a ser colocada"  width="1200" height="750">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto bg-body-tertiary mt-3 mb-5 rounded-5">
                    <div class="my-auto">
                        <div class="row mx-auto">
                            <div class="col-sm-11 my-auto mx-auto mt-5">
                                <h2 class="mb-2 mt-4">
                                    Lembre-se de que tanto a inteligência artificial quanto este site são ferramentas, não soluções.
                                </h2>
                                <h4 class="mb-5 mt-5">
                                    Roteiros criados aqui podem não satisfazer ou conter erros, sendo recomendado que se leia o roteiro gerado, revise e que faça alterações
                                        no que foi gerado para ter um resultado mais satisfatório.
                                </h4>
                                <br>
                                <hr class="hr w-75 mx-auto" />
                                
                                <h3 class="mb-5 mt-5 text-center">
                                    Veja aqui alguns artigos úteis sobre a utilização de ia no mercado de trabalho atual.
                                </h3>

                                <br>
                                <br>
                                <br>

                                <div class="row mb-5" style="heigth:300px;">
                                    <div class="col-sm-6 mb-3 mb-sm-0" style="heigth:300px;">
                                        <div class="card h-100">
                                            <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2024/02/image1-4.jpg" class="card-img-top" alt="..." heigth="50px">
                                            <div class="card-body mx-2 mb-5" >
                                                <h1 class="card-title">Inteligência artificial nos games: como ela está sendo utilizada?</h1>
                                                <br>
                                                <h5 class="card-text">
                                                    Muito tem se falado do uso da Inteligência Artificial (IA) em diversos segmentos e indústrias. No setor de
                                                    tecnologia, especificamente na área de games, não podia ser diferente.
                                                    <br>
                                                    <br>
                                                    A IA tem despontado como uma ferramenta útil para diversas áreas dentro desse segmento, mas há, também, 
                                                    profissionais que a enxergam como prejudicial. Quer saber um pouco mais sobre como a IA tem sido utilizada 
                                                    na produção dos games e a opinião de alguns profissionais a respeito da ferramenta? Então, confira o artigo!
                                                </h5>
                                                <br>
                                                <a href="https://ebaconline.com.br/blog/impactos-da-ia-seo" class="btn btn-primary mt-auto">Leia mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0" style="heigth:300px;">
                                        <div class="card h-100">
                                            <img src="https://mittechreview.com.br/wp-content/uploads/2024/09/mit_trbr_artigo_bannernews_794x400_20240918.jpg" target="_blank" class="card-img-top" alt="..." heigth="50px">
                                            <div class="card-body mx-2 mb-5" >
                                                <h1 class="card-title">Qual o impacto da IA no desenvolvimento de videogames?</h1>
                                                <br>
                                                <h5 class="card-text">
                                                        Há muito, o desenvolvimento de videogames é marcado pelo temor do crunch - basicamente, ser forçado a trabalhar 
                                                        horas extras para finalizar um jogo dentro do prazo. Nos primeiros dias dos videogames, o crunch era, muitas vezes, 
                                                        visto como um rito de passagem: nos últimos dias antes do lançamento, um grupo dedicado de desenvolvedores passava 
                                                        noites em claro para aperfeiçoar seu jogo dos sonhos.
                                                    <br>
                                                    <br>
                                                        Entretanto, atualmente, o crunch é menos glamorizado e mais visto como uma forma de exploração, capaz de causar 
                                                        doenças mentais e burnout. Parte do problema é que, antes, o crunch acontecia apenas nas vésperas do lançamento de 
                                                        um jogo, mas, hoje, todo o período de desenvolvimento pode ser marcado por ele. Com os jogos ficando mais caros, as 
                                                        empresas são incentivadas a buscar lucros de curto prazo, pressionando ainda mais os desenvolvedores.
                                                </h5>
                                                <br>
                                                <a href="https://mittechreview.com.br/ia-desenvolvimento-videogames/" target="_blank" class="btn btn-primary mt-auto">Leia mais</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </body>
        <?php require "COMPS/navbar/footer.php";?>

    </html>