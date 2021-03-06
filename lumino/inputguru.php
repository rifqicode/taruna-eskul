<?php

session_start();

require_once('../db/connect.php');
require_once('../function/function.php');


if ($_SESSION['username'] == NULL) {
  header('location:../login/');
}

if ($_SESSION['level'] == 'user') {
  header('location:../index.php');
} elseif ($_SESSION['level'] == 'guru') {
  header('location:../index.php');
}




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
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
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
			<li class="active"><a href="input2.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Input Data Guru</a></li>
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Penambahan Eskull </a></li>
			<li><a href="tables.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Lihat Data</a></li>
			<li><a href="forms.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms </a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Input</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Registrasi Guru</div>
					<div class="panel-body">
						<form class="form-horizontal" method="post">
							<fieldset>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="nama">Nomer Induk Guru </label>
                  <div class="col-md-9">
                  <input id="nis_guru" name="nis_guru" type="text" placeholder="Masukan NIS" class="form-control" required pattern="[0-9]{1,999}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="nama">Nomer Induk Guru </label>
                  <div class="col-md-9">
                  <input id="nis" name="nis" type="text" placeholder="Ketik Ulang NIS" class="form-control" required pattern="[0-9]{1,999}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="nama">Nama Guru </label>
                  <div class="col-md-9">
                  <input id="nama_guru" name="nama_guru" type="text" placeholder="Masukan NIS" class="form-control" required>
                  </div>
                </div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Email</label>
									<div class="col-md-9">
									<input id="email_guru" name="email_guru" type="text" placeholder="Email" class="form-control" required>
									</div>
								</div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Username</label>
                  <div class="col-md-9">
                  <input id="username" name="username" type="text" placeholder="Username" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Password</label>
                  <div class="col-md-9">
                  <input id="password" name="password" type="password" placeholder="Password" class="form-control" required>
                  </div>
                </div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" name="submit" class="btn btn-default btn-md pull-right">Submit</button>
									</div>
								</div>
									<!-- Fungsi Input Data -->
								<?php

									if (isset($_POST['submit'])) {

								if (dataguru($_POST['nis_guru'] , $_POST['nama_guru'] , $_POST['email_guru'])){
									echo "Tambah Data Berhasil"."<br>";
								}else{
									echo "Tambah data gagal";
								}
							}
                if (isset($_POST['submit'])) {
                  error_reporting(0);
                  $username = $_POST['username'];
                  $password = md5($_POST['password']);
                  $nis = $_POST['nis'];
                  $level = $_POST['level'];
                  if ($level == NULL) {
                    $level = 'guru';
                  }
                  if (buatakun($nis , $username , $password , $level)) {
                    echo "Buat Akun Berhasil";
                  } else {
                    echo "Buat Akun Gagal";
                  }
                }
								 ?>

							</fieldset>
						</form>
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
