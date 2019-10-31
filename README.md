# ThinkPHP ORM 分页驱动库

内含以下前端框架的分页驱动

* Bootstrap4
* Layui
* Amaze UI
* Foundation

## 安装
```
composer require big-dream/think-paginator-driver
```

## 使用示例
```
// 设置服务注入
\think\Paginator::maker(function (...$args) {
    // 使用Bootstrap4分页驱动（更多驱动看下面示例）
    return $this->app->make(\bigDream\thinkPaginatorDriver\Bootstrap4::class, $args, true);
});

\think\facade\Db::table('users')->paginate();
```

如果想全局使用，可以将上面的代码放在`公共函数文件`里，即应用目录下的`common.php`文件。
如果想单应用使用，可以将上面的代码放在应用`公共函数文件`里

### Bootstrap4
```
$this->app->make(\bigDream\thinkPaginatorDriver\Bootstrap4::class, $args, true)
```

### Layui
```
$this->app->make(\bigDream\thinkPaginatorDriver\Layui::class, $args, true)
```

### Amaze UI
```
$this->app->make(\bigDream\thinkPaginatorDriver\AmazeUI::class, $args, true)
```

### Foundation
```
$this->app->make(\bigDream\thinkPaginatorDriver\Foundation::class, $args, true)
```

## 其它
你所用的前端框架不在这里？欢迎提交PR，或者在Issues里告诉我。