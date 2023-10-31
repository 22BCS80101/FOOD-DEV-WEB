<?php
     
     //include constants.php file here
     include('../config/constants.php');
     
     //1. get the id of admin to be deleted
      $id = $_GET['id'];

     //2.create sql queery
     $sql = "DELETE FROM tbl_admin WHERE id=$id";

     //Execute the queery
     $res = mysqli_query($conn, $sql);

     //check whether the query is executed succesfully or not
     if($res==true)
     {

        //Query executed succesfully and admin deleted
        //echo "Admin deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin deleted succesfully.</div>";

        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
     }

     else{

        //failed to delete admin
        //echo "Failed to delete admin";

        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again latter.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }


     //3.redirect to manage admin page with message(success/error)
?>