<?php

$form_used = false;
if($_POST) {
    // Define all the variables concerning a contact form
    $name = "";
    $email = "";
    $title = "";
    $message = "";
    $email_body = "<div>";
      
    // Filter the name according to the name, and add it to the body
    if (isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;
                           <span>".$name."</span> 
                        </div>";
    }
 
    // Filter the email according to the valid emails, and add it to the body
    if (isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $body .= "  <div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
                    </div>";
    }
      
    // Filter the title according to the titles, and add it to the body
    if(isset($_POST['title'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$title."</span>
                        </div>";
    }
      
    // Filter the special characters and make them correct, then add it to the body
    if (isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
      
    // Define the email adddress of the receiver
    $email_recipient = "contact@merlijnsevenhuijsen.com";
      
    // Close the body of the email
    $email_body .= "</div>";
 
    // Define the headers of the html of the email
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    // If the email is sent succesfully then set the boolean to true, else to false
    if (mail($email_recipient, $title, $email_body, $headers)) {
        $successfully_sent = true;
    } else {
        $successfully_sent = false;
    }

    // Set the variable of form used to true
    $form_used = true;   
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact</title>
        <meta name="description" conctent="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="background-image" id="background-image-contact"></div>
        <div class="glass-box-container glass-box">
        <nav class="glass-box navigation-bar flex-around">
                <div class="logo">
                    <a href="index.html">Merlijn Sevenhuijsen</a>
                </div>
                <ul class="nav-links flex-around">
                    <li class="flex-around">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="flex-around">
                        <a href="about.html">About me</a>
                    </li>
                    <li class="flex-around">
                        <a href="projects.html">Projects</a>
                    </li>
                    <li class="color-contact flex-around radius-top ">
                        <a href="contact.php">Contact</a>
                    </li class="flex-around">
                    <li class="flex-around" id="li-login">
                        <a href="#"><span>Log In</span></a> 
                    </li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
            <div class="page-bar color-contact"></div>
            <div class="container" id="container-contact">
                <section class="contact-section flex-around">
                    <div class="section-box">
                        <div class="square glass-box" style="--i:0"></div>
                        <div class="square glass-box" style="--i:1"></div>
                        <div class="square glass-box" style="--i:2"></div>
                        <div class="square glass-box" style="--i:3"></div>
                        <div class="square glass-box" style="--i:4"></div>
                        <div class="form-container glass-box">
                            <div class="form">
                                <h2>Contact Me</h2>
                                <form action="contact.php" id="contact-form" method="POST">
                                    <div class="inputBx">
                                        <input name="name" type="text" class="glass-box" placeholder="Full Name">
                                    </div>
                                    <div class="inputBx">
                                        <input name="title" type="text" class="glass-box" placeholder="Subject">
                                    </div>
                                    <div class="inputBx">
                                        <input name="email" type="email" class="glass-box" placeholder="Email">
                                    </div>
                                    <div class="inputBx">
                                        <textarea name="message" class="glass-box" placeholder="Type Message Here..."></textarea>
                                    </div>
                                    <div class="glass-box inputBx">
                                        <input type="submit" value="Send">
                                    </div>
                                    <?php 
                                        if ( $form_used && $successfully_sent ) {
                                            echo '<div class="glass-box accepted contact-form-container">
                                            <p>The form has been sent successfully!</p></div>';
                                        } else if ($form_used && !$successfully_sent ) {
                                            echo '<div class="glass-box accepted contact-form-container">
                                            <p>The form has not been sent!</p></div>';
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="glass-box bottom-bar full-screen-fixed flex-around">
                <p id="copyright">&#169; 2021 Merlijn Sevenhuijsen</p>
                <ul class="social-media flex-around">
                    <li><a class="flex-around" href="https://www.facebook.com/merlijn.sevenhuijsen/"><img src="background_images/facebook.png" alt="Facebook link"></a></li>
                    <li><a class="flex-around" href="https://twitter.com/merlijndussen/"><img src="background_images/twitter.svg" alt="Twitter link"></a></li>
                    <li><a class="flex-around" href="https://www.instagram.com/merlijndussen/"><img src="background_images/instagram.png" alt="Instagram link"></a></li>
                    <li><a class="flex-around" id="gitH" href="https://github.com/SevenhuijsenM"><img src="background_images/github.png" alt="Github link"></a></li>
                </ul>
            </footer>
        </div>
        <script src="checkEmail.js"></script>
        <script src="app.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    </body>
</html>