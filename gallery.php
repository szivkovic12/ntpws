<!DOCTYPE html>
<html>
<head>
<style>


div.gallery img {
  width: 80%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 30%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<h2><b>Gallery</b></h2>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/futurepc.jpg">
      <img src="gallery/futurepc.jpg" alt="Future PC" width="600" height="400">
    </a>
    <div class="desc">Future of foldable PCs</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/elcars.jpg">
      <img src="gallery/elcars.jpg" alt="Electric cars" width="600" height="400">
    </a>
    <div class="desc">Electric cars</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/tech.png">
      <img src="gallery/Best-Android-phones-2020.jpg" alt="Phones" width="600" height="400">
    </a>
    <div class="desc">Best phones in 2020.</div>
  </div>
</div>

<div class="clearfix"></div>
<hr>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/autopilot.jpg">
      <img src="gallery/autopilot.jpg" alt="Autopilot" width="600" height="400">
    </a>
    <div class="desc">Autopilot</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/house.jpg">
      <img src="gallery/house.jpg" alt="Tech" width="600" height="400">
    </a>
    <div class="desc">Smart House</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="gallery/tech.png">
      <img src="gallery/tech.png" alt="Tech" width="600" height="400">
    </a>
    <div class="desc">IT</div>
  </div>
</div>


</body>
</html>

