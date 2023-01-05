			<!-- Begin bread crumbs -->
			<nav class="bread-crumbs">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<ul class="bread-crumbs-list">
								<li>
									<a href="<?= base_url('user') ?>">Home</a>
									<i class="material-icons md-18">chevron_right</i>
								</li>
								<li><a href="#!"><?= $title; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav><!-- End bread crumbs -->

			<div class="section">
				<div class="container">
					<div class="col">
						<div class="col-12">
							<div class="section-heading">
								<h1><?= $title; ?></h1>
								<hr>
								<?php if ($this->session->flashdata('success')) : ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<?= $this->session->flashdata('success') ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php elseif ($this->session->flashdata('error')) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?= $this->session->flashdata('error') ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif ?>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>Transaction</td>
										<td>Device</td>
										<td>Service</td>
										<td>Date</td>
										<td>Status</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_transaksi as $transaksi) : ?>
										<?php if ($transaksi->email == $this->session->userdata['email']) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $transaksi->no_transaksi ?></td>
												<td><?= $transaksi->device ?>
												<td><?= $transaksi->service ?>
												<td><?= $transaksi->tgl_terima ?>
												<td>
													<?php if ($transaksi->status == 'Pengajuan') : ?> <span class="badge bg-secondary">Pengajuan</span>
													<?php elseif ($transaksi->status == 'Proses') : ?> <span class="badge bg-warning">Proses</span>
													<?php elseif ($transaksi->status == 'Menunggu Pembayaran') : ?> <span class="badge bg-warning">Menunggu Pembayaran</span>
													<?php elseif ($transaksi->status == 'Menunggu Verifikasi') : ?> <span class="badge bg-warning">Menunggu Verifikasi</span>
													<?php elseif ($transaksi->status == 'Selesai') : ?> <span class="badge bg-success">Selesai</span>
													<?php else : ?> <span class="badge bg-danger">Dibatalkan</span>
													<?php endif ?>
												<td>
													<a href="<?= base_url('user/detail_servis/' . $transaksi->no_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
												</td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>