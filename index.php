<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:17 PM
 */

include "includes/php/general.php";
include "includes/php/base.php";

$sql = "SELECT * FROM meetings WHERE active='yes'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) == 1){
    $result = mysqli_fetch_assoc($query);

    $day = $result['day'];
    $building = $result['building'];
    $room = $result['room'];

    $start_time = convert_time($result['start_time']);
    $end_time = convert_time($result['end_time']);

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
    <link rel="icon" href="favicon.ico">
    <title>Home | Web Development Club</title>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="includes/css/site-theme.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="includes/css/header.css">
    <link rel="stylesheet" href="includes/css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<?php include "includes/php/header.php" ?>
<img id="background-div" src="includes/images/newbackground.jpg">
<body>

<div class="title">
    <div class="container">
        <h1>Web Development Club</h1>
        <p>Iowa State University's craftiest code monkeys</p>
    </div>
</div>
<div id="shelf_div">
    <img src="includes/images/icons/divider.png" alt="chalkboard shelf" id="chalkshelf">
</div>

<div class="container" id="content">
    <div id="side_by_side">
        <div id="meetings_div">
            <div id="meetings">
                <h1>Meetings</h1>
                <?php
                if(mysqli_num_rows($query) == 1){
                ?>
                <div id="meeting-info" style="margin: 20px 0 50px 50px">
                    <h3><span>When:&nbsp;</span>&nbsp;&nbsp;<?= $day. " from ".$start_time." - ".$end_time ?></h3>

                    <h3><span>Where:</span>&nbsp;&nbsp;<?= $room." ".$building  ?></h3>
                </div>
                <?php
                }else {
                    ?>
                    <div id="meeting-info" style="margin: 20px 0 50px 50px">
                        <h3>Meeting Information is not available at this time.</h3>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div id="announcements">
                <h1>Announcements</h1>
                <p>We are having trouble displaying announcement information.</p>
                <p>Please visit the <a href="https://www.stuorg.iastate.edu/site/web-dev-club" style="color: rgb(108,118,200)" target="_blank">stuorg webpage</a> for current Web Dev Club announcements.</p>
            </div>
        </div>
        <div id="twitter_div">
            <a class="twitter-timeline" href="https://twitter.com/ISU_Web_Dev" data-widget-id="633110712139673600">Tweets
                by @ISU_Web_Dev</a>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");
            </script>
        </div>
    </div>

    <div id="calendar_div">
        <h1 style="margin: 50px 0 25px 0">Calendar of Events</h1>
        <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=isuwebdevclub%40gmail.com&amp;color=%231B887A&amp;ctz=America%2FChicago"
                style=" border-width:0 " width="100%" height="100%" frameborder="0" scrolling="no">

        </iframe>
    </div>
</div>



</body>
<?php include "includes/php/footer.php" ?>
</html>

