# chen-xia-cms
a yii framework cms
# describtion
http://www.oschina.net/p/a-simple-cms
# a demo
http://zhuwanxiong.hjwhp.ghco.info
# 安装与配置(本地)
1.先下载项目解压至apache根目录
2.cd 根目录/protected/config/main.php查找"数据库配置"并修改你的数据库配置信息；查找"七牛配置"修改你的七牛配置信息(ps:无七牛账户去www.qiniu.com注册)
3.cd 根目录/assets/admin/qiniu，修改qiniu.ini配置信息
4.使用phpAdmin工具导入数据"根目录/we.sql"
5.浏览器输入localhost/index.php访问首页并注册用户，然后访问localhost/admin/login/index方可对前台进行设置
