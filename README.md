# ThinkPHP ORM 分页驱动库

内含以下前端框架的分页驱动

* [Bootstrap4](#bootstrap4)
* [Layui](#layui)
* [Amaze UI](#amaze-ui)
* [Foundation](#foundation)

## 安装
```
composer require big-dream/think-paginator-driver
```

## 使用示例
```
// 设置服务注入
$this->app->bind('think\Paginator', \bigDream\thinkPaginatorDriver\Bootstrap4::class);

// 获取users表数据并进行分页
$list = \think\facade\Db::table('users')->paginate();
```

如果想全局使用，可以将上面的代码放在`公共函数文件`里，即应用目录下的`common.php`文件。
如果想单应用使用，可以将上面的代码放在应用`公共函数文件`里

### Bootstrap4
框架官方文档：https://getbootstrap.com/docs/4.0/components/pagination/
```
$this->app->bind('think\Paginator', \bigDream\thinkPaginatorDriver\Bootstrap4::class);
```

### Layui
框架官方文档：https://www.layui.com/doc/modules/laypage.html
```
$this->app->bind('think\Paginator', \bigDream\thinkPaginatorDriver\Layui::class);
```

### Amaze UI
框架官方文档：https://amazeui.clouddeep.cn/css/pagination/
```
$this->app->bind('think\Paginator', \bigDream\thinkPaginatorDriver\AmazeUI::class);
```

### Foundation
框架官方文档：https://foundation.zurb.com/sites/docs/pagination.html
```
$this->app->bind('think\Paginator', \bigDream\thinkPaginatorDriver\Foundation::class);
```

## 其它
你所用的前端框架不在这里？欢迎提交PR，或者在Issues里告诉我。
