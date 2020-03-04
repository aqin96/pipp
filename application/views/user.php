  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">

        <!-- Page Heading -->
        <h6 style="float: left; line-height: 40px" class="m-0 font-weight-bold text-primary">Data User</h6>
        <div style="float: right;">
          <?php if($this->session->userdata('level') == 'Superadmin') { ?>
          <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Tambah</button>
          <?php } ?>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
                <?php if($this->session->userdata('level') == 'Superadmin') { ?>
                <th></th>
                <th></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($user as $b){
              if($b->publish == 'T') $publish = 'Aktif';
              if($b->publish == 'F') $publish = 'Non-aktif';
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->nmadmin ?></td>
                <td><?php echo $b->username ?></td>
                <td><?php echo $publish ?></td>
                <?php if($this->session->userdata('level') == 'Superadmin') { ?>
                <td><button data-toggle="modal" data-target="#editModal" data-idadmin = "<?php echo $b->idadmin ?>" data-nmadmin = "<?php echo $b->nmadmin ?>" data-username = "<?php echo $b->username ?>" data-publish = "<?php echo $b->publish ?>" class="btn btn-sm btn-primary">Ubah</button></td>
                <td><button data-toggle="modal" data-target="#deleteModal" data-idadmin = "<?php echo $b->idadmin ?>" data-nmadmin = "<?php echo $b->nmadmin ?>" class="btn btn-sm btn-danger">Hapus</button></td>
                <?php } ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
<!-- End of Main Content -->

<!-- Tambah Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url() ?>Master/addUser">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" maxlength="40" class="form-control" name="nmadmin" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" maxlength="40" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" maxlength="40" class="form-control" name="password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit">Tambah</a>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url() ?>Master/editUser">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" maxlength="40" class="form-control nmadmin" name="nmadmin" required>
            <input type="hidden" maxlength="40" class="form-control idadmin" name="idadmin" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" maxlength="40" class="form-control username" name="username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" maxlength="40" class="form-control" name="password">
            <small>Kosongkan input ini jika tidak ingin mengubah password</small>
        </div>
        <div class="form-group">
            <label>Publish</label><br>
            <input type="radio" name="publish" value="T" checked> &nbsp;True&nbsp;&nbsp;&nbsp;
            <input type="radio" name="publish" value="F"> &nbsp;False<br>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit">Ubah</a>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#editModal').on('show.bs.modal', function(e) {
    var idadmin = $(e.relatedTarget).data('idadmin');
    var nmadmin = $(e.relatedTarget).data('nmadmin');
    var username = $(e.relatedTarget).data('username');
    var publish = $(e.relatedTarget).data('publish');
    $('.idadmin').val(idadmin);
    $('.nmadmin').val(nmadmin);
    $('.username').val(username);
    $("input[name=publish][value='" + publish + "']").prop("checked",true);
  });
</script>

<!-- Hapus Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url() ?>Master/deleteUser">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Yakin ingin menghapus user <b><span id="nmadmin"></span>?</b> Tekan ya untuk menghapus.</div>
      <input type="hidden" maxlength="40" class="form-control" id="idadmin" name="idadmin" required>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit">Ya</a>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#deleteModal').on('show.bs.modal', function(e) {
    var idadmin = $(e.relatedTarget).data('idadmin');
    var nmadmin = $(e.relatedTarget).data('nmadmin');
    $('#idadmin').val(idadmin);
    $('#nmadmin').text(nmadmin);
  });
</script>