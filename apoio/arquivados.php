
<link href="../css/sb-admin.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="https://www.urcamp.edu.br/"><img class="logo-home" src="../img/logo-branco.png"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form action="pesquisa.php" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <input type="text" name="texto-pesquisa" class="form-control" placeholder="Procurar por..." aria-label="Search" aria-describedby="basic-addon2">
        <input type="submit" class="btn btn-primary" value="Procurar">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">

            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <div class="admin-perfil">
                <div class="box-ft">
                </div>
                <div class="admin-descricao">
                    <span class="des-nome">
                        Nome teste
                    </span>
                    <span class="des-legenda">
                        legenda teste
                    </span>
                </div>
            </div>
            <a class="nav-link" href="https://www.urcamp.edu.br/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <!--  
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
  -->
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.html">Login</a>
                <a class="dropdown-item" href="register.html">Register</a>
                <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item" href="blank.html">Blank Page</a>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="admin.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Entrada</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="arquivados.php">
                <i class="fas fa-fw fa-table"></i>
                <span class="tab-selected">Arquivadas</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="excluidos.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Lixo</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Sair</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <!--
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li> 
                    -->
                    <li class="breadcrumb-item active">Arquivadas</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Assunto</th>
                                    <th>Sugestão</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th class="th-tb">Anexo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
$conexao = "host=localhost dbname=sug-base port=5432 user=postgres password=postgres";
$db = pg_connect($conexao); // aqui ele executa a conexão com o DNS da variavel $conexao

$query = "select * from sugestao";
$resultado = pg_query($db, $query); // Executa a query $query na conexão $db

while ($linha = pg_fetch_array($resultado)) { //aqui troquei para arrays, este loop declara a variavel $linha (ela representa o resultado da query), e o loop lê linha a linha do retorno
    // Escreve na página o retorno para cada registro trazido pela query
    $boo = $linha['arquivado'];
    if ($boo != "f") { 
        
        $id = $linha['id'];
        $a = $linha['assunto'];
        $s = $linha['sugestao'];
        $n = $linha['nome_pessoa'];
        $e = $linha['email'];
        $i = '../' . $linha['imagem'];

        echo " <tr>
              <td>{$id}</td>
              <td>{$a}</td>
              <td>{$s}</td>
              <td>{$n}</td>
              <td>{$e}</td>
              
              <td class=\"td-img-tb\"> <img class=\"img-table\" src=\"{$i}\">
              </td>

              <td class=\"td-ex-tb\">

                    <a class=\"a-acao -e\" href=\"../index.php?pagina=SugestaoController&acao=excluir&id={$id}&origem=arquivados\">
                    
                    </a>

              </td>
              </tr> ";
    } else {
        continue;
    }
    pg_close($db); // Fecha a conexão com a $db
}
?>