<?php


echo form_open_multipart("handler/newad", array('id'=>'theForm'));

?>



<div class="page container">
              <h1>Post A New Ad</h1>

              <div class="formsection row">
                <div class="col-md-12">
                 <input type="text" class="form-control" name='title' placeholder="Short Address (will be used as the title)">
               </div>
             </div>


             <div class="formsection row">
              <div class="col-md-12">
                <h2>Select Location</h2>
              </div>


              <div class="col-md-6">
               <select name='region' class="form-control" id="sel_region">
               
                
              </select>

              <select name='area' class="form-control" id="sel_area">
              
             </select>

             <select name='neigh' class="form-control" id="sel_neigh">
             
            </select>

            <textarea name='address' class="form-control" rows="5" placeholder="Write the full and detailed address"></textarea>

          </div>

          <div class="col-md-6">
            <div id="gmap_canvas">

            </div>

            <input class="disabled col-md-6" id='latInput' name='lat' type='text'>
            <input class="disabled col-md-6" id='lngInput' name='lng' type='text'>
          </div>



        </div>

        <div class="formsection row">
         <div class="col-md-12">
          <h2>House Details</h2>
        </div>

        <div class="col-md-6">
          <select name='n_bed' class="form-control">
            <option value='none' >Select number of bedrooms</option>
            <option value='1' >1 bedroom</option>
            <option value='2' >2 bedrooms</option>
            <option value='3' >3 bedrooms</option>
            <option value='4' >4 bedrooms</option>
            <option value='5' >5 or more bedrooms</option>
          </select>

          <select name='n_bath' class="form-control">
            <option value='none' >Select number of bathrooms</option>
            <option value='1' >1 bathroom</option>
            <option value='2' >2 bathrooms</option>
            <option value='3' >3 bathrooms</option>
            <option value='4' >4 bathrooms</option>
            <option value='5' >5 or more bathrooms</option>
          </select>
          

          <select name='n_living' class="form-control">
            <option value='none' >Select number of living rooms</option>
            <option value='1' >1 living room</option>
            <option value='2' >2 living rooms</option>
            <option value='3' >3 living rooms</option>
            <option value='4' >4 living rooms</option>
            <option value='5' >5 or more living rooms</option>
          </select>

          <select name='n_balcony' class="form-control">
            <option value='none' >Select number of balconies</option>
            <option value='1' >1 balcony</option>
            <option value='2' >2 balconies</option>
            <option value='3' >3 balconies</option>
            <option value='4' >4 balconies</option>
            <option value='5' >5 or more balconies</option>
          </select>

          <select name='n_dining' class="form-control">
            <option value='none' >Dining Space?</option>
            <option value='0'>No seperate dining space</option>
            <option value='1' >Has a seperate dining space</option>
            <option value='2' >More than one dining space</option>
          </select>
          


        </div>

        <div class="col-md-6">
          <textarea rows="5" name='description' placeholder="(Optional) Describe the place" class="form-control"></textarea>

          <div class="input-group">

            <input name='sqft' id="ipSqft" type="text" class="form-control" placeholder="Area">
            <span class="input-group-addon">square feet</span>
          </div>

          <h3 style='display:inline-block;margin-right:20px;margin-top:30px'>Contact Number</h3>
         <input style='width:auto;display:inline-block' type='text' class='form-control' name='contactno' value='0112345677' placeholder='Contact Number'/>
        </div>

        
        
      </div>

      <div class="formsection row">
       <!--  <div class="col-md-3"></div> -->
        <div class="priceinput-wrap col-md-6">
          <div class="priceinput">
            <h3>Rent per month</h3>
            <div class="input-group">
              <span class="input-group-addon">Tk.</span>
              <input name='rent' id="ipRent" type="text" class="form-control" placeholder="">
              <span class="input-group-addon">/month</span>
            </div>
          </div>
        </div>

         <div class="priceinput-wrap col-md-6">
          <div class="priceinput">
            <h3>Available from</h3>
            <div class="input-group">
              <!-- <span class="input-group-addon"></span> -->
              <input name='availabledate' id="availableDate" type="date" class="form-control" placeholder="">
              <!-- <span class="input-group-addon"></span> -->
            </div>
          </div>
        </div>


        <!-- <div class="col-md-3"></div> -->
      </div>

      <div class="formsection row">
       <div class="col-md-12">
        <h2>Add photos</h2>
        <hr>


        <div class="upload-gallery col-md-12">


       <!--    <div class="upload-gallery-single row">
            <div class="col-md-3">
              <img id="thum" src="img/slide1.jpg">
            </div>
            <div class="col-md-9">
              <textarea class="form-control" placeholder="Small description of the photo; eg. The spacious living room"></textarea>
            </div>
          </div> -->




<!-- 
          <div class="upload-gallery-single row">
            <div class="col-md-3">
              <img src="img/slide1.jpg">
            </div>
            <div class="col-md-9">
              <textarea class="form-control" placeholder="Small description of the photo; eg. The spacious living room"></textarea>
            </div>
          </div> -->
        </div>

        <div class="col-md-12">
          <div class="col-md-12">
          <label for="fileinput" class="col-md-6">
          <img src="img/addBtn.png" alt="">
          <input style="display:none" type="file" name="imgthumb" id="fileinput" class="form-control"/>
        </label>
            

          </div>
        </div>

      </div>
      </div>
      <hr>
      <div class="formsection row">
        <div class="col-md-12">
          <button class="btn btn-lg btn-primary">Submit Ad</button>
        </div>
      </div>

      </div>

      </form>