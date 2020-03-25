<?php

return [
    'db' => [
        'table' => 'vis_redirects',
        'order' => [
            'id' => 'ASC',
        ],
        'pagination' => [
            'per_page' => 20,
            'uri' => '/admin/page-redirects',
        ],
    ],
    'cache' => [
        'tags' => ['vis_redirects'],
    ],
    'options' => [
        'caption' => 'Редиректы',
        'model' => 'Smony\LaravelRedirectPage\Redirect',
    ],

    'fields' => [
        'id' => [
            'caption' => '#',
            'type' => 'readonly',
            'filter' => 'integer',
            'class' => 'col-id',
            'width' => '80px',
            'hide' => true,
            'is_sorting' => true,
        ],

        'title' => [
            'caption' => 'Title',
            'type' => 'text',
            'filter' => 'text',
            'field' => 'string',
        ],

        'old_url' => [
            'caption' => 'Source URL',
            'type' => 'text',
            'filter' => 'text',
            'field' => 'string',
        ],

        'new_url' => [
            'caption' => 'Target URL',
            'type' => 'text',
            'filter' => 'text',
            'field' => 'string',
        ],

        'status' => [
            'caption' => 'with HTTP code',
            'type' => 'select',
            'options' => config('vis-redirect-page.redirect_codes'),
            'filter' => 'select'
        ],

        'is_active' => [
            'caption' => 'Active',
            'type' => 'checkbox',
            'filter' => 'select',
            'options' => [
                1 => 'Yes',
                0 => 'No',
            ],
            'field' => 'tinyInteger',
        ],

        'created_at' => [
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'months' => 2,
            'field' => 'datetime',
        ],

        'updated_at' => [
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'hide'        => true,
            'field' => 'datetime',
        ],
    ],

    'filters' => [],

    'actions' => [

        'insert' => [
            'caption' => 'Добавить',
            'check' => function () {
                return true;
            }
        ],

        'update' => [
            'caption' => 'Редактировать',
            'check' => function () {
                return true;
            }
        ],

        'delete' => [
            'caption' => 'Удалить',
            'check' => function () {
                return true;
            }
        ],
    ],
];
