<?php
    include 'connect.php';
    $id = $_GET['updateid'];

    $sqlhome = "Select * from `home` where id=$id";
    $resulthome = mysqli_query($con, $sqlhome);
    $rowhome = mysqli_fetch_assoc($resulthome); 
    $name = $rowhome['name'];
    $subtitle = $rowhome['subtitle'];
   


    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $subtitle= $_POST['subtitle'];
        

        $sqlhome = "update `home` set id=$id, name='$name', subtitle='$subtitle' where id=$id";

        $resulthome = mysqli_query($con, $sqlhome); 

        if($resulthome) {
            //echo "Data updated successfully";
            header('location:admin.php');
        }
        else {
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
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name"   
                value=<?php echo $name; ?>>
            </div>

            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Enter your subtitle" name="subtitle"
                value=<?php echo $subtitle; ?>>
            </div>

            

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>