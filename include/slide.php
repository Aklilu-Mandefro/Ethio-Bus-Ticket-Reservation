<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="include/style.css">
  </head>
  <body>
    <div class="content">
      <div class="images">
        <img src="a.jpg" width="300" height="220">
        <img src="b.jpg"width="300" height="220">
        <img src="c.jpg" width="300" height="220">
        <img src="d.jpg" width="300" height="220">
        <img src="e.jpg" width="300" height="220">
      </div>
</div>
<script>
      var indexValue = 0;
      function slideShow(){
        setTimeout(slideShow, 2500);
        var x;
        const img = document.querySelectorAll("img");
        for(x = 0; x < img.length; x++){
          img[x].style.display = "none";
        }
        indexValue++;
        if(indexValue > img.length){indexValue = 1}
        img[indexValue -1].style.display = "block";
      }
      slideShow();
    </script>

  </body>
</html>

