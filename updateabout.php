<?php
    include 'connect.php';
    $id = $_GET['updateid'];

    $sqlabout = "SELECT * FROM `about` WHERE id=$id";
    $resultabout = mysqli_query($con, $sqlabout);
    $rowabout = mysqli_fetch_assoc($resultabout); 
    $exp1 = $rowabout['experience1'];
    $edu1 = $rowabout['education1'];
    $des1 = $rowabout['description1'];

    if(isset($_POST['submit'])) {
        $exp1 = $_POST['experience1'];
        $edu1 = $_POST['education1'];
        $des1 = $_POST['description1'];
        
        $sqlupdate = "UPDATE `about` SET experience1='$exp1', education1='$edu1', description1='$des1' WHERE id=$id";

        $resultupdate = mysqli_query($con, $sqlupdate); 

        if($resultupdate) {
            header('location:admin.php');
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form method="POST">
            <div class="form-group">
                <label>Experience</label>
                <input type="text" class="form-control" placeholder="Enter your experience" name="experience1"   
                value="<?php echo $exp1; ?>">
            </div>
            <div class="form-group">
                <label>Education</label>
                <input type="text" class="form-control" placeholder="Enter your education" name="education1"
                value="<?php echo $edu1; ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter your description" name="description1"
                value="<?php echo $des1; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
