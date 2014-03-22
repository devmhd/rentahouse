  <div class="page container" style='padding: 0 40px'>

     <!--    <div class="row searchbox">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter name of a city, region or neighbourhood...">
              <span class="input-group-btn">
                <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>

          </div>
          <div class="col-md-2"></div>

        </div> -->




        <div class="text-divider">
          <h1>Search for exactly what you need</h1>
          <div class="divider"></div>
        </div>

       <form action="http://localhost/rentahouse.com/ads" accept-charset="utf-8" id="theForm" novalidate="novalidate">

        <div class="row">
          <div class="col-md-4">
            <select id='sel_region' name='region' class="form-control">
             <option value='all'>All Regions</option>
            </select>

          </div>

          <div class="col-md-4">
            <select  id='sel_area' name='area' class="form-control">
               <option value='all'>All Areas</option>
            </select>

          </div>

          <div class="col-md-4">
            <select  id='sel_neigh'  name='nei' class="form-control">
             <option value='all'>All Neighborhoods</option>
            </select>

          </div>
        </div>

        <div class="row form-row">

          <div class="col-md-3">
            <select name='bed' class="form-control" >
              <option value='all'>Any number of bedrooms</option>
              <option value='1'>At least 1 bedroom</option>
              <option value='2'>At least 2 bedrooms</option>
              <option value='3'>At least 3 bedrooms</option>
              <option value='4'>At least 4 bedrooms</option>
              <option value='5'>5 or more bedrooms</option>
            </select>

          </div>

          <div class="col-md-3">
            <select name='bath' class="form-control" >
              <option value='all'>Any number of bathrooms</option>
              <option value='1'>At least 1 bathroom</option>
              <option value='2'>At least 2 bathrooms</option>
              <option value='3'>At least 3 bathrooms</option>
              <option value='4'>At least 4 bathrooms</option>
              <option value='5'>5 or more bathrooms</option>
            </select>

          </div>

          <div class="col-md-3">
            <select name='balc' class="form-control" >
              <option value='all'>Any number of balconies</option>
              <option value='1'>At least 1 balcony</option>
              <option value='2'>At least 2 balconies</option>
              <option value='3'>At least 3 balconies</option>
              <option value='4'>At least 4 balconies</option>
              <option value='5'>5 or more balconies</option>
            </select>

          </div>

          <div class="col-md-3">
            <select name='living' class="form-control" >
                <option value='all'>Any number of Living Rooms</option>
              <option value='1'>At least 1 Living Room</option>
              <option value='2'>At least 2 Living Rooms</option>
              <option value='3'>At least 3 Living Rooms</option>
              <option value='4'>At least 4 Living Rooms</option>
              <option value='5'>5 or more Living Rooms</option>
            </select>

          </div>

        </div>

        <div class="row form-row">

          <div class="col-md-3">
            <h4>Find homes ranging from</h4>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">Tk</span>
              <input type="text" name='minrent' class="form-control" placeholder="Minimum rent">
            </div>
          </div>
          <div class="col-md-1">
            <h4>To</h4>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">Tk</span>
              <input type="text" name='maxrent' class="form-control" placeholder="Maximum rent">
            </div>
          </div>
        </div>

        <div class="row form-row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            
            <button href="searchresults.html" class="customsearchbutton btn btn-info btn-block btn-lg"><i class="fa fa-search left"></i>Search &raquo;</button>
          </div>
          <div class="col-md-4"></div>
        </div>

        </form>
</div>

      