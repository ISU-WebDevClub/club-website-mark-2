<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:23 PM
 */

//TODO make this cleaner by lowercasing all the strings before comparing them.
$url = "";
if(strpos($_SERVER['REQUEST_URI'], 'About') !== false || strpos($_SERVER['REQUEST_URI'], 'about') !== false){
    $url = "About";
}else if(strpos($_SERVER['REQUEST_URI'], 'Portfolio') !== false || strpos($_SERVER['REQUEST_URI'], 'focus') !== false || strpos($_SERVER['REQUEST_URI'], 'portfolio') !== false|| strpos($_SERVER['REQUEST_URI'], 'focus') !== false){
    $url = "Portfolio";
}else if(strpos($_SERVER['REQUEST_URI'], 'Members') !== false || strpos($_SERVER['REQUEST_URI'], 'members') !== false){
    $url = "Members";
}else if(strpos($_SERVER['REQUEST_URI'], 'Resources') !== false || strpos($_SERVER['REQUEST_URI'], 'resources') !== false){
    $url = "Resources";
}else if(strpos($_SERVER['REQUEST_URI'], 'Contact') !== false || strpos($_SERVER['REQUEST_URI'], 'contact') !== false){
    $url = 'Contact';
}else if(strpos($_SERVER['REQUEST_URI'], 'Admin') !== false || strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
    $url = 'Admin';
}else{
    $url = "Home";
}
?>

<header id="header">
    <img src="/includes/images/WDC-logo.png" id="header_logo">
    <ul id="navbar">
        <li class="<?= $url == 'Home' ? 'selected' : '' ?>" ><a href="/" class="header_title"><div class="nav_text">Home</div></a></li>
        <li class="<?= $url == 'About' ? 'selected' : '' ?>"><a href="/about/" class="header_title"><div class="nav_text">About</div></a></li>
        <li class="<?= $url == 'Portfolio' ? 'selected' : '' ?>"><a href="/portfolio/" class="header_title"><div class="nav_text">Portfolio</div></a></li>
        <li class="<?= $url == 'Members' ? 'selected' : '' ?>"><a href="/members/" class="header_title"><div class="nav_text">Members</div></a></li>
        <li class="<?= $url == 'Resources' ? 'selected' : '' ?>"><a href="/resources/" class="header_title"><div class="nav_text">Resources</div></a></li>
        <li id="contact"><a href="/contact/" class="header_title"><div class="nav_text" id="contact_text">Contact</div></a></li>
    </ul>
    <div id="contact_button_form">
        <button id="contact_us">Contact Us</button>
    </div>
    <img id="menu_icon" src="/includes/images/icons/menu.png" >
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="application/javascript"></script>
<script>

    $(document).click(function() {
        var menu = document.getElementById('navbar');
        if(menu.classList.contains('visible')){
            menu.classList.remove('visible');
        }
    });


    $("#header").click(function(event) {

        event.stopPropagation();
    });

    toggle_menu_icon();
    window.onresize = function(){
        toggle_menu_icon();
    };
    $('#header_logo').click(function(){
        window.location = "/";
    });
    var menu_icon = document.getElementById('menu_icon');

    menu_icon.onclick = function(){
        toggle_menu();
    };
    var contact = document.getElementById('contact_button_form');
    contact.onclick = function(){
        window.location = '/contact/';
    };
    function toggle_menu(){
        var menu = document.getElementById('navbar');
        if(menu.classList.contains('visible')){
            menu.classList.remove('visible');
        }else{
            menu.classList.add('visible');
        }
    }
    function toggle_menu_icon(){
        var header = document.getElementById('header');
        var contact_button = document.getElementById('contact_us');
        if(window.innerWidth > 820){
            header.classList.remove('small');
            contact_button.style.display = 'inline';

        }else{
            header.classList.add('small');
            contact_button.style.display = 'none';
        }
    }
</script>
