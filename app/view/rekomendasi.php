
      <div class="container p-3">
        <div class="container bg-white mb-3 rounded p-3">
            <h2>Data Anda Belum Tersedia Pada Sistem</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Masukan Data
              </button>
              
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
                            <div class="d-flex">
                                <input type="text" placeholder="Kode Mata Kuliah">
                            <input type="text" placeholder="Nama Mata Kuliah">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown button
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Lulus</a></li>
                                  <li><a class="dropdown-item" href="#">Tempuh</a></li>
                                </ul>
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
    
