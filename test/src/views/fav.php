
<?php 
    use MyApp\data\Database;
    require("../../vendor/autoload.php");

    $db = new Database;


    $sql="SELECT * FROM `favoritos`";
    $favs= $db->seleccionarDatos($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<style>
    .barra{
    width: 100%;
  position: fixed;
  z-index: 100;
}
.text-bar{
    font-size: 14px;
    color: black;
    opacity: 1;
    font-weight: 300;
}
.sombras{
  box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-webkit-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-moz-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
}
.text-label {
  font-family: SF Pro Display,SF Pro Icons,Helvetica Neue,Helvetica,Arial,sans-serif;
  font-size: 24px;
  font-weight: 600;
  letter-spacing: .011em;
  line-height: 1.19048;
}
.text-body {
  font-family: SF Pro Text,SF Pro Icons,Helvetica Neue,Helvetica,Arial,sans-serif;
  font-size: 18px;
  font-weight: 400;
  letter-spacing: -.022em;
  line-height: 1.47059;
}
.input{
  border-radius: 15px;
  background-color: transparent;
  border: 1px solid rgba(214, 214, 214, 0.909);
}
.nav-link:hover{
  color: #0071e3 ;
}
a{
  text-decoration: none;

}
</style>




<body>

    
     <!--Barra de navegacion-->
     <nav style="padding-left: 15%; border-bottom: 1px solid #d8d8d8;     backdrop-filter: saturate(180%) blur(20px);
        background-color: rgba(255,255,255,.72);" class="barra navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a style="font-weight: 500;" class="navbar-brand" href="/test/index.php">Prueba Peliculas</a>
              <button style="border: 0px ; background-color: transparent;" class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-block d-sm-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-none d-sm-block d-md-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-none d-md-block d-lg-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                
              </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div style="margin-left: 45%;"></div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 
                  <li class="nav-item">
                    <a class="nav-link text-bar" href="/test/src/views/buscar.php">Buscar  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></a>
                  </li>
                </ul>
               
              </div>
            </div>
        </nav>
        <!--Barra de navegacion-->
<br><br>
<br><br>

<center>
<h2>Favoritos</h2>
</center>
<br>

<div class="container">
    <div class="row">


    <?php
    //acceder a datos
foreach ($favs as $item) {
    ?>

<div class="col-sm-6 col-12 col-mc-3 col-lg-3">

<div class="card">

  <img src="<?php  echo $item['imagen'] ;  ?>" class="card-img-top" alt="...">

  <div class="card-body">
    <h5 class="card-title">  
         <?php  echo $item['nombre'] ; ?>
      
    </h5>


    <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label"> Año: </label>
  <input type="text" name="ano" value=" <?php  echo $item['ano'] ;  ?>"  class="form-control" id="floatingInputDisabled" disabled placeholder="Example input placeholder">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">imdbID:</label>
  <input type="text"  name="imdbid" value=" <?php  echo $item['imdb'] ;  ?>" class="form-control" id="floatingInputDisabled" disabled placeholder="Another input placeholder">
</div>


<div class="mb-3">
  <label for="formGroupExampleInput2"  class="form-label" >Tipo:</label>
  <input type="text"  name="tipo" value="<?php  echo $item['tipo'] ; ?>" class="form-control" id="floatingInputDisabled" disabled placeholder="Another input placeholder">
</div>




<input type="hidden" name="poster" value="<?php  echo $item['imagen'] ;  ?>">
<input type="hidden" name="titulo" value="<?php  echo $item['nombre'] ;  ?>">
<input type="hidden" name="imdbid" value="<?php  echo $item['imdb'] ;  ?>">
<input type="hidden" name="ano" value="<?php  echo $item['ano'] ;  ?>">
<input type="hidden" name="tipo" value="<?php  echo $item['tipo'] ;  ?>">
<input type="hidden" name="id_fav" value="<?php  echo $item['id_fav'] ;  ?>">

   


<button class="btn btn-primary del-to-favorites" 
                            data-imdb-id="<?php echo $item['imdb']; ?>"
                            data-title="<?php echo $item['nombre']; ?>"
                            data-year="<?php echo $item['ano']; ?>"
                            data-type="<?php echo $item['tipo']; ?>"
                            data-poster="<?php echo $item['imagen']; ?>"
                            data-id_fav="<?php echo $item['id_fav']; ?>">Eliminar
</button>
  </div>
</div>





 </div>


        <?php   
    }
    ?>


    </div>
</div>






<script>
  
$(document).ready(function(){
    $('.del-to-favorites').click(function(){
        var id_fav = $(this).data('id_fav');
        var imdbID = $(this).data('imdb-id');
            var title = $(this).data('title');
            var year = $(this).data('year');
            var type = $(this).data('type');
            var poster = $(this).data('poster');
        $.ajax({
            url: '../query/del_fav.php',
            method: 'POST',
            data: {title: title, year: year, type: type, imdb_id: imdbID, poster: poster, id_fav: id_fav },
            success: function(response){
                alert('Película eliminada de favoritos');
                location.reload();
            }
        });
    });
});

</script>

</body>
</html>