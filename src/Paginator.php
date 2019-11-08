<?php
namespace bigDream\thinkPaginatorDriver;

/**
 * ThinkPHP ORM 分页驱动
 * @author jwj <jwjbjg@gmail.com>
 * @package bigDream\thinkPaginatorDriver
 */
class Paginator extends \think\Paginator
{
    /**
     * 分页样式配置
     * @var array
     */
    protected $style;

    public function __construct($items, int $listRows, int $currentPage = 1, int $total = null, bool $simple = false, array $options = [])
    {
        parent::__construct($items, $listRows, $currentPage, $total, $simple, $options);

        if (isset($options['style'])) {
            $this->style($options['style']);
        }
    }

    /**
     * 渲染分页html
     * @return string
     */
    public function render(): string
    {
        if (null === $this->style) $this->style();

        if ($this->hasPages()) {
            if ($this->simple) {
                return sprintf($this->style['simple_container'], $this->getPreviousButton(), $this->getNextButton());
            } else {
                return sprintf($this->style['container'], $this->getPreviousButton(), $this->getLinks(), $this->getNextButton());
            }
        }
    }

    /**
     * 设置分页样式
     * @param string|array $config 配置名或配置参数
     * @return $this
     */
    public function style($config = 'bootstrap')
    {
        $style = require 'style.php';

        if (is_array($config)) {
            $defaultConfig = $style['bootstrap'];
            $this->style = array_merge($defaultConfig, $config);
        } else {
            $this->style = $style[$config];
        }

        return $this;
    }

    /**
     * 上一页按钮
     * @param string $text 按钮文字
     * @return string
     */
    protected function getPreviousButton(string $text = null): string
    {
        $text = $text ?? $this->style['prev_text'];

        if ($this->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->url($this->currentPage() - 1);

        return $this->getPageLinkWrapper($url, $text);
    }

    /**
     * 下一页按钮
     * @param string $text 按钮文字
     * @return string
     */
    protected function getNextButton(string $text = null): string
    {
        $text = $text ?? $this->style['next_text'];

        if (!$this->hasMore) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->url($this->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text);
    }

    /**
     * 页码按钮
     * @return string
     */
    protected function getLinks(): string
    {
        if ($this->simple) {
            return '';
        }

        $block = [
            'first'  => null,
            'slider' => null,
            'last'   => null,
        ];

        $side   = 3;
        $window = $side * 2;

        if ($this->lastPage < $window + 6) {
            $block['first'] = $this->getUrlRange(1, $this->lastPage);
        } elseif ($this->currentPage <= $window) {
            $block['first'] = $this->getUrlRange(1, $window + 2);
            $block['last']  = $this->getUrlRange($this->lastPage - 1, $this->lastPage);
        } elseif ($this->currentPage > ($this->lastPage - $window)) {
            $block['first'] = $this->getUrlRange(1, 2);
            $block['last']  = $this->getUrlRange($this->lastPage - ($window + 2), $this->lastPage);
        } else {
            $block['first']  = $this->getUrlRange(1, 2);
            $block['slider'] = $this->getUrlRange($this->currentPage - $side, $this->currentPage + $side);
            $block['last']   = $this->getUrlRange($this->lastPage - 1, $this->lastPage);
        }

        $html = '';

        if (is_array($block['first'])) {
            $html .= $this->getUrlLinks($block['first']);
        }

        if (is_array($block['slider'])) {
            $html .= $this->getDots();
            $html .= $this->getUrlLinks($block['slider']);
        }

        if (is_array($block['last'])) {
            $html .= $this->getDots();
            $html .= $this->getUrlLinks($block['last']);
        }

        return $html;
    }

    /**
     * 生成一个可点击的按钮
     * @param  string $url 按钮链接地址
     * @param  string $text 按钮文字
     * @return string
     */
    protected function getAvailablePageWrapper(string $url, string $text): string
    {
        return sprintf($this->style['available_btn'], htmlentities($url), $text);
    }

    /**
     * 生成一个禁用的按钮
     * @param  string $text 按钮文字
     * @return string
     */
    protected function getDisabledTextWrapper(string $text): string
    {
        return sprintf($this->style['disabled_btn'], $text);
    }

    /**
     * 生成一个激活的按钮
     * @param  string $text 按钮文字
     * @return string
     */
    protected function getActivePageWrapper(string $text): string
    {
        return sprintf($this->style['active_btn'], $text);
    }

    /**
     * 生成省略号按钮
     * @return string
     */
    protected function getDots(): string
    {
        return $this->getDisabledTextWrapper('...');
    }

    /**
     * 批量生成页码按钮
     * @param  array $urls 按钮链接地址
     * @return string
     */
    protected function getUrlLinks(array $urls): string
    {
        $html = '';

        foreach ($urls as $text => $url) {
            $html .= $this->getPageLinkWrapper($url, $text);
        }

        return $html;
    }

    /**
     * 生成普通页码按钮
     * @param  string $url 按钮链接地址
     * @param  string $text 按钮文字
     * @return string
     */
    protected function getPageLinkWrapper(string $url, string $text): string
    {
        if ($this->currentPage() == $text) {
            return $this->getActivePageWrapper($text);
        }

        return $this->getAvailablePageWrapper($url, $text);
    }
}