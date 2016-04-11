<?php

return array(
    'admin/news/create' => 'admin/news/create',
    'admin/news/update/([0-9]+)' => 'admin/news/update/$1',
    'admin/news/delete/([0-9]+)/ok' => 'admin/news/delete/$1/1',
    'admin/news/delete/([0-9]+)' => 'admin/news/delete/$1',
    'admin/news/([0-9]+)' => 'admin/news/$1',
    'admin/news' => 'admin/news/1',
    'admin/blog/create' => 'admin/blog/create',
    'admin/blog/update/([0-9]+)' => 'admin/blog/update/$1',
    'admin/blog/delete/([0-9]+)/ok' => 'admin/blog/delete/$1/1',
    'admin/blog/delete/([0-9]+)' => 'admin/blog/delete/$1',
    'admin/blog/([0-9]+)' => 'admin/blog/$1',
    'admin/blog' => 'admin/blog/1',
    'admin' => 'admin/index',
    'blog/view/([0-9]+)/([0-9]+)' => 'blog/view/$1/$2',
    'blog/view/([0-9]+)' => 'blog/view/$1/1',
    'blog/([0-9]+)' => 'blog/list/$1',
    'blog' => 'blog/list/1',
    'contacts' => 'contact/view',
    'list/([0-9]+)' => 'news/list/$1',
    'news/([0-9]+)' => 'news/view/$1',
    '' => 'news/list/1'
);