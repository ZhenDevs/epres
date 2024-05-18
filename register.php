<?php
include 'assets/config/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    $ekstraa = $_POST['ekstraa'];

    // SQL query
    $sql = "INSERT INTO user (username, email, password, fullname, nis, kelas, gender, ekstraa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisss", $username, $email, $password, $fullname, $nis, $kelas, $gender, $ekstraa);

    // Execute query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>ePRESS</title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

  <style>
    /* Custom styles */
    body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .full-height {
      min-height: 100vh;
    }

    .bg-color {
      background-color: hsl(0, 0%, 96%);
      height: 100%;
    }

    /* Additional styles */
    .container-full {
      padding: 0;
      margin: 0;
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .row-full {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .tampilan {
      height: 400px;
      padding: 20px;
      max-height: calc(100% - 100px);
      /* Sesuaikan dengan tinggi tertinggi yang dibutuhkan */
      overflow-y: auto;
      /* Penyesuaian padding untuk tampilan agar sejajar dengan tulisan */
    }

    .form-label {
      font-size: 16px;
      /* Penyesuaian ukuran font agar sejajar dengan tulisan */
    }

    .form-control {
      margin-bottom: 15px;
      border: 1px solid #ccc;
      /* Menambahkan garis pada input */
      border-radius: 5px;
      /* Melengkungkan sudut input */
      padding: 10px;
      /* Menambahkan padding agar input terlihat lebih luas */
    }

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .progress-bar {
      width: 0%;
    }

    .progress {
      height: 10px;
    }

    /* Adjustments for mobile */
    @media (max-width: 992px) {
      .content {
        padding: 20px;
      }

      .col-lg-6 {
        flex: 0 0 100%;
      }

      .form-container {
        display: block;
      }

      .tampilan {
        height: auto;
      }
    }

    /* Media queries for smaller devices */
    @media (max-width: 576px) {

      /* Atur lebar untuk perangkat mobile */
      .col-lg-6 {
        flex: 0 0 100%;
      }

      .tampilan {
        height: 450px;
        padding: 10px;
        /* Mengurangi padding agar lebih sesuai dengan tampilan mobile */
      }

      .form-control {
        margin-bottom: 10px;
        /* Mengurangi margin untuk elemen form agar lebih sesuai dengan tampilan mobile */
      }
    }
  </style>

</head>

<body>
  <div class="full-height">
    <section class="vh-100">
      <div class="d-flex align-items-center px-md-5 text-center text-lg-start bg-color">
        <div class="container">
          <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 d-none d-lg-block">
              <h1 class="my-5 display-3 fw-bold ls-tight">
                ePRESS <br />
                <span class="text-primary">Kemudahan</span>
              </h1>
              <p class="" style="color: hsl(217, 10%, 50.8%)">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                quibusdam tempora at cupiditate quis eum maiores libero
                veritatis? Dicta facilis sint aliquid ipsum atque?
              </p>
            </div>
            <div class="col-lg-6 mb-0 mb-lg-0 justify-content-end">
              <div class="card">
                <div class="card-header p-0 position-relative mt-n3 mx-4 z-index-1">
                  <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="d-flex justify-content-center text-white font-weight-bolder text-center mt-0 mb-0">Sign Up</h4>
                  </div>
                </div>
                <div class="card-body py-3 px-md-4">
                  <form>
                    <div class="py-0">
                      <div class="row justify-content-center">
                        <div class=" col-md-9 ">
                          <p class="text-center lead fw-normal my-2 me-3">Register a new account</p>
                          <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar"></div>
                          </div>
                          <form method="POST" action="register.php">
  <div class="tampilan text-start" id="step1">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
    </div>
    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
  </div>
  <div class="tampilan text-start" id="step2" style="display: none;">
    <div class="mb-3">
      <label for="fullname" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
    </div>
    <div class="mb-3">
      <label for="nis" class="form-label">NIS</label>
      <input type="text" class="form-control" id="nis" name="nis" placeholder="Enter NIS">
    </div>
    <div class="mb-3">
      <label for=kelas" class="form-label">Kelas/Jurusan</label>
      <select class="form-select px-2" id="kelas" name="kelas">
        <option selected>...</option>
        <option>SIJA A</option>
        <option>SIJA B</option>
        <option>KA A</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <select class="form-select px-2" id="gender" name="gender">
        <option selected>...</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="">
      <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
      <button type="button" class="btn btn-warning" onclick="previousStep(2)">Back</button>
    </div>
  </div>
  <div class="tampilan text-start" id="step3" style="display: none;">
    <div class="mb-3">
      <label for="ekstraa" class="form-label">Ekstrakulikuler yang diikuti</label>
      <select class="form-select px-2" id="ekstraa" name="ekstraa">
        <option selected>...</option>
        <option>Ekstra 1</option>
        <option>Ekstra 2</option>
        <option>Ekstra 3</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
    <button type="button" class="btn btn-warning" onclick="previousStep(3)">Back</button>
  </div>
</form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Core JS Files -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    function nextStep(step) {
      document.getElementById('step' + (step - 1)).style.display = 'none';
      document.getElementById('step' + step).style.display = 'block';
      document.getElementById('progressBar').style.width = (step - 1) * 50 + '%';
    }

    function previousStep(step) {
      if (step > 1) {
        document.getElementById('step' + step).style.display = 'none';
        document.getElementById('step' + (step - 1)).style.display = 'block';
        document.getElementById('progressBar').style.width = (step - 2) * 50 + '%';
      }
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>