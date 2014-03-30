
<?php function firstImgTag($photoString){

  $photos = json_decode($photoString);

  if(is_array($photos)){

    return base_url().'ad_images/'.$photos[0][0];

  }else{
    return base_url().'img/nophoto.png';
  }

}?>



<?php 


if($loggedIn && $is_mod && $ad['visible']==0){
  if($is_mod ){




    ?>

    <div class='fixedbtnbar'>
      <a href="<?php echo base_url().'approve/'.$ad['slug'];?>" class="btn btn-lg btn-info">Approve</a>
      <a href="<?php echo base_url().'disapprove/'.$ad['slug'];?>" class="btn btn-lg btn-info">Disapprove</a>
    </div>

    <?php  

  }
}

?>

<div class="page container">
  <div class="row">

    <div class="col-md-8">

      <header class="profile">
        <h2><?php echo $ad['title']; ?></h2>
        <h4>
          <a title='Lookup houses in <?php echo $region_name;?>' href="<?php echo base_url().'ads?region='.$ad['region'];?>"><?php echo $region_name;?></a>
          <i class="fa fa-angle-right small"></i>
          <a title='Lookup houses in <?php echo $area_name;?>' href="<?php echo base_url().'ads?area='.$ad['area'];?>"><?php echo $area_name;?></a>
          <i class="fa fa-angle-right small"></i>
          <a title='Lookup houses in <?php echo $neigh_name;?>' href="<?php echo base_url().'ads?nei='.$ad['neigh'];?>"><?php echo $neigh_name;?></a>
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



        <!--  <a href='<?php echo base_url().'approve/'.$ad['slug'];?>' class="btn btn-lg btn-primary" style='margin-top:40px;'>Approve</a> -->

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
                        <h1><?php echo number_format($oratingdata['rating'],1);?></h1>
                        <div id="orating"></div>
                        <p>Rated by <?php echo $oratingdata['count'];?> users</p>

                      </header>
                    </div>

                    <div class="comment row">
                      <form action="<?php echo base_url()."service/submitrating"?>" method="post" accept-charset="utf-8" >
                        <textarea name='review' placeholder="What do you know about this house?" class="form-control"></textarea>
                        <input type='submit' value='Submit' class="form-control btn btn-sm btn-primary" />
                        <input type='hidden' name='rated' value='<?php echo $ad['id'];?>'/>
                        <input type='hidden' name='rating' id='oratinginput'value=''/>
                        <input type='hidden' name='slug' value='<?php echo $ad['slug'];?>'/>

                        <input type='hidden' name='table' value='o'/>
                      </form>
                    </div>


                  </div>

                  <div class="comments col-md-6">


                   <?php

                   if(count($oratingdata['reviews'])>0){

                    foreach ($oratingdata['reviews'] as $review) {
                      echo "<div class='media'>

                      <div class='media-body'>
                      <h4 class='media-heading'>". $review['rater_name'] ."</h4>
                        ". $review['review'] ."

                      </div>
                    </div>";
                  }

                }

                ?>




                
              </div>

            </div>
          </div>

          <div class="tab-pane fade in" id="water">
            <div class="row">

              <div class="col-md-6 row">

                <div class="ratingbox clearfix">
                  <img class="bgicon" src="../img/water-bg.png">
                  <header>
                    <h1><?php echo number_format($wratingdata['rating'],1);?></h1>
                    <div id="wrating"></div>
                    <p>Rated by <?php echo $wratingdata['count'];?> users</p>

                  </header>
                </div>

                <div class="comment row">
                  <form action="<?php echo base_url()."service/submitrating"?>" method="post" accept-charset="utf-8" >
                    <textarea name='review' placeholder="What do you know about water facilities in this house?" class="form-control"></textarea>
                    <input type='submit' value='Submit' class="form-control btn btn-sm btn-primary" />
                    <input type='hidden' name='rated' value='<?php echo $ad['id'];?>'/>
                    <input type='hidden' name='rating' id='wratinginput'value=''/>
                    <input type='hidden' name='slug' value='<?php echo $ad['slug'];?>'/>
                    <input type='hidden' name='table' value='w'/>
                  </form>
                </div>


              </div>

              <div class="comments col-md-6">
                 <?php

                   if(count($wratingdata['reviews'])>0){

                    foreach ($wratingdata['reviews'] as $review) {
                      echo "<div class='media'>

                      <div class='media-body'>
                      <h4 class='media-heading'>". $review['rater_name'] ."</h4>
                        ". $review['review'] ."

                      </div>
                    </div>";
                  }

                }

                ?>
              </div>

            </div>
          </div>





          <div class="tab-pane fade in" id="electricity">
            <div class="row">

              <div class="col-md-6 row">

                <div class="ratingbox clearfix">
                  <img class="bgicon" src="../img/elec-bg.png">
                  <header>
                    <h1><?php echo number_format($eratingdata['rating'],1);?></h1>
                    <div id="erating"></div>
                    <p>Rated by <?php echo $eratingdata['count'];?> users</p>

                  </header>
                </div>

                <div class="comment row">
                  <form action="<?php echo base_url()."service/submitrating"?>" method="post" accept-charset="utf-8" >
                    <textarea name='review' placeholder="What do you know about electricity facilities in this house?" class="form-control"></textarea>
                    <input type='submit' value='Submit' class="form-control btn btn-sm btn-primary" />
                    <input type='hidden' name='rated' value='<?php echo $ad['id'];?>'/>
                    <input type='hidden' name='rating' id='eratinginput'value=''/>
                    <input type='hidden' name='slug' value='<?php echo $ad['slug'];?>'/>
                    <input type='hidden' name='table' value='e'/>
                  </form>
                </div>


              </div>

              <div class="comments col-md-6">
                  <?php

                  if(count($eratingdata['reviews'])>0){

                   foreach ($eratingdata['reviews'] as $review) {
                     echo "<div class='media'>

                     <div class='media-body'>
                     <h4 class='media-heading'>". $review['rater_name'] ."</h4>
                       ". $review['review'] ."

                     </div>
                   </div>";
                 }

               }

               ?>


              </div>

            </div>
          </div>



          <div class="tab-pane fade in" id="gas">
            <div class="row">

              <div class="col-md-6 row">

                <div class="ratingbox clearfix">
                  <img class="bgicon" src="../img/gas-bg.png">
                  <header>
                    <h1><?php echo number_format($gratingdata['rating'],1);?></h1>
                    <div id="grating"></div>
                    <p>Rated by <?php echo $gratingdata['count'];?> users</p>

                  </header>
                </div>

                <div class="comment row">
                  <form action="<?php echo base_url()."service/submitrating"?>" method="post" accept-charset="utf-8" >
                    <textarea name='review' placeholder="What do you know about gas utility in this house?" class="form-control"></textarea>
                    <input type='submit' value='Submit' class="form-control btn btn-sm btn-primary" />
                    <input type='hidden' name='rated' value='<?php echo $ad['id'];?>'/>
                    <input type='hidden' name='rating' id='gratinginput'value=''/>
                    <input type='hidden' name='slug' value='<?php echo $ad['slug'];?>'/>
                    <input type='hidden' name='table' value='g'/>
                  </form>
                </div>


              </div>

              <div class="comments col-md-6">
                
                  <?php

                   if(count($gratingdata['reviews'])>0){

                    foreach ($gratingdata['reviews'] as $review) {
                      echo "<div class='media'>

                      <div class='media-body'>
                      <h4 class='media-heading'>". $review['rater_name'] ."</h4>
                        ". $review['review'] ."

                      </div>
                    </div>";
                  }

                }

                ?>

              </div>

            </div>
          </div>



        </div>

      </div>


    </div>


  </div>

  <div class="col-md-4">
    <div class="pricetag row">
      <h2><sup>৳</sup><?php echo number_format($ad['rent'],0,"",",");?>
        <span>/mo</span>
      </h2>
    </div>

    <h3 class="text-center"><?php echo number_format($ad['sqft'],0,"",",");?><small> sqft @ </small><sup>৳</sup><?php echo (floor($ad['rent']*100/$ad['sqft']))/100;?><small>/sqft</small></h3>

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
        <a data-toggle="modal" data-target="#mapModal" ><img title='Click to enlarge' class="imgmap" src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $ad['lat'], ',', $ad['lng'];?>&zoom=16&size=500x300&sensor=false&&markers=color:red%7Clabel:A%7C<?php echo $ad['lat'], ',', $ad['lng'];?>"></a>
      </div>

      <h2>Nearby Houses</h2>
      <div class="houselist">


        <?php if(count($nearby)>0){

          foreach ($nearby as $house) {

            echo " <a href='". base_url()."ad/".$house['slug']. "' class='searchresult-row'>
            <div class='row'>
              <div class='col-md-4'>
                <img src='". firstImgTag($house['photos']) ."'>
              </div>
              <div class='col-md-8'>
                <h2>".$house['rent']."<span>/mo</span></h2>
                <h4>

                  ".$house['sqft']." sqft 

                  <span class='feat-divider'>|</span>  

                  ".$house['n_bed']." br 

                  <span class='feat-divider'>|</span> 

                  ".$house['n_bath']." ba


                </h4>

                <h5><i class='fa fa-map-marker'></i> ". $house['neiName'] .", " . $house['areaName'] ."</h5>


              </div>
            </div>
          </a>
          ";

        }
      }?>




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



  var g_orating = <?php echo $oratingdata['rating'];?>;
  var g_wrating = <?php echo $wratingdata['rating'];?>;
  var g_grating = <?php echo $gratingdata['rating'];?>;
  var g_erating = <?php echo $eratingdata['rating'];?>;


</script>