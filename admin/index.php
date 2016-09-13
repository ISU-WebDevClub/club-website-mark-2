<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 9:36 PM
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
    <title>Admin | Web Development Club</title>


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
        <h1>Admin Page</h1>
        <hr>
        <div id="menu_grid">
            <h2 class="tab_item selected_tab" id="home_tab">Home</h2>
            <h2 class="tab_item" id="about_tab">About</h2>
            <h2 class="tab_item" id="portfolio_tab">Portfolio</h2>
            <h2 class="tab_item" id="members_tab">Members</h2>
            <h2 class="tab_item" id="resources_tab">Resources</h2>
            <h2 class="tab_item" id="contact_tab">Contact</h2>
        </div>
        
        <div id="home_page" class="tab_item_div selected_div">
            <h1>Home Page</h1>
        </div>
        <div id="about_page" class="tab_item_div" hidden>
            <h1>About Page</h1>
        </div>
        <div id="portfolio_page" class="tab_item_div" hidden>
            <h1>Portfolio Page</h1>
        </div>
        <div id="members_page" class="tab_item_div" hidden>
            <h1>Members Page</h1>
        </div>
        <div id="resources_page" class="tab_item_div" hidden>
            <h1>Resources Page</h1>
        </div>
        <div id="contact_page" class="tab_item_div" hidden>
            <h1>Contact Page</h1>
        </div>


    </div>
</div>
<script src="admin.js" type="application/javascript"></script>
</body>
</html>

<?php include "../includes/php/footer.php"?>