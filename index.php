<?php
$version = "RaspberryPi Kiosk Slideshow - Version " . file_get_contents("./version");
echo "<!-- " . $version . " -->\r\n";
?>
<!DOCTYPE html>
<html>
<head>
  <title>
      <?php echo $version; ?>
  </title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      background-color: black;
    }

    iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
      padding-top: 0;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
  </style>
</head>
<body>
<iframe src="datetimenow.html" id="fristFrame" style="visibility: hidden;"></iframe>
<iframe src="datetimenow.html" id="secondFrame" style="visibility: visible;"></iframe>
<script type="text/javascript">
  var urls = [];
  <?php
  $steuerungsinfos = file("./files/slideshow.txt");
  $outputSize = 0;
  $delay = 14 / 2 * 1000;

  for ($i = 0; $i < count($steuerungsinfos); $i++) {
      if (!(substr($steuerungsinfos[$i], 0, 1) === "#")) {
          $enhancedUrl = trim($steuerungsinfos[$i]);
          if (!(substr($enhancedUrl, 0, 4) === "http")) {
              $enhancedUrl = "./files/" . $enhancedUrl;
          }
          echo "urls[" . $outputSize . "] = '" . $enhancedUrl . "';\r\n";
          $outputSize++;
      } else if (substr($steuerungsinfos[$i], 0, 35) === "# setting-transition-delay=") {
          $delayvalue = substr($steuerungsinfos[$i], 35);
          $delay = $delayvalue / 2 * 1000;
      }
  }
  echo "var delay = " . $delay . ";\r\n";
  ?>
  var urlaktuell = 0;
  setTimeout("loadIntoFristFrame()", 1000);

  function loadIntoFristFrame() {
    document.getElementById('fristFrame').src = urls[urlaktuell];
    urlaktuell++;
    if (urlaktuell === urls.length) {
      urlaktuell = 0;
    }
    setTimeout("switchToFirstFrame()", delay);
  }

  function switchToFirstFrame() {
    document.getElementById('fristFrame').style.visibility = 'visible';
    document.getElementById('secondFrame').style.visibility = 'hidden';
    setTimeout("loadIntoSecondFrame()", delay);
  }

  function loadIntoSecondFrame() {
    document.getElementById('secondFrame').src = urls[urlaktuell];
    urlaktuell++;
    if (urlaktuell === urls.length) {
      urlaktuell = 0;
    }
    setTimeout("switchToSecondFrame()", delay);
  }

  function switchToSecondFrame() {
    document.getElementById('fristFrame').style.visibility = 'hidden';
    document.getElementById('secondFrame').style.visibility = 'visible';
    setTimeout("loadIntoFristFrame()", delay);
  }
</script>
</body>
</html>