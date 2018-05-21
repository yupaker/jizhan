<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
/**
 * 模块菜单
 * 字段说明
 * url 【链接地址】格式：example/控制器/方法，可填写完整外链[必须以http开头]
 * param 【扩展参数】格式：a=123&b=234555
 */
return [
  [
    'title' => '示例模块',
    'icon' => 'aicon ai-shezhi',
    'module' => 'example',
    'url' => 'example',
    'param' => '',
    'target' => '_self',
    'sort' => 100,
    'childs' => [
      [
        'title' => '新闻管理',
        'icon' => 'aicon ai-shezhi',
        'module' => 'example',
        'url' => 'example/index',
        'param' => '',
        'target' => '_self',
        'sort' => 0,
        'childs' => [
          [
            'title' => '新闻分类',
            'icon' => 'aicon ai-shezhi',
            'module' => 'example',
            'url' => 'example/category/index',
            'param' => '',
            'target' => '_self',
            'sort' => 0,
            'childs' => [
              [
                'title' => '添加分类',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/category/add',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '修改分类',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/category/edit',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '删除分类',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/category/del',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '状态设置',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/category/status',
                'param' => 'table=example_category',
                'target' => '_self',
                'sort' => 0,
              ],
            ],
          ],
          [
            'title' => '新闻列表',
            'icon' => 'aicon ai-shezhi',
            'module' => 'example',
            'url' => 'example/index/index',
            'param' => '',
            'target' => '_self',
            'sort' => 1,
            'childs' => [
              [
                'title' => '添加新闻',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/index/add',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '修改新闻',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/index/edit',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '删除新闻',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/index/del',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
              [
                'title' => '状态设置',
                'icon' => '',
                'module' => 'example',
                'url' => 'example/index/status',
                'param' => '',
                'target' => '_self',
                'sort' => 0,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];