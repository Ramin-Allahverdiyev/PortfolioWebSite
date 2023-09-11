<?php

$conn = mysqli_connect('localhost','root','rr210602','contact_db') or die('connection failed');
$result = mysqli_query($conn,'SELECT * FROM `contact_form` where id=1') or die('query failed');
$row = $result->fetch_assoc();
$name = $row['fullname'];
$email=$row['email'];
$phnnumber=$row['phnnumber'];
$address=$row['address'];
$age=$row['age'];
$experience=$row['experience'];
$uni=$row['uni'];
$profession=$row['profession'];
$profile=$row['profile'];
$trade=$row['trade'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ramin Allahverdiyev</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- header section starts  -->

<header class="header">

   <div id="menu-btn" class="fas fa-bars"></div>

   <a href="#home" class="logo">Portfolio</a>

   <nav class="navbar">
      <a href="#home" class="active">home</a>
      <a href="#about">about</a>
      <a href="#portfolio">gallery</a>
      <a href="#contact">contact</a>
   </nav>

   <?php 
      include "social.php";
      echo '<div class="follow">
      <a href="'.$rowss['facebook'].'" class="fab fa-facebook-f"></a>
      <a href="'.$rowss['twitter'].'" class="fab fa-twitter"></a>
      <a href="'.$rowss['ig'].'" class="fab fa-instagram"></a>
      <a href="'.$rowss['lnkdn'].'" class="fab fa-linkedin"></a>
      <a href="'.$rowss['github'].'" class="fab fa-github"></a>
   </div>'
   ?>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="image" data-aos="fade-right">
      <?php echo '<img src="profile.php">'?>
   </div>

   <div class="content">
      <?php 
      echo '<h3> Hi I AM ' .$name. '</h3>
      <span data-aos="fade-up">'.$profession.'</span>' ?>
      <p data-aos="fade-up"></p>
      <a data-aos="fade-up" href="#about" class="btn">about me</a>
   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading" data-aos="fade-up"> <span>biography</span> </h1>

   <div class="biography">

      <?php include 'skills.php'; echo'
      <p data-aos="fade-up">Hello, I am '.$name.'. I am studying '.$roww['trade'].' at '.$roww['uni'].'. I am currently in my '.$roww['grade'].'rd grade at university.</p>
      
      <div class="bio">
         <h3 data-aos="zoom-in"> <span>name : </span>'.$name. '</h3>
         <h3 data-aos="zoom-in"> <span>email : </span>'. $email. '</h3>
         <h3 data-aos="zoom-in"> <span>address : </span> '.$address.' </h3>
         <h3 data-aos="zoom-in"> <span>phone : </span> '.$phnnumber.' </h3>
         <h3 data-aos="zoom-in"> <span>age : </span> '.$age.' </h3>
         <h3 data-aos="zoom-in"> <span>experience : </span> '.$experience.'+ years </h3>
         <h3 data-aos="zoom-in"> <span>University : </span> '.$roww['uni'].'</h3>
      </div>
      '?>
      <!-- <a href="#" class="btn" data-aos="fade-up">download CV</a> -->

   </div>
   
   <div class="skills" data-aos="fade-up">

      <h1 class="heading"> <span>skills</span> </h1>

      <div class="progress"> <?php include 'skills.php'; echo  '
         <div class="bar" data-aos="fade-left"> <h3 style="width: '.$roww['html'].'%;"><span>HTML</span> <span>'.$roww['html'].'%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3 style="width: '.$roww['css'].'%;"><span>CSS</span> <span>'.$roww['css'].'%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3 style="width: '.$roww['java'].'%;"><span>Java</span> <span>'.$roww['java'].'%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3 style="width: '.$roww['php'].'%;"><span>PHP</span> <span>'.$roww['php'].'%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3 style="width: '.$roww['python'].'%;"><span>Python</span> <span>'.$roww['python'].'%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3 style="width: '.$roww['csharp'].'%;"><span>C#</span> <span>'.$roww['csharp'].'%</span></h3> </div>
         '?>
      </div>

   </div>

  

</section>

<!-- about section ends -->


<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

   <h1 class="heading" data-aos="fade-up"> <span>gallery</span> </h1>

   <div class="box-container">
      
      <?php
         include "imagess.php";
         $dir = "images";
         $files = scandir($dir);
         
         $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
         $images = array();
         
         foreach ($files as $file) {
           $extension = pathinfo($file, PATHINFO_EXTENSION);
           if (in_array($extension, $allowed_extensions)) {
             $images[] = $dir . '/' . $file;
           }
         }
         foreach ($images as $image) {
            echo '
                  <div id="imageContainer" data-aos="zoom-in">
                  <img src="' . $image . '" alt="Image" height="200px" width="300px" class="popup-image">
                  </div>
                  <div id="popup" class="popup-overlay">
                     <span class="close">&times;</span>
                     <img id="popupImage" src="" alt="Popup Image">
                  </div>               
               ';
          }
          


      ?>
   <style>
      /* Styling for the popup overlay */
         .popup-overlay {
         display: none;
         position: fixed;
         z-index: 9999;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.7);
         }

         /* Styling for the popup image */
         #popupImage {
            display: block;
            margin: 200px auto;
            max-width: 80%;
            max-height: 80%;
            width: 600px ;
            height: 400px;
         }

         /* Styling for the close button */
         .close {
         color: #fff;
         position: absolute;
         top: 10px;
         right: 20px;
         font-size: 30px;
         font-weight: bold;
         cursor: pointer;
         }

         .close:hover {
         color: #f00;
         }

   </style>

   <script>
      // Get all the images with the class "popup-image"
      const images = document.getElementsByClassName("popup-image");

      // Get the popup overlay and image elements
      const popup = document.getElementById("popup");
      const popupImage = document.getElementById("popupImage");

      // Get the close button element
      const closeButton = document.querySelector(".close");

      // Add event listener to each image
      for (let i = 0; i < images.length; i++) {
      images[i].addEventListener("click", function(event) {
         // Get the clicked image source
         const src = event.target.getAttribute("src");

         // Set the popup image source
         popupImage.setAttribute("src", src);

         // Display the popup
         popup.style.display = "block";
      });
      }

      // Add event listener to the close button
      closeButton.addEventListener("click", function() {
      // Hide the popup
      popup.style.display = "none";
      });


   </script>
   


   </div>





