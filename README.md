# imagick
图片瘦身

```
composer require yunhu/imagick
```
初始化
```
$ob = new \IM\Imagick(); 
```
想要压缩成多少M默认是3M，如不需要可不用
```
//$ob->getQuality(filesize($filePath),5); 
```
开始压缩并返回压缩后的地址
```
$filePath = $ob->compress($filePath);       
```
