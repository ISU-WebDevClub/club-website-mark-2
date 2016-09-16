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

            $headers = "From: " . strip_tags($email) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $send = mail($account, $subject, $message,$headers);
            if($send === false){
                echo "Failed to send email";
            }
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
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    </head>
<?php include "../includes/php/header.php" ?>
<body>
    <div id="content">
        <div id="content-sub">
            <h1>Contact</h1>
            <hr>

            <div id="contact_title">
                <h1>Want us to make your website?</h1>
            </div>
            <div id="grid">

                <div id="text_div">
                    <p>Shoot us an email if you're interested in WDC making your next website.
                        Make sure you try to include as much detail as necessary to convey the scope of the project.
                        That helps members determine if they have the time/resources to tackle it.</p>
                    <p>Below are a few of the questions we consider when approaching a possible project:
                    </p>
                    <ul id="contact_list">
                        <li>What do want the website to accomplish?</li>
                        <li>When does it need to be finished? Is that deadline flexible?</li>
                        <li>Is this a re-design of a previous website? If so, what changes are you looking for?</li>
                        <li>Do you have a few examples of existing websites that have a similar look/feel as what you're trying to achieve?</li>
                        <li>Are you wanting a simple landing page website? Or will it have multiple pages and sub-pages?</li>
                        <li>Is design-work needed or do you already have a design for the website?</li>
                        <li>Is there already content (written text, artwork, etc) or will that need to be created?</li>
                        <li>Will there be a blog or any other kind of serialized content?</li>
                        <li>Will the website be selling anything? (Not sure we can do those as a university club, but individual members may still want to tackle it)</li>
                        <li>What other features are you looking for in the website?</li>
                        <li>If you don't know the answers to all those questions right away, that's ok! But it will help us better determine if we'll be able to help you.</li>
                    </ul>


                    One more thing: You'll have better luck if you approach us towards the beginning of the semester, since everyone tends to get really busy with schoolwork about halfway through the semester.
                </div>
                <div id="contact_div">
                    <p>Email us at:</p>
                    <h2>isuwebdevclub@gmail.com</h2>
                    <p>Or use the form below</p>
                    <form id="email_form" action="/contact/" method="post">
                        <input name="action" value="email" type="hidden">
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
    </div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../includes/js/shared.js" type="application/javascript"></script>
<script>
    if(is_mobile()){
        $('body').addClass('mobile');
    }
</script>
</html>

<?php include "../includes/php/footer.php" ?>

