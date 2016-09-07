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
        <div class="grid" id="project_grid">
            <div class="grid_item s_square">

            </div>
            <div class="grid_item tall">

            </div>
            <div class="grid_item wide">

            </div>
            <div class="grid_item s_square">

            </div>
            <div class="grid_item l_square">

            </div>
            <div class="grid_item wide">

            </div>
            <div class="grid_item tall">

            </div>
            <div class="grid_item s_square">

            </div>
            <div class="grid_item wide">

            </div>
            <div class="grid_item l_square">

            </div>
        </div>
    </div>
</body>
</html>
<script>
    var sizes = ['s_square','l_square','wide','tall'];
    random_grid(5);


    function random_grid(input){
        var array = [];
        for(i=0;i<input;i++){
            var num = Math.floor((Math.random() * 3) + 1);
            array[i] = sizes[num];
        }
        console.log(array);
    }

</script>
<?php include "../includes/php/footer.php" ?>