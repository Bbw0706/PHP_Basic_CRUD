<?php 
    require("config/config.php");
    require("config/db.php");


    if(isset($_POST["submit"])){
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
        $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $tempat_lahir = mysqli_real_escape_string($conn, $_POST["tempat_lahir"]);
        $no_hp = mysqli_real_escape_string($conn, $_POST["no_hp"]);

        $query = "INSERT INTO tables(nama, kelas, alamat, email, tempat_lahir, no_hp) VALUES('$nama', '$kelas', '$alamat', '$email', '$tempat_lahir', '$no_hp')";


        if(mysqli_query($conn, $query)){
            header("Location: " . ROOT_URL);
        }else{
            echo "Error: " .  mysqli_error();
        }
    }
?>

<?php require("inc/header.php") ?>

    <br><br>
    <div class="container">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="Kelas" name="kelas">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir">
        </div>
        <div class="form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" class="form-control" id="no_hp" placeholder="Nomor Handphone" name="no_hp">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
    
<?php require("inc/footer.php") ?>