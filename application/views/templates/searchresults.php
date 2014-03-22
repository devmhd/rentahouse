
<?php function firstImgTag($photoString){

  $photos = json_decode($photoString);

  if(is_array($photos)){

    return base_url().'ad_images/'.$photos[0][0];

  }else{
    return base_url().'img/nophoto.png';
  }

}?>


<div class="page container">



  <?php 

  if(count($ads)>0){

    ?>

    <div class="houselist col2">

     <?php foreach ($ads as $ad) { ?>

     <a href="<?php echo base_url().'ad/'. $ad['slug'] ?>" class="house-grid">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo firstImgTag($ad['photos']);?>">
        </div>
        <div class="col-md-8">
          <h2>Tk <?php echo number_format($ad['rent'],0,"",",");?><span> /mo</span></h2>
          <h4>

            <?php echo number_format($ad['sqft'],0,"",",");?> sqft 

            <span class="feat-divider">|</span>  

            <?php echo $ad['n_bed'];?> br 

            <span class="feat-divider">|</span> 

            <?php echo $ad['n_bath'];?> ba


          </h4>

          <h5><i class="fa fa-map-marker"></i> <?php echo $ad['neiName'],', ',$ad['areaName']; ?></h5>


        </div>
      </div>
    </a>

    <?php } ?>




  </div>



  <?php 


}else{

  echo " <header style='padding:40px;'class='text-center'>

  <h2>No results</h2>
  <h4>Please search again with different parameters</h4>  

</header>";

}

?>





<hr>
<div class='text-center'><a class='btn btn-info btn-lg' href="<?php echo base_url().'search';?>">Search</a><?php if(count($ads)>0){?><a class='btn btn-info btn-lg' style='margin-left:30px' href="<?php echo $mapurl;?>">Show these ads in a map</a><?php }?></div>


</div>

