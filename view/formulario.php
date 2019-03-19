
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="css-meu/form.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<div class="pag">

    <div class="pag-banner">

    </div>
    <!-- ============= inicio ÁREA INTERAÇÃO =============-->
    <div class="pag-info">



        <!-- ============= inicio INTERAÇÃO =============-->
        <div class="box-form">

            <!-- ============= inicio SUGESTÃO =============-->
            <form class="form-sugestao" method="POST" action="?pagina=SugestaoController&acao=enviar" enctype="multipart/form-data">


                <h1 class="form-title">Deixe sua sugestão</h1>

                <input class="form-item" type="text" name="txtNome" placeholder="Nome Completo" required>

                <input class="form-item" type="email" name="email" placeholder="E-mail" required>

                <label class="form-legend" for="asdf">Assunto</label>

                <select class="form-item" id="asdf" name="assunto" requrired>
                    <option value="Infraestrutura">Infraestrutura</option>
                    <option value="Atendimento">Atendimento</option>
                    <option value="Educacional">Educacional</option>
                    <option value="Curso">Curso</option>
                </select>

                <textarea class="form-textarea" type="text" name="txtSugestao" placeholder="Sugestão" required></textarea>

                <span class="form-legend">Foto</span>
                <div class="foto-area">
                    <div class="fileUpload">
                        <input type="file" name="arquivo" class="upload" />
                    </div>
                </div>
                <input class="form-submit" type="submit" value="Enviar">

            </form>






            <!-- ============= fim SUGESTÃO =============-->


        </div>
        <!-- ============= fim INTERAÇÃO =============-->
        <!--============= inicio HOME =============-->


        <div class="home">

            <div class="div-of-form">.</div>

            <div class="box-home">
                <a class="home-logo-a" href="https://www.urcamp.edu.br/"><img class="home-logo" src="img/logoUR.png"></a>

                <div class="rede">


                    <a class="home-link" href="https://pt-br.facebook.com/UrcampOficial/">
                        <img class="home-rede" src="img/facebook.png">
                    </a>
                    <a href="https://twitter.com/urcampoficial">
                        <img class="home-rede" src="img/twiter.jpg">
                    </a>
                    <a href="https://www.urcamp.tche.br/fale-conosco">
                        <img class="home-rede" src="img/faleconosco.png">
                    </a>
                    <a href="https://www.youtube.com/channel/UCGSHopmQ7ydjDV2cne_1ExA">
                        <img class="home-rede-y" src="img/youtube.png">
                    </a>

                </div>
            </div>
        </div>

        <!-- ============= fim HOME =============-->
    </div>
    <!-- ============= fim ÁREA INTERAÇÃO =============-->


</div> 