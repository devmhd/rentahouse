<div class="page container">
  <div class="row">

    <div class="col-md-8">

      <header class="profile">
        <h2><?php echo $ad['title']; ?></h2>
        <h4>
          <a href="#"><?php echo $region_name;?></a>
          <i class="fa fa-angle-right small"></i>
          <a href="#"><?php echo $area_name;?></a>
          <i class="fa fa-angle-right small"></i>
          <a href="#"><?php echo $neigh_name;?></a>
        </h4>


        <h5>
          <?php echo $ad['sqft'];?> sqft
          <span class="feat-divider">|</span>
          <?php echo $ad['n_bed'];?> beds
          <span class="feat-divider">|</span>
          <?php echo $ad['n_bath'];?> baths
        </h5>

      </header>
    </div>

    <div class="col-md-4">

      <div class="contactform row">
        <div class="fb-share-button" data-href="http://localhost/rentahouse.com/singlead.html" data-type="button_count"></div>
        <div style='margin-top:14px' class="row">Available for rent from <?php echo date('F d, Y', strtotime($ad['availabledate']))?></div>
        <button id="contactBtn" class="contactbtn btn btn-primary btn-lg"><i class="fa fa-phone left"></i><span id="ownerno">Contact Owner</span></button>

      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-md-8">



     <?php
     $photos = json_decode($ad['photos']);

     if(is_array($photos)){

      ?>
      <div class="imgslider row">
        <ul class="bxslider">

          <?php

          foreach ($photos as $photo) {
            printf("<li>
              <img src='../ad_images/%s' title='%s' />
            </li>", $photo[0], $photo[1]);
          }

          ?>
        </ul>
      </div>
      
      <?php

    }

    ?>


         <!--  <li>
            <img src="../img/slide1.jpg" title="Kitchen" />
          </li>
          <li>
            <img src="../img/slide2.jpg" title="Lawn" />
          </li>
          <li>
            <img src="../img/slide3.jpg" title="Living Room" />
          </li>
          <li>
            <img src="../img/slide4.jpg" title="Bedroom" />
          </li> -->
          
          <div class="row">
           <div class="ad_desc col-md-12">
            <p><?php echo nl2br($ad['description']);?></p>
          </div>
        </div>
        <div class="adcontent row">
          <div class="col-md-12">
            <h2 class="fulladdress">Full Address</h2>
            <button id='btnPopMap' data-toggle="modal" data-target="#mapModal" class="iconbutton-md btn btn-md btn-primary" data-toggle="tooltip" data-placement="top" title="Show in Map"><i class="fa fa-map-marker"></i></button>
            <button id='btnPrintAddress' class="iconbutton-md btn btn-md btn-primary"  data-toggle="tooltip" data-placement="top" title="Print this address"><i class="fa fa-print"></i></button>
            <p class="fulladdress">

              <?php echo nl2br($ad['address']);?>
            </p>
          </div>



          <div class="col-md-12">
            <h2>What they say about this house</h2>
            <ul class="browse-tabs nav nav-tabs">
              <li class="active"><a href="#overall" data-toggle="tab">Overall</a></li>
              <li><a href="#water" data-toggle="tab">Water</a></li>
              <li><a href="#electricity" data-toggle="tab">Electricity</a></li>
              <li><a href="#gas" data-toggle="tab">Gas</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

              <div class="tab-pane fade in active" id="overall">
                <div class="row">

                  <div class="col-md-6 row">

                    <div class="ratingbox clearfix">
                      <img class="bgicon" src="../img/star-bg.png">
                      <header>
                        <h1>4.2</h1>
                        <div id="orating"></div>
                        <p>Rated by 17 users</p>
                      </header>
                    </div>

                    <div class="comment row">
                      <textarea placeholder="What do you know about this house?" class="form-control"></textarea>
                      <button class="form-control btn btn-sm btn-primary">Submit</button>
                    </div>


                  </div>

                  <div class="comments col-md-6">
                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Abdul Karim</h4>
                        Lived for 10 years. Nice House. 
                      </div>
                    </div>

                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">John Doe</h4>
                        Terrible One.
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane fade in" id="water">
                <div class="row">

                  <div class="col-md-6 row">

                    <div class="ratingbox clearfix">
                      <img class="bgicon" src="../img/water-bg.png">
                      <header>
                        <h1>4.7</h1>
                        <div id="wrating"></div>
                        <p>Rated by 15 users</p>
                      </header>
                    </div>

                    <div class="comment row">
                      <textarea placeholder="What do you know about water facilities in this house?" class="form-control"></textarea>
                      <button class="form-control btn btn-sm btn-primary">Submit</button>
                    </div>


                  </div>

                  <div class="comments col-md-6">
                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Abdul Karim</h4>
                        Water all the time 
                      </div>
                    </div>

                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">John Doe</h4>
                        Water flows like springs.
                      </div>
                    </div>
                  </div>

                </div>
              </div>





              <div class="tab-pane fade in" id="electricity">
                <div class="row">

                  <div class="col-md-6 row">

                    <div class="ratingbox clearfix">
                      <img class="bgicon" src="../img/elec-bg.png">
                      <header>
                        <h1>3.1</h1>
                        <div id="erating"></div>
                        <p>Rated by 10 users</p>
                      </header>
                    </div>

                    <div class="comment row">
                      <textarea placeholder="What do you know about electricity facilities in this house?" class="form-control"></textarea>
                      <button class="form-control btn btn-sm btn-primary">Submit</button>
                    </div>


                  </div>

                  <div class="comments col-md-6">
                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Simon</h4>
                        Loadshedding all the time. 
                      </div>
                    </div>


                  </div>

                </div>
              </div>



              <div class="tab-pane fade in" id="gas">
                <div class="row">

                  <div class="col-md-6 row">

                    <div class="ratingbox clearfix">
                      <img class="bgicon" src="../img/gas-bg.png">
                      <header>
                        <h1>4.0</h1>
                        <div id="grating"></div>
                        <p>Rated by 2 users</p>
                      </header>
                    </div>

                    <div class="comment row">
                      <textarea placeholder="What do you know about gas facilities in this house?" class="form-control"></textarea>
                      <button class="form-control btn btn-sm btn-primary">Submit</button>
                    </div>


                  </div>

                  <div class="comments col-md-6">
                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Simon</h4>
                        Have gas, but the house owner stops gas in the afternoon.
                      </div>
                    </div>

                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="media-object" src="../img/silhouette-man.jpg" style="width: 64px; height: 64px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Shuvo</h4>
                        Gas stops after 3 PM
                      </div>
                    </div>


                  </div>

                </div>
              </div>



            </div>

          </div>


        </div>


      </div>

      <div class="col-md-4">
        <div class="pricetag row">
          <h2><sup>৳</sup><?php echo $ad['rent'];?>
            <span>/mo</span>
          </h2>
        </div>

        <h3 class="text-center"><?php echo $ad['sqft'];?><small> sqft @ </small><sup>৳</sup><?php echo (floor($ad['rent']*100/$ad['sqft']))/100;?><small>/sqft</small></h3>

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
          <tbody>
            <tr><td><?php echo $ad['n_bed']<5?$ad['n_bed']:"5+";?> beds</td><td><?php for($i=1;$i<=$ad['n_bed'];++$i) echo "<img src='../img/bed.png'>";?></td></tr>
            <tr><td><?php echo $ad['n_bath']<5?$ad['n_bath']:"5+";?> baths</td><td><?php for($i=1;$i<=$ad['n_bath'];++$i) echo "<img src='../img/bath.png'>";?></td></tr>
            <tr><td><?php echo $ad['n_balcony']<5?$ad['n_balcony']:"5+";?> balconies</td><td><?php for($i=1;$i<=$ad['n_balcony'];++$i) echo "<img src='../img/balc.png'>";?></td></tr>
            <tr><td><?php echo $ad['n_living']<5?$ad['n_living']:"5+";?> living rooms</td><td><?php for($i=1;$i<=$ad['n_living'];++$i) echo "<img src='../img/tv.png'>";?></td></tr>
            <tr><td colspan='2'>

              <?php 

              if($ad['n_dining'] == 0)
                echo "No seperate dining room";
              else if($ad['n_dining'] == 1)
                echo "Has a seperate dining room";
              else
                echo "Has more than one seperate dining room";

              ?></td></tr>
            </tbody>
          </table>


          <h2>Location</h2>
          <div class="adlocation row">
            <a data-toggle="modal" data-target="#mapModal" ><img class="imgmap" src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $ad['lat'], ',', $ad['lng'];?>&zoom=16&size=500x300&sensor=false&&markers=color:red%7Clabel:A%7C<?php echo $ad['lat'], ',', $ad['lng'];?>"></a>
          </div>

          <h2>Nearby Houses</h2>
          <div class="houselist">

            <a href="singlead.html" class="searchresult-row">
              <div class="row">
                <div class="col-md-4">
                  <img src="../img/1.jpg">
                </div>
                <div class="col-md-8">
                  <h2>Tk 16,000 <span>/mo</span></h2>
                  <h4>

                    1400 sqft 

                    <span class="feat-divider">|</span>  

                    3 br 

                    <span class="feat-divider">|</span> 

                    2 ba


                  </h4>

                  <h5><i class="fa fa-map-marker"></i> Kalabagan, Dhaka</h5>


                </div>
              </div>
            </a>


            <a href="singlead.html" class="searchresult-row">
              <div class="row">
                <div class="col-md-4">
                  <img src="../img/2.jpg">
                </div>
                <div class="col-md-8">
                  <h2>Tk 26,000 <span>/mo</span></h2>
                  <h4>

                    1400 sqft 

                    <span class="feat-divider">|</span>  

                    3 br 

                    <span class="feat-divider">|</span> 

                    2 ba


                  </h4>

                  <h5><i class="fa fa-map-marker"></i> Kalabagan, Dhaka</h5>


                </div>
              </div>
            </a>


            <a href="singlead.html" class="searchresult-row">
              <div class="row">
                <div class="col-md-4">
                  <img src="../img/3.jpg">
                </div>
                <div class="col-md-8">
                  <h2>Tk 32,000 <span>/mo</span></h2>
                  <h4>

                    1400 sqft 

                    <span class="feat-divider">|</span>  

                    3 br 

                    <span class="feat-divider">|</span> 

                    2 ba


                  </h4>

                  <h5><i class="fa fa-map-marker"></i> Kalabagan, Dhaka</h5>


                </div>
              </div>
            </a>

            <a href="singlead.html" class="searchresult-row">
              <div class="row">
                <div class="col-md-4">
                  <img src="../img/3.jpg">
                </div>
                <div class="col-md-8">
                  <h2>Tk 32,000 <span>/mo</span></h2>
                  <h4>

                    1400 sqft 

                    <span class="feat-divider">|</span>  

                    3 br 

                    <span class="feat-divider">|</span> 

                    2 ba


                  </h4>

                  <h5><i class="fa fa-map-marker"></i> Kalabagan, Dhaka</h5>


                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $ad['title']; ?></h4>
          </div>
          <div class="modal-body">
            <div class="row">

              <div id='gmap_canvas' class="col-md-12" style='height:400px;'></div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



    <script>

      var g_ownername = "<?php echo $owner_name;?>";

      var g_title = "<?php echo $ad['title'];?>";


      <?php $caddress = str_replace("\n", "<br>", $ad['address']);?>

      var g_address = "<?php echo $caddress;?>";

      var g_contact = "<?php echo $ad['contactno'];?>";

      var g_lat = <?php echo $ad['lat'];?>;

      var g_lng = <?php echo $ad['lng'];?>;


    </script>