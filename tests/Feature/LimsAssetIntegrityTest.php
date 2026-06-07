<?php

namespace Tests\Feature;

use DOMDocument;
use Tests\TestCase;

class LimsAssetIntegrityTest extends TestCase
{
    public function test_brand_svgs_are_valid_xml(): void
    {
        foreach ([
            public_path('assets/brands/lims-logo.svg'),
            public_path('assets/brands/ifpi-teresina-white.svg'),
        ] as $path) {
            $this->assertFileExists($path);

            $document = new DOMDocument();

            $this->assertTrue($document->load($path), "{$path} should be valid SVG/XML.");
        }
    }

    public function test_lims_logo_transparent_png_has_transparent_corners(): void
    {
        $path = public_path('assets/brands/lims-logo-image-transparent.png');

        $this->assertFileExists($path);

        $image = imagecreatefrompng($path);

        $this->assertNotFalse($image);

        $width = imagesx($image);
        $height = imagesy($image);

        foreach ([[0, 0], [$width - 1, 0], [0, $height - 1], [$width - 1, $height - 1]] as [$x, $y]) {
            $alpha = (imagecolorat($image, $x, $y) >> 24) & 127;

            $this->assertSame(127, $alpha, "Corner {$x},{$y} should be fully transparent.");
        }
    }

    public function test_carousel_images_exist_with_expected_widescreen_dimensions(): void
    {
        foreach (config('site.lims.hero_slides') as $slide) {
            $path = public_path($slide['image']);

            $this->assertFileExists($path);

            [$width, $height] = getimagesize($path);

            $this->assertSame(1600, $width);
            $this->assertSame(900, $height);
        }
    }
}
