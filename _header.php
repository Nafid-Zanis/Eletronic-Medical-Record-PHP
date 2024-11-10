<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="<?= base_url(); ?>/_assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Electronic Medical Record</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/_assets/css/simple-sidebar.css" rel="stylesheet">
    <!-- load DataTables -->
    <link href="<?= base_url(); ?>/_assets/libs/DataTables/datatables.min.css" rel="stylesheet">
    <!-- load jquery online -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

    <!-- load ckeditor -->
    <script src="<?= base_url(); ?>/_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->

</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=""><span class="text-primary">Rekam Medis Rumah Sakit</span></a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('pasien/data.php') ?>"><i class="fas fa-user-injured"></i> Data Pasien</a>
                </li>
                <li>
                    <a href="<?= base_url('dokter/data.php') ?>"><i class="fas fa-user-md"></i> Data Dokter</a>
                </li>
                <li>
                    <a href="<?= base_url('poliklinik/data.php') ?>"><i class="fas fa-clinic-medical"></i> Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?= base_url('obat/data.php') ?>"><i class="fas fa-pills"></i> Data Obat</a>
                </li>
                <li>
                    <a href="<?= base_url('rekammedis/data.php') ?>"><i class="fas fa-file-medical"></i> Rekam Medis</a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout.php') ?>"><span class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">