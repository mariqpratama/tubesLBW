<?php
// memuat halaman json
$data1 = file_get_contents("https://ftisunpar.github.io/data/prasyarat.json");


// parse / uraikan data 
$parsedata = json_decode($data1);

?>

<div class="container p-3">
  <div class="container bg-white mb-3 rounded p-3">
    <h2>Data Anda Belum Tersedia Pada Sistem</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Masukan Data
    </button>


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
      Masukan Data Mata Kuliah
    </button>


    <ul class="list-group mt-4">
      <?php foreach($data['matkul'] as $mat) : ?>
        <li class="list-group-item">
          <?= $mat['kodeMK']; ?>&emsp;
          <?= $mat['namaMK']; ?>&emsp;
          <?= $mat['statusMK']; ?>
        </li>
        <?php endforeach; ?>
    </ul>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Mata Kuliah</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="<?= BASEURL; ?>/rekomendasi/tambah" method="post">
                  <div class="d-flex">
                      <input type="text" id="kodeMK" name="kodeMK" placeholder="Kode Mata Kuliah" class="form-control">&emsp;
                      <input type="text" id="namaMK" name="namaMK" placeholder="Nama Mata Kuliah" class="form-control">&emsp;
                      <input type="text" id="statusMK" name="statusMK" placeholder="Status Mata Kuliah (Lulus/Tempuh)" class="form-control">
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown button
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Lulus</a></li>
                          <li><a class="dropdown-item" href="#">Tempuh</a></li>
                        </ul>
                      </div> -->
                  </div>
                  <br>
                  <div>
                    <button class="btn btn-primary" type="submit">
                      Save
                    </button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Mata Kuliah</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="d-flex flex-row">
                  <div class="container">
                    <p>Semester yang sedang di tempuh :</p>
                  </div>
                  <div class="ms-auto container">
                    <div class="btn-group">
                      <select class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                        <option value="" selected disabled hidden>Pilih Disini</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                      </select>
                    </div>
                  </div>
                </div>
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
                          <th scope="col">Status</th>
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
                              <td class=" kode"><?php echo $parsedata[$i]->kode; ?></td>
                              <td class="nama"> <?php echo $parsedata[$i]->nama; ?></td>
                              <td>
                                <div class="btn-group">
                                  <select class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                    <option value="" selected disabled hidden>Pilih Disini</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="tempuh">Tempuh</option>
                                    <option value="belum">Belum Tempuh</option>
                                  </select>
                                </div>
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
              <div class="row justify-content-end" id="btnSaveRecord">
                <div class="col-auto">
                  <button type="button" class="btn btn-info text-white" type="submit">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="container bg-white mb-3 rounded">
    <h2>Daftar Mata Kuliah Rekomendasi Untuk Semester #</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Kode Mata Kuliah</th>
          <th scope="col">Nama Mata Kuliah</th>
          <th scope="col">Jumlah SKS</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>kode</td>
          <td>mk</td>
          <td>sks</td>
          <td>@keterangan</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>