<?php
function can_upload($file)
{
    if ($file['name'] == '')
        return 'Файл не выбран';

    if ($file['size'] == 0)
        return 'Файл слишком большой.';

    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');

    if (!in_array($mime, $allowed_types))
        return 'Файл должен быть картинкой.';

    return true;
}

function upload_image($file, $folder)
{
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $name = (string)uniqid().'.' . $mime;
    copy($file['tmp_name'], "./$folder/$name");
    return $name;
}

function delete_image($name, $folder)
{
    $path = "./$folder/$name";
    if (file_exists($path))
        unlink($path);
}