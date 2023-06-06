<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Staff</h1>

        <br><br>

        <?php
            if(isset($_SEESION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>


<?php include('partials/footer.php') ?>



<?php
    
    if(isset($_POST['submit']))
    {


        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==true)
        {
            //echo "data insertd";
            $_SESSION['add'] = "Success!";
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            $_SESSION['add'] = "Faild to Add";
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }

?>