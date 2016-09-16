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

$hasil = tampil();
$hasil2 = lihat_ekskul();
$hasil3 = tampil_akun();
$guru = tampilguru();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin- Tables</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
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
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Penambahan Eskull </a></li>
			<li class="active"><a href="tables.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Lihat Data</a></li>
			<li><a href="forms.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms </a></li>
    </ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> All Data </h1>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Data Siswa</div>
					<div class="panel-body">
						<table data-toggle="table" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id" data-checkbox="true" >ID</th>
                    <th data-field="nama" data-sortable="true">Nama</th>
						        <th data-field="kelas" data-sortable="true">Kelas</th>
						        <th data-field="jurusan"  data-sortable="true">Jurusan</th>
                    <th data-field="email" data-sortable="true">Email</th>
						        <th data-field="level" data-sortable="true">Level</th>
						    </tr>
						    </thead>
                <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                  <td></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['kelas']; ?></td>
                  <td><?php echo $row['jurusan']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['level']; ?></td>
              </tr>
                <?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Data Guru</div>
					<div class="panel-body">
						<table data-toggle="table" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_guru" data-checkbox="true" >ID</th>
                    <th data-field="nama" data-sortable="true">Nama Guru</th>
						        <th data-field="kelas" data-sortable="true">Email</th>
						    </tr>
						    </thead>
                <?php while ($row4 = mysqli_fetch_assoc($guru)) { ?>
              <tr>
                  <td></td>
                  <td><?php echo $row4['nama_guru']; ?></td>
                  <td><?php echo $row4['email_guru']; ?></td>
              </tr>
                <?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List Ekskul</div>
					<div class="panel-body">
						<table data-toggle="table" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_ekskul" data-checkbox="true" >ID</th>
                    <th data-field="nama_ekskul" data-sortable="true">Nama Ekskul</th>
						        <th data-field="deskripsi" data-sortable="true">Deskripsi</th>
						    </tr>
						    </thead>
                <?php while ($row2 = mysqli_fetch_assoc($hasil2)) { ?>
              <tr>
                  <td></td>
                  <td><?php echo $row2['nama_ekskul']; ?></td>
                  <td><?php echo $row2['deskripsi']; ?></td>
              </tr>
                <?php } ?>
						</table>
					</div>
				</div>
			</div>
      <div class="row">
  			<div class="col-lg-12">
  				<div class="panel panel-default">
  					<div class="panel-heading">List User</div>
  					<div class="panel-body">
  						<table data-toggle="table" data-url=""  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
  						    <thead>
  						    <tr>
  						        <th data-field="id_akun" data-checkbox="true" >ID</th>
                      <th data-field="username" data-sortable="true">Username</th>
  						        <th data-field="level" data-sortable="true">Level</th>
  						    </tr>
  						    </thead>
                  <?php while ($row3 = mysqli_fetch_assoc($hasil3)) { ?>
                <tr>
                  <?php
                  if ($row3['level'] == 'admin') {
                    echo '
                      <td class="danger"></td>
                      <td class="danger"> '.$row3['username'].' </td>
                      <td class="danger">'.$row3['level'].'</td>';
                  } elseif ($row3['level'] == 'guru') {
                    echo '
                      <td class="warning"></td>
                      <td class="warning"> '.$row3['username'].' </td>
                      <td class="warning">'.$row3['level'].'</td>';
                  } else {
                    echo '
                      <td class="success"></td>
                      <td class="success"> '.$row3['username'].' </td>
                      <td class="success">'.$row3['level'].'</td>';
                  }
                   ?>
                </tr>
                  <?php } ?>
  						</table>
  					</div>
  				</div>
  			</div>
  		</div><!--/.row-->
		</div><!--/.row-->
						</table>
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';

						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });

						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div><!--/.row-->


	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
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
