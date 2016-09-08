<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:41 PM
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
        <title>About | Web Development Club</title>


        <!-- Custom CSS -->
        <link rel="stylesheet" href="../includes/css/site-theme.css" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../includes/css/header.css">
        <link rel="stylesheet" href="../includes/css/footer.css">


        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

    </head>
<?php include "../includes/php/header.php" ?>
<body>
    <div id="content">
        <div id="content-sub">
            <div class="page-header">
                <h1>Portfolio</h1>
                <hr>
            </div>
        </div>
        <div class="grid">
            <div class="grid-sizer" ></div>
            <?php
                for($i =0; $i< 8;$i++){
                ?>
                    <div class="grid-item item" id="<?= $i ?>" ></div>
                <?php
                }
            ?>

        </div>

    </div>
</body>
</html>
<script>


    var classes = [
        '',
        ' grid-item--height2',
        ' grid-item--height3',
        ' grid-item--width2',
        ' grid-item--width3',
        ' grid-item--width2 grid-item--height2',
        ' grid-item--width3 grid-item--height3',
    ];

    $('.item').each(function(){
        get_classes(this)
    });

    function get_classes(item){

        var num = Math.floor((Math.random()* 7));
        console.log(num);
        if(num != 0){
            item.className += classes[num];
        }
    }

    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        gutter: .1
    });



</script>
<?php include "../includes/php/footer.php" ?>