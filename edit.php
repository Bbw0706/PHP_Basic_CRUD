<?php 
    require("./config/config.php");
    require("./config/db.php");
    
    if(isset($_POST["submit"])){
        $id = mysqli_real_escape_string($conn, $_POST["updated_id"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
        $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $tempat_lahir = mysqli_real_escape_string($conn, $_POST["tempat_lahir"]);
        $no_hp = mysqli_real_escape_string($conn, $_POST["no_hp"]);
        
        $query = "UPDATE tables SET 
            nama = '$nama',
            kelas = '$kelas',
            alamat = '$alamat',
            email = '$email',
            tempat_lahir = '$tempat_lahir',
            no_hp = '$no_hp'
            WHERE id = {$id}";

        if(mysqli_query($conn, $query)){
            header("Location: " . ROOT_URL);
        }else{
            echo "ERROR: " . mysqli_error();
        }
    }

    // ! Get ID
    $q = mysqli_real_escape_string($conn, $_REQUEST["id"]);
    
    // ! Create Query
    $query = "SELECT * FROM tables WHERE id = {$q}";

    // ! GET THE RESULT
    $result = mysqli_query($conn, $query);
    
    // ! Fetch Data
    $data = mysqli_fetch_assoc($result);

    // ! Free result
    mysqli_free_result($result);

    // ! Close Connection
    mysqli_close($conn);
?>

<?php require("inc/header.php") ?>

    <br><br>
    <div class="container">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $data['nama']?>">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="Kelas" name="kelas" value="<?php echo $data['kelas']?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat']?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="<?php echo $data['email']?>">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']?>">
        </div>
        <div class="form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" class="form-control" id="no_hp" placeholder="Nomor Handphone" name="no_hp" value="<?php echo $data['no_hp']?>">
        </div>
        <input type="hidden" name="updated_id" value="<?php echo $data["id"]; ?>">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
    
<?php require("inc/footer.php") ?>