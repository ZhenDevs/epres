<?php
// Koneksi ke database
include 'assets/config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $full_name = $_POST['nama'];
    $kelas_jurusan = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis-kelamin'];
    $ekstrakulikuler = implode(", ", $_POST['ekstra']);

    // Membuat query SQL
    $sql = "INSERT INTO users (username, email, password, full_name, kelas_jurusan, jenis_kelamin, ekstrakulikuler)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $is_connect->prepare($sql);
    $stmt->bind_param("sssssss", $username, $email, $password, $full_name, $kelas_jurusan, $jenis_kelamin, $ekstrakulikuler);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$is_connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register User</title>
</head>
<body>
  <main class="main-content mt-0 p-0">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-5 col-md-8 col-12 mx-auto">
          <div class="card card-plain">
            <form id="regForm" action="register.php" method="POST">
              <div class="card-header">
                <h4>Sign Up</h4>
              </div>
              <div class="card-body">
                <div class="input-group input-group-outline mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="Full Name">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <input type="text" name="kelas" class="form-control" placeholder="Kelas/Jurusan">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis-kelamin" value="Male" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis-kelamin" value="Female" id="flexRadioDefault2">
                  <label class="form-check-label" for="flexRadioDefault2">Female</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>