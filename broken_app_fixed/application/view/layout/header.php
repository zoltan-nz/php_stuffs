<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confectionary Listings</title>
    <link rel="stylesheet" href="/library/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Confectionery Listing</a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav">
                <li class="<?php echo $activeHome ?>"><a href="/">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) { ?>
                    <li class="<?php echo $activeAdminHome ?>"><a href="/admin.php">Admin Home</a></li>
                    <li class="<?php echo $productIndex ?>"><a href="/resources/products/index.php">Products</a></li>
                    <li class="<?php echo $mfIndex ?>"><a href="/resources/manufacturers/index.php">Manufacturers</a>
                    </li>
                    <li class="<?php echo $countryIndex ?>"><a href="/resources/countries/index.php">Countries</a></li>

                <?php } ?>


            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) { ?>
                    <li class=""><a href="/logout.php">Logout</a></li>
                <?php } else { ?>
                    <li class="<?php echo $activeLogin ?>"><a href="login.php">Login</a></li>
                <?php } ?>
            </ul>

    </nav>


    <?php if ((isset($_SESSION['flash'])) && ($_SESSION['flash'] <> '')) { ?>

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['flash'];
            $_SESSION['flash'] = '' ?>
        </div>

    <?php } ?>

    <?php if ((isset($_SESSION['error'])) && ($_SESSION['error'] <> '')) { ?>

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['error'];
            $_SESSION['error'] = '' ?>
        </div>

    <?php } ?>

    <?php if ((isset($_SESSION['success'])) && ($_SESSION['success'] <> '')) { ?>

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['success'];
            $_SESSION['success'] = '' ?>
        </div>

    <?php } ?>
