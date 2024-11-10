<?php include_once('../_header.php'); ?>

<div class="container mt-5">
	<div class="box bg-light p-4 rounded shadow">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="text-primary">Rekam Medis</h1>
			<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
		</div>

		<h4 class="mb-3">
			<small class="text-muted">Data Rekam Medis</small>
			<div class="float-end">
				<a href="" class="btn btn-outline-secondary btn-sm me-2"><i class="fas fa-sync-alt"></i> Refresh</a>
				<a href="add.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Rekam Medis</a>
			</div>
		</h4>

		<form method="post" name="proses">
			<div class="table-responsive">
				<table class="table table-bordered table-hover align-middle text-center" id="rekammedis">
					<thead class="table-primary">
						<tr>
							<th>No.</th>
							<th>Tanggal Periksa</th>
							<th>Poli</th>
							<th>Nama Pasien</th>
							<th>Keluhan</th>
							<th>Nama Dokter</th>
							<th>Diagnosa</th>
							<th>Obat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$query = "SELECT * FROM tb_rekammedis
                            INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli
                            INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
                            INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
                            ORDER BY tgl_periksa DESC
                        ";
						$sql_rm = mysqli_query($con, $query) or die(mysqli_error($con));
						while ($data = mysqli_fetch_array($sql_rm)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= tgl_indo($data['tgl_periksa']); ?></td>
								<td><?= $data['nama_poli'] ?></td>
								<td><?= $data['nama_pasien'] ?></td>
								<td><?= $data['keluhan'] ?></td>
								<td><?= $data['nama_dokter'] ?></td>
								<td><?= $data['diagnosa'] ?></td>
								<td>
									<?php
									$sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die(mysqli_error($con));
									while ($data_obat = mysqli_fetch_array($sql_obat)) {
										echo $data_obat['nama_obat'] . "<br>";
									}
									?>
								</td>
								<td>
									<a href="edit.php?id=<?= $data['id_rm'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
									<a href="del.php?id=<?= $data['id_rm']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data?')"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#rekammedis').DataTable({
			columnDefs: [{
				"searchable": false,
				"orderable": false,
				"targets": 8
			}],
			"order": [0, "asc"]
		});
	});
</script>

<?php include_once('../_footer.php'); ?>