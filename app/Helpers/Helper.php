<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('isBase64Encoded')) {
    function isBase64Encoded($string) {
        try {
            $decoded = base64_decode($string, true);
            if ( base64_encode($decoded) === $string ) {
                return true;
            }
            else {
                return false;
            }
        }
        catch(Exception $e) {
            return false;
        }
    }
}

if (!function_exists('saveImageWithFormatBase64')) {
    function saveImageWithFormatBase64($image) : string {

        if (empty($image) || !isBase64Encoded($image)){
            return '';
        }
        try {
            $imageContent = base64_decode($image);
            $mimeType = getImageMimeType($imageContent);
            if(!$mimeType){
                $mimeType = 'jpeg';
            }
            $path = '/images/' .'image' .'-' .Str::uuid()->toString() .'-' .Carbon::now()->toDateString() .'.'.$mimeType;
            $putFile = Storage::put($path, $imageContent);
            if (!$putFile) {
                return '';
            }
            return $path;
        } catch (\Throwable $th) {
            return '';
        }
    }
}

function getBytesFromHexString($hexdata) {

  for($count = 0; $count < strlen($hexdata); $count+=2)
    $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));
  return implode($bytes);

}

function getImageMimeType($imagedata) {

  $imagemimetypes = array(
    "jpeg" => "FFD8",
    "png" => "89504E470D0A1A0A",
    "gif" => "474946",
    "bmp" => "424D",
    "tiff" => "4949",
    "tiff" => "4D4D"
  );
  foreach ($imagemimetypes as $mime => $hexbytes) {
    $bytes = getBytesFromHexString($hexbytes);
    if (substr($imagedata, 0, strlen($bytes)) == $bytes)
      return $mime;
  }
  return NULL;

}



