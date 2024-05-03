<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements-Success</title>
    <link rel="stylesheet" href="../navBar/navbar.css">
    <link rel="stylesheet" href="../../index.css">
    <link rel="shortcut icon" href="../../assets/favicon.webp" type="image/x-icon">
</head>
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
           border-radius: 0.2rem;
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
            margin-top: 6rem;
        }
       
        .applicationDone-container h1{
           font-size: 0.8rem;
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
<body>
<?php include(".././navBar/navBar.php") ?>

<div class="applicationDone-container">
<img  src="./successfull1.gif" alt="done-icon"/>
<h1>The Role Requirement details have been successfully submitted.</h1>
<p>To view Updates, click here</p>
<a href="http://localhost:3000/index.php#"> Go To Home</a>
</div>

</body>
</html>