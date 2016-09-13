<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:40 PM
 */

include "../includes/php/base.php";
include "../includes/php/general.php";

$action = get_value('action');
if($action != ""){
    switch($action){
        case "email":
            $email = mysqli_real_escape_string($conn, get_value('email'));
            $name = mysqli_real_escape_string($conn, get_value('name'));
            $subject = mysqli_real_escape_string($conn, get_value('subject'));
            $message = mysqli_real_escape_string($conn, get_value('message'));

            $account = "isuwebdevclub@gmail.com";

            $message = "
               <html>
                <body>
                    <h2>".$name."</h2>
                    <p>".$message."</p>
                </body>
               </html>
            ";

            $subject = "Web Dev Club -- ".$subject;

            $headers = "From: ".$email;
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($account, $subject, $message, $message,$headers);
            

    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Document meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Other meta -->
        <meta name="description" content="The Web Development Club at Iowa State University is a community of students who want to learn about and practice web development.">
        <meta name="author" content="ISU Web Dev Club members">
        <link rel="icon" href="/favicon.ico">
        <title>Contact | Web Development Club</title>


        <!-- Custom CSS -->
        <link rel="stylesheet" href="../includes/css/site-theme.css" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../includes/css/header.css">
        <link rel="stylesheet" href="../includes/css/footer.css">
    </head>
<?php include "../includes/php/header.php" ?>
<body>
    <div id="content">
        <div id="content-sub">
            <h1>Contact</h1>
            <hr>
            <div id="contact_div">
                <h2>Want us to make your website?</h2>
                <form id="email_form" action="/contact/" method="post">
                    <input name="action" value="action" type="hidden">
                    <input class="email_input" id="name" type="text" name="name" placeholder="Name">
                    <input class="email_input" id="email" type="text" name="email" placeholder="Email">
                    <input class="email_input" id="subject" type="text" name="subject" placeholder="Subject">
                    <textarea class="email_input"  id="message" name="message" placeholder="Message"></textarea>
                    <br>
                    <input id="submit_email" type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "../includes/php/footer.php" ?>

