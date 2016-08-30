<!DOCTYPE html>
<html>
<head>
	<title>
		合成图片
	</title>
	<meta charset="utf-8">
	<style>
		img{ border:solid 1px #ddd;}
	</style>
</head>
<body>
	<div align="center">
	<img src="img1.png" width="300">
	<img src="img2.png" width="300">
	</div>
	<div id="imgBox" align="center">
	    <input type="button" value="一键合成" onClick="hecheng()">
	</div>
	<script type="text/javascript">
		function hecheng(){
	draw(function(){
		document.getElementById('imgBox').innerHTML='<p style="padding:10px 0">合成图片成功！可以鼠标另存图片查看我是否是一张图片~~！</p><img src="'+base64[0]+'">';
	})	
}

var data=['img1.png','img2.png'],base64=[];
function draw(fn){
	var c=document.createElement('canvas'),
		ctx=c.getContext('2d'),
		len=data.length;
	c.width=290;
	c.height=290;
	ctx.rect(0,0,c.width,c.height);
	ctx.fillStyle='#fff';
	ctx.fill();
	function drawing(n){
		if(n<len){
			var img=new Image;
			//img.crossOrigin = 'Anonymous'; //解决跨域
			img.src=data[n];
			img.onload=function(){
				ctx.drawImage(img,0,0,290,290);
				drawing(n+1);//递归
			}
		}else{
			//保存生成作品图片
			base64.push(c.toDataURL("image/jpeg",0.8));
			//alert(JSON.stringify(base64));
			fn();
		}
	}
	drawing(0);
}
	</script>

</body>
</html>