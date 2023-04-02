<?php include 'conexion.php' ?>

<?php
$cantidad = 0;
$query = "SELECT * FROM datospozos";
$stmt = $conn->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <!--  Datatables Responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Informacion de Pozo</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="./datosPozos/assets/pdvsa-logo.png" class="rounded mx-auto d-block" alt="" srcset="">
            </a>
            <form class="d-flex" role="search">
                <select class="form-select me-2" aria-label="Search">
                    <option selected>San José</option>
                    <option value="1">San Julian</option>
                    <option value="2">Other option</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="./datosPozos/assets/petroleum1.jpg" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <div class="container">
                    <br>
                    <table id="pozos" class="table table-stripe table-hover" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Government Number</th>
                                <th scope="col">Utm x</th>
                                <th scope="col">Utm y </th>
                                <th scope="col">End Date</th>
                                <th scope="col">Name of Rig</th>
                                <th scope="col">Elevation</th>
                                <th scope="col">Ground Elevation</th>
                                <th scope="col">Surface Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registros as $fila) : ?>
                                <?php $cantidad = $cantidad + 1 ?>
                                <tr>
                                    <td><?php echo $fila->GovernmentNumber ?></td>
                                    <td><?php echo $fila->Utmx ?></td>
                                    <td><?php echo $fila->Utmy ?></td>
                                    <td><?php echo $fila->EndDate ?></td>
                                    <td><?php echo $fila->NameRig ?></td>
                                    <td><?php echo $fila->Elevation ?></td>
                                    <td><?php echo $fila->GroundElevation ?></td>
                                    <td><?php echo $fila->SurfaceLocation ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- <div class="col float-start">
                <div class="card text-bg-danger">
                    <div class="card-body" style="background-color:#BF0A30">
                        <h5 class="card-title">Configuración de Parámetros</h5>
                        <p class="card-text">Falta algo en el registro? Actualizalo aca</p>
                        <a class="btn btn-primary" id="#">Ver Más </a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col float-start">
                <div class="card text-bg-danger">
                    <div class="card-body" style="background-color:#BF0A30">
                        <h5 class="card-title">Ubicación</h5>
                        <p class="card-text">Ubicar campo en el mapa</p>
                        <a href="historia.html" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div> -->
            <div class="col float-start">
                <div class="card text-bg-danger">
                    <div class="card-body" style="background-color:#BF0A30">
                        <h5 class="card-title">Historia</h5>
                        <p class="card-text">Revisa la historia de cada uno de los pozos, organizados por campos</p>
                        <a href="historia.html" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div>
            <div class="col float-start">
                <div class="card text-bg-danger">
                    <div class="card-body" style="background-color:#BF0A30">
                        <h5 class="card-title">Acerca de la Empresa</h5>
                        <p class="card-text">Nos enfocamos en la exploración, producción y comercialización de hidrocarburos </p>
                        <a class="btn btn-primary" id="openModalBtn">Ver Más </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Quiénes somos?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-6">Petroperija es una empresa estatal venezolana de petróleo y gas que opera en la región occidental del país. Fue fundada en 1997 y se centra en actividades de exploración, producción y refinación.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col float-start">
                <div class="card text-bg-danger">
                    <div class="card-body" style="background-color:#BF0A30">
                        <h5 class="card-title">Otros Recursos</h5>
                        <p class="card-text">Conoce mas acerca de la empresa, y revisa material de interes</p>
                        <a href="http://www.pdvsa.com/index.php?lang=es" target="_blank" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <script>
        // Open modal on button click
        $("#openModalBtn").click(function() {
            $("#myModal").modal("show");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <!-- Datatables responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pozos').DataTable({
                responsive: true
            });
        });
    </script>

</body>



</html>