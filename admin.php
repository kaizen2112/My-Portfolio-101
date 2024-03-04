<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop further execution
}

// If logout is clicked, destroy the session and redirect to login page
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Rest of your admin.php code goes here


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow: hidden;
        }
        .container.c0 .button,
        .container.c1 .button {
            padding: 8px 16px; /* Adjust padding as needed */
            margin-right: 10px;
            margin-bottom: 4px;
        }
        h2 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .admin-header {
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 8px 8px 0 0;
        }
        .admin-header h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>Admin Panel</h1>
    </div>
    <div class="container c0">
        <h2>Home Information</h2>
        <table>
            <!-- Table content here -->
            <tr>
                <th>Name</th>
                <th>Subtitle</th>
                <th>Action</th>
                
            </tr>
            <?php
            // Connect to MySQL database
            include 'connect.php';

            // Fetch messages from database
            $result = $con->query("SELECT * FROM home");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['subtitle']."</td>";
                    
                    echo "<td>
                    <a href='updatehome.php?updateid=".$row['id']."' class='button'>Update</a>
                    <a href='delete_message.php?deleteid=".$row['id']."' class='button'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            $con->close();
            ?>
        </table>
    </div>
    <div class="container c1">
        <h2>About Information</h2>
        <table>
            <!-- Table content here -->

            <tr>
                <th>Experience</th>
                <th>Education</th>
                <th>Description</th>
                <th>Action</th>
                
            </tr>
            <?php
            // Connect to MySQL database
            include 'connect.php';

            // Fetch messages from database
            $result = $con->query("SELECT * FROM about");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['experience1']."</td>";
                    echo "<td>".$row['education1']."</td>";
                    echo "<td>".$row['description1']."</td>";

                    echo "<td>
                    <a href='updateabout.php?updateid=".$row['id']."' class='button'>Update</a>
                    <a href='delete_about.php?deleteid=".$row['id']."' class='button'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            $con->close();
            ?>



        </table>
        <!-- <button id="addRowButton" class="button">Add Row</button> -->
        <button class="btn btn-primary my-5 "><a href="adduser.php" class="text-light">Add user</a> </button>
    </div>
    <div class="container cN">
        <h2>Messages</h2>
        <table>
            <!-- Table content here -->

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php
            // Connect to MySQL database
            include 'connect.php';

            // Fetch messages from database
            $result = $con->query("SELECT * FROM messageme");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['message']."</td>";
                    echo "<td><a href='delete_message.php?deleteid=".$row['id']."' class='button'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No messages found</td></tr>";
            }
            $con->close();
            ?>


        </table>
    </div>
    
</body>
</html>
