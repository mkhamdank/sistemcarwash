<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Carwash</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<header>
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<?php
							if(ISSET($username))
							{ ?>
								<a class="navbar-brand" href="<?php echo site_url('carwash') ?>">Carwash</a>
							<?php } else{ ?>
								<a class="navbar-brand" href="<?php echo site_url('awal') ?>">Carwash</a>
							<?php } ?>
						</div>
			
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<?php
								if(ISSET($username))
								{ ?>
									<li class="active"><a href="<?php echo site_url('carwash') ?>">Transaksi</a></li>
									<li><a href="<?php echo site_url('mobil') ?>">Data Mobil</a></li>
									<li><a href="<?php echo site_url('jenis') ?>">Jenis Mobil</a></li>
								<?php } else{ ?>
									<li class="active"><a href="<?php echo site_url('awal') ?>">Transaksi</a></li>
								<?php } ?>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<?php if (ISSET($username)){ ?>
									<li><a href="<?php echo site_url('login/logout') ?>">Logout</a></li>
								<?php } else { ?>
									<li><a href="<?php echo site_url('login') ?>">Login</a></li>
								<?php } ?>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
			</header>
			
			<section>
				<div class="jumbotron">
					<div class="container">
						<?php if (ISSET($transaksi_new)): ?>
							<h1>Detail Transaksi</h1>
						<?php endif ?>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<div class="table-responsive">
									<table class="table table-hover">				
										<?php foreach ($transaksi_new as $key) { ?>
										<tbody>
											<tr><th>Nama Pelanggan</th>
											<td><?php echo $key->nama_pelanggan; ?></td></tr>
											<tr><th>Nama Mobil</th>
											<td><?php echo $key->nama_mobil; ?></td></tr>
											<tr><th>Jenis Mobil</th>
											<td><?php echo $key->jenis_mobil ?></td></tr>
											<tr><th>Tanggal</th>
											<td><?php echo $key->tanggal ?></td></tr>
											<tr><th>Harga</th>
											<td><?php echo $key->harga ?></td></tr>
											<tr>
											<td colspan="2" class="text-center">
												<h3>Nomor Antrian</h3>
													<p>
														<h1><b><?php echo $key->no_antrian ?></b></h1>
													</p>
											</td></tr>
											<tr><th></th>	
											<td>
												<?php
												if(ISSET($username))
												{ ?>
												<a class="btn btn-primary" href="<?php echo site_url('carwash') ?>">Kembali</a>
												<?php } else{ ?>
													<a class="btn btn-primary" href="<?php echo site_url('awal') ?>">Kembali</a>
												<?php } ?>
											</td></tr>
										</tbody>
										<?php } ?>
									</table>
								</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>