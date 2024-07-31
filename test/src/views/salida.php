
<?php 
    use MyApp\data\Database;
    require("../../vendor/autoload.php");

    $db = new Database;

    error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['txtbusca'])){
    $busqueda = $_POST['txtbusca'];

    $api_key = '8efb52d2';
$url = "http://www.omdbapi.com/?apikey=$api_key&s=$busqueda";
$response = file_get_contents($url);

$data = json_decode($response, true);
$search_info = $data['Search'];

if(!empty($search_info)){
$html='';
foreach ($search_info as $item) {
$html.='
<div class="col-sm-6 col-12 col-md-3 col-lg-3">

<div class="card">


  <img src="'.  $item['Poster'] .'" class="card-img-top" alt="...">

  <div class="card-body">
    <h5 class="card-title">  
    '.  $item['Title'] .'
    </h5>


<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label"> Año: </label>
  <input type="text" name="ano" value=" '.  $item['Year'] .' "  class="form-control" id="floatingInputDisabled" disabled placeholder="Example input placeholder">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">imdbID:</label>
  <input type="text"  name="imdbid" value="'.  $item['imdbID'] .'" class="form-control" id="floatingInputDisabled" disabled placeholder="Another input placeholder">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2"  class="form-label" >Tipo:</label>
  <input type="text"  name="tipo" value="'.  $item['Type'] .'" class="form-control" id="floatingInputDisabled" disabled placeholder="Another input placeholder">
</div>

<center>
<button class="btn btn-primary add-to-favorites" 
                            data-imdb-id="'.  $item['imdbID'] .'"
                            data-title="'.  $item['Title'] .'>"
                            data-year="'.  $item['Year'] .'"
                            data-type="'.  $item['Type'] .'"
                            data-poster="'.  $item['Poster'] .'">Añadir a favoritos
</button>
</center>


</div>



 </div>
 </div>


 
';
}



?>
<script>
    $(document).ready(function(){
        $('.add-to-favorites').click(function(){
            var imdbID = $(this).data('imdb-id');
            var title = $(this).data('title');
            var year = $(this).data('year');
            var type = $(this).data('type');
            var poster = $(this).data('poster');
            
            $.ajax({
                url: '/test/src/query/add_fav.php',
                method: 'POST',
                data: {title: title, year: year, type: type, imdb_id: imdbID, poster: poster},
                success: function(response){
                    alert('Película añadida a favoritos');
                }
            });
        });
    });
</script>

<?php 
 echo $html;
}
else{ echo '<center><h5>No se han encontrado resultados</h5></center>  ';}
}  //condicion si el evento fue enviado


else{
    echo 'error';
}



 ?>

