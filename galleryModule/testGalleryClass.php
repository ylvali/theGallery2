<?php
namespace Ylva\Gallery;

require("galleryClass.php");

use PHPUnit\Framework\TestCase;

class CGalleryTest extends TestCase
{
    //test function
    public function testHello()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');
        $returnValue = $gallery->hello();
        $this-> assertEquals("hello", $returnValue);
    }

    //test so array is not empty
    public function testForEmptyArray()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');
        $imageArr = $gallery->getImages();
        $this->assertNotEmpty($gallery);
    }

    //test so that all the img files are valid
    public function testImageFiles()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');

        $imageArr = $gallery->getImages();
        $size = sizeOf($imageArr);
        for ($i=0; $i<$size; $i++) {
            $this->assertFileIsReadable($imageArr[$i][0]);
        }
    }

    //test so that the sizes are set to expectation
    public function testImageSize()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');

        $expHeight = 300;
        $smallImages = $gallery->setNgetSizeSmall();
        $height = $smallImages['height'];
        $this->assertEquals($expHeight, $height);

    }

    //assert that big image contains correct width
    //assert its readability
    public function testBigImg()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');

        $imageArr = $gallery->getImages();
        $size = sizeOf($imageArr);
        $expWidth = "600";

        for ($i=0; $i<$size; $i++) {
            $bigImg = $gallery->getBigVersion(1);
            $this->assertContains($expWidth, $bigImg);
        }

        $this->assertnotEmpty($bigImg);

    }

    //assert that the string exists
    public function checkOutputExists()
    {
        $gallery = new \Ylva\Gallery\CGallery('test');

        $output = $gallery->getSmallImages();
        $this->assertNotEmpty($output);
    }
}
