<!doctype html>
<html lang="en">
<html>
    <head>
        <meta charset="utf-8">
        <title>Homepage</title>
        <link rel="stylesheet" href="isotope/css/style.css" >
        <link rel="stylesheet" href="mosaic/css/mosaic.css" type="text/css" media="screen" />
        <style type="text/css">
            body{ background: #ededed; }
            #container{ border: none; }
            .clearfix{ display: block; height: 0; clear: both; visibility: hidden; }
            .mosaic-block{ border:1px solid #d3d5d7; }
            .details{ margin:15px 20px; }    
                h4{ font:300 16px 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height:160%; letter-spacing:0.15em; color:#fff; text-shadow:1px 1px 0 rgb(0,0,0); }
                p{ font:300 12px 'Lucida Grande', Tahoma, Verdana, sans-serif; color:#aaa; text-shadow:1px 1px 0 rgb(0,0,0);}
                a{ text-decoration:none; }
        </style>

        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="mosaic/js/mosaic.1.0.1.min.js"></script>
        <script type="text/javascript" src="isotope/jquery.isotope.min.js"></script>
        <script type="text/javascript">  
            jQuery(function($){
                
                $('.circle').mosaic({
                    opacity        :    0.8            //Opacity for overlay (0-1)
                });
                
                $('.fade').mosaic();
                
                $('.bar').mosaic({
                    animation    :    'slide'        //fade or slide
                });
                
                $('.bar2').mosaic({
                    animation    :    'slide'        //fade or slide
                });
                
                $('.bar3').mosaic({
                    animation    :    'slide',    //fade or slide
                    anchor_y    :    'top'        //Vertical anchor position
                });
                
                $('.cover').mosaic({
                    animation    :    'slide',    //fade or slide
                    hover_x        :    '400px'        //Horizontal position on hover
                });
                
                $('.cover2').mosaic({
                    animation    :    'slide',    //fade or slide
                    anchor_y    :    'top',        //Vertical anchor position
                    hover_y        :    '80px'        //Vertical position on hover
                });
                
                $('.cover3').mosaic({
                    animation    :    'slide',    //fade or slide
                    hover_x        :    '400px',    //Horizontal position on hover
                    hover_y        :    '300px'        //Vertical position on hover
                });
                
                $('#container').isotope({
                    itemSelector : '.item',
                    layoutMode : 'fitRows'
                });

            });
        </script>
    </head>

    <body>

        <div id="container">

        <?php 
            $json = file_get_contents('pages.json');
            $pages = json_decode($json, true);
            foreach($pages as $i => $page) {
            ?>
            <div class="mosaic-block fade item">
                <a href="<?php print($page["url"]); ?>" class="mosaic-overlay">
                    <div class="details">
                        <h4><?php print($page["title"]); ?></h4>
                        <p><?php print($page["legend"]); ?></p>
                    </div>
                </a>
                <div class="mosaic-backdrop"><img id="preview<?php print($i); ?>" src="img/preview<?php print($i); ?>.png"/></div>
            </div>
            <?php
            }
        ?>

        <div class="clearfix"></div>

        </div>

        <script type="text/javascript">  
            $(document).ready(function() {
                /* Update the preview image */
                $("a.mosaic-overlay").each(function(idx) {
                    var self = this;
                    var url = self.href;
                    $.get("update_preview.php", {
                        url: url,
                        idx: idx
                    }, function(data) {
                        d = new Date();
                        $("#preview"+idx).attr("src", "img/preview"+idx+".png?"+d.getTime());
                    });
                });
            });
        </script>

    </body>

</html>
