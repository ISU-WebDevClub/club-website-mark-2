<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:40 PM
 */
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
    <title>About | Web Development Club</title>


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
        <h1>About Us</h1>
        <hr>
        <div id="purpose">
            <h2>Purpose</h2>

            <div id="purpose-list-container">
                <ol>
                    <li>To promote learning and professional growth in the field of web development.
                    </li>
                    <li>To establish a network of like-minded individuals who want to pursue web development.
                    </li>
                    <li>To give back to the Iowa State University community and local community by offering web development
                        services to students, faculty, and clubs and organizations.
                    </li>
                    <li>To give back to the greater web development community by writing and posting public code libraries,
                        extensions, plugins, etc.
                    </li>
                </ol>
            </div>
        </div>
        <div id="capabilities">
            <?php
                //TODO query capabilities and display them
            ?>
        </div>
        <div id="history">
            <?php
                //TODO query history and display it.
            ?>
        </div>
        <div id="photo_gallery">
            <?php
                //TODO query the photos from the db and display them.
            ?>
        </div>
    </div>
<!--    <div id="content-sub">-->
<!--        <div class="page-header">-->
<!--            <h1>About</h1>-->
<!--            <hr>-->
<!--        </div>-->
<!---->
<!--        <div id="club-purpose">-->
<!--            <h2>Purpose</h2>-->
<!---->
<!--            <div id="purpose-list-container">-->
<!--                <ol>-->
<!--                    <li>To promote learning and professional growth in the field of web development.-->
<!--                    </li>-->
<!--                    <li>To establish a network of like-minded individuals who want to pursue web development.-->
<!--                    </li>-->
<!--                    <li>To give back to the Iowa State University community and local community by offering web development-->
<!--                        services to students, faculty, and clubs and organizations.-->
<!--                    </li>-->
<!--                    <li>To give back to the greater web development community by writing and posting public code libraries,-->
<!--                        extensions, plugins, etc.-->
<!--                    </li>-->
<!--                </ol>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div id="club-history">-->
<!--            <h2>History</h2>-->
<!---->
<!--            <p>The first semester of the club's existence started out with a bang! Our numbers grew rapidly, and everyone-->
<!--                was eager to get started. As expected, there was a massive amount of interest in the club even before we-->
<!--                began to promote ourselves. "I'm surprised there wasn't already a Web Development Club," was a common-->
<!--                expression when we told others about the club. People of all skill levels joined and brought a wide range of-->
<!--                skills to the table.<br></p>-->
<!---->
<!--            <ul class="media-list">-->
<!--                <li class="media">-->
<!--                    <div class="media-left media-middle">-->
<!--                        <img class="media-object" src="../includes/images/WDC-logo.png" alt="The Web Development Club logo"-->
<!--                             style="height:150px">-->
<!--                    </div>-->
<!--                    <div class="media-body media-middle">-->
<!--                        <h3 class="media-heading">Founding</h3>-->
<!--                        The club was officially recognized on August 24, 2015. At that time, there were only eight members.-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="media">-->
<!--                    <div class="media-body media-middle text-right">-->
<!--                        <h3 class="media-heading">First club meeting</h3>-->
<!--                        The first meeting was held September 2nd, 2015 in Coover Hall. The weather was nice, so we moved out-->
<!--                        to-->
<!--                        the courtyard to celebrate the club's founding with some soda and cookies. There were nine members-->
<!--                        in-->
<!--                        attendance, and we all had high hopes of doing great things with the club.-->
<!--                    </div>-->
<!--                    <div class="media-right media-middle">-->
<!--                        <a href="#">-->
<!--                            <img class="media-object" src="../includes/images/first_meeting.jpg"-->
<!--                                 alt="The attendees of the first club meeting"-->
<!--                                 style="height:150px; border: thin solid white">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="media">-->
<!--                    <div class="media-left media-middle">-->
<!--                        <a href="#">-->
<!--                            <img class="media-object" src="../includes/images/ClubFest_table_Fall_2015_(small).JPG"-->
<!--                                 alt="The president and vice president at ClubFest"-->
<!--                                 style="height:150px; border: thin solid white">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="media-body media-middle">-->
<!--                        <h3 class="media-heading">Going public</h3>-->
<!--                        The club made its first public appearance at the Fall 2015 ClubFest. We had sixty-eight people sign-->
<!--                        up-->
<!--                        for the mailing list. Membership more than doubled. In addition, we networked with other clubs and-->
<!--                        found-->
<!--                        out there was a huge interest in web development services around campus and around town. We would-->
<!--                        soon-->
<!--                        have our hands full!-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="media">-->
<!--                    <div class="media-left media-middle">-->
<!--                        <img class="media-object" src="../includes/images/hackisu-logo.png" alt="HackISU Logo" style="height:75px">-->
<!--                    </div>-->
<!--                    <div class="media-body media-middle text-right">-->
<!--                        <h3 class="media-heading">HackISU</h3>-->
<!--                        On September 19, 2015 we made excellent progress on the club website at HackISU, Iowa State's annual-->
<!--                        hackathon. Sleep was lost, caffeine was consumed, and Nicolas Cage image placeholders were used in-->
<!--                        abundance.-->
<!--                    </div>-->
<!--                    <div class="media-right media-middle">-->
<!--                        <img class="media-object" src="../includes/images/cage-superman.jpg"-->
<!--                             alt="Nic Cage was ever-present during the hackathon"-->
<!--                             style="height:150px; border: thin solid white">-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!---->
<!--        <div id="club-photos">-->
<!--            <h2>Photo Gallery</h2>-->
<!---->
<!--            <div id="photos-container">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
</body>
</html>

<?php include "../includes/php/footer.php" ?>
