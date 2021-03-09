<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
          <img src="<?= base_url() ?>/assets/admin/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <?php 
            $menu = $this->menu_model->getMenus($this->session->userdata('id_jabatan'));
            foreach($menu->result() as $row):
              $submenu = $this->menu_model->getSubMenus($this->session->userdata('id_jabatan'),$row->_id);
              if($submenu->num_rows()>0){?>
              <li class="nav-item">
              <a class="nav-link" href="#<?=$row->link ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?=$row->link ?>">
                <i class="<?= $row->icon;?>"></i>
                <span class="nav-link-text"><?= $row->judul;?></span>
              </a>
              <div class="collapse" id="<?=$row->link ?>">
                <ul class="nav nav-sm flex-column">
                <?php foreach ($submenu->result() as $sub) :?>
                  <li class="nav-item">
                    <a href="<?= base_url($sub->link) ?>" class="nav-link"><i class="<?= $sub->icon;?>"></i><?= $sub->judul;?></a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </div>
              </li>
              <?php }else{ ?>
                <li class="nav-item">
                <a class="nav-link" href="<?= base_url($row->link) ?>">
                <i class="<?= $row->icon;?>"></i>
                <span class="nav-link-text"><?= $row->judul;?></span>
              </a>
            </li>
              <?php } endforeach;?>
            </ul>
          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-business" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-business">
                <i class="fa fa-sitemap text-red"></i>
                <span class="nav-link-text">Master Proses</span>
              </a>
              <div class="collapse" id="navbar-business">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>proses" class="nav-link">Data Progress</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>kegiatan" class="nav-link">Alur Bisnis</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>proses/menu" class="nav-link">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>rekening" class="nav-link">Hak Akses Menu</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-single-copy-04 text-orange"></i>
                <span class="nav-link-text">Master Data</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>program" class="nav-link">Program</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>kegiatan" class="nav-link">Kegiatan</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>subkegiatan" class="nav-link">Sub Kegiatan</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>rekening" class="nav-link">Rekening Kegiatan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                <i class="fa fa-users text-info"></i>
                <span class="nav-link-text">Master Pengguna</span>
              </a>
              <div class="collapse" id="navbar-components">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>bidang" class="nav-link">Bidang</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>jabatan" class="nav-link">Jabatan</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>user" class="nav-link">Pegawai</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                <i class="ni ni-single-copy-04 text-pink"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
              <div class="collapse" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>transaksi" class="nav-link">Entry Pengajuan Baru</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>transaksi/listpengajuan" class="nav-link active">Daftar Pengajuan</a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/forms/validation.html" class="nav-link">Validation</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
              <div class="collapse" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="./pages/tables/tables.html" class="nav-link">Tables</a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/tables/sortable.html" class="nav-link">Sortable</a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/tables/datatables.html" class="nav-link">Datatables</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Maps</span>
              </a>
              <div class="collapse" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="./pages/maps/google.html" class="nav-link">Google</a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/maps/vector.html" class="nav-link">Vector</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/widgets.html">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Widgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/charts.html">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/calendar.html">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">Calendar</span>
              </a>
            </li>
          </ul> -->
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- <h6 class="navbar-heading p-0 text-muted">Documentation</h6> -->
          <!-- Navigation -->
          <!-- <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
          </ul> -->
        </div>
      </div>
    </div>
  </nav>