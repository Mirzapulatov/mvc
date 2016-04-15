<?php

return array(

    // Admin Contacts
    'admin/contacts/view/([0-9]+)' => 'admin/contacts/view/$1',
    'admin/contacts/update/([0-9]+)' => 'admin/contacts/update/$1',
    'admin/contacts/delete/([0-9]+)/ok' => 'admin/contacts/delete/$1/1',
    'admin/contacts/delete/([0-9]+)' => 'admin/contacts/delete/$1',
    'admin/contacts/([0-9]+)' => 'admin/contacts/$1',
    'admin/contacts' => 'admin/contacts/1',

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

    // Admin Portfolio
    'admin/portfolio/create' => 'admin/portfolio/create',
    'admin/portfolio/update/([0-9]+)' => 'admin/portfolio/update/$1',
    'admin/portfolio/delete/([0-9]+)/ok' => 'admin/portfolio/delete/$1/1',
    'admin/portfolio/delete/([0-9]+)' => 'admin/portfolio/delete/$1',
    'admin/portfolio/([0-9]+)' => 'admin/portfolio/$1',
    'admin/portfolio' => 'admin/portfolio/1',

    // Admin Blog
    'admin/blog/create' => 'admin/blog/create',
    'admin/blog/update/([0-9]+)' => 'admin/blog/update/$1',
    'admin/blog/delete/([0-9]+)/ok' => 'admin/blog/delete/$1/1',
    'admin/blog/delete/([0-9]+)' => 'admin/blog/delete/$1',
    'admin/blog/([0-9]+)' => 'admin/blog/$1',
    'admin/blog' => 'admin/blog/1',
    'admin' => 'admin/index',

    // portfolio
    'portfolio/([0-9]+)' => 'portfolio/view/$1',
    'portfolio' => 'portfolio/index',

    // about
    'about' => 'about/index',

    // Service
    'service/seo' => 'service/seo',
    'service/web' => 'service/web',
    'service/support' => 'service/support',
    'service/mobile' => 'service/mobile',
    'service' => 'service/index',

    // Blog
    'blog/view/([0-9]+)/([0-9]+)' => 'blog/view/$1/$2',
    'blog/view/([0-9]+)' => 'blog/view/$1/1',
    'blog/([0-9]+)' => 'blog/list/$1',
    'blog' => 'blog/list/1',

    // Contacts
    'contacts' => 'contact/view',

    // News
    'list' => 'news/list',
    'news/([0-9]+)' => 'news/view/$1',
);