<?php

session_start();

require_once('../db/connect.php');
require_once('../function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:../login.php');
}

if ($_SESSION['level'] == 'user') {
  header('location:../index.php');
} elseif ($_SESSION['level'] == 'guru') {
  header('location:../index.php');
}



$hasil = tampilkelas();
$hasil2 = tampiljurusan();


 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Widgets</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=""><span>Lumino</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['username']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $_SESSION['username']; ?></a></li>
							<li><a href="../proses/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
      <li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
      <li><a href="input.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Input Data Siswa</a></li>
			<li><a href="inputguru.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Input Data Guru</a></li>
			<li class="active"><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Penambahan Eskull </a></li>
			<li><a href="tables.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Lihat Data</a></li>
			<li><a href="forms.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms </a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Penambahan Ekskul</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ekskul</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Registrasi </div>
					<div class="panel-body">
						<form class="form-horizontal" method="post">
							<fieldset>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="nama">Nama Ekskul </label>
                  <div class="col-md-9">
                  <input id="nama_ekskul" name="nama_ekskul" type="text" placeholder="Masukan nama Ekskul" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="nama">Deskripsi</label>
                  <div class="col-md-9">
                <textarea name="deskripsi" placeholder="Masukan Deskripsi (150 Kata atau Lebih)"rows="8" cols="40" required></textarea>
                  </div>
                </div>
                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 widget-right">
                    <button type="submit" name="submit" class="btn btn-default btn-md pull-right">Submit</button>
                  </div>
                </div>
							</fieldset>
						</form>
            <?php
                if (isset($_POST['submit'])) {
                  if (buatekskul($_POST['nama_ekskul'] , $_POST['deskripsi'])) {
                    echo "Tambah ekskul Berhasil";
                  } else {
                    echo "Buat Ekskul Gagal";
                  }
                }
             ?>
					</div>
				</div>
			</div><!--/.col-->

			<div class="col-md-4">

				<div class="panel panel-red">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>



			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
		        $(this).find('em:first').toggleClass("glyphicon-minus");
		    });
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
