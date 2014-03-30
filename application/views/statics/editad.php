<?php


echo form_open_multipart("handler/editad", array('id'=>'theForm'));



?>

<input type='hidden' name='slug' value='<?php echo $ad['slug'];?>'/>



<div class="page container">
              <h1>Edit Ad</h1>

              <div class="formsection row">
                <div class="col-md-12">
                 <input type="text" class="form-control" name='title' value='<?php echo $ad['title'];?>' placeholder="Short Address (will be used as the title)">
               </div>
             </div>


             <div class="formsection row">
              <div class="col-md-12">
                <h2>Select Location</h2>
              </div>


              <div class="col-md-6">
               <select name='region' class="form-control" id="sel_region">
               <?php 
                foreach ($regions as $region) {

                  $seltext = $region['id']==$ad['region']?"selected":"";
                  echo "<option value='". $region['id'] ."' $seltext >" . $region['name'] . "</option>";
                }

               ?>
                
              </select>

              <select name='area' class="form-control" id="sel_area">
                <?php 
                foreach ($areas as $area) {

                  $seltext = $area['id']==$ad['area']?"selected":"";
                  echo "<option value='". $area['id'] ."' $seltext >" . $area['name'] . "</option>";
                }

               ?>
             </select>

             <select name='neigh' class="form-control" id="sel_neigh">
              <?php 
                foreach ($neis as $nei) {

                  $seltext = $nei['id']==$ad['neigh']?"selected":"";
                  echo "<option value='". $nei['id'] ."' $seltext >" . $nei['name'] . "</option>";
                }

               ?>
            </select>

            <textarea name='address' class="form-control" rows="5" placeholder="Write the full and detailed address"><?php echo $ad['address'];?></textarea>

          </div>

          <div class="col-md-6">
            <div id="gmap_canvas">

            </div>

            <input class="disabled col-md-6" id='latInput' value="<?php echo $ad['lat'];?>" name='lat' type='hidden'>
            <input class="disabled col-md-6" id='lngInput' value="<?php echo $ad['lng'];?>" name='lng' type='hidden'>
          </div>



        </div>

        <div class="formsection row">
         <div class="col-md-12">
          <h2>House Details</h2>
        </div>

        <div class="col-md-6">
          <select name='n_bed' class="form-control">
            <option value='none' >Select number of bedrooms</option>
            <option value='1' <?php echo $ad['n_bed']==1?"selected":""; ?> >1 bedroom</option>
            <option value='2' <?php echo $ad['n_bed']==2?"selected":""; ?> >2 bedrooms</option>
            <option value='3' <?php echo $ad['n_bed']==3?"selected":""; ?> >3 bedrooms</option>
            <option value='4' <?php echo $ad['n_bed']==4?"selected":""; ?> >4 bedrooms</option>
            <option value='5' <?php echo $ad['n_bed']==5?"selected":""; ?> >5 or more bedrooms</option>
          </select>

          <select name='n_bath' class="form-control">
            <option value='none' >Select number of bathrooms</option>
            <option value='1' <?php echo $ad['n_bath']==1?"selected":""; ?> >1 bathroom</option>
            <option value='2' <?php echo $ad['n_bath']==2?"selected":""; ?> >2 bathrooms</option>
            <option value='3' <?php echo $ad['n_bath']==3?"selected":""; ?> >3 bathrooms</option>
            <option value='4' <?php echo $ad['n_bath']==4?"selected":""; ?> >4 bathrooms</option>
            <option value='5' <?php echo $ad['n_bath']==5?"selected":""; ?> >5 or more bathrooms</option>
          </select>
          

          <select name='n_living' class="form-control">
            <option value='none' >Select number of living rooms</option>
            <option value='1' <?php echo $ad['n_living']==1?"selected":""; ?> >1 living room</option>
            <option value='2' <?php echo $ad['n_living']==2?"selected":""; ?> >2 living rooms</option>
            <option value='3' <?php echo $ad['n_living']==3?"selected":""; ?> >3 living rooms</option>
            <option value='4' <?php echo $ad['n_living']==4?"selected":""; ?> >4 living rooms</option>
            <option value='5' <?php echo $ad['n_living']==5?"selected":""; ?> >5 or more living rooms</option>
          </select>

          <select name='n_balcony' class="form-control">
            <option value='none' >Select number of balconies</option>
            <option value='1' <?php echo $ad['n_balcony']==1?"selected":""; ?> >1 balcony</option>
            <option value='2' <?php echo $ad['n_balcony']==2?"selected":""; ?> >2 balconies</option>
            <option value='3' <?php echo $ad['n_balcony']==3?"selected":""; ?> >3 balconies</option>
            <option value='4' <?php echo $ad['n_balcony']==4?"selected":""; ?> >4 balconies</option>
            <option value='5' <?php echo $ad['n_balcony']==5?"selected":""; ?> >5 or more balconies</option>
          </select>

          <select name='n_dining' class="form-control">
            <option value='none' >Dining Space?</option>
            <option value='0' <?php echo $ad['n_dining']==0?"selected":""; ?> >No seperate dining space</option>
            <option value='1' <?php echo $ad['n_dining']==1?"selected":""; ?> >Has a seperate dining space</option>
            <option value='2' <?php echo $ad['n_dining']==2?"selected":""; ?> >More than one dining space</option>
          </select>
          


        </div>

        <div class="col-md-6">
          <textarea rows="5" name='description' placeholder="(Optional) Describe the place" class="form-control"><?php echo $ad['description'];?></textarea>

          <div class="input-group">

            <input name='sqft' value="<?php echo $ad['sqft'];?>" id="ipSqft" type="text" class="form-control" placeholder="Area">
            <span class="input-group-addon">square feet</span>
          </div>

          <h3 style='display:inline-block;margin-right:20px;margin-top:30px'>Contact Number</h3>
         <input style='width:auto;display:inline-block' type='text' class='form-control' name='contactno' value="<?php echo $ad['contactno'];?>" placeholder='Contact Number'/>
        </div>

        
        
      </div>

      <div class="formsection row">
       <!--  <div class="col-md-3"></div> -->
        <div class="priceinput-wrap col-md-6">
          <div class="priceinput">
            <h3>Rent per month</h3>
            <div class="input-group">
              <span class="input-group-addon">Tk.</span>
              <input name='rent' id="ipRent" type="text" value="<?php echo $ad['rent'];?>" class="form-control" placeholder="">
              <span class="input-group-addon">/month</span>
            </div>
          </div>
        </div>

         <div class="priceinput-wrap col-md-6">
          <div class="priceinput">
            <h3>Available from</h3>
            <div class="input-group">
              <!-- <span class="input-group-addon"></span> -->
              <input name='availabledate' id="availableDate" value="<?php echo $ad['availabledate'];?>" type="date" class="form-control" placeholder="">
              <!-- <span class="input-group-addon"></span> -->
            </div>
          </div>
        </div>


        <!-- <div class="col-md-3"></div> -->
      </div>

     
      <hr>
      <div class="formsection row">
        <div class="col-md-12">
          <button class="btn btn-lg btn-primary">Submit</button>
        </div>
      </div>

      </div>

      </form>

      <script>

        var g_base_url = "<?php echo base_url();?>";
        var g_lat = <?php echo $ad['lat'];?>;
        var g_lng = <?php echo $ad['lng'];?>;

      </script>