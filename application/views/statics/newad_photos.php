<?php


echo form_open_multipart("handler/newad_photos", array('id'=>'theImageForm'));

?>


<input type='hidden' name='ad_slug' value="<?php echo $ad_slug;?>"/>
<div class="page container">
             

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
 <!--          <label for="fileinput" class="col-md-6"> -->
          <a id='addBtn' class="btn btn-sm btn-info">Add Photo</a>
   <!--        <input style="display:none" type="file" name="imgthumb" id="fileinput" class="form-control"/> -->
        </label>
            

          </div>
        </div>

      </div>
      </div>
      <hr>
      <div class="formsection row">
        <div style='text-align:center' class="col-md-12">
          <button class="btn btn-lg btn-primary">Upload Photos</button>
          <a href='#' class="btn btn-lg btn-primary">Skip</a>
        </div>
      </div>

      </div>

      </form>