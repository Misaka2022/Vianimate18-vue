<?php
header("Access-Control-Allow-Origin: *"); // 允许所有域名
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // 允许的方法
header("Access-Control-Allow-Headers: X-Requested-With");
$folderPath = '../src/article/sources/';
$files=scandir($folderPath);
$fileCount=0;
// 移除当前目录和上级目录的引用
$files = array_diff($files, array('.', '..'));
// 统计文件数量，不包括目录
foreach($files as $file){
    if (is_file($folderPath . '/' . $file)) {
        $fileCount++;
    }
}
echo $fileCount;