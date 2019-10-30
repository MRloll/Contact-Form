<?php

        //check if your coming from a request
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

                //assgin vars
                $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $cellphone = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
                $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

                //ceating array of errors
                $formErrors = array();

                if(strlen($user) < 3) {
                        $formErrors[] = "Username must be more than 3 charachters";
                }
                if(strlen($msg) < 3) {
                        $formErrors[] = "message must be more than 10 charachters";
                }
                if(strlen($cellphone) < 7 || strlen($cellphone) > 13) {

                        $formErrors[] = "phone number must be between 7 and 13 numbers";
                }

                
                //if no errors send the email
                $headers = "Form: " . $email . "\r\n";

                if(empty($formErrors)) {
                        mail("walidelloll2018@yahoo.com", 'Contact Form', $msg, $headers);

                        $user           = '';
                        $email          = '';
                        $msg            = '';
                        $cellphone      = '';

                        $success = '<div class="alert alert-success"> We have recieved your message</div>';
                }

        }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="keywords" content="HTML,CSS,XML,JavaScript"/>
        <meta name="author" content="MR. Loll"/>
        <title>Tinker</title>
        <link rel="stylesheet" href="css/all.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/app.css" type="text/css"/>
    </head>
    <body>

        <!-- Start form  -->

        <div class="container">
            <h2 class="text-center">Contact Me</h2>
            <?php if (! empty($formErrors)) { ?>
                <div class="errors alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        <?php 
                                foreach($formErrors as $error) {
                                        echo $error . "<br />";
                                }
                        ?>
                </div>
            <?php } ?>
            <?php if(isset($success)){ echo $success;} ?>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                            <input 
                                class="username form-control" 
                                type="text" name="username" 
                                placeholder="Type your name" 
                                value="<?php if (isset($user))  {echo $user;}?>"/>
                            <i class="fa fa-user"></i>
                    </div>
                    <div class="alert alert-danger custom-alert">
                                Username must be more than 3 charachters
                    </div>     

                    <div class="form-group">
                            <input 
                                class="email form-control" 
                                type="email" name="email" 
                                placeholder="Type your Email" 
                                value="<?php if (isset($email))  {echo $email;}?>"/>
                            <i class="fa fa-envelope"></i>        
                    </div>
                    <div class="alert alert-danger custom-alert">
                                Email cant empty
                    </div>     

                    <div class="form-group" >
                            <input 
                                class="cellphone form-control" 
                                type="text" name="cellphone" 
                                placeholder="Type your number"  
                                value="<?php if (isset($cellphone))  {echo $cellphone;}?>"/>
                            <i class="fa fa-phone"></i>        
                    </div>
                    <div class="alert alert-danger custom-alert">
                                phone number must be between 7 and 13 numbers
                    </div>     
                    
                    <div class="form-group">
                        <textarea 
                                class="message form-control" 
                                placeholder="Type your message" 
                                name="message"><?php if (isset($msg))  {echo $msg;}?></textarea>

                    </div>
                    <div class="alert alert-danger custom-alert">
                                Username must be more than 3 charachters
                    </div>     

                    <div class="form-group" >
                            <input 
                                class="btn btn-info "
                                type="submit" 
                                value="Send Info" />
                            <i class="fas fa-paper-plane"></i>     
                    </div>
            </form>
        </div>

        <!-- End  form  -->






        <script src="js/jQuery-3-4-1.min.js">
        </script><script src="js/app.js"></script>        
    </body>
</html>