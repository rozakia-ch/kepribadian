<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jumlah data: <?= $count_all ?></h3>

              <div class="card-tools">

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px">
              <table class="table table-head-fixed">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Sekolah</th>
                    <th>Jawaban A</th>
                    <th>Jawaban B</th>
                    <th>Jawaban C</th>
                    <th>Jawaban D</th>
                    <th>Kelas Hasil</th>
                    <th>Id rule</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row->nama_siswa . "</td>";
                    echo "<td>" . $row->jenis_kelamin . "</td>";
                    echo "<td>" . $row->usia . "</td>";
                    echo "<td>" . $row->sekolah . "</td>";
                    echo "<td>" . $row->jawaban_a . "</td>";
                    echo "<td>" . $row->jawaban_b . "</td>";
                    echo "<td>" . $row->jawaban_c . "</td>";
                    echo "<td>" . $row->jawaban_d . "</td>";
                    echo "<td>" . $row->kelas_hasil . "</td>";
                    echo "<td>" . $row->id_rule . "</td>";
                    echo "</tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>