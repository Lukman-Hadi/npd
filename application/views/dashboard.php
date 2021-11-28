    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
              <h6 class="h2 text-white d-inline-block mb-0"></h6>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats pb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Dana</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= number_format(jumlahDana(), 2, ',', '.') ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats pb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Yang Sudah Dicairkan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= number_format(jumlahPencairan(), 2, ',', '.') ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats pb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pencairan Bulan Ini</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= number_format(jumlahPencairanBulanIni(), 2, ',', '.') ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats pb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pencairan</h5>
                      <span class="h2 font-weight-bold mb-0"><?= totalPencairan() ?> Pencairan</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-lg-8">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Overview PPTK</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nama PPTK</th>
                    <th scope="col" class="sort" data-sort="budget">Bidang</th>
                    <th scope="col" class="sort" data-sort="status">Total Pencairan</th>
                    <th scope="col">Jumlah Pencairan</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php foreach($dataPPTK as $d){ ?>
                    <tr>
                      <th scope="row">
                        <?= $d->nama_pptk ?>
                      </th>
                      <td class="budget">
                      <?= $d->nama_bidang ?>
                      </td>
                      <td>
                      Rp. <?= number_format($d->total) ?>
                      </td>
                      <td>
                      <?= $d->jumlah ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Pencairan</h6>
                  <h5 class="h3 mb-0">Jumlah Pencairan Per Bulan</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bulan" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>