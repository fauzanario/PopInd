<?php 
  include 'connection.php';

  $emailErr = '';
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
</head>

<body class="bg-body-secondary">

  <div class="container mt-5 pt-4">
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="mt-5">Form Input</h1>
      </blockquote>
    </figure>

    <div class="container mt-5 pt-5">
            
      <?php
        if (isset($_POST['action'])) {
          $inputKategori = $_POST['inputKategori'];
          $inputEmail = $_POST['inputEmail'];
          $inputPesan = $_POST['inputPesan'];

          if (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Masukkan email yang valid!";
            header("Location: form.php?emailErr=" . urlencode($emailErr) . "&kategori=" . urlencode($inputKategori) . "&email=" . urlencode($inputEmail) . "&pesan=" . urlencode($inputPesan));
            exit;
          }

          if ($_POST['action'] == "tambah") {
            $inputID = $_POST['inputID'];
            $inputKategori = $_POST['inputKategori'];
            $inputEmail = $_POST['inputEmail'];
            $inputPesan = $_POST['inputPesan'];

            $query = "INSERT INTO forminput VALUES(null,'$inputKategori', '$inputEmail', '$inputPesan')";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
              header("Location: form.php?status=success");
            } else {
              echo $query;
            }

          } elseif ($_POST['action'] == "edit") {
            $inputID = $_POST['inputID'];
            $inputKategori = $_POST['inputKategori'];
            $inputEmail = $_POST['inputEmail'];
            $inputPesan = $_POST['inputPesan'];

            $query = "UPDATE forminput SET kategori='$inputKategori', email='$inputEmail', pesan='$inputPesan' WHERE id='$inputID';";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
              header("Location: form.php?status=success");
            } else {
              echo $query;
            }
          }
        }

        if (isset($_GET['hapus'])) {
          $id = $_GET['hapus'];
          $query = "DELETE FROM forminput WHERE id = '$id'";
          $sql = mysqli_query($koneksi, $query);

          if ($sql) {
            header("Location: form-post.php?status=deleted");
          } else {
            echo $query;
        }
        }
      ?>
    </div>
  </body>
</html>
