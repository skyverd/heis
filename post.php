<?php

    require_once 'config.php';

    if (!defined('IN_APP')) exit('Access Deny');

    $allowTypeList = array('image/gif', 'image/jpeg', 'image/png');

    $uploadType = $_FILES['file']['type'];

    if (!in_array($uploadType, $allowTypeList))
        exit('非法格式文件');

    $pathInfo = pathinfo($_FILES['file']['name']);

    $ts = md5(time());
    $newfileName = $ts . $config['fileType'];
    move_uploaded_file($_FILES['file']['tmp_name'], $config['path'] . "/".$newfileName);

    require_once dirname(__FILE__) .'/Driver/ThinkImage.class.php';
    $img = new ThinkImage(THINKIMAGE_GD, $config['path'] .'/'.$newfileName);
    $img->thumb(200, 200, THINKIMAGE_THUMB_CENTER)->save($config['path'] . '/' .$newfileName); 

    header('Location:gen.php?name='.$ts);



