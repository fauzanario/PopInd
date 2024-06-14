<?php 
  include 'connection.php';
  $query_form_input = "SELECT * FROM formInput"; 
  $sql_form_input = mysqli_query($koneksi, $query_form_input);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PopInd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-body-secondary">

    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kategori</th>
                <th scope="col">Email</th>
                <th scope="col">Pesan</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            while ($result = mysqli_fetch_assoc($sql_form_input)) {
            ?>
            <tr>
                <td>
                    <?php echo $result['id'];?>
                </td>
                <td>
                    <?php echo $result['kategori'];?>
                </td>
                <td>
                    <?php echo $result['email'];?>
                </td>
                <td>
                    <?php echo $result['pesan'];?>
                </td>
                <td>
                    <a type="button" class="btn btn-light " href="form-process.php?hapus=<?php 
                    echo $result['id'];?>" onClick="return confirm('Hapus data?')"><i class="bi bi-trash"></i> </a>
                </td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</body>
</html>