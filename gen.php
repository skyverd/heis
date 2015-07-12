<?php
    require_once 'lang.php';
    $cate = rand(0, count($lang) - 1);
    include 'header.php';
    if (!defined('IN_APP')) exit('Access Deny');

    $name = htmlspecialchars($_GET['name']);

    $filePath = $config['path']. "/" . $name . $config['fileType'];
    if (!file_exists($filePath)) {
        exit('文件不存在');
    }

    $modFilePath = $config['path']. "/" . $name . "_mod" . $config['fileType'];
    if (file_exists($modFilePath)) {
        @unlink($modFilePath);
    }

?>
    <body>
        <style type="text/css">
            html, body{height: 100%;}
            .warpper{background-color: #2AB3DF;height: 100%;}
            .box{width: 100%;display: box;display:-webkit-box;line-height: 0;background-color: #fff;}
            .item{box-flex:1;-webkit-box-flex:1;padding: .5em;overflow: hidden;}
            .item textarea{width: 100%;height:110px;resize:none;border: 1px solid #cdcdcd;background-color: #fff;-webkit-appearance: none;border-radius: 0;}
            .item .img{width: 100%;max-width:100%;height: 110px;}
            .btn{
                display: inline-block;
                border-radius: 5px;
                width: 120px;
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
            .btnBar{text-align: center;}
            .banner{height: 80px;background: transparent url(img/banner.png) repeat-x top left;background-size: auto 50%;}
            .hide{display: none;}
        </style>
        <div class="warpper">
            <form name="form" method="post" action="do.php?name=<?php echo $name;?>">
                <?php for($i = 0;$i <=8;$i++){ ?>
                    <?php if ($i % 3 == 0){ ?>
                        <div class="box">
                    <?php } ?>
                            <div class="item">
                                <?php if ($i == 4){ ?>
                                    <img class="img" src="<?php echo $filePath; ?>" />
                                    <textarea class="desc hide" name="desc[]"></textarea>
                                <?php }else{ ?>
                                    <textarea class="desc" name="desc[]"><?php echo $lang[$cate][$i]; ?></textarea>
                                <?php } ?>
                            </div>
                    <?php if ($i % 3 == 2){ ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="banner"></div>
                <div class="btnBar">
                    <input type="button" class="btn" onclick="window.location.reload();" value="换一组文字" />
                    <input type="submit" class="btn" value="点我生成" />
                </div>
            </form> 
        </div>
    </body>
</html>



