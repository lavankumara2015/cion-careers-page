<?php 
include("./components/connectDB.php");

$errorMessage = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputEmail = htmlspecialchars($_POST["hm-email-id"]);
    $inputPassword = htmlspecialchars($_POST["hm-password"]);


    $sql = "SELECT hiring_manager_email, password FROM admin WHERE hiring_manager_email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $inputEmail, $inputPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {         
        session_start();
        $_SESSION['inputEmail'] =  $inputEmail;
        $_SESSION['inputPassword'] =  $inputPassword;

        echo $inputEmail;
        echo $inputPassword;

        header("Location: ../components/viewApplications.php");       
        exit();
    } else {
        $errorMessage = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="./assets/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="./styles/index3.css">
    <link rel="stylesheet" href="./styles/navbar.css">

</head>
<body>
    <?php include("./components/navBar/navBar.php") ?>
    <div class="login-main-container">
        <form method="post" action="">
        <h1 class="hm-login-h1">Hiring Manager Login</h1>

            <label for="hm-email-id" class="hm-email-id">Email-id :</label><br>
            <input type="email" name="hm-email-id" id="hm-email-id" placeholder="Enter Your Email" required><br>
           
            <label for="hm-password" class="hm-password">Password :</label><br>
            <input type="password" name="hm-password" id="hm-password" placeholder="Enter Password" required><br>
           
            <?php if($errorMessage !== ""): ?>
            <h5 style="font-size: 0.3rem; color:red; position:relative; bottom:0.5rem"><?= $errorMessage ?></h5>
            <?php endif; ?>
            <input type="submit" value="Login" id="login-btn">
        </form>
    </div>
            </br><br/>
            <?php include("./components/footer/footer.php")?>
</body>
</html>
