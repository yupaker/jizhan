<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: yupaker
// +----------------------------------------------------------------------
/**
 * 模块菜单
 * 字段说明
 * url 【链接地址】格式：yupaker/控制器/方法，可填写完整外链[必须以http开头]
 * param 【扩展参数】格式：a=123&b=234555
 */
return [
  [
    'title' => '博客',
    'icon' => 'aicon ai-shezhi',
    'module' => 'yupaker',
    'url' => 'yupaker',
    'param' => '',
    'target' => '_self',
    'debug' => 0,
    'system' => 0,
    'nav' => 1,
    'sort' => 100,
    'childs' => [
      [
        'title' => '新闻管理',
        'icon' => 'aicon ai-caidan',
        'module' => 'yupaker',
        'url' => 'yupaker/news',
        'param' => '',
        'target' => '_self',
        'debug' => 0,
        'system' => 0,
        'nav' => 1,
        'sort' => 0,
        'childs' => [
          [
            'title' => '新闻分类',
            'icon' => 'aicon ai-caidan',
            'module' => 'yupaker',
            'url' => 'yupaker/newscategory/index',
            'param' => '',
            'target' => '_self',
            'debug' => 0,
            'system' => 0,
            'nav' => 1,
            'sort' => 0,
            'childs' => [
              [
                'title' => '添加分类',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/newscategory/add',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '修改分类',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/newscategory/edit',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '删除分类',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/newscategory/del',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '状态设置',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/newscategory/status',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
            ],
          ],
          [
            'title' => '新闻列表',
            'icon' => 'aicon ai-caidan',
            'module' => 'yupaker',
            'url' => 'yupaker/news/index',
            'param' => '',
            'target' => '_self',
            'debug' => 0,
            'system' => 0,
            'nav' => 1,
            'sort' => 0,
            'childs' => [
              [
                'title' => '添加新闻',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/news/add',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '修改新闻',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/news/edit',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '删除新闻',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/news/del',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
              [
                'title' => '状态设置',
                'icon' => '',
                'module' => 'yupaker',
                'url' => 'yupaker/news/status',
                'param' => '',
                'target' => '_self',
                'debug' => 0,
                'system' => 0,
                'nav' => 1,
                'sort' => 0,
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];
