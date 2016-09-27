<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:34 PM
 */

//The following are for shared functions and database connections respectively.
include "../includes/php/general.php";
include "../includes/php/base.php";

$sql = "SELECT * FROM members WHERE active='yes' ORDER BY l_name,f_name ";
$query = mysqli_query($conn, $sql);




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
        <title>Members | Web Development Club</title>


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
            <h1>Members</h1>
            <hr>
        </div>
        <div id="members_grid">
            <?php

            while($result = mysqli_fetch_assoc($query)){

                ?>
                <div class="grid-item" style="background-image: url('../includes/images/members/<?= $result['image'] ?>')">
                    <a class="taphover" href="<?= $result['url'] ?>" <?= $result['url'] == '#' ? "" : 'target="_blank"' ?>>

                    <div class="overlay_hover">
                        <div class="overlay"></div>
                    </div>

                    <h2 class="name"><?= $result['f_name'] ?>&nbsp<?=$result['l_name'] ?></h2>
                    <p class="description"><?= $result['short_desc'] ?></p>

                    </a>
                </div>

                <?php

            }

            ?>
        </div>
    </div>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="application/javascript"></script>

<script>
    $('a.taphover').on('touchend', function (e) {
        'use strict'; //satisfy code inspectors
        var link = $(this); //preselect the link
        if (link.hasClass('hover')) {
            return true;
        } else {
            link.addClass('hover');
            $('a.taphover').not(this).removeClass('hover');
            e.preventDefault();
            return false; //extra, and to make sure the function has consistent return points
        }
    });
</script>
</html>

<?php include
"../includes/php/footer.php";

?>