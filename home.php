<?php
// memuat halaman json
//testting kedua
$data = file_get_contents("https://ftisunpar.github.io/data/prasyarat.json");


// parse / uraikan data 
$parsedata = json_decode($data);

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekomendasi Mata Kuliah Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <nav class="navbar sticky-top navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recommendation</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container p-3">
        <?php
        for ($j = 1; $j <= 8; $j++) {

        ?>


            <div class="container bg-white mb-3 rounded">

                <h2>Semester <?php echo $j ?></h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">Jumlah SKS</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < count($parsedata); $i++) {

                        ?>
                            <?php
                            if ($parsedata[$i]->semester === $j) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $parsedata[$i]->kode; ?></td>

                                    <td> <?php echo $parsedata[$i]->nama; ?></td>
                                    <td> <?php echo $parsedata[$i]->sks; ?></td>
                                    <td> <?php
                                            if ($parsedata[$i]->wajib === true) {
                                                echo "wajib";
                                            } else {
                                                echo "Pilihan";
                                            }

                                            ?>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Detail
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Mata Kuliah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <h2>Kode Mata kuliah</h2>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <div class="p-2">
                                                                <h3>Nama Mata kuliah</h3>
                                                            </div>
                                                            <div class="ms-auto p-2">
                                                                <h3>wajib/pilihan</h3>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <h4>Prasayrat Mata Kuliah</h4>
                                                            <p>Tempuh:</p>
                                                            <p>Bersamaan:</p>
                                                            <p>Lulus:</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end -->
                                        <script>
                                            $(function() {
                                                // ON SELECTING ROW
                                                $(".btn").click(function() {
                                                    //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                                                    var a =
                                                        $(this).parents("tr").find(".gfgusername").text();
                                                   
                                                    // CREATING DATA TO SHOW ON MODEL
                                                    p +=
                                                        "<p id='a' name='GFGusername' >GFG UserHandle: " +
                                                        a + " </p>";

                                                    p +=
                                                        "<p id='c' name='GFGpp'>Practice Problems: " +
                                                        c + "</p>";
                                                    p +=
                                                        "<p id='d' name='GFGscores' >Coding Score: " +
                                                        d + " </p>";
                                                    p +=
                                                        "<p id='e' name='GFGcoding' >GFG Article: " +
                                                        e + " </p>";
                                                    //CLEARING THE PREFILLED DATA
                                                    $("#divGFG").empty();
                                                    //WRITING THE DATA ON MODEL
                                                    $("#divGFG").append(p);
                                                });
                                            });
                                        </script>

                                    </td>
                                </tr>

                            <?php
                            }

                            ?>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }

        ?>

    </div>





    <script>
        var data = <?php echo $data; ?>;
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>