
<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`location`='$location',`email`='$email',`gender`='$gender'
     WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Data Is Updated");
    }
    else{
        echo"Failed: " . mysqli_error($conn);

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> The CRUD Application </title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #CCCCFF;">
    ASSIGNMENT OF CRUD APPLICATION
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted"> Click Update when done</p>
        </div>
        <?php
       
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Full Name:</label>
                    <input type="text" class="form-control" name= "first_name"
                    value="<?php echo $row['first_name'] ?>">
                </div>

                <div class="col">
                    <label class="form-label">Location:</label>
                    <input type="text" class="form-control" name= "location"
                    value="<?php echo $row['location'] ?>>
                    placeholder= "cenajohn@webmail.com>
                </div>

                <div class="mb-3">
                <label class="form-label">E.mail:</label>
                    <input type="text" class="form-control" name= "email"
                    placeholder= "cenajohn@webmail.com">
                </div>
                
                <div class="form-group mb-3"> 
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="male" value="male" <?php echo ($row['gender']=='male')?
                    "checked":""; ?>>
                    <label for="male" class= "form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="female" value="female" <?php echo ($row['gender']=='female')?
                    "checked":""; ?>>
                    <label for="female" class= "form-input-label">Female</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel </a>
        
                </div>
        
        </form>
        </div>


    </div>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>