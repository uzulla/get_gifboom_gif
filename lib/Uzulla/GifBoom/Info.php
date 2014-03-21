<?php

namespace Uzulla\GifBoom;

class Info
{
    /**
     * @param $url_or_id Gifboom item url or item id.
     * @return string gif url.
     * @throws \Exception
     */
    static function getGifUrl($url_or_id){
        $url = null;
        if(preg_match("|\Ahttp://gifboom.com/x/([a-zA-Z0-9\-_]+)\z|u", $url_or_id))
            $url = $url_or_id;
        else{
            if(preg_match("|\A([a-zA-Z0-9\-_]+)\z|", $url_or_id)){
                $url = "http://gifboom.com/x/{$url_or_id}";
            }else{
                throw new \Exception('invalid gifboom item id');
            }
        }

        $g = new \Goutte\Client();
        try{
            $c = $g->request('GET', $url);
        }catch(\Exception $e){
            throw new \Exception("get html fail");
        }

        try{
            $href = $c->filter("div.share-gif a.tu", 0)->attr("href");
        }catch(\Exception $e){
            throw new \Exception("get tumblr share url fail");
        }

        $href = urldecode($href);
        // http://www.tumblr.com/share/link?url=http://gifboom.com/x/ff29c9a5&description=めでたい動画です<br/><img src="http://medias.gifboom.com/medias/ce7740c54ab145d69ef9c76141df3422@2x.gif"/><br/>Created with <a href="http://www.gifboom.com">GifBoom</a>
        $matches =[];
        if(!preg_match('|<img src="([^"]+)"/>|u', $href, $matches))
            throw new \Exception('Tumblr share url parse fail');

        $gif_url = $matches[1];

        return $gif_url;
    }
}