</section>

<!-- portfolio section ends -->

<!-- contact section starts  -->

<script type="text/javascript">
        $(document).ready(function() {
            $("#btn").click(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                $.ajax({
                    type: "POST",
                    url: "reset.php",
                    data: {email:email},
                  })
            }) 
        })
    </script>


<section class="contact" id="contact">

   <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="nameofuser" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="emailofuser" placeholder="enter your email" class="box" id="email" required>
      </div>
      <!-- <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required> -->
      <textarea data-aos="fade-up" name="messagess" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="sendd" class="btn" id="btn">
   </form>

   <?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   require 'PHPMailer.php';
   require 'SMTP.php';
if(isset($_POST['sendd'])) {
      
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = "ssl"; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; 
        $mail->Username = "$email";
        $mail->Password = "cqiaqpwnvszbbjdd"; 
        $mail->setFrom("$email");
        $mail->addAddress("$email");
        $mail->isHTML(true);
        $mail->Subject = $_POST['emailofuser'];
        $mail->Body =$_POST['messagess'];
        $mail->AddReplyTo("$email");
        $mail->send();
        
}
?>
   
   <div class="box-container">
   <?php echo'
      <div class="box" data-aos="zoom-in">
         <i class="fas fa-phone"></i>
         <h3>phone</h3>
         <p>'.$phnnumber.'</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <p>'.$email.'</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-map-marker-alt"></i>
         <h3>address</h3>
         <p>'.$address.'</p>
      </div>
      '?>
   </div>

</section>

<!-- contact section ends -->

<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>mr. Ramin</span> </div>


<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>