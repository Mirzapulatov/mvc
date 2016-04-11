<?php

return array(
    'admin/blog' => 'admin/blog',
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