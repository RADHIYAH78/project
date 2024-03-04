<?php
include_once("connect.php");
 
// Mengambil semua data dari database
$result = mysqli_query($mysqli, "SELECT * FROM absensi ORDER BY id DESC");
 
if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
 
    // Insert data ke database
    $add = mysqli_query($mysqli, "INSERT INTO absensi(name,status,arival) VALUES('$name','$status', NOW())");
}
?>
 
<html>
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>DIGITAL ATTENDANCE</title>
</head>
 
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">DIGIAL ATTENDANCE</span>
        </div>
    </nav>
 
    <div class="bg-success p-2 text-dark bg-opacity-10">
        <h2 class="p-4 text-center">CHECK YOUR PRESENCE HERE !</h2>
        <div class="container">
            <form action="" method="post" name="form_absen">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input Your Name">                   
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><Status>
                        <Class></Class></label>
                        <select class="form-select" name="status">
                            <option value="#">-- Choose your Stutus--</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="Submit">Present</button>
                </div>
            </form>
 
            <table class="my-5 table table-striped">
                <tr class="table-dark">
                    <th>Name</th>
                    <th>Status</th>
                    <th>Arrival</th>
                </tr>
 
                <?php
                while ($r = mysqli_fetch_array($result)) {
                ?>
                    <tr class="table-secondary">
                        <td><?php echo $r['name']; ?></td>
                        <td><?php echo $r['status']; ?></td>
                        <td><?php echo $r['arival']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>