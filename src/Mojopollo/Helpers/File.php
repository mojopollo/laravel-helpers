<?php namespace Mojopollo\Helpers;

class File implements FileInterface
{

  /**
   * Return an array of files with their full paths contained in a directory and its subdirectories
   *
   * @param  string $path   path to directtory
   * @return array          full paths of directory files
   */
  public function directoryFiles($path)
  {
    $contents = [];

    // Scan directory
    $directoryFiles = scandir($path);

    foreach ($directoryFiles as $index => $filePath)  {

      // Ommit . and ..
      if ( ! in_array($filePath, ['.', '..']))  {

        // Check if this is a directory
        if (is_dir($path . DIRECTORY_SEPARATOR . $filePath)) {

          // Rescan and get files in this directory
          $contents = array_merge($contents, self::directoryFiles($path . DIRECTORY_SEPARATOR . $filePath));

        } else  {

          // Add file to contens array
          $contents[] = $path . DIRECTORY_SEPARATOR . $filePath;
        }
      }
    }

    return $contents;
  }

}
