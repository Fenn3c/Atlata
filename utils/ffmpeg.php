<?php
require '../vendor/autoload.php';

$ffmpeg = FFMpeg\FFMpeg::create(array(
'ffmpeg.binaries' => '../../ffmpeg/bin/ffmpeg.exe',
'ffprobe.binaries' => '../../ffmpeg/bin/ffprobe.exe',
'timeout' => 3600, // The timeout for the underlying process
'ffmpeg.threads' => 12, // The number of threads that FFMpeg should use
));

$ffprobe = FFMpeg\FFProbe::create(
array(
    'ffprobe.binaries' => '../../ffmpeg/bin/ffprobe.exe'
    )
);