<?php

namespace App\Http\Controllers;

use Parsedown;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    //
    public function index(){
      $downloads = glob(public_path('download_resources').DIRECTORY_SEPARATOR.'*', GLOB_ONLYDIR);
      $downloads = array_map(function($f){
        $name = explode(DIRECTORY_SEPARATOR, $f);
        $name = array_pop($name);
        $sub = scandir($f);
        $readme = array_filter($sub, function($file) use ($name){
          return $file == 'readme.md';
        });
        $readme = empty($readme) ? null : $f.DIRECTORY_SEPARATOR.array_pop($readme);
        $sub = array_map(function($file) use ($name, $f){
          if(is_file($f.DIRECTORY_SEPARATOR.$file) && $file != 'readme.md'){
            return $name.DIRECTORY_SEPARATOR.$file;
          };
        }, $sub);
        $sub = array_filter($sub, function($e){
          return !is_null($e);
        });
        if(!is_null($readme)){
          $parsedown = new Parsedown();
          $readme = $parsedown->text(file_get_contents($readme));
        }
        $name = str_replace('_', ' ', $name);
        return [
          'name' => $name,
          'subfiles' => $sub,
          'readme' => $readme
        ];
      }, $downloads);
      //dd($downloads);
      $getFilename = function ($path){
        $path = explode(DIRECTORY_SEPARATOR, $path);
        $filename = array_pop($path);
        return $filename;
      };

      return view('downloads.index', compact('downloads', 'getFilename'));
    }
}
