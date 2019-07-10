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
							<a class="navbar-brand" href="<?php echo site_url('awal') ?>">Carwash</a>
						</div>
			
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url('awal') ?>">Transaksi</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="<?php echo site_url('login') ?>">Login</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
			</header>
			
			<section>
				<legend>Data Carwash</legend>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama Pelanggan</th>
								<th>Mobil</th>
								<th>Jenis</th>
								<th>Tanggal</th>
								<th>Harga</th>
								<th>Nomor Antrian</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($transaksi as $key) { ?>
								<tr>
									<td><?php echo $key->nama_pelanggan ?></td>
									<td><?php echo $key->nama_mobil ?></td>
									<td><?php echo $key->jenis_mobil ?></td>
									<td><?php echo $key->tanggal ?></td>
									<td><?php echo $key->harga ?></td>
									<td><?php echo $key->no_antrian ?></td>
									<td><a class="btn btn-warning" href="<?php echo site_url('awal/detail/'.$key->id_transaksi) ?>">Detail</a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
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