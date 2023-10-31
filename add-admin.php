<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1> ADD ADMIN </h1>

</br>
</br>
<?php

if(isset($_SESSION['add'])) //cehcking whether the session si set or not
{
   echo $_SESSION['add'];  //DIsplay the session message
   unset($_SESSION['add']); //Remove the session message

}

?>
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"> </td>
            
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Your Username"> </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Your password"> </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="Submit" value="Add Admin" class="btn-secondary">
            </td>
            </tr>


                

    </table>

            
     </form>

    </div>
</div>

<?php
  //Process the value from Form and save it in Database
  //Check whether the submit button is clicked or not.

  if(isset($_POST['Submit']))
  {
    //Button clicked 
    //echo"Button Clicked";

    //1.Get the data from form
      $full_name= $_POST['full_name'];
      $username= $_POST['username'];
      $password= md5($_POST['password']); //Password encryption with md5

      //2.SQL Queery to save the data in data base

      $sql = "INSERT INTO tbl_admin SET
              full_name='$full_name',
              username='$username',
              password='$password'
      ";

      //3.Execute querry and save data into Database
      
      $res = mysqli_query($conn, @$sql) or die(mysqli_error());

      //4.check whether the(queery is executed) data is inserted or not
      if($res==True)
{
    //data inserted
    //echo "Data Inserted";
    //create a session variable
    $_SESSION['add'] = "Admin added succesfully";
    //Redirect page to manage admin
    header("location:".SITEURL.'admin/manage-admin.php');

}
else {

    //failed

    //echo "Failed to insert Data";

    //create a session variable
    $_SESSION['add'] = "failed to add admin";
    //Redirect page to manage admin
    header("location:".SITEURL.'admin/add-admin.php');
}
  }

 
  ?>

<?php include('partials/footer.php') ?>