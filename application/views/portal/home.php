<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>KANBAN TraceGP</title>

    <link href="reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/semanticui/semantic.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/semanticui/components/dropdown.css')?>" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/semanticui/semantic.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/semanticui/components/dropdown.js')?>" type="text/javascript"></script>
    <!--<script src="js/jquery.editable.js" type="text/javascript"></script>-->

    <link href="<?php echo base_url('assets/css/kanban-trace.min.css')?>" type="text/css" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js')?>/" type="text/javascript"></script>

    <script type="text/javascript">
    /*
    | AQUI SE MONTA A LISTAGEM DE PROJETOS CASO SEJA UTILIZADA A BUSCA DO CABEÇALHO.
    */
    var content = [
      { title: 'Desenvolvimento de nova interface' },
      { title: 'Estudo para novo produto Trace' },
      { title: 'Processo de Recursos Humanos' },
      { title: 'Processo para Comercial' },
      { title: 'Desenvolvimento de App Mobile' },
      { title: 'Estudo de Front-end' },
      { title: 'Análise para Banco de Dados' },
      { title: 'Novo documento para roadmap' },
      { title: 'Roadmap do Produto' }
      // etc
    ];

    </script>
  </head>
  <body>

    <!-- DESENHO ZERADO -->
    <div id="topo">
      <div class="ui grid">
        <div class="four column row">
          <div class="left floated column">
            <div class="ui search" style="float:left;">
              <div class="ui icon input">
                <input class="prompt campo-de-busca-projeto" type="text" placeholder="Busque por um Projeto">
                <i class="search icon"></i>
              </div>
              <div class="results"></div>
            </div>
          </div>
          <div class="right aligned floated column">
            Jeferson Silveira&nbsp;&nbsp;&nbsp;
          </div>

        </div>
      </div>

      </div>



    </div>

    <!-- INICIO DO QUADRO -->
    <div id="board" class="">

      <!-- INICIO DO WRAPPER -->
      <div class="list-wrapper">
        <!-- INICIO DA LISTA -->
        <div class="list">
          <!-- INICIO DO CABEÇALHO DA LISTA -->
          <div class="list-header campoEditavel">
            <span class="cabecalho-wrapper">CABEÇALHO</span>
          </div>
          <!-- FIM DO CABEÇALHO DA LISTA -->

          <!-- INICIO LISTAGEM DE CARDS -->
          <div class="list-cards sortable drop">

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card1">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->


            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card2">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">153 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

          </div>
          <!-- FIM LISTAGEM DE CARDS -->
          <!-- INÍCIO LINK PARA ADICIONAR NOVO CARD -->
          <!--<a class="open-card-composer" href="#">Adicionar um cartão...</a>-->
          <div class="open-card-composer"></div>
          <!-- FIM LINK PARA ADICIONAR NOVO CARD -->
        </div>
        <!-- FIM DA LISTA -->
      </div>
      <!-- FIM DO WRAPPER -->

      <!-- INICIO DO WRAPPER -->
      <div class="list-wrapper">
        <!-- INICIO DA LISTA -->
        <div class="list">
          <!-- INICIO DO CABEÇALHO DA LISTA -->
          <div class="list-header campoEditavel">
            <span class="cabecalho-wrapper">CABEÇALHO</span>
          </div>
          <!-- FIM DO CABEÇALHO DA LISTA -->

          <!-- INICIO LISTAGEM DE CARDS -->
          <div class="list-cards sortable drop">

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card3">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card4">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card5">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card6">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card7">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->


        </div>
        <!-- FIM DA LISTAGEM -->
        <!-- INÍCIO LINK PARA ADICIONAR NOVO CARD -->
        <!-- <a class="open-card-composer" href="#">Adicionar um cartão...</a>-->
        <div class="open-card-composer"></div>
        <!-- FIM LINK PARA ADICIONAR NOVO CARD -->

      </div>
      <!-- FIM DA LISTA -->
      </div>
      <!-- FIM DO WRAPPER -->



      <!-- INICIO DO WRAPPER -->
      <div class="list-wrapper">
        <!-- INICIO DA LISTA -->
        <div class="list">
          <!-- INICIO DO CABEÇALHO DA LISTA -->
          <div class="list-header campoEditavel">
            <span class="cabecalho-wrapper">CABEÇALHO</span>
          </div>
          <!-- FIM DO CABEÇALHO DA LISTA -->

          <!-- INICIO LISTAGEM DE CARDS -->
          <div class="list-cards sortable drop">

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card8">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card9">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card10">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card11">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card12">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

        </div>
        <!-- FIM DA LISTAGEM -->
        <!-- INÍCIO LINK PARA ADICIONAR NOVO CARD -->
        <!--<a class="open-card-composer" href="#">Adicionar um cartão...</a>-->
        <div class="open-card-composer"></div>
        <!-- FIM LINK PARA ADICIONAR NOVO CARD -->
      </div>
      <!-- FIM DA LISTA -->
      </div>
      <!-- FIM DO WRAPPER -->



      <!-- INICIO DO WRAPPER -->
      <div class="list-wrapper">
        <!-- INICIO DA LISTA -->
        <div class="list">
          <!-- INICIO DO CABEÇALHO DA LISTA -->
          <div class="list-header campoEditavel">
            <span class="cabecalho-wrapper">CABEÇALHO</span>
          </div>
          <!-- FIM DO CABEÇALHO DA LISTA -->

          <!-- INICIO LISTAGEM DE CARDS -->
          <div class="list-cards sortable drop">

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card13">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card14">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card15">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

            <!-- INICIO CARD -->
            <div class="list-card">
              <div class="list-card-details">
                <div class="list-card-title">
                  <!-- CARD -->
                  <div class="ui purple card linkMao ui-state-default open-modal" href="#" id="card16">
                    <div class="content">

                      <div class="description">
                        <div class="meta">
                          <!-- TÍTULO DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
                        </div>
                        <!-- TÍTULO DA TAREFA -->Desenvolvimento da nova interface para a proposta do kanban - Front-end
                      </div>
                      <div class="ui tiny progress success">
                        <!--
                          BARRA DE PROGRESSO:

                          Para indicar o % de conclusão da barra, basta aplicar o mesmo no style width
                          na própria DIV.

                          Exemplo:

                          <div class="bar" style="transition-duration: 300ms; width: <AQUI O VALO DE 0 À 100>%;"></div>

                          Para os prazos e a duração prevista, substituir as informações onde indicado.
                        -->
                        <div class="bar" style="transition-duration: 300ms; width: 63%;"></div>
                        <div class="label"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div>
                        <!--
                          DESCRITIVO DA TAREFA:

                          Basta carregar informações entre as tags small do bloco abaixo
                        -->
                      </div>
                    </div>
                    <div class="extra content">
                      <!--
                        ÍCONES DE PROGRESSO:

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <span class="left float">
                          <!-- ÍCONE DEVE SER CARREGADO CASO EXISTA ANEXO --><i class="small attach icon"></i>
                          <!-- ÍCONE DEVE SER CARREGADO QUANDO EM ATRASO --><i class="small comment outline icon"></i>
                      </span>
                      <!--
                        ÍCONES AVATARES

                        Basta carregar informações entre as tags small do bloco abaixo
                      -->
                      <div class="right floated author">
                        <img alt="Jeferson Silveira - Responsável"  title="Jeferson Silveira - Responsável" class="ui tiny avatar image" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png">
                        <img alt="Daniel Kafruni - Co-responsável" title="Daniel Kafruni - Co-responsável" class="ui tiny avatar image" src="https://0.s3.envato.com/files/97977535/256/12_resize.png">
                        <img alt="John Duarte - Co-responsável" title="John Duarte - Co-responsável" class="ui tiny avatar image" src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png">
                      </div>
                    </div>
                  </div>
                  <!-- FIM DO CARD -->
                </div>
              </div>
            </div>
            <!-- FIM CARD -->

        </div>
        <!-- FIM DA LISTAGEM -->
        <!-- INÍCIO LINK PARA ADICIONAR NOVO CARD -->
        <!--<a class="open-card-composer" href="#">Adicionar um cartão...</a>-->
        <div class="open-card-composer"></div>
        <!-- FIM LINK PARA ADICIONAR NOVO CARD -->
      </div>
      <!-- FIM DA LISTA -->
      </div>
      <!-- FIM DO WRAPPER -->

      <!-- INICIO DO WRAPPER -->
      <div class="list-wrapper">
        <!-- INICIO DA LISTA -->
        <div class="list">
          <!-- INICIO DO CABEÇALHO DA LISTA -->
          <div class="list-header campoEditavel">
            <span class="cabecalho-wrapper">Adicionar nova lista</span></span>
          </div>
          <!-- FIM DO CABEÇALHO DA LISTA -->

          <!-- INICIO LISTAGEM DE CARDS -->
          <div class="list-cards sortable drop" id="lista5">

              <!-- AQUI ENTRAM OS CARDS -->

          </div>
          <!-- FIM DA LISTAGEM -->
          <!-- INÍCIO LINK PARA ADICIONAR NOVO CARD -->
          <a class="open-card-composer" href="#" id="addButtons">Adicionar um cartão...</a>
          <!--<div class="open-card-composer"><button id="addButtons">Criar!</button></div>-->
          <div class="open-card-composer"><button id="addButtons2">Criar nova lista</button></div>
          <!-- FIM LINK PARA ADICIONAR NOVO CARD -->
        </div>
      </div>
      <!-- FIM DO WRAPPER -->

    </div>
    <!-- FIM DO QUADRO -->

    <!-- DESENHO ZERADO -->


    <!-- INÍCIO MODAL PARA APLICAÇÃO DO DETALHE DAS TAREFAS -->
    <div class="ui small modal">
      <i class="close icon"></i>
      <div class="header">
        <div class="meta">
          <!-- NOME DO PROJETO --><span class="category">152 - Projeto de Desenvolvimento</span>
        </div>
        <!-- NOME DA TAREFA --><small><strong>Desenvolvimento da nova interface para a proposta do kanban - Front-end</strong></small>
      </div>

      <div class="content">

        <!-- TÍTULO DAS ABAS -->
        <div class="ui pointing secondary menu">
          <a class="item active" data-tab="dados"><small>Dados</small></a>
          <a class="item" data-tab="documentos"><small>Documentos</small></a>
          <a class="item" data-tab="ocorrencias"><small>Ocorrências</small></a>
        </div>
        <!-- TÍTULO DAS ABAS -->

        <!-- INICIO DESCRIÇÃO -->
        <div class="description">

          <!-- ABA DADOS -->
          <div class="ui tab active" data-tab="dados">
            <p>
              Descritivo da tarefa, aqui todo o detalhamento da mesma, com possíveis anexos, bem como dados de previsão inicial e final e também, é claro, com realizados, além de uma barra de progresso apresentando o percentual de conclusão da entidade.
            </p>
            <div class="content">
              <div class="ui tiny progress success">
                <div class="bar" >
                  <div class="progress"></div>
                </div>
                <div class="label"><small>% de Conclusão</small></div>
              </div>
            </div>
            <div class="ui grid">
              <div class="eleven wide column">
                <p class="tabela">
                  <table class="ui compact basic table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Duração</th>
                        <th>Horas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>PREVISTO</strong></td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td>00</td>
                        <td>00:00</td>
                      </tr>
                      <tr>
                        <td><strong>REALIZADO</strong></td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td>00</td>
                        <td>00:00</td>
                      </tr>
                    </tbody>
                  </table>
                </p>
              </div>
              <div class="middle aligned four wide column">
                  <small>Situação da Tarefa:<br /><b>EM ANDAMENTO</b></small>
              </div>
            </div>

          </div>
          <!-- DADOS -->

          <!-- ABA DOCUMENTOS -->
          <div class="ui tab" data-tab="documentos">
            <a href="#" style="line-height:30px;"><i class="grey upload icon" style="margin-left:12px;"></i> <small>Anexar arquivo</small></a>
            <div style="height:200px;overflow-y:auto;">
              <p class="tabela">
                <table class="ui selectable celled compact basic table">
                  <thead>
                    <tr>
                      <th class="ui center aligned one wide"></th>
                      <th>Descrição</th>
                      <th class="four wide">Tipo</th>
                      <th class="three wide">Tamanho</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Tabela de usuários</td>
                      <td>Relacionado</td>
                      <td>142kb</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Imagem com o erro</td>
                      <td>Print</td>
                      <td>99kb</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Tabela de usuários</td>
                      <td>Relacionado</td>
                      <td>142kb</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Imagem com o erro</td>
                      <td>Print</td>
                      <td>99kb</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Tabela de usuários</td>
                      <td>Relacionado</td>
                      <td>142kb</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black download icon"></i></a></td>
                      <td>Imagem com o erro</td>
                      <td>Print</td>
                      <td>99kb</td>
                    </tr>
                  </tbody>
                </table>
              </p>
            </div>
          </div>
          <!-- DOCUMENTOS -->

          <!-- ABA OCORRÊNCIAS -->
          <div class="ui tab" data-tab="ocorrencias">
            <a href="#" style="line-height:30px;"><i class="grey add circle icon" style="margin-left:12px;"></i> <small>Incluir nova ocorrência</small></a>
            <div style="height:200px;overflow-y:auto;">
              <p class="tabela">
                <table class="ui selectable celled compact basic table">
                  <thead>
                    <tr>
                      <th class="ui center aligned one wide"></th>
                      <th>Descrição</th>
                      <th class="four wide">Usuário</th>
                      <th class="three wide">Data/Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>Enviamos material para entendimento...</td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>
                        Prezado cliente...
                      </td></td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>Enviamos material para entendimento...</td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>
                        Prezado cliente...
                      </td></td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>Enviamos material para entendimento...</td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>
                        Prezado cliente...
                      </td></td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>Enviamos material para entendimento...</td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                    <tr>
                      <td class="ui center aligned"><a href="#"><i class="black open envelope outline icon"></i></a></td>
                      <td>
                        Prezado cliente...
                      </td></td>
                      <td>Jeferson Silveira</td>
                      <td>00/00/000 00:00</td>
                    </tr>
                  </tbody>
                </table>
              </p>
            </div>
          </div>
          <!-- OCORRÊNCIAS -->

        </div>
        <!-- FIM DESCRIÇÃO -->

      </div>

      <div class="actions">
        <div class="ui positive right labeled icon button">
          Fechar
          <i class="close icon"></i>
        </div>
      </div>
    </div>
    <!-- FIM MODAL PARA APLICAÇÃO DO DETALHE DAS TAREFAS -->

    <script type="text/javascript">
    $('.menu .item')
      .tab()
    ;
    /*
      INICIAÇÃO DAS VARIÁVEIS PARA APLICAR ID INDIVIDUAL PARA CADA CARD E LISTA GERADA.

      Para as cards sugiro aplicar o próprio ID da tarefa, uma vez que será único.
      Para as listas, teremos que aplicar o id da tabela onde esta informação será salva

    */
    var $lista5 = $("#lista5");
    var $board = $("#board");
    var countCard = 19;
    var countLista = 19;

    $lista5.on("click", '#card20', function() {
        //alert ("Você clicou na DIV: " + $(this).text());
        //alert ("Você clicou na DIV: " + $this.text());
        //alert(this.id);
    });

    $("#addButtons").on("click", function() {
        $lista5.append("<div class=\"list-card\"><div class=\"list-card-details\"><div class=\"list-card-title\"><div class=\"ui purple card linkMao ui-state-default open-modal\" href=\"#\" id=\"card" + (++countCard) + "\"><div class=\"content\"><div class=\"description\"><div class=\"meta\"><span class=\"category\">152 - Projeto de Desenvolvimento</span></div>Título do Card</div><div class=\"ui tiny progress success\"><div class=\"bar\" style=\"transition-duration: 300ms; width: 0%;\"></div><div class=\"label\"><small>Data Prevista: 12/02/2017 à 15/02/2017 (3 dias)</small></div></div></div><div class=\"extra content\"><span class=\"left float\"><i class=\"small attach icon\"></i><i class=\"small comment outline icon\"></i></span><div class=\"right floated author\"><img alt=\"Jeferson Silveira - Responsável\"  title=\"Jeferson Silveira - Responsável\" class=\"ui tiny avatar image\" src=\"https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png\"></div></div></div></div></div></div>");
    });
    $("#addButtons2").on("click", function() {
      $board.append("<div class=\"list-wrapper\"><div class=\"list\"><div class=\"list-header campoEditavel\"><span class=\"cabecalho-wrapper\">Adicionar nova lista</span></span></div><div class=\"list-cards sortable drop\" id=\"lista" + (++countLista) + "\"></div><div class=\"open-card-composer\"><a class=\"open-card-composer\" id=\"addButtons\" href=\"#\">Adicionar um cartão...</a></div></div></div>");
    });
    //$("#target").html("<new elements here>")

    </script>
    <script src="js/kanban-trace.min.js" type="text/javascript"></script>
    <br style="clear:both">
  </body>
</html>
