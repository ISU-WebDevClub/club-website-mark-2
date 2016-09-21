<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/5/16
 * Time: 5:41 PM
 */
//The following are for shared functions and database connections respectively.

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
        <title>Portfolio | Web Development Club</title>


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
            <div class="page-header">
                <h1>Portfolio</h1>
                <hr>
            </div>
        </div>

        <div class="grid" hidden>
            <div class="grid-sizer" ></div>
            <?php
            //This is the sql for querying the projects, assuming the table name is projects.
            $sql = "SELECT * FROM projects WHERE active='yes'";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)){
                for($i =0;$i<10;$i++){
                    ?>
                    <div class="grid-item " id="<?= $result['id'] ?>" style="background: url('/includes/images/projects/<?= $result['image'] ?>') center; background-size: cover;">
                        <a href="/focus/?id=<?= $result['id'] ?>">
                            <div class="overlay"></div>
                            <h2 class="title"><?= $result['title'] ?></h2>
                            <p class="description"><?= $result['short_desc'] ?></p>
                        </a>
                    </div>
                    <?php
                }

            }

            ?>
        </div>

    </div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="../includes/js/shared.js" type="application/javascript"></script>
<script>
    if(!is_mobile()){
        var classes = [
            '',
            '',
            '',
            '',
            '',
            ' grid-item--width2 grid-item--height2',
            ' grid-item--width3 grid-item--height3'
        ];

    }else{
        $('body').addClass('mobile');
        var classes = [
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ]
    }


    $('.grid-item').each(function(){
        get_classes(this)
    });

    function get_classes(item){

        var num = Math.floor((Math.random()* 7));
        if(num != 0){
            item.className += classes[num];
        }
    }

    //Takes each of the portfolio items, and gives a random size defined by the css attributes above, and squeezes them together
    //Random every time.
    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        isFitWidth: true
    });

    //This way, the portfolio grid doesn't show up before masonry can adjust them.
    $('.grid').show();


</script>
<?php

include "../includes/php/footer.php";


?>