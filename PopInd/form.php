<?php 
  include 'connection.php';

  $id = $kategori = $pesan = '';
  $email = '';
  $emailErr = isset($_GET['emailErr']) ? $_GET['emailErr'] : '';

  $success = "Terima Kasih atas Ulasan Anda!";
  $default = "Tulis Ulasan";

  if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $formSubmitted = true;
  } else {
    $formSubmitted = false;
  }

  if (isset($_GET['kategori'])) {
    $kategori = urldecode($_GET['kategori']);
  }
  if (isset($_GET['email'])) {
      $email = urldecode($_GET['email']);
  }
  if (isset($_GET['pesan'])) {
      $pesan = urldecode($_GET['pesan']);
  }
  // if (isset($_GET['ubah'])) {
  //   $npm = $_GET['ubah'];

  //   $query = "SELECT * FROM forminput WHERE email = '$email';";
  //   $sql = mysqli_query($koneksi, $query);

  //   $result = mysqli_fetch_assoc($sql);

  //   $id = $result['id'];
  //   $kategori = $result['kategori'];
  //   $email = $result['email'];
  //   $pesan = $result['pesan'];
  // }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PopInd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="galeri.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    .container {
      background-color: black;
      margin-top: 100px;
      padding-top: 50px;
      border-radius: 10px;
    }
    option {
      color: black;
    }
    span {
      color: red;
    }
  </style>
</head>

<body class="bg-body-dark">
  <!-- NAVIGATION BAR -->
  <nav class="navbar fixed-top  navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><span class="pop">Pop</span><span class="ind">Ind</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="galeri.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="galeri.html#tentang">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="galeri.html#tentang">Tentang PopIND</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- NAVIGATION BAR -->

  <div class="container">
    <figure class="text-dark">
      <class="blockquote">
      <h1><?php echo $formSubmitted ? $success : $default; ?></h1>
      </blockquote>
    </figure>

      <div class="container text-dark mt-1">
        <form method="POST" action="form-process.php">

        <div class="mb-3 row">
            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-10">
                <select class="form-select bg-body-tertiary border border-secondary 
                  border-opacity-50" id="inputKategori" name="inputKategori" required>
                  <option hidden value="">Pilih Kategori</option>
                  <option <?php if ($kategori == 'Masukan & Saran'){echo "selected";}?>  value="Masukan & Saran">Masukan & Saran</option>
                  <option <?php if ($kategori == 'Request Artis'){echo "selected";}?>  value="Request Artis">Request Artis</option>
                  <option <?php if ($kategori == 'Request Lagu'){echo "selected";}?>  value="Request Lagu">Request Lagu</option>
                </select>
              </div>
          </div>

          <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input required type="email" class="form-control bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputEmail" name="inputEmail" placeholder="email@popind.com" value="<?php echo $email ?>">
                <?php if (!empty($emailErr)): ?>
                  <span class="error float-end"><?php echo $emailErr; ?></span>
                <?php endif; ?>
              </div>
          </div>
      
          <div class="mb-3 row">
            <label for="inputPesan" class="col-sm-2 col-form-label">Pesan</label>
              <div class="col-sm-10">
                <textarea required class="form-control bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputPesan" name="inputPesan" rows="10"><?php echo $pesan ?></textarea>
              </div>
          </div>

          <div class="mb-3 row mt-5">
            <div class="col">
              <button href="galeri.html" type="submit" name="action" value="tambah" class="btn btn-danger float-end mb-2" style="background-color: red;">
                Kirim
              </button>
            </div>
          </div>
        </form>
      </div>
  </div>
</body>
</html>