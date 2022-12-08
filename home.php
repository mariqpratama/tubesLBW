<?php
// memuat halaman json
$data = file_get_contents("https://ftisunpar.github.io/data/prasyarat.json");


// parse / uraikan data 
$parsedata = json_decode($data);

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekomendasi Mata Kuliah Informatika</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        #container1 {
            border: 1px solid gainsboro;
            border-radius: 16px;
            margin: auto;
            padding: 20px;
            box-shadow: 5px 8px #888888;
        }
    </style>

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
                                    <td class="tempuh" style="display:none;">
                                        ~
                                        <?php
                                        foreach ($parsedata[$i]->prasyarat->tempuh as $syarat) {
                                            for ($k = 0; $k < count($parsedata); $k++) {
                                                if ($parsedata[$k]->kode === $syarat) {
                                                    echo $parsedata[$k]->nama;
                                                }
                                            }
                                        ?> ~ <?php
                                                ?>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="lulus" style="display:none;">
                                        ~
                                        <?php
                                        foreach ($parsedata[$i]->prasyarat->lulus as $syarat) {
                                            for ($k = 0; $k < count($parsedata); $k++) {
                                                if ($parsedata[$k]->kode === $syarat) {
                                                    echo $parsedata[$k]->nama;
                                                }
                                            }
                                        ?> ~ <?php
                                                ?>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="bersamaan" style="display:none;">
                                        ~
                                        <?php
                                        foreach ($parsedata[$i]->prasyarat->bersamaan as $syarat) {
                                            for ($k = 0; $k < count($parsedata); $k++) {
                                                if ($parsedata[$k]->kode === $syarat) {
                                                    echo $parsedata[$k]->nama;
                                                }
                                            }
                                        ?> ~ <?php
                                                ?>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class=" kode"><?php echo $parsedata[$i]->kode; ?></td>

                                    <td class="nama"> <?php echo $parsedata[$i]->nama; ?></td>
                                    <td> <?php echo $parsedata[$i]->sks; ?></td>
                                    <td class="wajib"> <?php
                                                        if ($parsedata[$i]->wajib === true) {
                                                            echo "wajib";
                                                        } else {
                                                            echo "Pilihan";
                                                        }

                                                        ?>
                                    </td>
                                    <td>

                                        <button class="btn btn-primary " data-toggle="modal" data-target="#gfgmodal">
                                            Detail</button>




                                        <!-- modal -->
                                        <script>
                                            $(function() {
                                                // ON SELECTING ROW
                                                $(".btn").click(function() {
                                                    //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                                                    var a =
                                                        $(this).parents("tr").find(".kode").text();
                                                    var c =
                                                        $(this).parents("tr").find(".nama").text();
                                                    var d =
                                                        $(this).parents("tr").find(".wajib").text();
                                                    var e =
                                                        $(this).parents("tr").find(".tempuh").text();
                                                    var f =
                                                        $(this).parents("tr").find(".lulus").text();
                                                    var g =
                                                        $(this).parents("tr").find(".bersamaan").text();

                                                    //CLEARING THE PREFILLED DATA
                                                    $("#kodeM").empty();
                                                    //WRITING THE DATA ON MODEL
                                                    $("#kodeM").append(a);

                                                    $("#namaM").empty();
                                                    $("#namaM").append(c);
                                                    $("#wajibM").empty();
                                                    $("#wajibM").append(d);


                                                    $("#tempuhM").empty();
                                                    $("#tempuhM").append(e);
                                                    $("#lulusM").empty();
                                                    $("#lulusM").append(f);
                                                    $("#bersamaanM").empty();
                                                    $("#bersamaanM").append(g);
                                                });
                                            });
                                        </script>
                                        <!-- CREATING BOOTSTRAP MODEL -->
                                        <div class="modal fade" id="gfgmodal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- MODEL TITLE -->
                                                        <h2 class="modal-title" id="gfgmodallabel">
                                                            Detail Mata Kuliah</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">
                                                                ×</span>
                                                        </button>
                                                    </div>
                                                    <!-- MODEL BODY -->
                                                    <div class="modal-body">
                                                        <!-- <div class="GFGclass" id="divGFG"></div> -->




                                                        <div class="modal-body">
                                                            <div class="w3-container" id="container1">
                                                                <h2 style="text-align: center;">Kode Mata kuliah</h2>
                                                                <div class="GFGclass" id="kodeM" style="text-align: center;"></div>
                                                            </div>
                                                            <br>
                                                            <div class="d-flex mb-3" id="container1">
                                                                <div class="p-2">
                                                                    <h3 style="text-align: center;">Nama Mata kuliah</h3>
                                                                    <div style="text-align: center;" class="GFGclass" id="namaM"></div>

                                                                </div>

                                                                <div class="ms-auto p-2" style="text-align: center;">
                                                                    <h3>wajib/pilihan</h3>
                                                                    <div class="GFGclass" id="wajibM"></div>

                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="container" id="container1">
                                                                <h4 style="text-align: center;">Prasayrat Mata Kuliah</h4>
                                                                <br>
                                                                <p>Tempuh:</p>
                                                                <div class="GFGclass" id="tempuhM"></div>
                                                                <br>
                                                                <p>Bersamaan:</p>
                                                                <div class="GFGclass" id="bersamaanM"></div>
                                                                <br>
                                                                <p>Lulus:</p>
                                                                <div class="GFGclass" id="lulusM"></div>

                                                            </div>
                                                        </div>



                                                        <div class="modal-footer">
                                                            <!-- The close button in the bottom of the modal -->
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                Close</button> -->
                                                            <p>Detail Mata Kuliah Sesuai Kurikulum Jurusan Informatika 2018 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- end modal  -->

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