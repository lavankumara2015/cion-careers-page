<?php 
include("./components/connectDB.php");

$errorMessage = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputName = htmlspecialchars($_POST["hm-name"]);
    $inputEmail = htmlspecialchars($_POST["hm-email-id"]);

    $sql = "SELECT hiring_manager, hiring_manager_email FROM careers WHERE hiring_manager = ? AND hiring_manager_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $inputName, $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {         
        session_start();
        $_SESSION['inputName'] =  $inputName;
        $_SESSION['inputEmail'] =  $inputEmail;
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
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link rel="shortcut icon" href="./assets/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="./styles/index3.css">
    <link rel="stylesheet" href="./styles/navbar.css">

</head>
<body>
    <?php include("./components/navBar/navBar.php") ?>
    <div class="login-main-container">
        <form method="post" action="">
        <h1 class="hm-login-h1">Hiring Manager Login</h1>

            <label for="hm-name">Name :</label><br>
            <input type="text" name="hm-name" id="hm-name" placeholder="Enter Name" required><br>
            <label for="hm-email-id" class="hm-email-id">Email-id :</label><br>
            <input type="email" name="hm-email-id" id="hm-email-id" placeholder="Enter Your Email" required><br>
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
