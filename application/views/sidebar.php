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