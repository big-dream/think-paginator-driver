# ThinkPHP ORM 分页驱动库

内含以下前端框架的分页驱动

* Bootstrap4
* Layui

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

### Bootstrap4
```
$this->app->make(\bigDream\thinkPaginatorDriver\Bootstrap4::class, $args, true)
```

### Layui
```
$this->app->make(\bigDream\thinkPaginatorDriver\Layui::class, $args, true)
```