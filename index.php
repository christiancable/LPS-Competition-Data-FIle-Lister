<?php
/* JSON file listing for LPS Competition and Resizer  
    christiancable@gmail.com - 2015
*/

$filePattern = '*.*';
$currentScript = basename(__FILE__);
$currentPath = getcwd();
$relativePathName = basename(getcwd());
$urlRoot = 'http://www.lancasterphotographicsociety.org.uk/tools/competition';
$fileRoot = '/home/virtual/christiancable/lancasterphotographicsociety.org.uk/www/tools/competition';

if ($fileRoot !== $currentPath) {
    $relativePathName = str_replace($fileRoot . '/', '', $currentPath);
} else {
    $relativePathName = '';
}

$files = glob($currentPath . DIRECTORY_SEPARATOR . $filePattern);
$zipFiles = array();


foreach ($files as $fileName) {
    $currentFileName = basename($fileName);
    if ($currentFileName !== $currentScript) {
        if ($relativePathName === '') {
            $currentFileURL = $urlRoot . DIRECTORY_SEPARATOR . $currentFileName;
        } else {
            $currentFileURL = $urlRoot . DIRECTORY_SEPARATOR . $relativePathName . DIRECTORY_SEPARATOR . $currentFileName;
        }

        $zipFiles[] = array(
            'url' => $currentFileURL,
            'timestamp' => filemtime($fileName),
            'length' => filesize($fileName),
        );
    }
}

$competitionFiles = array();
$competitionFiles['title'] = 'LPS Competition Manager Data';
$competitionFiles['version'] = '0.3';
$competitionFiles['files'] = $zipFiles;
$competitionFiles['relativePathName'] = "$relativePathName";

$json = json_encode($competitionFiles, JSON_UNESCAPED_SLASHES);

echo $json;
