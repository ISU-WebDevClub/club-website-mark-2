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
        <li class="<?= $url == 'Contact' ? 'selected' : '' ?>" id="contact"><a href="/contact/" class="header_title"><div class="nav_text">Contact</div></a></li>
    </ul>
    <img id="menu_icon" src="/includes/images/icons/menu.png">
</header>
<script>
    toggle_menu_icon();
    window.onresize = function(){
        toggle_menu_icon();
    }
    var menu_icon = document.getElementById('menu_icon');
    menu_icon.onclick = function(){
        toggle_menu();
    }
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
        if(window.innerWidth > 820){
            header.classList.remove('small');
//            var navbar = document.getElementById('navbar');
//            navbar.classList.remove('visible');
        }else{
            header.classList.add('small');
        }
    }
</script>
