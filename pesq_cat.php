<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel = "shortcut icon" type = "image/x-icon" href = "img/favicon.ico "/>
    <?php $categoria = $_GET['cat']; ?>
    <title>Pesquisa <?php echo $categoria; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <?php
        require_once "engine/config.php";
    ?>
</head>

<body style="background-image: url(img/background.jpg);	background-size: cover; background-repeat: o-repeat;"">

<nav class="navbar fixed-top navbar-expand-lg navbar-dark purple darken-3" [containerInside]="false">

    <a class="navbar-brand" href="index.php"><i class="fa fa-film"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <?php   
                $Genere = new Genere();
                $Genere = $Genere->ReadAll();
            ?>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                <div class="dropdown-menu dropdown dropdown-primary" style="background: #6a1b9a ;" aria-labelledby="navbarDropdownMenuLink">

                <a class="nav-link" href="Index.php">Todas <span class="sr-only"></span></a>
                <?php foreach($Genere as $genere){ ?>
                <a class="nav-link" href="categorias.php?categoria=<?php echo $genere['genere']; ?>"><?php echo $genere['genere']; ?></a> <?php } ?>
                
                </div>
            </li>

        </ul>
  		<ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" data-toggle="modal" data-target="#basicExample"><i class="fa fa-plus"></i> Filme</a>
                        </li>
                        <li class="nav-item waves-light">
                            <a class="nav-link waves-effect waves-light" href="mais_categorias.php"><i class="fa fa-plus"></i> Categoria</a>
                        </li>
                    </ul>
   				 </div>
    <!-- Collapsible content -->
		</nav>
<!--/.Navbar-->



<br>
<!--Modal: Contact form-->
<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header purple darken-3 white-text">
                <h4 class="title"><i class="fa fa-film"></i> Adicionar Filme</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
                <div class="md-form form-sm">
                    <i class="fa fa-film prefix"></i>
                    <input type="text" id="title" class="form-control">
                    <label for="form19">Nome</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fa fa-calendar-o prefix"></i>
                    <input type="text" id="ano" class="form-control">
                    <label for="form20">Ano</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fa fa-tag prefix"></i>
                    <input type="number" id="nota" class="form-control">
                    <label for="form21">Nota</label>
                </div>

                <div class="md-form form-sm">
                <span>Categoria</span>
                  <select class="form-control" name="funcionarioresp" id="fk_categoria">
                    <option value="" selected disabled>Selecione...</option>
                        <?php
                        $Genere = new Genere();
                        $Genere = $Genere->ReadAll();
                        foreach ($Genere as $genere) {
                            ?>
                           <option value="<?php echo $genere['id_genere']; ?>"><?php echo $genere['genere']; ?></option>
                        <?php 
                            }
                        ?>
                  </select>
                </div>

                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <textarea type="text" id="sinopse" class="md-textarea mb-0"></textarea>
                    <label for="form8">Sinopse</label>
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-purple mb-2" id="Adicionar">Adicionar <i class="fa fa-plus ml-1"></i></button>
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Contact form-->


<div id="loader" style="min-height: 600px;">


<div class="container">
  <br><br>
  <h1 class="text-center animated pulse infinite">Pesquisa <?php echo $categoria; ?></h1>
  <br>

<div class="row container">
  <div class="col-md-3">
    <div class="card animated bounceInDown">
        <form class="form-inline" style="margin-left: 10px">

        <div class="md-form form-group">
            <input type="text" id="pesq" class="form-control" placeholder="Pesquise um Titulo . . .">
            <BUTTON disabled style="opacity: 0" id="PEsquisar" ><i class="fa fa-film"></i></BUTTON>
        </div>
        </form>
    </div>
  </div>
</div>

