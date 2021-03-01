<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0"> Toggles</h3>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Proses</th>
                                <th width="10%">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach ($menus as $menu){
                            echo "<tr>
                                    <td>
                                        $no
                                    </td>
                                    <td>
                                        <b>$menu->nama_progress</b>
                                    </td>
                                    <td>
                                        <label class='custom-toggle'>
                                            <input type='checkbox'". checked_privilege($this->uri->segment(3), $menu->_id)."onClick='kasi_akses($menu->_id)' id='t$no'>
                                            <span class='custom-toggle-slider rounded-circle' data-label-off='No' data-label-on='Yes'></span>
                                        </label>
                                    </td>
                                </tr>";
                                $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function kasi_akses(id_menu){
        //alert(id_menu);
        var level = '<?= $this->uri->segment(3) ?>';
        //alert(level);
        $.ajax({
            url:"<?=base_url()?>proses/aksesProgress",
            data:"progress_id=" + id_menu + "&level="+ level
        });
    }    
</script>