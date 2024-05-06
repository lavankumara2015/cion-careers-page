<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers</title>
    <link rel="shortcut icon" href="../../assets/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap">
    <link rel="stylesheet" href="../../styles/navbar.css">
    <link rel="stylesheet" href="../../styles/index.css">

    <style>
     
* {
  font-family: "Source Sans 3", sans-serif;

}
        .applicationDone-container{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 0.6rem;
        }
        .applicationDone-container img{
            width: 8rem;
            height: 6rem;
        }
        .applicationDone-container h1{
           font-size: 0.8rem;
        }
        .applicationDone-container p{
           font-size: 0.6rem;
           position: relative;
          
        }
        .applicationDone-container a{
           border: 0.1rem solid #802a8f;
           border-radius: 0.1rem;
           padding: 0.1rem 0.3rem;
           background-color: #802a8f;
           color: #fff;
           text-decoration: none;
           position: relative;
           top: 0.6rem;
           font-size: 0.4rem;
        }
        @media screen and (max-width: 768px) {
            .applicationDone-container{
            margin-top: 1rem;
        }
       
        .applicationDone-container h1{
           font-size: 0.65rem;
        }
        .applicationDone-container p{
           font-size: 0.5rem;
           position: relative;
          
        }
        .applicationDone-container a{
           border: 0.1rem solid #802a8f;
           border-radius: 0.2rem;
           padding: 0.1rem 0.3rem;
           background-color: #802a8f;
           color: #fff;
           text-decoration: none;
           position: relative;
           top: 0.6rem;
           font-size: 0.4rem;
        }
        }
    </style>

</head>
<body>

<?php include("../../components/navBar/navBar.php") ?>

<div class="applicationDone-container">
<img  src="../../assets/successfull1.gif" alt="successful-icon"/>
<h1>Your Application Received</h1>
<p>Thank you for applying to our company. We will get back to you soon.</p>
<a href="../../index.php"> Go To Home</a>
</div>


<div style="margin-top: 3rem;"><?php include("../../components/footer/footer.php") ?></div>

</body>
</html>