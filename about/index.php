<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:40 PM
 */

include "../includes/php/general.php";
include "../includes/php/base.php";

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
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
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
            <h2>History</h2>
            <?php
                $sql = "SELECT * FROM events WHERE active='yes' ORDER BY date";
                $query = mysqli_query($conn, $sql);
                $i = 0;
                while($result = mysqli_fetch_assoc($query)){
                    if($i%2 == 0){
                        ?>
                        <div class="event event_left">
                            <div class="event_img">
                                <img src="../includes/images/events/<?= $result['image'] ?>">
                            </div>
                            <div class="event_text">
                                <h2><?= $result['title'] ?></h2>
                                <hr>
                                <p><?= $result['description'] ?></p>
                            </div>

                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="event event_right">
                            <div class="event_img">
                                <img src="../includes/images/events/<?= $result['image'] ?>">
                            </div>
                            <div class="event_text">
                                <h2><?= $result['title'] ?></h2>
                                <hr>
                                <p><?= $result['description'] ?></p>

                            </div>
                        </div>
                        <?php
                    }

                    $i++;
                }
            ?>
        </div>
        <div id="photo_gallery">
            <h2>Photo Gallery</h2>
            <div id="photo_grid">
            <?php
            $sql = "SELECT * FROM photos WHERE active='yes'";
            $query = mysqli_query($conn, $sql);

            while($result = mysqli_fetch_assoc($query)){
                //TODO make this actually pull image links from the db. Instead of a for loop of the same image...
                ?>
                <div class="photo_item" style="background: url('../includes/images/gallery/<?= $result['image'] ?>') center no-repeat; background-size: contain;">

                </div>
                <?php
            }

            ?>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="application/javascript"></script>
<script src="/includes/js/shared.js" type="application/javascript"></script>

<script>
    if(is_mobile()){
        $('body').addClass('mobile');
    }
</script>
</body>
</html>

<?php include "../includes/php/footer.php" ?>
