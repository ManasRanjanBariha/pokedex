<?php
session_start();
$form = $_SESSION["adminlogin_usename"];
if ($form === NULL) {
    header("location:login.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>MITM | Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Include SweetAlert library -->

        <!-- pagination -->
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <!-- End pagination -->



        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <!-- DataTables Buttons CSS -->
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
        <!-- DataTables Extensions CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">



    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">PORTFOLIO</h3>
                </a>
                <!--<div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div
                                class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                            </div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <span>Admin</span>
                        </div>
                    </div> -->
                <div class="navbar-nav w-100">
                    <a href="contact1.php" class="nav-item nav-link active"><i
                            class="far fa-comments nav-icon"></i>Contact</a>
                    <!-- <a href="enquiry.php" class="nav-item nav-link"><i
                                class="bi bi-file-earmark-text me-2"></i>Admission Enquiry</a>-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-object-group nav-icon"></i> Portfolio
                        </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="portfolio_image.php" class="dropdown-item">
                                <i class="bi bi-image me-2"></i> Image
                            </a>
                            <a href="portfolio_video.php" class="dropdown-item">
                                <i class="bi bi-play-circle me-2"></i> Video
                            </a>
                        </div>
                    </div>
                    <a href="password.php" class="nav-item nav-link"><i class="bi bi-newspaper me-2"></i>Password
                        Change</a>
                    <!--<a href="notice.php" class="nav-item nav-link"><i class="bi bi-bell me-2"></i>Notice</a>
                        <a href="placement.php" class="nav-item nav-link"><i class="fas fa-briefcase"></i>Placement</a>-->
                    <a href="logout.php" class="nav-item nav-link"><i class="far fa-share-square nav-icon"></i>Logout</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <!-- Navbar End -->
            <?php require 'db.php';
            if (isset ($_POST['changepassword'])) {
                $cur_pas = $_POST['cur_pas'];
                $new_pas = $_POST['new_pas'];
                $rnew_pas = $_POST['rnew_pas'];
                echo $cur_pas; 
        
                if ($new_pas == $rnew_pas) {
                    $sql1 = "select * from portfolio_adminlogin where portfolio_adminlogin_id=1";

                    $result = $conn->query($sql1);
                    if ($row = $result->fetch_assoc()) {
                        $psd = $row['adminlogin_password'];
                        // echo $psd;
                    }
                    if ($cur_pas == $psd) {
                        //var_dump('pass');exit();
                        $sql2 = "UPDATE portfolio_adminlogin SET adminlogin_password='$new_pas' WHERE portfolio_adminlogin_id=1 ";
                        if ($result = $conn->query($sql2)) {
                            header("location: password.php");
                        }
                    } else {
                        echo "<script>
		alert ('Current Password Mismatch');
		</script>";
                        header("location: password.php");

                    }
                } else {
                    echo "<script>
		alert ('Password Mismatch');
		</script><script>window.location='password.php'</script>";
                }

            }
            ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1>Password Update</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content-wrapper mb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">


                                <div class="card">
                                    <!--<div class="card-header">-->
                                    <!--  <h3 class="card-title">DataTable with default features</h3>-->
                                    <!--</div>-->
                                    <!-- /.card-header -->
                                    <div class="card-body mb-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
                                                    <div class="form-group col-sm-12  mb-2">
                                                        <input type="password" name="cur_pas" class="form-control"
                                                            placeholder="Enter current password" required>
                                                    </div>
                                                    <div class="form-group col-sm-12 mb-2">
                                                        <input type="password" name="new_pas" class="form-control"
                                                            placeholder="Enter new password" required>
                                                    </div>
                                                    <div class="form-group col-sm-12 mb-2">
                                                        <input type="password" name="rnew_pas" class="form-control"
                                                            placeholder="Re-enter new password" required>
                                                    </div>
                                                    <div class="form-group col-sm-12 mb-3">
                                                        <input type="submit" name="changepassword" class="btn btn-primary"
                                                            value="Update" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                <p> Srinibas Pradhan Constructions Pvt. Ltd.</p>
                                                <p>Jharsuguda, Odisha.</p>
                                                <hr>
                                                <p><i class="far fa-building"></i> Techgeering Solutions Pvt. Ltd.</p>
                                                <p><i class="bi bi-envelope"></i> info@techgeering.com |
                                                    care@techgeering.com</p>
                                                <p><i class="bi bi-phone"></i>+91 7855 865 181 | <i
                                                        class="bi bi-whatsapp"></i>
                                                    +91 7855 865 181</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <?php include "common/footer.php" ?>
        <?php } ?>