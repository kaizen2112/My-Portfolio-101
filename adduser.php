<?php
    include 'connect.php';

    // Handle form submission
    if(isset($_POST['submit'])) {
        // Collect form data
        $experience = $_POST['experience'];
        $education = $_POST['education'];
        $description = $_POST['description'];

        // Insert data into the database
        $sql = "INSERT INTO `about` (experience1, education1, description1) VALUES ('$experience', '$education', '$description')";
        $result = mysqli_query($con, $sql);

        // Check if insertion was successful
        if($result) {
            // Redirect to the same page to avoid form resubmission
            header('location: admin.php');
        } else {
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>About Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Experience</th>
                    <th>Education</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch about information from the database
                $result = $con->query("SELECT * FROM about");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['experience1']."</td>";
                        echo "<td>".$row['education1']."</td>";
                        echo "<td>".$row['description1']."</td>";
                        echo "<td>
                            <a href='updateabout.php?updateid=".$row['id']."' class='btn btn-primary'>Update</a>
                            <a href='delete_message.php?deleteid=".$row['id']."' class='btn btn-danger'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                $con->close();
                ?>
            </tbody>
        </table>

        <!-- Form for adding a new row -->
        <form method="POST">
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <input type="text" class="form-control" id="experience" name="experience">
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Education</label>
                <input type="text" class="form-control" id="education" name="education">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Row</button>
        </form>
    </div>
</body>
</html>
