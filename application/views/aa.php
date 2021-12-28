<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>
<nav class="navbar navbar-dark bg-dark">
    <!-- Navbar content -->
    <div class="container-fluid">
        <a class="navbar-brand" href="/jwp/users/aa">JWP</a>
        <form action="<?= base_url('users/logout') ?>" method="post">
            <div class="d-flex justify-content-end">
                <button type="sumbit" class="btn btn-outline-primary">Logout</button>
            </div>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <h1>Welcome, <?= $this->session->userdata('name'); ?></h1>
</div>

<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>