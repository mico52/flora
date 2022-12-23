<?php
require_once("connection.php");

$action='';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}

switch($action){
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == '' && $password == ''){
            $out['error'] = true;
            $out['email'] = 'Please enter your username or email';
            $out['password'] = 'Please enter your password';
        }
        else if($password == ''){
            $out['error'] = true;
            $out['password'] = 'Please enter your password';
        }
        else if($email == ''){
            $out['error'] = true;
            $out['email'] = 'Please enter your username or email';
        }
        else{
            $sql = "SELECT * from users WHERE (`username`='$email' OR `email`='$email') and `password`='$password'";
            $query = $connect -> query($sql);
        
            if($query -> rowCount() > 0){
                while($row = $query -> fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['user'] = $row['id'];
                    $out['email'] = '';
                    $out['password'] = '';
                }
            }
            else{
                $out['error'] = true;
                $out['email'] = 'Your email address or password were not correct. Please try again.';
                $out['password'] = 'Your email address or password were not correct. Please try again.';
            }
        }
        echo json_encode($out);
        break;

    case 'register':
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($password == $cpassword){
            $sql = "SELECT `username`, `email` from `users` WHERE `username` = '$username' OR `email` = '$email'";
            $query = $connect -> query($sql);
            if($query -> rowCount() == 0){
                $sql1 = "INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$password')";
                $query1 = $connect->query($sql1);
                $out['success'] = true;
                $out['message'] = 'Your new account has been created successfully.';
            }
            else{
                $out['message'] = 'Already has an account.';
            }
        }
        else{
            $out['error'] = true;
            $out['message'] = 'Please repeat your password.';
        }
        echo json_encode($out);
        break;
}
die();
$connect -> close();
?>