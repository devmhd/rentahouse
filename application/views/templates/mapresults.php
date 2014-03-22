
<?php function firstImgTag($photoString){

  $photos = json_decode($photoString);

  if(is_array($photos)){

    return base_url().'ad_images/'.$photos[0][0];

  }else{
    return base_url().'img/nophoto.png';
  }

}?>


<div style='padding: 0 0 50px 0' class="page container">

  <?php 

  if(count($ads)>0){

    echo " <div style='height:600px' id='map_canvas'></div>";

  }else{

    echo " <header style='padding:40px;'class='text-center'>
  
  <h2>No results</h2>
  <h4>Please search again with different parameters</h4>  

  </header>";

  }

  ?>


  

  <hr>
  <div class='text-center'><a class='btn btn-info btn-lg' href="<?php echo base_url().'search';?>">Search</a><?php if(count($ads)>0){?><a class='btn btn-info btn-lg' style='margin-left:30px' href="<?php echo $mapurl;?>">Show these ads in a grid</a><?php }?></div>



</div>

<script >


  var base_url = "<?php echo base_url();?>";
  var ads = <?php echo json_encode($ads)?>;

</script>

