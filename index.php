<?php
use React\Filesystem\Factory;
use React\Filesystem\Node\FileInterface;
use React\Filesystem\Stat;
require 'vendor/autoload.php';

Factory::create()->detect('C:\xampp\htdocs\allip.example1 (1)\example1\db.txt')->then(function (FileInterface $file) {
    return $file->getContents();
})->then(static function (string $contents): void {
  $numbers = preg_replace('/[^0-9]/', ' ', $contents);
  $numbersArray = explode(" ",$numbers);
    $numbersArray = \array_diff($numbersArray, [""]);
    global $numArr;
    foreach($numbersArray as $num)
    {
        $numArr[] = $num;
    }
    global $countriesArray;
    $countriesArray = preg_split("/\d+/", $contents);
    array_shift($countriesArray);

})->done();

Factory::create()->detect('C:\xampp\htdocs\allip.example1 (1)\example1\input.txt')->then(function (FileInterface $file) {
    return $file->getContents();
})->then(static function (string $contents): void {
    global $numbersArray;
    $numbersArray = preg_split('/\r\n|\r|\n/',$contents);
    echo "<pre>";
    var_dump($numbersArray);
  //  echo $contents;
})->done();
