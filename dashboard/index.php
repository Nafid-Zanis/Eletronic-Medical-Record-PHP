<?php include_once('../_header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1 class="display-4 text-primary">Dashboard</h1>
            <p class="lead">Selamat datang <mark><?= $_SESSION['user']; ?></mark>, di sistem informasi Rumah Sakit (Rekam Medis)</p>
            <a href="#menu-toggle" class="btn btn-outline-primary btn-sm" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>