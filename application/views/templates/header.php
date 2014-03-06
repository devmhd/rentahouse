<?php

/*
  
  $page_title
  $page_slug //


      index
      newad
      browse
      singlead


*/

?>




<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page_title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php echo link_tag('css/bootstrap.min.css'); 
              echo link_tag('css/main.css'); 
               echo link_tag('css/font-awesome.min.css'); 

             if($page_slug == 'singlead')
                echo link_tag('css/jquery.bxslider.css');

              if($page_slug == 'newad')
                echo link_tag('css/tooltipster.css');                
              
              
               
        ?>
        

        <script src="<?php echo base_url();?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        

         <?php

            if($page_slug == 'index')
              echo "<style type='text/css'>body{padding-bottom:0}</style>";

         ?>
              

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Rent-A-House</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php echo $page_slug=='browse'?"class='active'":"";?> ><a href="browse"><i class="fa fa-eye left small"></i>Browse Ads</a></li>
            <li <?php echo $page_slug=='newad'?"class='active'":"";?> ><a href="newad"><i class="fa fa-thumb-tack left small"></i>New Ad</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bookmark left small"></i>My Bookmarks <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="singlead.html">Ad 1</a></li>
                <li><a href="singlead.html">Ad 2</a></li>
                <li><a href="singlead.html">Ad 3</a></li>

              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list-ul left small"></i>My Ads <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="singlead.html">Ad 1</a></li>
                <li><a href="singlead.html">Ad 2</a></li>
                <li><a href="singlead.html">Ad 3</a></li>

              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user left small"></i>Mr User <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Logout</a></li>


              </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>