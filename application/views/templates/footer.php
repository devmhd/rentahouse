
 		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url();?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url();?>js/plugins.js"></script>
        <script src="<?php echo base_url();?>js/main.js"></script>
        <?php

        	if($page_slug == 'newad' || $page_slug == 'singlead')
        		echo "<script src='http://maps.googleapis.com/maps/api/js?key=AIzaSyCvgZQ5HN2GV_e-yG-D0msw7A59R2si3zY&sensor=false'></script>";

        	if($page_slug == 'newad'){

                echo "<script src='" . base_url() . "js/jquery.tooltipster.min.js'></script>";
                echo "<script src='" . base_url() . "js/jquery.validate.min.js'></script>";
        		echo "<script src='" . base_url() . "js/newad.js'></script>";

            }

            if($page_slug == 'newad_photos'){

                echo "<script src='" . base_url() . "js/jquery.tooltipster.min.js'></script>";
                echo "<script src='" . base_url() . "js/jquery.validate.min.js'></script>";
                echo "<script src='" . base_url() . "js/newad_photos.js'></script>";

            }

            if($page_slug == 'register'){

                echo "<script src='" . base_url() . "js/jquery.tooltipster.min.js'></script>";
                echo "<script src='" . base_url() . "js/jquery.validate.min.js'></script>";
                echo "<script src='" . base_url() . "js/register.js'></script>";

            }

             if($page_slug == 'singlead'){
                echo "<script src='" . base_url() . "js/jquery.raty.min.js'></script>";
                echo "<script src='" . base_url() . "js/jquery.bxslider.min.js'></script>";
                echo "<script src='" . base_url() . "js/singlead.js'></script>";

             }



        ?>

        

    </body>
</html>