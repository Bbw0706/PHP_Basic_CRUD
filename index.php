<?php 
    require("config/config.php");
    require("config/db.php");

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST["delete_id"]);
        
        $query = "DELETE FROM tables WHERE id = {$id}";

        if(mysqli_query($conn, $query)){
            header("Location: " . ROOT_URL);
        }else{
            echo "ERROR: " . mysqli_error();
        }

    }

    // ! Create Query
    $query = "SELECT * FROM tables";

    // ! GET THE RESULT
    $result = mysqli_query($conn, $query);
    
    // ! Fetch Data
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // ! Free result
    mysqli_free_result($result);

    // ! Close Connection
    mysqli_close($conn);


    
?>

<?php require("inc/header.php") ?>
    
    <br><br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">No Hp</th>
                <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item["nama"]?></td>
                        <td><?php echo $item["kelas"]?></td>
                        <td><?php echo $item["alamat"]?></td>
                        <td><?php echo $item["email"]?></td>
                        <td><?php echo $item["tempat_lahir"]?></td>
                        <td><?php echo $item["no_hp"]?></td>
                        <td>
                            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
                            <a class="btn btn-info btn-sm" href="<?php echo ROOT_URL ?>/edit.php?id=<?php echo $item['id']?>">Edit</a>
                                <input type="hidden" name="delete_id" value="<?php echo $item['id']?>">
                                <button class="btn btn-primary btn-sm" name="delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require("inc/footer.php") ?>