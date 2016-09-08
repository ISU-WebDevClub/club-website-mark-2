<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:41 PM
 */

//include "../includes/php/general.php";
//include "../includes/php/base.php";

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
        <title>Resources | Web Development Club</title>


        <!-- Custom CSS -->
        <link rel="stylesheet" href="../includes/css/site-theme.css" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../includes/css/header.css">
        <link rel="stylesheet" href="../includes/css/footer.css">
    </head>
<?php include "../includes/php/header.php" ?>
<body>
    <div id="content">

        <div id="content_sub">
            <h1>Resources</h1>
            <hr>
            <h2 id="social_media_title">Social Media</h2>
            <hr>
            <div class="topic" id="social_media">
<!--                --><?php
//                $sql = "SELECT * FROM resources WHERE category = 'social'";
//                $query = mysqli_query($conn, $sql);
//                $result = mysqli_fetch_assoc($query);
//                foreach($result as $curr){
//                    ?>
<!--                    <a class="link" href="--><?//= $curr['url'] ?><!--"><h4>--><?//= $curr['title'] ?><!--</h4></a>-->
<!--                    <p class="description">--><?//= $curr['description'] ?><!--</p>-->
<!---->
<!--                    --><?php
//                }
//
//                ?>
            </div>
            <h2 id="repo_title">Repo and Documents</h2>
            <hr>
            <div class="topic" id="documents">
<!--                --><?php
//                $sql = "SELECT * FROM resources WHERE category = 'documents'";
//                $query = mysqli_query($conn, $sql);
//                $result = mysqli_fetch_assoc($query);
//                foreach($result as $curr){
//                    ?>
<!--                    <a class="link" href="--><?//= $curr['url'] ?><!--"><h4>--><?//= $curr['title'] ?><!--</h4></a>-->
<!--                    <p class="description">--><?//= $curr['description'] ?><!--</p>-->
<!---->
<!--                    --><?php
//                }
//
//                ?>
            </div>
            <h2 id="development_title">Development</h2>
            <hr>
            <div class="topic" id="development">
<!--                --><?php
//                $sql = "SELECT * FROM resources WHERE category = 'development'";
//                $query = mysqli_query($conn, $sql);
//                $result = mysqli_fetch_assoc($query);
//                foreach($result as $curr){
//                    ?>
<!--                    <a class="link" href="--><?//= $curr['url'] ?><!--"><h4>--><?//= $curr['title'] ?><!--</h4></a>-->
<!--                    <p class="description">--><?//= $curr['description'] ?><!--</p>-->
<!---->
<!--                    --><?php
//                }
//
//                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "../includes/php/footer.php" ?>