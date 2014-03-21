<?php
require_once('../vendor/autoload.php');

use \Uzulla\GifBoom\Info as GI;

class UzullaGifboomInfoTest extends PHPUnit_Framework_TestCase{

    public function __construct()
    {
    }

    protected function setUp()
    {
    }

    public static function tearDownAfterClass()
    {
    }

    public function testGetGifUrl(){
        $url = "http://gifboom.com/x/a61caf2b";
        $gif_url = GI::getGifUrl($url);
        $this->assertEquals('http://medias.gifboom.com/medias/138465b1f3bf4d7d83f8969a48741052@2x.gif', $gif_url);

        $id = "a61caf2b";
        $gif_url = GI::getGifUrl($id);
        $this->assertEquals('http://medias.gifboom.com/medias/138465b1f3bf4d7d83f8969a48741052@2x.gif', $gif_url);
    }

}
