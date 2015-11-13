# ASimpleCMS
Sample site goto http://www.return1.cn/
# Produce
Yii框架开发的一套简单cms，发布系统搭载百度开源Ueditor，用户首页DIY带单、背景以及嵌入了流畅ckplayer播发器，内容项的展出采用了完美的瀑布流响应式设计，内容页设计了简约的吐槽功能，文件、音乐、视频托管到七牛云存储。

# 安装与配置(本地)
1.先下载项目解压至apache根目录
2.cd 根目录/protected/config/main.php查找"数据库配置"并修改你的数据库配置信息；查找"七牛配置"修改你的七牛配置信息(ps:无七牛账户去www.qiniu.com注册)
3.cd 根目录/assets/admin/qiniu，修改qiniu.ini配置信息
4.使用phpAdmin工具导入数据"根目录/we.sql"
5.浏览器输入localhost/index.php访问首页并注册用户，然后访问localhost/admin/login/index就可以对前台进行设置了~ :) good luck

if U get problem in installation , @ i 微信：382286731 or mail to: zhuwanxiong@sina.com
