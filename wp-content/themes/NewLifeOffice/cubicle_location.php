<?php
$path = $_SERVER['REQUEST_URI'];
list($first, $name) = explode("/",$path);
if($name == "salt_lake"){
  ?>
    <div id="headtext">
    <h1>Salt Lake City | Office</h1>
    <h2>1975 West North Temple<br />
    Salt Lake City, UT 84116</h2>
    <h2>801-359-7257</h2>
    </div>
    <?php
}
elseif($name == "boise-office"){
  ?>

    <div id="headtext">
    <h1>Boise | Office</h1>
    <h2>2926 S. Jupiter Ave<br>
    Boise ID, 83709</h2>
    <h2>(208) 321-9211</h2>
    </div>
    <?php
}else{
  ?>
    <div id="headtext">
    <h1>Las Vegas | Office</h1>
    <h2>3475 West Post Road, Suite 120<br>
    Las Vegas, Nevada 89118</h2>
    <h2>(702) 212-0407</h2>
    </div>

    <?php
}
?>

