<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confectionary Listings</title>
    <link rel="stylesheet" href="/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Confectionary Listing</a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="<?php echo $activeHome ?>"><a href="/">Home</a></li>
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) { ?>
                        <li class="<?php echo $activeAdminHome ?>"><a href="admin.php">Admin Home</a></li>

                        <li class=""><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li class="<?php echo $activeLogin ?>"><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
<?php if ((isset($_SESSION['flash'])) && ($_SESSION['flash'] <> '')) { ?>

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $_SESSION['flash'];
        $_SESSION['flash'] = '' ?>
    </div>

<?php } ?>

<?php if ((isset($_SESSION['error'])) && ($_SESSION['error'] <> '')) { ?>

    <div class="alert alert-error">
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
</div>