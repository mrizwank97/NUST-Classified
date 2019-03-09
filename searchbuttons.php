<?php
  echo '<form class="search-form" role="search" method="get" action="search.php">
            <div class="input-group">
          <div class="input-group-btn dropdown">
            <button class="btn btn-primary dropdown-toggle seecs-color" type="button" data-toggle="dropdown">School
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="seecs.php">SEECS</a></li>
              <li><a href="sada.php">SADA</a></li>
              <li><a href="nbs.php">NBS</a></li>      
              <li><a href="nice.php">NICE</a></li>
              <li><a href="smme.php">SMME</a></li>
              <li><a href="#">IGIS</a></li>
              <li><a href="#">IESE</a></li>
              <li><a href="#">SCME</a></li>
              <li><a href="#">SNS</a></li>  
              <li><a href="#">ASAB</a></li>
              <li><a href="#">NIT</a></li>
              <li><a href="#">S3H</a></li>
            </ul>
          </div>
          <div class="input-group-btn dropdown">
            <button class="btn btn-primary dropdown-toggle seecs-color" type="button" data-toggle="dropdown">Category
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="hostel-ads.php">Ads</a></li>
              <li><a href="roomswap.php">Room Swap</a></li>
              <li><a href="hostelstay.php">Hostel Stay</a></li>
              <li><a href="roomcooler.php">Coolers</a></li>
              <li><a href="refrigerator.php">Refrigerators</a></li>
              <li><a href="electronics.php">Electronics</a></li>
              <li><a href="other.php">Other Products</a></li>
            </ul>
          </div>
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i style="color: #00688B" class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
          </form>';
?>