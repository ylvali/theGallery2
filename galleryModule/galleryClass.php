<?php
namespace Ylva\Gallery;

class CGallery
{

//test function
    public function hello()
    {
        $hello = "hello";
        return $hello;
    }

//get the images
    public function getImages()
    {
        $images = [];

        //list of images
        //later a database connection here
        //now images and id
        $images[0] = array("img/kali.jpg", 1);
        $images[1] = array("img/orchide.jpg", 2);
        $images[2] = array("img/wolf.jpg", 3);

        return $images;
    }

//adjust size of the images
    public function setNgetSizeSmall($height = 300)
    {

        $images = $this->getImages();
        $size = sizeOf($images);

        //put html format
        for ($i=0; $i<$size; $i++) {
            $pict = $images[$i][0];
            $id = $images[$i][1];
            $image = "<img src='$pict' height='$height' alt='$id'>";
            $imagesSmall['images'][$i] = $image;
            $imagesSmall['id'][$i] = $i;
        }

        $imagesSmall['height'] = $height;
        return $imagesSmall;
    }

    //get the big version of specific picture
    public function getBigVersion($id)
    {
        $idNr = $id - 1;
        $width = 600;
        $images = $this->getImages();
        $img = $images[$id][0];


        $bigImg = "<img src='$img' width='$width' alt='$idNr'>";

        return $bigImg;
    }

    //Make a presentational string
    public function getSmallImages()
    {
        $arr = $this->setNgetSizeSmall();
        $images = $arr['images'];
        $id = $arr['id'];
        $size = sizeOf($images);

        for ($i=0; $i<$size; $i++) {
            $pict = $images[$i];
            $idNr = $id[$i];
            $output .= "<a href='theGallery.php?id=$idNr'> $pict </a>";
        }
        return $output;
    }
}
