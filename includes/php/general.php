<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 6/30/16
 * Time: 7:56 PM
 */

function upload_image($type, $name){
    $path = getcwd();
    $path = explode("/",$path);
    $path_string = "";
    for($i = 0;$i < sizeof($path) -1;$i++){
        $path_string .= $path[$i]."/";
    }

    switch($type){
        case 'event':
            $target_dir = "includes/images/events/";
            break;
        case 'project':
            $target_dir = "includes/images/projects/";
            break;
        case 'member':
            $target_dir = "includes/images/members/";
            break;
        case 'photo':
            $target_dir = "includes/images/gallery/";
            break;
    }
    $target_dir = $path_string.$target_dir;

    $target_file = basename($_FILES["image"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $temp_file = $target_dir.$name;
    $target_file = $target_dir.$name.".".$imageFileType;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            return "ERROR: File is not an Image";
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $i = 1;
        while(file_exists($temp_file."_".$i.".".$imageFileType)){
            $i++;
        }
        $target_file = $temp_file."_".$i.".".$imageFileType;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        return "ERROR: File Too Large to Upload";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        return "ERROR: ".$imageFileType." File types are not permitted.";
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return "ERROR: File failed to upload.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $names = explode('/',$target_file);

            return $names[sizeof($names)-1];
        } else {
            return "ERROR: File failed to upload.";
        }
    }
}

/**
 * @param $name -- Name of variable you want to get.
 * @param null $target_array    -- Specifying where you want to get the variable from.
 * @param null $alternate_target_array
 * @param null $db
 * @param null $config
 * @return mixed|null|string
 */
function get_value($name, $target_array = null, $alternate_target_array = null, $db = null, $config = null){
    // check to see if a variable is set in the target_array, if so get the value.
    // If not, return '' instead of trying to return an undefined variable

    // if we don't have a target specified, use the _REQUEST
    // Using == for compaison on target_array so that it will match an empty array as well
    if($target_array === null){
        $entities_result = true;
        $target_array = $_REQUEST;
    }else{
        $entities_result = false;
    }
    if($db === null){
        $db = false;
    }
    if($config === null){
        $config = array();
    }

    // define some variables
    $pre = '';
    $post = '';

    // check to see if we're using a db
    if($db === true){
        // assign the pre and post variables the single quote
        $pre = '\'';
        $post = '\'';
    }// end if we're getting a value for a DB query

    // perform the check and return the correct value
    if(isset($target_array[$name]) && (($target_array[$name] === 0) || ($target_array[$name] === '0') || ($target_array[$name] === false) || ($target_array[$name] != null))){
        // we can return the value, do so
        $return_value = $target_array[$name];
    }elseif(!is_array($alternate_target_array) && ($alternate_target_array !== null)){
        // they provided us with an alternate VALUE to use,
        // rather than an alternate target array, just go
        // ahead and assign it
        $return_value = $alternate_target_array;
    }elseif(isset($alternate_target_array[$name]) && (($alternate_target_array[$name] === 0) || ($alternate_target_array[$name] === '0') || ($alternate_target_array[$name] === false) || ($alternate_target_array[$name] != null))){
        // we found the value in the alternate array,
        // go ahead and return it
        $return_value = $alternate_target_array[$name];
    }

    // check to see if we found a value to return
    if(isset($return_value)){

        // we found a value, return it
        $return = $return_value;

        if($db === true){
            // this is the get_value_db function, escape the return data
            $return = mysql_real_escape_string($return);
        }// end if this is get_value_db

        // now return it
        if(is_string($return)){
            // we're a string, add the variables
            if($entities_result === true){
                // we want to htmlentities the result if it's not an html editor field
                return str_replace('&amp;','&',htmlentities($pre.$return.$post));
            }else{
                // just return the result
                return $pre.$return.$post;
            }
        }else{
            // don't add the variables that place the quotes for get_value_db,
            // this is some other variable type that will not support that
            if($entities_result === true){
                // we want to htmlentities the result if it's not an html editor field
                if(is_string($return)){
                    return str_replace('&amp;','&',htmlentities($return));
                }else{
                    return $return;
                }

            }else{
                // just return the result
                return $return;
            }
        }
    }else{
        // we didn't find it, check to see how we're returning
        if($db === true){
            // we must return the string NULL
            return 'NULL';
        }else{
            // return a null string ('')
            return '';
        }
    }
}// end function get_value(..)


function convert_time($time){
    $temp = explode(":",$time);
    if(intval($temp[0]) > 12){
        $time = intval($temp[0]) - 12;
        $time = $time.":00";
    }
    return $time;
}