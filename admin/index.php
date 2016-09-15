<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 9:36 PM
 */

include "../includes/php/base.php";
include "../includes/php/general.php";

$action = get_value('action');
if($action != ""){
    switch($action){
        //Image names are being overwritten in the db because if the image input is null, it still tries to upload an image.
        case 'meeting_time':
            $run_sql = true;
            $start_time = mysqli_real_escape_string($conn, get_value('start_time'));
            $end_time = mysqli_real_escape_string($conn,get_value('end_time'));
            $days = mysqli_real_escape_string($conn,get_value('days'));
            $building = mysqli_real_escape_string($conn,get_value('building'));
            $room = mysqli_real_escape_string($conn,get_value('room'));
            $year = mysqli_real_escape_string($conn,get_value('year'));
            $semester = mysqli_real_escape_string($conn,get_value('semester'));

            $sql = "UPDATE meetings SET active='no' WHERE active='yes'";
            $query = mysqli_query($conn, $sql);

            $sql = "INSERT INTO meetings (`day`,start_time, end_time, room, building, `year`, semester, active) VALUES ('".$days."','".$start_time."','".$end_time."','".$room."','".$building."','".$year."','".$semester."','yes')";

            break;
        case 'add_event':
            $run_sql = true;
            $sql = "INSERT INTO events (";
            $to_add = array();
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $description = mysqli_real_escape_string($conn, get_value('description'));
            $active = mysqli_real_escape_string($conn,get_value('active'));
            $date = mysqli_real_escape_string($conn,get_value('date'));
            $image = "";

            //They must have a title
            if($title != ""){
                $to_add['title'] = mysqli_real_escape_string($conn, $title);
            }else{
                $run_sql = false;
                break;
            }

            if($description != ''){
                $to_add['description'] = $description;
            }

            if($active != ""){
                $to_add['active'] = $active;
            }

            if($date != ''){
                $to_add['date'] = $date;
            }

            if($_FILES['image']['size'] != 0) {
                $file_title = str_replace(' ', '_', get_value('title'));
                $file_title = strtolower($file_title);
                $image = upload_image('event', $file_title);
                $to_add['image'] = $image;
            }

            if(strpos($image,'ERROR') !== false){
                $run_sql = false;
                $error = $image;
            }

            foreach($to_add as $key => $value){
                $sql .= $key.",";
            }
            $sql = rtrim($sql, ",");
            $sql .= ") VALUES (";
            foreach($to_add as $key => $value){
                $sql .= "'".$to_add[$key]."',";
            }
            $sql = rtrim($sql, ",");
            $sql .= ")";


            break;
        case 'edit_event':
            $run_sql = true;
            $sql = "UPDATE events SET ";
            $id = mysqli_real_escape_string($conn,get_value('id'));
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $description = mysqli_real_escape_string($conn, get_value('description'));
            $active = mysqli_real_escape_string($conn,get_value('active'));
            $date = mysqli_real_escape_string($conn,get_value('date'));
            $image = "";
            if($title == ""){
                $run_sql = false;
                break;
            }
            $sql .= " title='".$title."', description='".$description."', active='".$active."', date='".$date."' ";


            if($_FILES['image']['size'] != 0) {
                $file_title = str_replace(' ', '_', get_value('title'));
                $file_title = strtolower($file_title);
                $image = upload_image('event', $file_title);
                $to_add['image'] = $image;

                if(strpos($image,'ERROR') !== false){
                    $run_sql = false;
                    $error = $image;
                }
                $sql .= ", image='".$image."'";
            }

            $sql  .= " WHERE id=".$id;


            break;
        case 'add_project':
            $run_sql = true;
            $to_add = array();
            $sql = "INSERT INTO projects (";
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $url = mysqli_real_escape_string($conn, get_value('url'));
            $short_desc = mysqli_real_escape_string($conn,get_value('short_desc'));
            $long_desc = mysqli_real_escape_string($conn,get_value('long_desc'));
            $active = mysqli_real_escape_string($conn,get_value('active'));
            $image = "";

            if($title != ""){
                $to_add['title'] = $title;
            }else{
                $run_sql = false;
                break;
            }

            if($active != ""){
                $to_add['active'] = $active;
            }

            if($url != ""){
                $to_add['url'] = $url;
            }
            if($short_desc != ""){
                $to_add['short_desc'] = $short_desc;
            }
            if($long_desc != ""){
                $to_add['long_desc'] = $long_desc;
            }

            if($_FILES['image']['size'] != 0) {
                $file_title = str_replace(' ', '_', get_value('title'));
                $file_title = strtolower($file_title);
                $image = upload_image('project', $file_title);
                $to_add['image'] = $image;
            }

            if(strpos($image,'ERROR') !== false){
                $run_sql = false;
                $error = $image;
            }

            foreach($to_add as $key => $value){
                $sql .= $key.",";
            }
            $sql = rtrim($sql, ",");
            $sql .= ") VALUES (";
            foreach($to_add as $key => $value){
                $sql .= "'".$to_add[$key]."',";
            }
            $sql = rtrim($sql, ",");
            $sql .= ")";

            if(strpos($image,'ERROR') !== false){
                $run_sql = false;
                $error = $image;
            }


            break;
        case 'edit_project':
            $run_sql = true;
            $to_add = array();
            $sql = "UPDATE projects SET ";
            $id = mysqli_real_escape_string($conn,get_value('id'));
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $url = mysqli_real_escape_string($conn, get_value('url'));
            $short_desc = mysqli_real_escape_string($conn,get_value('short_desc'));
            $long_desc = mysqli_real_escape_string($conn,get_value('long_desc'));
            $active = mysqli_real_escape_string($conn,get_value('active'));

            if($title == ""){
                $run_sql = false;
                break;
            }
            $sql .= " title='".$title."', short_desc='".$short_desc."',long_desc='".$long_desc."',url='".$url."', active='".$active."' ";

            if($_FILES['image']['size'] != 0) {
                $file_title = str_replace(' ', '_', get_value('title'));
                $file_title = strtolower($file_title);
                $image = upload_image('project', $file_title);
                $to_add['image'] = $image;

                if(strpos($image,'ERROR') !== false){
                    $run_sql = false;
                    $error = $image;
                }
                $sql .= ", image='".$image."'";
            }

            $sql .= " WHERE id=".$id;



            break;
        case 'add_member':
            $run_sql = true;
            $to_add = array();
            $sql = "INSERT INTO members (";
            $f_name = mysqli_real_escape_string($conn,get_value('f_name'));
            $l_name = mysqli_real_escape_string($conn,get_value('l_name'));
            $year = mysqli_real_escape_string($conn,get_value('year'));
            $major = mysqli_real_escape_string($conn,get_value('major'));
            $position = mysqli_real_escape_string($conn,get_value('position'));
            $url = mysqli_real_escape_string($conn,get_value('url'));
            $short_desc = mysqli_real_escape_string($conn,get_value('short_desc'));
            $long_desc = mysqli_real_escape_string($conn,get_value('long_desc'));
            $active = mysqli_real_escape_string($conn,get_value('active'));


            $image = "";

            if($f_name != "" && $l_name != ""){
                $to_add['f_name'] = $f_name;
                $to_add['l_name'] = $l_name;
            }else{
                $run_sql = false;
                break;
            }

            if($active != ""){
                $to_add['active'] = $active;
            }

            if($url != ""){
                $to_add['url'] = $url;
            }
            if($short_desc != ""){
                $to_add['short_desc'] = $short_desc;
            }
            if($long_desc != ""){
                $to_add['long_desc'] = $long_desc;
            }
            if($position != ""){
                $to_add['position'] = $position;
            }
            if($major != ""){
                $to_add['major'] = $major;
            }
            if($year != ""){
                $to_add['year'] = $year;
            }


            if($_FILES['image']['size'] != 0 && $run_sql) {
                $file_title = str_replace(' ', '', get_value('f_name'))."_".str_replace(' ','',get_value('l_name'));
                $file_title = strtolower($file_title);
                $image = upload_image('member', $file_title);
                $to_add['image'] = $image;

            }

            if(strpos($image,'ERROR') !== false){
                $run_sql = false;
                $error = $image;
            }

            foreach($to_add as $key => $value){
                $sql .= $key.",";
            }
            $sql = rtrim($sql, ",");
            $sql .= ") VALUES (";
            foreach($to_add as $key => $value){
                $sql .= "'".$to_add[$key]."',";
            }
            $sql = rtrim($sql, ",");
            $sql .= ")";

            if(strpos($image,'ERROR') !== false){
                $run_sql = false;
                $error = $image;
            }


            break;
        case 'edit_member':
            $run_sql = true;
            $sql = "UPDATE members SET ";
            $id = mysqli_real_escape_string($conn,get_value('id'));
//            $image = mysqli_real_escape_string($conn,get_value('image'));
            $f_name = mysqli_real_escape_string($conn,get_value('f_name'));
            $l_name = mysqli_real_escape_string($conn,get_value('l_name'));
            $year = mysqli_real_escape_string($conn,get_value('year'));
            $major = mysqli_real_escape_string($conn,get_value('major'));
            $position = mysqli_real_escape_string($conn,get_value('position'));
            $url = mysqli_real_escape_string($conn,get_value('url'));
            $short_desc = mysqli_real_escape_string($conn,get_value('short_desc'));
            $long_desc = mysqli_real_escape_string($conn,get_value('long_desc'));
            $active = mysqli_real_escape_string($conn,get_value('active'));

            if($f_name == "" && $l_name == ""){
                $run_sql = false;
                break;
            }

            $sql .= "f_name='".$f_name."', l_name='".$l_name."', `year`='".$year."', major='".$major."', short_desc='".$short_desc."', long_desc='".$long_desc."', url='".$url."', `position`='".$position."', active='".$active."' ";

            if($_FILES['image']['size'] != 0) {
                $file_title = str_replace(' ', '', get_value('f_name'))."_".str_replace(' ','',get_value('l_name'));
                $file_title = strtolower($file_title);
                $image = upload_image('member', $file_title);
                $to_add['image'] = $image;

                if(strpos($image,'ERROR') !== false){
                    $run_sql = false;
                    $error = $image;
                }
                $sql .= ", image='".$image."'";
            }

            $sql .= " WHERE id=".$id;


            break;
        case 'add_resource':
            $run_sql = true;
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $description = mysqli_real_escape_string($conn,get_value('description'));
            $active = mysqli_real_escape_string($conn,get_value('active'));
            $category = mysqli_real_escape_string($conn, get_value('category'));
            $url = mysqli_real_escape_string($conn, get_value('url'));
            if($title == ""){
                $run_sql = false;
            }

            $sql = "INSERT INTO resources (title, description, active,category, url) VALUES ('".$title."','".$description."','".$active."','".$category."','".$url."')";

            break;
        case 'edit_resource':
            $run_sql = true;
            $id = mysqli_real_escape_string($conn,get_value('id'));
            $title = mysqli_real_escape_string($conn,get_value('title'));
            $description = mysqli_real_escape_string($conn,get_value('description'));
            $active = mysqli_real_escape_string($conn,get_value('active'));
            $category = mysqli_real_escape_string($conn, get_value('category'));
            $url = mysqli_real_escape_string($conn, get_value('url'));

            if($title == ""){
                $run_sql = false;
            }

            $sql = "UPDATE resources SET title='".$title."', description='".$description."', category='".$category."', url='".$url."', active='".$active."' WHERE id=".$id;

            break;
        case 'delete':
            $table = mysqli_real_escape_string($conn, get_value('type'));
            $id = mysqli_real_escape_string($conn, get_value('id'));
            $sql = "DELETE FROM ".$table." WHERE id=".$id;
            $image = "";
            $run_sql = true;

            if(($table == 'events' || $table == 'projects' || $table == 'members') && $run_sql){
                $select_image = "SELECT image FROM ".$table." WHERE id=".$id;
                $query_image = mysqli_query($conn, $select_image);
                $result=mysqli_fetch_assoc($query_image);
                $img = "../includes/images/".$table."/".$result['image'];
                unlink($img);
            }

            break;
        default:
            $sql = "";
            $run_sql = false;
            break;


    }
    if($run_sql){
        $query = mysqli_query($conn, $sql);
    }else{
        echo $image;
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
    <div id="page_overlay"></div>
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
                <form id="home_page_form" action="/admin/" method="post">
                    <h2>Meeting Times</h2>
                    <label for="start_time">Start Time: </label>
                    <input type="hidden" name="action" value="meeting_time">
                    <select id="start_time" name="start_time">
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
                    <select id="end_time" name="end_time">
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
                <div class="grid_div" id="add_event">
                    <img class="add_icon" src="../includes/images/icons/plus.png"  >
                    <div class="div_overlay" onclick="add_div('event')">
                    </div>

                </div>

                <form id="add_event_form" class="admin_form about_form" action="/admin/" method="post" enctype="multipart/form-data" hidden>

                    <h2>Add Event</h2>
                    <input type="hidden" name="action" value="add_event">
                    <label for="image">Replace Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25">
                    <br>
                    <textarea class="long_desc" name="description"></textarea>
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
                    <button onclick="cancel_add(event,'event',<?= $result['id'] ?>)">Cancel</button>
                </form>
                <?php
                $sql = "SELECT * FROM events";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="grid_div" id="div_about_<?= $result['id'] ?>" style="background: url('../includes/images/events/<?= $result['image'] ?>') center no-repeat;background-size: contain;">
                        <div class="div_overlay" onclick="edit_form('about',<?= $result['id'] ?>)">
                            <h2><?= $result['title'] ?></h2>
                            <h3 class="click_to_edit">Click to Edit</h3>
                        </div>
                    </div>
                    <form class="admin_form about_form" action="/admin/" id="form_about_<?= $result['id'] ?>" enctype="multipart/form-data" method="post" hidden>
                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="action" value="edit_event">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/events/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <textarea class="long_desc" name="description"><?= $result['description'] ?></textarea>
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
                        <button onclick="cancel_edit(event,'about',<?= $result['id'] ?>)">Cancel</button>
                        <br>
                        <hr>
                        <br>
                        <form class="delete_form" action="/admin/" method="post" >
                            <input type="submit" value="Delete Event" style="background-color: red">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="type" value="events">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        </form>
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
                <div class="grid_div" id="add_project">
                    <img src="../includes/images/icons/plus.png"  class="add_icon">
                    <div class="div_overlay" onclick="add_div('project')">
                    </div>
                </div>
                <form class="admin_form project_form" id="add_project_form" action="/admin/" method="post" enctype="multipart/form-data" hidden >

                    <h2>Add Project</h2>
                    <input type="hidden" name="action" value="add_project">
                    <label for="image">Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25" value="">
                    <br>
                    <label for="url">URL: </label>
                    <input type="text" name="url">
                    <br>
                    <label for="short_desc">Short Description: </label>
                    <br>
                    <textarea class="short_desc" name="short_desc"></textarea>
                    <br>
                    <br>
                    <label for="long_desc">Long Description: </label>
                    <textarea class="long_desc" name="long_desc"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>

                    <input type="submit" value="Submit">
                    <button onclick="cancel_add(event,'project')">Cancel</button>
                </form>
                <?php
                $sql = "SELECT * FROM projects";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="grid_div" id="div_project_<?= $result['id'] ?>" style="background: url('../includes/images/projects/<?= $result['image'] ?>') center no-repeat;background-size: contain;">
                        <div class="div_overlay"onclick="edit_form('project',<?= $result['id'] ?>)">
                            <h2><?= $result['title'] ?></h2>
                            <h3 class="click_to_edit">Click to Edit</h3>
                        </div>
                    </div>
                    <form class="admin_form project_form" action="/admin/" id="form_project_<?= $result['id'] ?>" method="post" enctype="multipart/form-data" hidden>
                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="action" value="edit_project">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/projects/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <label for="url">URL: </label>
                        <input type="text" name="url" value="<?= $result['url'] ?>">
                        <br>
                        <label for="short_desc">Short Description: </label>
                        <br>
                        <textarea class="short_desc" name="short_desc"><?= $result['short_desc'] ?></textarea>
                        <br>
                        <br>
                        <label for="long_desc">Long Description: </label>
                        <textarea class="long_desc" name="long_desc"><?= $result['long_desc'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit">
                        <button onclick="cancel_edit(event,'project',<?= $result['id'] ?>)">Cancel</button>
                        <br>
                        <hr>
                        <br>
                        <form class="delete_form" action="/admin/" method="post" >
                            <input type="submit" value="Delete Project" style="background-color: red">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="type" value="projects">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        </form>
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
                <div class="grid_div" id="add_member">
                    <img src="../includes/images/icons/plus.png"  class="add_icon">
                    <div class="div_overlay" onclick="add_div('member')">
                    </div>
                </div>
                <form class="admin_form members_form" id="add_member_form" action="/admin/" method="post" enctype="multipart/form-data" hidden>
                    <h2>Add Member</h2>
                    <input type="hidden" name="action" value="add_member">
                    <label for="image">Upload Image: </label>
                    <input type="file" name="image">
                    <br>
                    <label for="f_name">First Name: </label>
                    <input type="text" name="f_name" maxlength="25" value="">
                    <br>
                    <label for="l_name">Last Name: </label>
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
                    <textarea class="short_desc" name="short_desc" ></textarea>
                    <br>
                    <br>
                    <label for="long_desc">Long Description: </label>
                    <textarea class="long_desc" name="long_desc"></textarea>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit">
                    <button onclick="cancel_add(event,'member')">Cancel</button>
                </form>
                <?php
                $sql = "SELECT * FROM members";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="grid_div" id="div_member_<?= $result['id'] ?>" style="background: url('../includes/images/members/<?= $result['image'] ?>') center no-repeat;background-size: contain;">
                        <div class="div_overlay" onclick="edit_form('member',<?= $result['id'] ?>)">
                            <h2><?= $result['f_name']." ".$result['l_name'] ?></h2>
                            <h3 class="click_to_edit">Click to Edit</h3>
                        </div>
                    </div>
                    <form class="admin_form members_form" action="/admin/" id="form_member_<?= $result['id'] ?>" method="post" enctype="multipart/form-data" hidden>

                        <h2><?= $result['f_name']." ".$result['l_name'] ?></h2>
                        <input type="hidden" name="action" value="edit_member">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <img src="../includes/images/members/<?= $result['image'] ?>">
                        <br>
                        <label for="image">Replace Image: </label>
                        <input type="file" name="image">
                        <br>
                        <label for="f_name">First Name: </label>
                        <input type="text" name="f_name" maxlength="25" value="<?= $result['f_name'] ?>">
                        <br>
                        <label for="l_name">Last Name: </label>
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
                        <textarea class="short_desc" name="short_desc"><?= $result['short_desc'] ?></textarea>
                        <br>
                        <br>
                        <label for="long_desc">Long Description: </label>
                        <textarea class="long_desc" name="long_desc"><?= $result['long_desc'] ?></textarea>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit">
                        <button onclick="cancel_edit(event,'member',<?= $result['id'] ?>)">Cancel</button>
                        <br>
                        <hr>
                        <br>
                        <form class="delete_form" action="/admin/" method="post" >
                            <input type="submit" value="Delete Member" style="background-color: red">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="type" value="members">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        </form>
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
                <div class="grid_div" id="add_resource">
                    <img src="../includes/images/icons/plus.png"  class="add_icon">
                    <div class="div_overlay" onclick="add_div('resource')">
                    </div>
                </div>
                <form class="admin_form resource_form" id="add_resource_form" action="/admin/" method="post" hidden>

                    <h2>Add New Resource</h2>
                    <input type="hidden" name="action" value="add_resource">
                    <br>
                    <label for="title">Title: </label>
                    <input type="text" name="title" maxlength="25" value="">
                    <br>
                    <label for="url">URL: </label>
                    <input type="text" name="url">
                    <br>
                    <label for="description">Description: </label>
                    <textarea class="short_desc" name="description"></textarea>
                    <br>
                    <label for="category">Category: </label>
                    <select name="category">
                        <option value="social">Social</option>
                        <option value="documents">Documents</option>
                        <option value="development">Development</option>
                    </select>
                    <br>
                    <label for="active">Active: </label>
                    <select name="active">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit">
                    <button onclick="cancel_add(event,'resource')">Cancel</button>
                </form>
                <?php
                $sql = "SELECT * FROM resources";
                $query = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="grid_div" id="div_resource_<?= $result['id'] ?>">
                        <div class="div_overlay" onclick="edit_form('resource',<?= $result['id'] ?>)">
                            <h2><?= $result['title']?></h2>
                            <h3 class="click_to_edit">Click to Edit</h3>
                        </div>
                    </div>
                    <form class="admin_form resource_form" id="form_resource_<?= $result['id'] ?>" action="/admin/" method="post" hidden>

                        <h2><?= $result['title'] ?></h2>
                        <input type="hidden" name="action" value="edit_resource">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <br>
                        <label for="title">Title: </label>
                        <input type="text" name="title" maxlength="25" value="<?= $result['title'] ?>">
                        <br>
                        <label for="url">URL: </label>
                        <input type="text" name="url" value="<?= $result['url'] ?>">
                        <br>
                        <label for="description">Description: </label>
                        <textarea class="short_desc" name="description"><?= $result['description'] ?></textarea>
                        <br>
                        <label for="category">Category: </label>
                        <select name="category">
                            <option value="social" <?= $result['category'] == 'social' ? 'selected' : '' ?>>Social</option>
                            <option value="documents" <?= $result['category'] == 'documents' ? 'selected' : '' ?>>Documents</option>
                            <option value="development" <?= $result['category'] == 'development' ? 'selected' : '' ?>>Development</option>
                        </select>
                        <br>
                        <label for="active">Active: </label>
                        <select name="active">
                            <option value="yes" <?= $result['active'] == 'yes' ? "selected" : "" ?>>Yes</option>
                            <option value="no" <?= $result['active'] == "no" ? "selected" : "" ?>>No</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit">
                        <button onclick="cancel_edit(event,'resource',<?= $result['id'] ?>)">Cancel</button>
                        <br>
                        <hr>
                        <br>
                        <form class="delete_form" action="/admin/" method="post" >
                            <input type="submit" value="Delete Resource" style="background-color: red">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="type" value="resources">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        </form>
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
                <?php
                //TODO add contact page edit stuff, maybe the send_to email address?
                ?>
            </div>
        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="application/javascript"></script>
<script src="admin.js" type="application/javascript"></script>


</body>
</html>

<?php
include "../includes/php/footer.php";


?>