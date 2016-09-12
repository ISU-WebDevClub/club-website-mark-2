<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:17 PM
 */

include "../includes/php/general.php";
include "../includes/php/base.php";

$sql = "SELECT * FROM WDC.projects WHERE id=".get_value('id');
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) == 1){
    $result = mysqli_fetch_assoc($query);
    $title = $result['title'];
    $desc = $result['long_desc'];
    $img = $result['image'];
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
    <link rel="icon" href="../favicon.ico">
    <title><?= $title != "" ? $title : "Project" ?> | Web Development Club</title>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="/includes/css/site-theme.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/includes/css/header.css">
    <link rel="stylesheet" href="/includes/css/footer.css">
</head>
<?php include "../includes/php/header.php" ?>

<body>

<div class="container" id="content">
    <div id="content-sub">
        <h1><?= $title ?></h1>
        <hr>
        <img id="project_image" src="../includes/images/projects/<?= $img ?>">
        <p><?= $desc ?></p>

    </div>
</div>

</body>
<?php include "../includes/php/footer.php" ?>
</html>

