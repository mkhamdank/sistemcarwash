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
							<a class="navbar-brand" href="<?php echo site_url('carwash') ?>">Carwash</a>
						</div>
			
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url('carwash') ?>">Transaksi</a></li>
								<li><a href="<?php echo site_url('mobil') ?>">Data Mobil</a></li>
								<li><a href="<?php echo site_url('jenis') ?>">Jenis Mobil</a></li>
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
				<?php echo form_open('carwash/edit/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>
					<legend>Edit Data Transaksi</legend>
					<div class="form-group">
						<?php foreach ($transaksi as $key) { ?>
							<label for="">ID Transaksi</label>
							<input type="text" class="form-control" name="id_transaksi" id="" placeholder="ID Mobil" value="<?php echo $key->id_transaksi ?>">
							<label for="">Nama Pelanggan</label>
							<input type="text" name="nama_pelanggan" id="inputNamape" class="form-control" placeholder="Nama Pelanggan" value="<?php echo $key->nama_pelanggan ?>">
							<label for="">Nama Mobil</label>
							<select name="fk_mobil" id="input" class="form-control">
								<option value="<?php echo $key->id_mobil ?>"></option>
								<?php foreach ($mobil as $val) { ?>
									<option value="<?php echo $val->id_mobil ?>"><?php echo $val->nama_mobil ?></option>
								<?php } ?>
							</select>
							<label for="">Tanggal</label>
							<input type="date" name="tanggal" id="input" class="form-control" value="<?php echo $key->tanggal ?>">
							<label for="">Nomor Antrian</label>
							<input type="text" name="no_antrian" id="input" class="form-control" value="<?php echo $key->no_antrian ?>">
						<?php } ?>
					</div>
					<button type="submit" class="btn btn-primary">Edit</button>
				<?php echo form_close(); ?>
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