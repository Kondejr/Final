<?php
    include("db.php");
    $title = "";
    $description = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = sqlsrv_query($conn, $query);

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($result);
        if ($row === null) {
            echo "No results found";
        } else {
            $title = $row['title'];
            $description = $row['description'];
        }
    }
    
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
        sqlsrv_query($conn, $query);
        
        $_SESSION['message'] = 'Task update successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: home.php");
    }
?>

<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>