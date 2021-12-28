<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?= $title; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
        <div class="container-fluid">
            <a class="navbar-brand" href="/jwp">JWP</a>
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('/users/login') ?>" class="btn btn-outline-success me-2 mr-3"
                    type="button">Login</a>
                <a href="<?= base_url('/users/register') ?>" class=" btn btn-outline-primary" type="button">Register</a>
            </div>
        </div>
    </nav>