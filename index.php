<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:17 PM
 */

$string =  getUrl("https://www.stuorg.iastate.edu/site/web-dev-club");
//echo "At ---------------------- " . strpos($string, "News &");
$string = substr($string, strpos($string, "<blockquote>"));
$string = substr($string, 0, strpos($string,"<h2>Membership Information</h2>"));

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
    <title>Web Development Club | Iowa State University</title>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="includes/css/site-theme.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="includes/css/header.css">
    <link rel="stylesheet" href="includes/css/footer.css">
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
    <img src="includes/images/divider.png" alt="chalkboard shelf" id="chalkshelf">
</div>

<div class="container" id="content">
    <div id="side_by_side">
        <div id="meetings_div">
            <div id="meetings">
                <h2>Meetings</h2>
                <div id="meeting-info" style="margin: 20px 0 50px 50px">
                    <h3><span>When:&nbsp;</span>&nbsp;&nbsp;<?php //TODO pull from DB. ?></h3>

                    <h3><span>Where:</span>&nbsp;&nbsp;</h3>
                </div>
            </div>
            <div id="announcements">
                <h2>Announcements</h2>
                <?php
                    $announcements = explode("<blockquote>",$string);

                    foreach($announcements as $curr){
                        $result = parse_announcements($curr);
                        echo $result['date'];
                        //TODO print out results
                    }
                ?>

                <!--The javascript at the bottom loads this with announcements from the Student Organization database.-->
<!--                TODO pull announcements from the stuorg webpage.-->
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
        <h2 style="margin: 50px 0 25px 0">Calendar of Events</h2>
        <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=isuwebdevclub%40gmail.com&amp;color=%231B887A&amp;ctz=America%2FChicago"
                style=" border-width:0 " width="100%" height="100%" frameborder="0" scrolling="no">

        </iframe>
    </div>
</div>



</body>
<?php include "includes/php/footer.php" ?>
</html>

<?php

function getURL($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $tmp = curl_exec($ch);
    curl_close($ch);
    if ($tmp != false){
        return $tmp;
    }
}

function parse_announcements($string){
    
    $announcements = array();
//    $announcements['date'] = substr($string, strpos($string, "</i>"), strpos($string,"</div>"))
    return $announcements;
}