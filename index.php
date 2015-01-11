<?php

$filePath = '../files/';
$filePattern = '*.*';
$urlPath = 'http://www.lancasterphotographicsociety.org.uk';

$files = glob($filePath . DIRECTORY_SEPARATOR . $filePattern);

$zipFiles = array();


foreach ($files as $fileName) {
    $zipFiles[] = array(
        'url' => $urlPath . DIRECTORY_SEPARATOR . $fileName,
        'timestamp' => filemtime($fileName),
    );
    
}

$competitionFiles = array();
$competitionFiles['title'] = 'LPS Competition Manager Data';
$competitionFiles['version'] = '0.1';
$competitionFiles['files'] = $zipFiles;

$json = json_encode($competitionFiles);
echo $json;
