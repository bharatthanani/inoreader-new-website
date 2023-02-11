<!DOCTYPE html>
<html>

<head>
    <title> Home </title>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css.map" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css.map" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="images/fav-icon.png" type="image/png" sizes="">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/t-scroll.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img class="logo-main img-fluid"
                            src="images/header-logo.png" alt=""></a>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle=""
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <div class="input-group mic-drop">
                                <input type="text" class="form-control" placeholder="Seacrch" aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <button class="input-group-text" id="basic-addon2"><i
                                        class="fa-light fa-magnifying-glass"></i></button>
                            </div>


                        </ul>
                        <form class="d-flex">
                            <a class="header-bell-btn" type="bell"><i class="fa-light fa-bell"></i></a>
                            <a class="header-account-btn" type="submit"><span class="user-icon"><i
                                        class="fa-light fa-user"></i></span> Account</a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- header selector start -->
    <header class="header-slector">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container">
                    <h6 class="nav-link" href="#">My Feed:</h6>
                    <button class="navbar-toggler" type="button" data-bs-toggle="" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link active" href="desktoptwo.php">Latest News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Politics.php">Politics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="covid-19.php">Covid-19</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Business.php">Business</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Sports.php">Sports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Entertainment.php">Entertainment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="podcast.php">Podcasts</a>
                            </li>
                        </ul>

                    </div>

                    <a class="off-canvas-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                        <div class="canvas-four-span">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                            <span class="line-four"></span>
                        </div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
                <a href="index.php"> <img class="off-can-logo" src="images/footer-logo.png" alt=""></a>
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <div class="input-group mic-drop dn">
                    <input type="text" class="form-control" placeholder="Seacrch" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <button class="input-group-text" id="basic-addon2"><i
                            class="fa-light fa-magnifying-glass"></i></button>
                </div>


            </ul>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="desktoptwo.php">Latest News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Politics.php">Politics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="covid-19.php">Covid-19</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Business.php">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Sports.php">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Entertainment.php">Entertainment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="podcast.php">Podcasts</a>
                </li>
            </ul>

            <form class="d-flex dn">
                <a class="header-bell-btn dn" type="bell"><i class="fa-light fa-bell"></i></a>

            </form>
            <a class="header-account-btn dn" type="submit"><span class="user-icon"><i
                        class="fa-light fa-user"></i></span> Account</a>
        </div>
    </div>



    <!-- header selector end -->