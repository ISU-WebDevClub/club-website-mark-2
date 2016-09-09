<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:34 PM
 */

//The following are for shared functions and database connections respectively.
//TODO uncomment when db is set up
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
        <title>Members | Web Development Club</title>


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
            <h1>Members</h1>
            <hr>
        </div>
        <div id="members_grid">
            <?php
//            $sql = "SELECT * FROM members WHERE active = 'yes'";
//            $query = mysqli_query($conn, $sql);
//            $result = mysqli_fetch_assoc($query);
//            foreach($result as $curr){
//                //TODO add each member into the grid.
//            }

            //For now I'm just using a for loop to generate fake members.
            for($i = 0;$i< 10;$i++){
                ?>
                <a href="#">
                    <div class="grid-item" style="background-image: url('<?= random_pic() ?>')">

                        <div class="overlay_hover">
                            <div class="overlay"></div>
                        </div>

                        <h2 class="name">Nicholas Cage</h2>
                        <p class="description">This is a short description of the members which should be limited in length.</p>

                    </div>
                </a>

                <?php
            }


            ?>
        </div>
    </div>
    </body>
</html>

<?php include
"../includes/php/footer.php";

function random_pic($dir = '../includes/images/members/')
{
    $files = glob($dir . '/*-md.*');
    $file = array_rand($files);
    return $files[$file];
}

?>