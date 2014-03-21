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
    <hr>
    <a href="https://github.com/uzulla/get_gifboom_gif">github/uzulla/get_gifboom_gif</a>
</form>
</body>
</html>
<?php
}


