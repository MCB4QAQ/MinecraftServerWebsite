![工作室LOGO](https://caryworld.b4qaq.top/admin/images/logo2.png) 
# MinecraftServerWebwebsite

|开发团队|铭诚网络工作室
|---|---
|开源工作|B4QAQ
|维护工作|B4QAQ
|开源协议|![LICENSE](https://img.shields.io/badge/License-GPLV3-green)
|项目状态|![Build](https://img.shields.io/badge/Bulid-passing-green)
|项目版本|![LICENSE](https://img.shields.io/badge/Release-2.1-green)

![LICENSE](https://img.shields.io/badge/Using-PHP-green)
![LICENSE](https://img.shields.io/badge/Using-HTML-green)
![LICENSE](https://img.shields.io/badge/Composer-2.0.14-green)
![LICENSE](https://img.shields.io/badge/MySql-5.7-green)  
Copyright by 2023 Mingcheng Network Studio  

### 网站预览
[前往Caryworld.b4qaq.top预览最新Beta版](https://caryworld.b4qaq.top)   
[前往Caryworld.top预览最新正式版](https://caryworld.top)   

- 注意！正式版预览暂时无法访问，请等待修复！ 。
   
### 项目介绍
一个基于Compose+PHP的开源我的世界服务器官网，目前项目版本为2.1版本  
共3个分支：main（主线分支，发布正式版），beta（测试版本分区，功能可能不稳定），allphp（纯PHP版，用于虚拟主机的同学）  
如果有问题请到Issues来向我反馈！  
### 项目引用
开发过程中难免会引用一两个项目的代码，所以以下是此项目引用的开源代码：
#### 后台页面
引用项目：LightYear光年后台管理系统  
引用部分：仅使用UI设计，功能部分全部重写(原作者html写的也用不了啊，只能重写)  
#### 在线列表
引用项目：Minecraft-Server-Status  
引用部分：修改原代码（后期会考虑换掉，不稳定）  
### 项目功能
此项目功能繁多，所以分开介绍  
#### 1.主页设计
特点：简洁快速
相较于其他服务器网站，确实简陋了些，但是我自己开发页面的极限也就这样了（后续版本改）  
具有汉堡菜单，开设计时，服务器介绍，维护组展示等功能  
#### 2.Maps功能
特点：直观创新  
我们看过了很多服务器官网的模板，几乎没有人会把dynmap插件的功能集成在服务器官网，但集成了maps功能就能让玩家直接在web端了解服务器玩家数，服务器地图的样子，甚至直接和服务器内的小伙伴聊天，其实集成maps功能不仅简单快速，而且还可以方便玩家获取服务器信息，一举两得  
使用方法也很简单，只要下载后安装，再设置一个路径为/maps的反代就可以了，如果不会的话可以去baidu搜一下，如果你这都不会的话，维护起来服务器会很困难  
[跳转Dynmap下载页面](https://www.spigotmc.org/resources/dynmap%C2%AE.274/)
#### 3.高度自定义
特点：自由快速  
您可以随意更改网站中的内容，网站代码清晰明了，小白也会更改！  
#### 4.在线列表
这个东西完全就是早期maps功能没有出现的时候的替代品，如果有maps功能的话可以选择将这个功能换掉，但这个对虚拟主机很友好  
如想移除，请删除/Status目录  
#### 5.中英切换
特点：中英兼容  
可以自行切换英文和中文看服务器官网，虽说可能服务器没啥歪果有人，但是有这个功能肯定能吹一番牛逼  
中英双语，双倍大小bushi（以后尝试优化，虽说好像优化不了）  
#### 6.下载页面
特点：快捷方便  
可以自己下载游玩服务器所需的所有文件，不用再浪费时间询问下载链接了，大大提升用户体验。  
#### 7.后台管理
特点：直观方便  
我们可能是第一个搭载真正后台管理系统的服务器宣传页，在这个后台中，你可以查看访问日志，查看安全日志，一键新增下载资源等等功能，不用进面板，服务器就可以修改网站的所有！  
#### 8.一键管理
特点：方便快捷  
自动读取/添加，真正的方便易管理！  
#### 9.智能登录
特点：真正安全  
其他的登录后台都是非常简易，但是我们不一样，我们细细打磨了这个看似不起眼的页面，做到了真正智能的登录  
#### 10.智能统计
特点：方便直观  
进入后台直接就可以看见统计的访问量和资源数，简单直观  
#### 11.日志记录
特点：攻击能找  
进入后台/日志页面/网站安全日志即可直观的查看访问网站人的IP，时间，路径  
#### 12.安全系统
真正做到安全，防注入，防跳登，非管理员进入不了后台真正的做到了  
### 项目计划
1.优化网站大小
2.完善管理页面
3.重置主页
4.美化主页