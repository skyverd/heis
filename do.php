<?php
    include 'header.php';
    if (!defined('IN_APP')) exit('Access Deny');
    require_once dirname(__FILE__) . '/Driver/ThinkImage.class.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $isGet = strtolower($method) == "get" ? true : false;
    
    $descArr = $_POST['desc'];
    $name = $_GET['name'];

    $filePath = $config['path']. "/" . $name . $config['fileType'];
    $modFilePath = $config['path']. "/" . $name . "_mod" . $config['fileType'];

    if (!file_exists($filePath))
        exit('文件不存在');

    if (!file_exists($modFilePath))
    {
        $img = new ThinkImage(THINKIMAGE_GD, $config['source'] . '/bg.jpg');
        $carry = 0;
        foreach ($descArr as $key => $value){
            if ($key == 4) continue;
            
            if($key ==  0) {
                $img->water($config['path'] ."/". $name . $config['fileType'], THINKIMAGE_WATER_CENTER);
            }

            $x = 20 +  ($key % 3) * 220;
            if($key % 3 == 0)
                $carry++;

            $y = 180 + 220 * ($carry - 1);

            $fontSize = strlen($value) * 3 > 24 ? 12 : 14;

            $value = htmlspecialchars($value);

            $img->text($value, $config['source'] . "/yahei.ttf", $fontSize, "#000", array($x, $y))->save($modFilePath);
        }
    }

    // 调用百度服务
    if ($isGet)
    {
        $longUrl = $config['host'].$name;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://163.gs/short/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = array('url' => $longUrl);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $strRes = curl_exec($ch);
        curl_close($ch);
        $tinyurl = $strRes;
    }
?>
<body>
<style type="text/css">
html,body{height: 100%;}
.wrapper{height: 100%;text-align: center;background-color: #2AB3DF;}
.content{background-color: #fff;padding: .5em;}
.img{width: 90%;padding:10px;background-color:#efefef;}
.btn{
    display: inline-block;
    border-radius: 5px;
    padding: 10px 20px;
    color: #fef4e9;
    border: 1px solid #da7c0c;
    background: #f78d1d;
    text-shadow: 0 1px 0 rgba(0,0,0,0.3);
    background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
    background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
    margin-top: 10px;
}
.bar{padding-top: .5em;text-align: center;}
.tips{color: #1A6F00;font-size: .9em;background-color: #fff;width: 80%;height:40px;line-height:40px;margin:0 auto;border-radius: 20px;box-shadow: inset 0 2px 2px rgba(0,0,0,0.2);}
.banner{height: 50px;background: transparent url(img/banner.png) repeat-x top left;background-size: auto 100%;}
</style>
<div class="wrapper">
    <div class="content">
        <img class="img" src="<?php echo $modFilePath?>" />
    </div>
    <div class="banner"></div>
    <div class="bar">
        <?php if($isGet) {?>
            <p class="tips">永久地址：<?php echo $tinyurl; ?></p>
            <button class="btn" onclick="window.location.href='./'">我也要制作</button>
        <?php }else{ ?>
            <p class="tips">恭喜你，生成成功！长按图片存储到手机！</p>
            <button class="btn" onclick="window.location.href='./'">重新制作</button>
            <button class="btn" onclick="history.back();">返回修改</button>
        <?php } ?>
    </div>
</div>
</body>
</html>
    



