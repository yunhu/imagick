<?php
namespace  Tiki;


class Imagick {

    public $obj = null;
    public $quality = 60;
    public $limit = 3;

    public function __construct()
    {
        if(class_exists('Imagick')){
            $this->obj = new \Imagick();
        }
        return $this->obj;
    }

    /**
     * @param $realyQality
     * @param int $wantQality 默认是3* 1024 *1024 3M
     */
    public function getQuality($realyQality,$wantQality=0 ){

        if($realyQality) {
            if (!$wantQality) {
                $wantQality = $this->limit * 1024 * 1024;
            } else {
                $this->limit = $wantQality;
            }
            $this->quality = round($wantQality / $realyQality, 2) * 100;
        }
    }

    public function compress($srcImg,$destImg = '',$quality = '',$isDel=1)
    {
        if(filesize($srcImg) < $this->limit * 1024  * 1024){
            return $srcImg;
        }

        if(!is_object($this->obj))
        {
            return false;
        }
        try
        {
            if(empty($quality)){
                $quality = $this->quality;
            }

            if(empty($destImg)){
                $destImg = '/tmp/'.md5(time().mt_rand(1,10000)).'.jpeg';
            }
            $destImg = empty($destImg) ? $srcImg : $destImg;
            $this->obj->readImage($srcImg);
            $this->obj->setImageFormat('jpeg');
            $this->obj->setImageCompression(\Imagick::COMPRESSION_JPEG);

            $quality = $this->obj->getImageCompressionQuality() * $quality / 100;
            $this->obj->setImageCompressionQuality($quality);
            $this->obj->stripImage();

            if($this->obj->writeImage($destImg))
            {
                $this->obj->clear();
                $this->obj->destroy();
                if($isDel) {
                    unlink($srcImg);
                }
                return $destImg;
            }
            return false;
        }
        catch (\ImagickException $e)
        {
            return false;
        }
    }
}
