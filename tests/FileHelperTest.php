<?php
use Mojopollo\Helpers\FileHelper;

class FileHelperTest extends \PHPUnit_Framework_TestCase
{
  /**
   * FileHelper class object
   *
   * @var FileHelper
   */
  protected $fileHelper;

  /**
   * This will run at the beginning of every test method
   */
  public function setUp()
  {
    // Parent setup
    parent::SetUp();

    // Set file class
    $this->fileHelper = new FileHelper;
  }

  /**
   * This will run at the end of every test method
   */
  public function tearDown()
  {
    // Parent teardown
    parent::tearDown();

    // Unset GoogleApisHelper class
    $this->fileHelper = null;
  }

  /**
   * Test that recursiveness scanning works
   *
   * @return void
   */
  public function testDirectoryFiles()
  {
    // Get file listing
    $result = $this->fileHelper->directoryFiles(__DIR__ . '/file');

    // There must be 3 files
    $this->assertEquals(count($result), 3);

    // All files must end with the txt file extension
    foreach ($result as $file) {
      $this->assertEquals(substr($file, -4), '.txt');
    }
  }

}
