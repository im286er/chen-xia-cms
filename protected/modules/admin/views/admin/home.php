
							
<td valign="top">
	<div class="title"><h2>首页</h2></div>
	<div class="maincon">
		<table class="tablelist" >
			
			<tr>
				<td>登陆时间：</td><td><a><?php echo date("Y-m-d H:i:s",Yii::app()->session['logintime']); ?></a></td>
				
			</tr>
			<tr>
				<td>登陆IP地址：</td><td><?php echo Yii::app()->request->userHostAddress; ?></td>
			</tr>
			<tr>
				<td>服务器IP：</td><td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
			</tr>
			<tr>
				<td>服务器环境：</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
			</tr>
			<tr>
				<td>PHP版本：</td><td>PHP <?php echo PHP_VERSION; ?></td>
			</tr>
			<tr>
				<td>数据库信息：</td><td><?php echo mysql_get_client_info(); ?></td>
			</tr>
		</table>

	</div>
</td>
