<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:41 PM
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
        <div id="content-sub">
            <div class="page-header">
                <h1>Resources</h1>
                <hr>
            </div>
            <div class="page-header">
                <h2>
                    Social Media
                </h2>
            </div>
            <div class="resource_div">
                <?php
                $sql = "SELECT * FROM resources WHERE active='yes' AND category='social'";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0){
                    while($result = mysqli_fetch_assoc($query)){
                        ?>
                        <a href="<?= $result['url'] ?>">
                            <h3 class="resource social"><?= $result['title'] ?></h3>
                        </a>
                        <?php
                        if($result['description'] != ''){
                            ?>
                            <p class="resource_text"> - <?= $result['description'] ?></p>
                            <?php
                        }
                        ?>
                        <br>
                        <br>
                        <?php
                    }
                }

                ?>
            </div>
            <div class="page-header">
                <h2>
                    Repo and Documents
                </h2>
            </div>
            <div class="resource_div">
            <?php
            $sql = "SELECT * FROM resources WHERE active='yes' AND category='documents'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <a href="<?= $result['url'] ?>">
                        <h3 class="resource documents"><?= $result['title'] ?></h3>
                    </a>
                    <?php
                    if($result['description'] != ''){
                        ?>
                        <p class="resource_text"> - <?= $result['description'] ?></p>
                        <?php
                    }
                    ?>
                    <br>
                    <br>

                    <?php
                }
            }

            ?>
            </div>
            <div class="page-header">
                <h2>
                    Development
                </h2>
            </div>
            <div class="resource_div">
            <?php
            $sql = "SELECT * FROM resources WHERE active='yes' AND category='development'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <a href="<?= $result['url'] ?>">
                        <h3 class="resource development"><?= $result['title'] ?></h3>
                    </a>
                    <?php
                    if($result['description'] != ''){
                        ?>
                        <p class="resource_text"> - <?= $result['description'] ?></p>
                        <?php
                    }
                    ?>
                    <br>
                    <br>
                    <?php
                }
            }
            ?>
            </div>

        </div>
    </div>
    </body>
</html>

<?php include "../includes/php/footer.php" ?>