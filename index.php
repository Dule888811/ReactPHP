<?php
use React\Filesystem\Factory;
use React\Filesystem\Node\FileInterface;
use React\Filesystem\Node\NotExistInterface;
use React\Filesystem\Stat;
use React\Promise\PromiseInterface;

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
})->done();

Factory::create()->detect('C:\xampp\htdocs\allip.example1 (1)\example1\output.txt' )->then(static function (NotExistInterface $node): PromiseInterface {
    return $node->createFile();
})->then(static function (FileInterface $file): PromiseInterface {
    return $file->stat();
})->then(static function (Stat $stat): void {
    echo $stat->path(), ': ', get_class($stat), PHP_EOL;
    echo 'Mode: ', $stat->mode(), PHP_EOL;
    echo 'Uid: ', $stat->uid(), PHP_EOL;
    echo 'Gid: ', $stat->gid(), PHP_EOL;
    echo 'Size: ', $stat->size(), PHP_EOL;
    echo 'Atime: ', $stat->atime()->format(DATE_ISO8601), PHP_EOL;
    echo 'Mtime: ', $stat->mtime()->format(DATE_ISO8601), PHP_EOL;
    echo 'Ctime: ', $stat->ctime()->format(DATE_ISO8601), PHP_EOL;
})->done();  
