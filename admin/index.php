<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 9:36 PM
 */

include "../includes/php/base.php";
include "../includes/php/general.php";

//TODO add for preprocessing here.
$action = get_value('action');
if($action != ""){
    switch($action){
        case 'meeting_time':
            $start_time = mysqli_real_escape_string($conn, get_value('start_time'));
            $end_time = mysqli_real_escape_string($conn,get_value('end_time'));
            $days = mysqli_real_escape_string($conn,get_value('days'));
            $building = mysqli_real_escape_string($conn,get_value('building'));
            $room = mysqli_real_escape_string($conn,get_value('room'));
            $year = mysqli_real_escape_string($conn,get_value('year'));
            $semester = mysqli_real_escape_string($conn,get_value('semester'));

            $sql = "UPDATE meetings SET active='no' WHERE active='yes'";
            $query = mysqli_query($conn, $sql);

            $sql = "INSERT INTO meetings (day,start_time, end_time, room, building, year, semester, active) 
                  VALUES ('".$days."','".$start_time."','".$end_time."','".$room."','".$building."','".$year."','".$semester."','yes')";
            $query = mysqli_query($conn, $sql);

            break;
        //TODO add more cases as we add more functionality to the admin page.
    }
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
    <link rel="icon" href="/favicon.ico">
    <title>Admin | Web Development Club</title>


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
            <hr>
            <?php
                $sql = "SELECT * FROM meetings WHERE active='yes'";
                $query = mysqli_query($conn, $sql);
                $result = mysqli_fetch_assoc($query);

            ?>
            <div class="grid">
                <form id="home_page" class="admin_form" action="/admin/?action=meeting_time" method="post">
                    <h2>Meeting Times</h2>
                    <label for="start_time">Start Time: </label>
                    <select id="start_time" type="time" name="start_time">
                        <option value="10:00" <?= $result['start_time'] == "10:00" ? "selected" : "" ?> >10:00 AM</option>
                        <option value="11:00" <?= $result['start_time'] == "11:00" ? "selected" : "" ?> >11:00 AM</option>
                        <option value="12:00" <?= $result['start_time'] == "12:00" ? "selected" : "" ?> >12:00 PM</option>
                        <option value="13:00" <?= $result['start_time'] == "13:00" ? "selected" : "" ?> >1:00 PM</option>
                        <option value="14:00" <?= $result['start_time'] == "14:00" ? "selected" : "" ?> >2:00 PM</option>
                        <option value="15:00" <?= $result['start_time'] == "15:00" ? "selected" : "" ?> >3:00 PM</option>
                        <option value="16:00" <?= $result['start_time'] == "16:00" ? "selected" : "" ?> >4:00 PM</option>
                        <option value="17:00" <?= $result['start_time'] == "17:00" ? "selected" : "" ?> >5:00 PM</option>
                        <option value="18:00" <?= $result['start_time'] == "18:00" ? "selected" : "" ?> >6:00 PM</option>
                        <option value="19:00" <?= $result['start_time'] == "19:00" ? "selected" : "" ?> >7:00 PM</option>
                        <option value="20:00" <?= $result['start_time'] == "20:00" ? "selected" : "" ?> >8:00 PM</option>
                        <option value="21:00" <?= $result['start_time'] == "21:00" ? "selected" : "" ?> >9:00 PM</option>
                    </select>

                    <br>

                    <label for="end_time">End Time: </label>
                    <select id="end_time" type="time" name="end_time">
                        <option value="10:00" <?= $result['end_time'] == "10:00" ? "selected" : "" ?> >10:00 AM</option>
                        <option value="11:00" <?= $result['end_time'] == "11:00" ? "selected" : "" ?> >11:00 AM</option>
                        <option value="12:00" <?= $result['end_time'] == "12:00" ? "selected" : "" ?> >12:00 PM</option>
                        <option value="13:00" <?= $result['end_time'] == "13:00" ? "selected" : "" ?> >1:00 PM</option>
                        <option value="14:00" <?= $result['end_time'] == "14:00" ? "selected" : "" ?> >2:00 PM</option>
                        <option value="15:00" <?= $result['end_time'] == "15:00" ? "selected" : "" ?> >3:00 PM</option>
                        <option value="16:00" <?= $result['end_time'] == "16:00" ? "selected" : "" ?> >4:00 PM</option>
                        <option value="17:00" <?= $result['end_time'] == "17:00" ? "selected" : "" ?> >5:00 PM</option>
                        <option value="18:00" <?= $result['end_time'] == "18:00" ? "selected" : "" ?> >6:00 PM</option>
                        <option value="19:00" <?= $result['end_time'] == "19:00" ? "selected" : "" ?> >7:00 PM</option>
                        <option value="20:00" <?= $result['end_time'] == "20:00" ? "selected" : "" ?> >8:00 PM</option>
                        <option value="21:00" <?= $result['end_time'] == "21:00" ? "selected" : "" ?> >9:00 PM</option>
                        <option value="22:00" <?= $result['end_time'] == "22:00" ? "selected" : "" ?> >10:00 PM</option>
                    </select>
                    <br>

                    <label for="days">Days: </label>
                    <input id="days" type="text" name="days" maxlength="10" value="<?= $result['day'] ?>">
                    <br>

                    <label for="building">Building: </label>
                    <input id="building" type="text" name="building" value="<?= $result['building'] ?>">
                    <br>

                    <label for="room">Room: </label>
                    <input id="room" type="text" name="room" value="<?= $result['room'] ?>">
                    <br>

                    <label for="year">Year: </label>
                    <input id="year" type="text" name="year" maxlength="4" value="<?= $result['year'] ?>">
                    <br>

                    <label for="semester">Semester: </label>
                    <select id="semester" name="semester">
                        <option value="Fall" <?= $result['semester'] == "Fall" ? "selected" : "" ?>>Fall</option>
                        <option value="Spring" <?= $result['semester'] == "Spring" ? "selected" : "" ?>>Spring</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div id="about_page" class="tab_item_div" hidden>
            <h1>About Page</h1>
            <hr>
            <div class="grid">
                <form class="admin_form about_form" action="/admin/?action=add_event">
                    <h2>Add Event</h2>
                    <label for="image">Replace Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25">
                    <br>
                    <textarea class="long_desc" name="text"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <label for="date">Date: </label>
                    <input type="date" name="date" >
                    <br>
                    <input type="submit" value="Add Project">
                </form>
                <?php
                $sql = "SELECT * FROM events";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <form class="admin_form about_form small" action="/admin/?action=edit_event" id="<?= $result['id'] ?>">
                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/events/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <textarea class="long_desc" name="text"><?= $result['description'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <label for="date">Date: </label>
                        <input type="date" name="date" value="<?= $result['date'] ?>">
                        <br>
                        <input type="submit" value="Submit">
                        <button onclick="edit_form(<?= $result['id'] ?>)">Edit</button>
                        <button onclick="cancel_edit(<?= $result['id'] ?>)" hidden>Cancel</button>
                    </form>
                    <?php
                }

                ?>

            </div>
        </div>
        <div id="portfolio_page" class="tab_item_div" hidden>
            <h1>Portfolio Page</h1>
            <hr>
            <div class="grid">
                <form class="admin_form project_form" action="/admin/?action=add_project">
                    <h2>Add Project</h2>
                    <label for="image">Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25" value="">
                    <br>
                    <label for="short_desc">Short Description: </label>
                    <br>
                    <textarea class="short_desc" name="short_text"></textarea>
                    <br>
                    <br>
                    <label for="long_desc">Long Description: </label>
                    <textarea class="long_desc" name="long_text"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <label for="date">Date: </label>
                    <input type="date" name="date" value="">
                    <br>
                    <input type="submit" value="Submit">
                </form>
                <?php
                $sql = "SELECT * FROM projects";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <form class="admin_form project_form" action="/admin/?action=edit_project">
                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/projects/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <label for="short_desc">Short Description: </label>
                        <br>
                        <textarea class="short_desc" name="short_text"><?= $result['short_desc'] ?></textarea>
                        <br>
                        <br>
                        <label for="long_desc">Long Description: </label>
                        <textarea class="long_desc" name="long_text"><?= $result['long_desc'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <label for="date">Date: </label>
                        <input type="date" name="date" value="<?= $result['date'] ?>">
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                    <?php
                }

                ?>

            </div>
        </div>
        <div id="members_page" class="tab_item_div" hidden>
            <h1>Members Page</h1>
            <hr>
            <div class="grid">
                <form class="admin_form membesr_form" action="/admin/?action=edit_members">
                    <h2>Add Member</h2>
                    <label for="image">Upload Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="f_name">First Name: </label>
                    <input type="text" name="f_name" maxlength="25" value="">
                    <br>
                    <label for="l_name">First Name: </label>
                    <input type="text" name="l_name" maxlength="25" value="">
                    <br>
                    <label for="year">Year: </label>
                    <input type="text" name="year" value="">
                    <br>
                    <label for="major">Major: </label>
                    <input type="text" name="major" value="">
                    <br>
                    <label for="position">Position: </label>
                    <input type="text" name="position" value="">
                    <br>
                    <label for="url">URL: </label>
                    <input type="text" name="url" value="">
                    <br>
                    <label for="short_desc">Short Description: </label>
                    <br>
                    <textarea class="short_desc" name="short_text"></textarea>
                    <br>
                    <br>
                    <label for="long_desc">Long Description: </label>
                    <textarea class="long_desc" name="long_text"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                <?php
                $sql = "SELECT * FROM members";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <form class="admin_form membesr_form" action="/admin/?action=edit_members">
                        <h2><?= $result['f_name']." ".$result['l_name'] ?></h2>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/members/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="f_name">First Name: </label>
                        <input type="text" name="f_name" maxlength="25" value="<?= $result['f_name'] ?>">
                        <br>
                        <label for="l_name">First Name: </label>
                        <input type="text" name="l_name" maxlength="25" value="<?= $result['l_name'] ?>">
                        <br>
                        <label for="year">Year: </label>
                        <input type="text" name="year" value="<?= $result['year'] ?>">
                        <br>
                        <label for="major">Major: </label>
                        <input type="text" name="major" value="<?= $result['major'] ?>">
                        <br>
                        <label for="position">Position: </label>
                        <input type="text" name="position" value="<?= $result['position'] ?>">
                        <br>
                        <label for="url">URL: </label>
                        <input type="text" name="url" value="<?= $result['url'] ?>">
                        <br>
                        <label for="short_desc">Short Description: </label>
                        <br>
                        <textarea class="short_desc" name="short_text"><?= $result['short_desc'] ?></textarea>
                        <br>
                        <br>
                        <label for="long_desc">Long Description: </label>
                        <textarea class="long_desc" name="long_text"><?= $result['long_desc'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                    <?php
                }

                ?>

            </div>
        </div>
        <div id="resources_page" class="tab_item_div" hidden>
            <h1>Resources Page</h1>
            <hr>
            <div class="grid">
                <form class="admin_form project_form" action="/admin/?action=edit_project">
                    <h2>Add New Resource</h2>
                    <input type="hidden" name="id" value="">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25" value="">
                    <br>
                    <label for="description">Long Description: </label>
                    <textarea class="short_desc" name="long_text"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                <?php
                $sql = "SELECT * FROM resources";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <form class="admin_form project_form" action="/admin/?action=edit_project">
                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <label for="description">Long Description: </label>
                        <textarea class="short_desc" name="long_text"><?= $result['description'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                    <?php
                }

                ?>
            </div>
        </div>
        <div id="contact_page" class="tab_item_div" hidden>
            <h1>Contact Page</h1>
            <hr>
            <div class="grid">

            </div>
        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="application/javascript"></script>
<script src="admin.js" type="application/javascript"></script>


</body>
</html>

<?php include "../includes/php/footer.php"?>