<?php include 'config.php' ?>
<?php


$userName = $_POST['email'];
$password = $_POST['password'];


$sql = " SELECT fname, pass FROM users  where fname= '$userName' ";
$result = $conn->query($sql);
if ($result->num_rows  == 1 ) {
    $hashpassword = password_hash($password , PASSWORD_DEFAULT);

    if (password_verify($password, $hashpassword)) {


       $userData = mysqli_fetch_array($result);
       $username = $userData['fname'];
       $cookie_name ='userinfo';
       $cookie_value = $username;
       setcookie($cookie_name,$cookie_value,time()+86400*30);
       header('location:home.php');
       
    }
}


?>