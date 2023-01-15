<?php include'../../baglan.php';
      ob_start();
      session_start();

      $usersor=$db->prepare("SELECT * FROM user where email=:email and password=:password and yetki=:yetki ");
      $usersor->execute(array(
      'email'=> $_SESSION['email'],
      'password'=>$_SESSION['password'],
      'yetki'=>1
      ));

      $say=$usersor->rowCount();
      $usercek=$usersor->fetch(PDO::FETCH_ASSOC);
      if ($say==0) {
        header("location:../../login/login.php");
      } 


 ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Foto Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body data-layout="horizontal">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm me-2 font-size-24 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="../../login/logout.php"><i class="dripicons-exit font-size-16 align-middle me-2"></i>
                                Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/index.php">
                                        <i class="dripicons-device-desktop me-2"></i>Anasayfa
                                    </a>
                                </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="profil.php">
                                        <i class="dripicons-suitcase me-2"></i>Profilim
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                                        <i class="dripicons-to-do me-2"></i>Fotoğraflar
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <a href="../pages/onay.php" class="dropdown-item">Yayında Olan Fotoğraflarım</a>
                                        <a href="../pages/onaysiz.php" class="dropdown-item">Reddedilen Fotoğraflarım</a>
                                    </div>
                                </li>   
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            