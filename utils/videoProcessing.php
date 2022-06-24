<?php
require('ffmpeg.php');

function getVideoDuration($videoFile)
{
    global $ffprobe;
    $duration = (float)$ffprobe
        ->format($videoFile) // extracts file informations
        ->get('duration');             // returns the duration property
    if($duration >= 3600){
        return gmdate('H:i:s',$duration);
    } else{
        return gmdate('i:s',$duration);
    }
}

function getThumbnail($videoFile){ 
    global $ffmpeg;
    $video = $ffmpeg->open($videoFile);
    $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1));
    $name = (string)uniqid().'.jpg';
    $path = '../data/thumbnails/'.$name;
    $frame->save($path);
    return $name;
}

function can_upload_video($file)
{
    if ($file['name'] == '')
        return 'Файл не выбран';

    if ($file['size'] == 0)
        return 'Файл слишком большой.';

    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $allowed_types = array('mp4', 'mkv', 'mov', 'avi', 'wmv');

    if (!in_array($mime, $allowed_types))
        return 'Файл должен быть видео.';

    return true;
}

function upload_video($file, $folder)
{
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $name = (string)uniqid() . '.' . $mime;
    copy($file['tmp_name'], "./$folder/$name");
    return $name;
}

function delete_video($name, $folder)
{
    $path = "./$folder/$name";
    if (file_exists($path))
        unlink($path);
}
