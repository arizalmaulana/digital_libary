<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Perpustakaan Digital | Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>


<body>

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid pe-0">
            <div class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
                ReadZone
            </div>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                    <a class="nav-link me-2" href="register">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Daftar
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- End Navbar -->
        </div>
    </div>
</div>

<main class="main-content  mt-0">
<section>
    <div class="page-header min-vh-75">
    <div class="container">
        <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                <p class="mb-0">Masukan nama pengguna dan password untuk login</p>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                <div class="mb-3">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" aria-label="Username" aria-describedby="username-addon" required>
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</button>
                </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                Belum punya akun?
                <a href="register" class="text-info text-gradient font-weight-bold">Daftar</a>
                </p>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/3.png')"></div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
</main>

<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
<div class="container">
    <div class="row">
    <div class="col-lg-8 mb-4 mx-auto text-center">
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        Company
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        About Us
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        Team
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        Products
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        Blog
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
        Pricing
        </a>
    </div>
    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-instagram"></span>
        </a>
        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-github"></span>
        </a>
    </div>
    </div>
    <div class="row">
    <div class="col-8 mx-auto text-center mt-1">
        <p class="mb-0 text-secondary">
        Copyright © <script>
            document.write(new Date().getFullYear())
        </script> ReadZone by Lazira Tech Corp.
        </p>
    </div>
    </div>
</div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
    damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<script>
    // Mencari elemen dengan kelas alert-success (atau sesuaikan dengan kelas alert yang Anda gunakan)
    const alertSuccess = document.querySelector('.alert-success');
    const alertDanger = document.querySelector('.alert-danger');

    // Jika ada elemen dengan kelas alert-success, atur waktu hilangnya
    if (alertSuccess) {
        // Tunggu 3 detik, lalu sembunyikan elemen dengan kelas alert-success
        setTimeout(function() {
            alertSuccess.style.display = 'none';
        }, 3000); // 3000 milidetik = 3 detik
    }
    if (alertDanger) {
        // Tunggu 3 detik, lalu sembunyikan elemen dengan kelas alert-Danger
        setTimeout(function() {
            alertDanger.style.display = 'none';
        }, 3000); // 3000 milidetik = 3 detik
    }
</script>
</body>
</html>
