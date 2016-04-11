<?php

return array(
    // Admin News
    'admin/news/create' => 'admin/news/create',
    'admin/news/update/([0-9]+)' => 'admin/news/update/$1',
    'admin/news/delete/([0-9]+)/ok' => 'admin/news/delete/$1/1',
    'admin/news/delete/([0-9]+)' => 'admin/news/delete/$1',
    'admin/news/([0-9]+)' => 'admin/news/$1',
    'admin/news' => 'admin/news/1',

    // Admin Comments Blog
    'admin/comments/([0-9]+)/create' => 'admin/comments/$1/create',
    'admin/comments/([0-9]+)/update/([0-9]+)' => 'admin/comments/$1/update/$2',
    'admin/comments/([0-9]+)/delete/([0-9]+)/ok' => 'admin/comments/$1/delete/$2/1',
    'admin/comments/([0-9]+)/delete/([0-9]+)' => 'admin/comments/$1/delete/$2',
    'admin/comments/([0-9]+)/([0-9]+)' => 'admin/comments/$1/$2',
    'admin/comments/([0-9]+)' => 'admin/comments/$1/1',

    // Admin Blog
    'admin/blog/create' => 'admin/blog/create',
    'admin/blog/update/([0-9]+)' => 'admin/blog/update/$1',
    'admin/blog/delete/([0-9]+)/ok' => 'admin/blog/delete/$1/1',
    'admin/blog/delete/([0-9]+)' => 'admin/blog/delete/$1',
    'admin/blog/([0-9]+)' => 'admin/blog/$1',
    'admin/blog' => 'admin/blog/1',
    'admin' => 'admin/index',

    // Blog
    'blog/view/([0-9]+)/([0-9]+)' => 'blog/view/$1/$2',
    'blog/view/([0-9]+)' => 'blog/view/$1/1',
    'blog/([0-9]+)' => 'blog/list/$1',
    'blog' => 'blog/list/1',

    // Contacts
    'contacts' => 'contact/view',

    // News
    'list/([0-9]+)' => 'news/list/$1',
    'news/([0-9]+)' => 'news/view/$1',
    '' => 'news/list/1'
);