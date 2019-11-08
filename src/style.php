<?php
return[
    // Bootstrap2、Bootstrap3
    'bootstrap' => [
        // 上一页按钮文字
        'prev_text'        => '&laquo;',
        // 下一页按钮文字
        'next_text'        => '&raquo;',
        // 分页容器
        'container'        => '<ul class="pagination">%s %s %s</ul>',
        // 简洁模式分页容器
        'simple_container' => '<ul class="pager">%s %s</ul>',
        // 可点击的按钮
        'available_btn'    => '<li><a href="%s">%s</a></li>',
        // 禁用的按钮
        'disabled_btn'     => '<li class="disabled"><span aria-disabled="true">%s</span></li>',
        // 激活的按钮
        'active_btn'       => '<li class="active"><span aria-current="page">%s</span></li>',
    ],
    // Bootstrap4
    'bootstrap4' => [
        'prev_text'        => '&laquo;',
        'next_text'        => '&raquo;',
        'container'        => '<ul class="pagination">%s %s %s</ul>',
        'simple_container' => '<ul class="pagination">%s %s</ul>',
        'available_btn'    => '<li class="page-item"><a class="page-link" href="%s">%s</a></li>',
        'disabled_btn'     => '<li class="page-item disabled"><span class="page-link" aria-disabled="true">%s</span></li>',
        'active_btn'       => '<li class="page-item active" aria-current="page"><span class="page-link">%s</span></li>',
    ],
    // AmazeUI
    'amazeUI' => [
        'prev_text'        => '&laquo;',
        'next_text'        => '&raquo;',
        'container'        => '<ul class="am-pagination">%s %s %s</ul>',
        'simple_container' => '<ul class="am-pagination">%s %s</ul>',
        'available_btn'    => '<li><a href="%s">%s</a></li>',
        'disabled_btn'     => '<li class="am-disabled"><a aria-disabled="true">%s</a></li>',
        'active_btn'       => '<li class="am-active" aria-current="page"><a>%s</a></li>',
    ],
    // Layui
    'layui' => [
        'prev_text'        => '&laquo;',
        'next_text'        => '&raquo;',
        'container'        => '<div class="layui-box layui-laypage layui-laypage-default">%s %s %s</div>',
        'simple_container' => '<div class="layui-box layui-laypage layui-laypage-default">%s %s</div>',
        'available_btn'    => '<a href="%s">%s</a>',
        'disabled_btn'     => '<a class="layui-disabled" aria-disabled="true">%s</a>',
        'active_btn'       => '<span class="layui-laypage-curr" aria-current="page"><em class="layui-laypage-em"></em><em>%s</em></span>',
    ],
    // Foundation
    'foundation' => [
        'prev_text'        => '&laquo;',
        'next_text'        => '&raquo;',
        'container'        => '<ul class="pagination">%s %s %s</ul>',
        'simple_container' => '<ul class="pagination">%s %s</ul>',
        'available_btn'    => '<li><a href="%s">%s</a></li>',
        'disabled_btn'     => '<li class="disabled" aria-disabled="true">%s</li>',
        'active_btn'       => '<li class="current" aria-current="page">%s</li>',
    ],
];