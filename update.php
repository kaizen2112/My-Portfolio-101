<!-- i want to update the data in the database portfolioDB of about table using the php code 
// Path: update.php      -->
<?php    
 include 'connect.php';
 if(isset($_GET['updateid'])) {
     $id = $_GET['updateid'];

     $sql = "update about set experience1='$_POST[experience1]', education1='$_POST[education1]', description1='$_POST[description1]' where id=$id";
     $result = mysqli_query($con, $sql);
     if($result) {
         // echo "Updated successfully";
         header('location:admin.php');                                                                                                                                                                                                

     }else{               

         die(mysqli_error($con));    
     }                                            
 }                                                                                                                                                                            
?>                                                                           
                                                                                                                                                                                                                                                                                                                                                         -->
                                                                                                                                                                                                                                                                                                                                                        

