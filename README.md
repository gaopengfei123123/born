# born
how to build a composer package


[参考文档](http://docs.phpcomposer.com/04-schema.html#minimum-stability)

首先是完善 `composer.json` 这个是composer需要抓去的的东西，相当于这个composer包的名片

实现步骤是
1. 创建一个git库 （不用说自己查）

2. 初始化composer包

命令 `composer init` 然后一路回车，生成的 composer.json 的样本如下（重点在这里）

3. https://packagist.org 上注册

顺着网站提示一路下去就行

4. 库中引用  

在你想要使用库的项目中的 composer.json 的 `require` 中添加 `  "gaopengfei/born":"dev-master"`

然后运行 `composer update` ，你的包就出现在该项目中的依赖当中了，注意：require的时候一定要指明版本，不然会报错

```
//composer.json
{
    "name": "gaopengfei/born",
    "description": "how to build a composer package",
    "license": "MIT",
    "authors": [
        {
            "name": "gaofeifiy",
            "email": "5173180@qq.com"
        }
    ],
   "minimum-stability": "dev",
   "require": {
       "php": ">=5.3.0"
   },
   "autoload": {
       "psr-4": {
           "Body\\Arm\\": "src/Body/Arm",
           "Body\\Leg\\": "src/Body/Leg"
       }
   }
}
```
想让文件能自动加载就靠 `autoload` 这块的配置了，这里选用了 `psr-4` 格式的命名规范，这里设置了你的命名空间生效的文件夹在哪里， 当我 `use Body\Arm\**` 的时候，composer 知道是从 `./src/Body/Arm` 这个径下找对应的类名， `psr-4`规范的大体思想就是命名空间就是文件路径，类名就是文件名，这样设置完之后 运行 `composer install` 生成了 `vendor／autoload.php` 文件就能自动加载了
