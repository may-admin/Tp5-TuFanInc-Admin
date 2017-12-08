# Tp5-TuFanInc-Admin
作者：苏晓信<br />
QQ交流群：184278846<br />
使用TP5框架最新版本，Tp5+Bootstrap+Pjax的Auth权限管理Admin，能对所有的操作方法节点进行管理<br />

该系统是以开放源代码的方式发行，您使用该系统无需任何费用，因此在使用该系统前，您须知晓：<br />
1.1 作者没有对该系统提供任何技术支持的义务，您可联系作者购买商业的技术支持。<br />
1.2 作者对因使用该系统而产生直接或间接的任何问题不负任何责任。<br />
1.3 开源不等于免费，开源不等于无版权，开源系统的发展需要您我共同的努力。<br />
1.4 对于其他任何渠道下载传播该系统的站点等等方式【禁止其他下载地址】，作者不另行通知版权问题，作者保留通过法律手段追究责任的权利。<br />

在线体验地址：http://www.sxxblog.com 账号：admin 密码：123456<br />

如果你觉得还不错，请顶部右上角给我一个`Star`和`Watch`

附：<br />
码云下载地址【 http://git.oschina.net/suxiaoxin/Tp5-TuFanInc-Admin 】<br />
GitHub下载地址【 https://github.com/suxiaoxin4242/Tp5-TuFanInc-Admin 】<br />

使用说明：<br />
  1、 /public/databakss/20170817161806.sql 【数据库文件】<br />
  2、 /application/database.php 【数据库配置文件】<br />
  3、 站点配置根目录为【`/public`】<br />
  4、 站点开启伪静态【`去除url中的index.php`】<br />
  5、 导入数据库，配置好数据库配置文件即可正常使用<br />
  6、 默认账号：admin 密码：123456<br />


# Hello API
  1、 /application/api 目录为API模块<br />
  2、 系统的【API接口管理】来管理相应的API接口<br />
  3、 自动生成API接口token验证以及管理是否需要验证`接口token`、`用户token`和接口的使用状态<br />
  4、 自动生成相应接口的文档以及相应参数，以及及时测试接口的返回结果<br />