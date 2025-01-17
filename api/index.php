<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <center>
        <div class="container col-12">
            <h1>Employee's live search</h1>
            <div class="mb-3">
                <input type="text" class="form-control w-100" name="live_search" id="live_search" autocomplete="off" placeholder="Search an employee..." />
                <small id="helpId" class="form-text text-muted"></small>
            </div>

        </div>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="container" id="searchresult"></div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary col-12" id="loadFav">Cargar favoritos</button>
                <div class="container" id="fav"></div>
            </div>
        </div>
    </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();

                if (input != "") {
                    $.ajax({
                        url: "src/query/livesearch.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                        },
                        error: function() {
                            console.log('Error al obtener los datos.');
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            });

            // Agrega un intervalo para actualizar cada 5 segundos
            setInterval(function() {
                $("#live_search").trigger("keyup");
            }, 500);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#loadFav').click(function() {
                // Realiza la petición AJAX cada 5 segundos
                setInterval(function() {
                    $.ajax({
                        url: 'src/query/readEOTM.php',
                        method: 'GET',
                        success: function(response) {
                            $('#fav').html(response);
                        },
                        error: function() {
                            alert('Error al cargar empleados del mes.');
                        }
                    });
                }, 500); // Intervalo de 5000 milisegundos (5 segundos)
            });
        });
    </script>
</body>

</html>