<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Math Test</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav list-group px-3 list-group-horizontal">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo url_for('/logout.php');?>">Sign out</a>
            </li>
        </ul>
        </nav>

        <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo url_for('/index.php');?>">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if($_SESSION['user_type'] == 'admin') {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/users.php');?>">
                    <span data-feather="file"></span>
                    Users
                    </a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/addition.php');?>">
                    <span data-feather="file"></span>
                    Addition
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/subtraction.php');?>">
                    <span data-feather="shopping-cart"></span>
                    Subtraction
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/division.php');?>">
                    <span data-feather="users"></span>
                    Division
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/multiplication.php');?>">
                    <span data-feather="bar-chart-2"></span>
                    Multiplication
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/random.php');?>">
                    <span data-feather="layers"></span>
                    Random
                    </a>
                </li> -->
                </ul>

                <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                    </a>
                </li>
                </ul> -->
            </div>
            </nav>
