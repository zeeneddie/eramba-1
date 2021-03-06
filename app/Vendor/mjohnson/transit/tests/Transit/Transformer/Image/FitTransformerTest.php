<?php
/**
 * @copyright	Copyright 2006-2013, Miles Johnson - http://milesj.me
 * @license		http://opensource.org/licenses/mit-license.php - Licensed under the MIT License
 * @link		http://milesj.me/code/php/transit
 */

namespace Transit\Transformer\Image;

use Transit\File;
use Transit\Test\TestCase;
use \Exception;

class FitTransformerTest extends TestCase {

	/**
	 * Test that an exception is thrown if no settings are defined.
	 */
	public function testTransformException() {
		$object = new FitTransformer();

		try {
			$object->transform(new File($this->baseFile));
			$this->assertTrue(false);

		} catch (Exception $e) {
			$this->assertTrue(true);
		}
	}

	/**
	 * Test that images are resized when no fill is defined.
	 */
	public function testTransform() {
		$object = new FitTransformer(array('width' => 100, 'height' => 100));
		$file = $object->transform(new File($this->baseFile));

		$this->assertEquals(64, $file->width());
		$this->assertEquals(100, $file->height());

		$object = new FitTransformer(array('width' => 900, 'height' => 1000));
		$file = $object->transform(new File($this->baseFile));

		$this->assertEquals(646, $file->width());
		$this->assertEquals(1000, $file->height());
	}

	/**
	 * Test horizontal color fill.
	 */
	public function testHorizontalFill() {
		// red
		$object = new FitTransformer(array('width' => 250, 'height' => 250, 'fill' => array(255, 0, 0)));
		$file = $object->transform(new File($this->baseFile));

		$this->assertEquals(250, $file->width());
		$this->assertEquals(250, $file->height());

		// green
		$object = new FitTransformer(array('width' => 200, 'height' => 200, 'fill' => array(0, 255, 0), 'horizontal' => 'left'));
		$file = $object->transform(new File($this->baseFile));

		$this->assertEquals(200, $file->width());
		$this->assertEquals(200, $file->height());

		// blue
		$object = new FitTransformer(array('width' => 150, 'height' => 150, 'fill' => array(0, 0, 255), 'horizontal' => 'right'));
		$file = $object->transform(new File($this->baseFile));

		$this->assertEquals(150, $file->width());
		$this->assertEquals(150, $file->height());
	}

	/**
	 * Test vertical color fill.
	 */
	public function testVerticalFill() {
		$filePath = TEMP_DIR . '/horizontal.jpg';

		// red
		$object = new FitTransformer(array('width' => 250, 'height' => 250, 'fill' => array(255, 0, 0)));
		$file = $object->transform(new File($filePath));

		$this->assertEquals(250, $file->width());
		$this->assertEquals(250, $file->height());

		// green
		$object = new FitTransformer(array('width' => 200, 'height' => 200, 'fill' => array(0, 255, 0), 'vertical' => 'top'));
		$file = $object->transform(new File($filePath));

		$this->assertEquals(200, $file->width());
		$this->assertEquals(200, $file->height());

		// blue
		$object = new FitTransformer(array('width' => 150, 'height' => 150, 'fill' => array(0, 0, 255), 'vertical' => 'bottom'));
		$file = $object->transform(new File($filePath));

		$this->assertEquals(150, $file->width());
		$this->assertEquals(150, $file->height());
	}

}
