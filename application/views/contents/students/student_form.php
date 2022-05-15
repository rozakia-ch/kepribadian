<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active">Form Siswa</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>Student/<?= isset($student) ? 'edit' : 'add' ?>" method="post">
              <input type="hidden" name="id" value="<?= isset($student) ? $student->id : '' ?>">
              <input type="hidden" name="id_user" value="<?= isset($student) ? $student->id_user : '' ?>">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="inputName">Nama</label>
                      <input type="text" name="name" class="form-control" id="inputName" placeholder="Nama" value="<?= isset($student) ? $student->nama_siswa : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputUsername">Username</label>
                      <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="<?= isset($student) ? $student->username : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputUsername">Usia</label>
                      <input type="number" name="age" class="form-control" id="inputUsisa" placeholder="Usia" value="<?= isset($student) ? $student->usia : '' ?>">
                    </div>
                  </div>
                  <div class="col ml-4">
                    <div class="form-group">
                      <label for="inputGender">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="L" <?php if (isset($student)) echo $student->jenis_kelamin == 'L' ? 'checked' : '' ?>>
                        <label class="form-check-label">Laki-laki</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="P" <?php if (isset($student)) echo $student->jenis_kelamin == 'P' ? 'checked' : '' ?>>
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Sekolah</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="school" value="Negeri" <?php if (isset($student)) echo $student->sekolah == 'Negeri' ? 'checked' : '' ?>>
                        <label class="form-check-label">Negeri</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="school" value="Swasta" <?php if (isset($student)) echo $student->sekolah == 'Swasta' ? 'checked' : '' ?>>
                        <label class="form-check-label">Swasta</label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>