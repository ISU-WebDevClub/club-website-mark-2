<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 6/30/16
 * Time: 7:56 PM
 */

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

function first_login($username,$conn){
    $query = "SELECT last_login FROM sql5124638.users WHERE username = '".$username."'";
    $do_query = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($do_query);

    if($result['last_login'] == null || $result['last_login'] == ""){
        return true;
    }
    return false;
}

