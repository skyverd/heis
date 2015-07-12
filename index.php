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
            height: 140px;
            font-size: 20px;
            line-height: 140px;
            text-align: center;
            width: 140px;
            margin: 0 auto;
            border-radius: 70px;
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
    </style>
    <script type="text/javascript">
        function upload(){
            var f = document.getElementById('upfile-input');
            f.click();
        }
        function myMethod(evt) {
            var files = evt.target.files; 
            f = files[0];
            if (f.name.match(".*\.jpg")|| f.name.match(".*\.png"))
                document.getElementById('upfile-submit').click();
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
    </div>
    <script type="text/javascript">
        document.getElementById('upfile-input').addEventListener('change', myMethod, false);
    </script>
</body>
</html>



