<?php

if(isset($_POST['submit'])) {

    // Grabbing the data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $image = $_FILES['image'];

    $newfilename = "newfilename";

    if(isset($_FILES['image'])) {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        $tmp = explode('.', $file_name);
        $file_extension = strtolower(end($tmp));

        $extensions= array("jpeg","jpg","png");
        // if(file_exists($file_name)) {
        // echo "Sorry, file already exists.";
        // }

        if(in_array($file_extension,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        // if($file_size > 2097152){
        //     $errors[]='File size must be excately 2 MB';
        // }

        if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../assets/images/".$newfilename.".".$file_extension);
        echo "Success";
        echo "<script>window.close();</script>";

        }

        else{
            print_r($errors);
        }
        die();
    }



    // Instantiate RegisterController class
    include "../classes/Dbh.php";
    include "../classes/User.php";
    include "../classes/RegisterController.php";

    $registerControllerObj = new RegisterController($username, $email, $password, $confirm_password, $first_name, $last_name, $date_of_birth);

    // Running error handlers and user signup
    $registerControllerObj->addUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}