<?php

  $Movie = new Movie();
  $Movie = $Movie->pesq_cat($_GET['pesq'], $categoria);
    
  if(empty($Movie)) {
?>

    <h4 class="well"> Nenhum dado encontrado. </h4>
    <?php
    } else {
    ?>

  <div class="row">
    <?php
        foreach($Movie as $movie){
    ?>
    <div class="col-md-4">
	    <div class="card animated rubberBand" style="width: 22rem; margin-top: 15px;">
		    <h4 class="card-header purple darken-4 white-text"><?php echo $movie['genere']; ?></h4>
		    <div class="card-body">
		        <h4 class="card-title"><?php echo $movie['title']; ?></h4> 
		        <p class="card-text" style="text-align: justify;"> <?php echo $movie['sinopse']; ?></p>
                <p class="mb-0">Ano: <?php echo $movie['ano']; ?></p>
                <p class="mb-0">Nota: <?php echo $movie['nota']; ?></p>
		    </div>
		    
            <p class="text-center">
            <a href="editar.php?id=<?php echo $movie['id_movie']; ?>" style="color: green;">Editar</a> 
            <a class="delete" style="color: red;" id="<?php echo $movie['id_movie']; ?>">Excluir</a>
            </p>
            
		</div>
    </div>

    <?php
            }
        }
    ?>

  </div>
<br>


</div>
</div>
  <!--Footer-->
<footer class="page-footer purple darken-3 center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Contato</h5>
                <p>Mande um email para gduraes10@gmail.com</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title">Social</h5>
                <ul >
                    <li style="display: inline-block;"><a target="_blank" href="https://www.facebook.com/duraesgabriel"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li style="display: inline-block;"><a target="_blank" href="https://www.instagram.com/duraesgd/?hl=pt-br"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li style="display: inline-block;"><a target="_blank" href="https://www.linkedin.com/in/gabriel-durães-2a9189104/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
        <p> &copy; <script>document.write(new Date().getFullYear())</script> Powered By <a href="">Gabriel Durães</a></p>
        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(e) {             
        $('#Adicionar').click(function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var ano = $('#ano').val();
            var nota = $('#nota').val();
            var fk_categoria = $('#fk_categoria').val();
            var sinopse = $('#sinopse').val(); 

            if(title ==="" || ano ==="" || nota ==="" || fk_categoria ==="" || sinopse ===""){
                alert("Prencha todos os campos!");
            }else{
                $.ajax({
                       url: 'engine/controllers/movie.php',
                       data: {
                                title : title,
                                ano : ano,
                                nota : nota,
                                sinopse : sinopse,
                                fk_categoria : fk_categoria,

                                action: 'create'
                       },
                       error: function() {
                            alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
                       },
                       success: function(data) {
                           console.log(data);
                            if(data === 'true'){
                                alert('Filme Adicionado com sucesso!');
                                location.reload();
                            }

                            else{
                                alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
                            }
                       },

                       type: 'POST'
                    });
            }
            
        });

        $('.delete').click(function(e) { 
            e.preventDefault();
            var id = $(this).attr('id');
            var r = confirm("Deseja apagar este filme?");
            if (r == true) {
            $.ajax({
                       url: 'engine/controllers/movie.php',
                       data: {
                                id_movie : id,

                                action: 'delete'
                       },
                       error: function() {
                            alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
                       },
                       success: function(data) {
                           console.log(data);
                            if(data === 'true'){
                                alert('Filme Deletado!');
                                location.reload();
                            }

                            else{
                                alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
                            }
                       },

                       type: 'POST'
                    });
            }
        });

    $('#pesq').keypress(function (e) {
        var key = e.which;
        if(key == 13){
          $('#PEsquisar').click();
          return true;  
        }
   });

  $('#PEsquisar').click(function(e) {
      e.preventDefault();
      var pesq = $('#pesq').val();
      if(pesq ==""){
        alert('Preencha algo . . .');
      }else{
      window.location = "pesq_cat.php?pesq="+pesq+"&cat=<?php echo $categoria; ?>"; 
      }
  });

    });

</script>
</body>

</html>
