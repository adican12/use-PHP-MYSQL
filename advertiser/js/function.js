function getTheLastId(){
  var x = "<?php echo $row1['MAX(adID)'];?>";
  document.getElementById("panel-body").style.fontSize = "xx-large";
  document.getElementById("panel-body").style.textAlign = "center";
  document.getElementById("panel-body").innerHTML= " Your banner ID is:  " + x + " Please keep your ID in order to use a platform for the campaign";
}
