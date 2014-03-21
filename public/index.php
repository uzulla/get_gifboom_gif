<?php
require '../vendor/autoload.php';

if(isset($_GET['url'])){
    $url = \Uzulla\GifBoom\Info::getGifUrl($_GET['url']);
    echo $url;
}else{
    ?>
<html>
<body>
<form>
    gifboom itemurl or id<input name="url">
    <input type="submit">
</form>
</body>
</html>
<?php
}


