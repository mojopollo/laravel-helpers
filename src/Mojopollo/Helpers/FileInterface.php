<?php namespace Mojopollo\Helpers;

interface FileInterface
{

  /**
   * Return an array of files with their full paths contained in a directory and its subdirectories
   *
   * @param  string $path   path to directtory
   * @return array          full paths of directory files
   */
  public function directoryFiles($path);

}
