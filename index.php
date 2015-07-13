<?php 
    include 'header.php';
    if (!defined('IN_APP')) exit('Access Deny');
?>
<body>
    <style type="text/css">
        html, body{height: 100%;}
        .logo{text-align: center;background-color: #fff;}
        .logo img{width: 70%;}
        .banner{height: 80px;background: transparent url(img/banner.png) repeat-x top left;background-size: auto 50%;}
        .wrapper{height: 100%;background-color: #2AB3DF;}
        .upfile-input{display: none;}
        .upfile-submit{display: none;}
        .upfile-btn{
            height: 120px;
            font-size: 20px;
            line-height: 120px;
            text-align: center;
            width: 120px;
            margin: 0 auto;
            border-radius: 60px;
            color: #fef4e9;
            border: 1px solid #da7c0c;
            background: #f78d1d;
            text-shadow: 0 1px 0 rgba(0,0,0,0.3);
            background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
            background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
            filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
        }
        .upfile-btn:active {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
            background: -moz-linear-gradient(top,  #f88e11,  #f06015);
            filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
        }
        .overlay{
            position: absolute;
            top:0;
            bottom:0;
            width: 100%;
            background-color: rgba(0,0,0,0.4);
            z-index: 100;
            -webkit-box-orient: horizontal;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            display: none;    
        }
        .ui-dialog-cnt {
            width: 130px;
            height: 110px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            text-align: center;
            background: rgba(0,0,0,.65);
            border-radius: 6px;
            color: #fff;
        }
        .ui-loading-bright {
            width: 37px;
            height: 37px;
            display: block;
            background-image: url(img/loading_sprite_white.png);
            -webkit-background-size: auto 37px;
            -webkit-animation: rotate2 1s steps(12) infinite;
        }
        .show{
            display: -webkit-box;
        }
        @-webkit-keyframes rotate2{
            from{background-position:0 0}
            to{background-position:-444px 0}
        }
    </style>
    <script type="text/javascript">
        function upload(){
            var f = document.getElementById('upfile-input');
            f.click();
        }
        function myMethod(evt) {
            var files = evt.target.files; 
            f = files[0];
            if (f.name.match(".*\.jpg")|| f.name.match(".*\.png")){
                document.getElementById('overlay').className += ' show';
                document.getElementById('upfile-submit').click();
            }
        }
    </script>
    <div class="wrapper">
        <div class="logo"><img src="img/logo.png" ></div>
        <div class="banner"></div>
        <form name="form" method="post" action="post.php" enctype ="multipart/form-data">
            <input id="upfile-input" type="file" name="file" value="选择照片" class="upfile-input" />
            <input id="upfile-submit" type="submit" value="上传" class="upfile-submit" />
        </form>
        <div class="upfile-btn" onclick="upload();">点击上传</div>
        <div class="overlay" id="overlay">
            <div class="ui-dialog-cnt"><i class="ui-loading-bright"></i><p>加载中...</p></div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('upfile-input').addEventListener('change', myMethod, false);
    </script>
</body>
</html>



