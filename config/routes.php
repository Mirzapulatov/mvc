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
    'admin/comments/([0-9]+)/create' => 'comments/create/$1',
    'admin/comments/([0-9]+)/update/([0-9]+)' => 'comments/update/$1/$2',
    'admin/comments/([0-9]+)/delete/([0-9]+)/ok' => 'comments/delete/$1/$2/1',
    'admin/comments/([0-9]+)/delete/([0-9]+)' => 'comments/delete/$1/$2',
    'admin/comments/([0-9]+)/([0-9]+)' => 'comments/crud/$1/$2',
    'admin/comments/([0-9]+)' => 'comments/crud/$1',

    // Admin Portfolio
    'admin/portfolio/create' => 'admin/portfolio/create',
    'admin/portfolio/update/([0-9]+)' => 'admin/portfolio/update/$1',
    'admin/portfolio/delete/([0-9]+)/ok' => 'admin/portfolio/delete/$1/1',
    'admin/portfolio/delete/([0-9]+)' => 'admin/portfolio/delete/$1',
    'admin/portfolio/([0-9]+)' => 'admin/portfolio/$1',
    'admin/portfolio' => 'admin/portfolio/1',

    // Admin Blog
    'admin/blog/create' => 'blog/create',
    'admin/blog/update/([0-9]+)' => 'blog/update/$1',
    'admin/blog/delete/([0-9]+)/ok' => 'blog/delete/$1/1',
    'admin/blog/delete/([0-9]+)' => 'blog/delete/$1',
    'admin/blog/([0-9]+)' => 'blog/crud/$1',
    'admin/blog' => 'blog/crud',
    'admin' => 'admin/index',

    'auth' => 'authorization/index',

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

    'news/([0-9]+)' => 'news/list/$1',
    'news' => 'news/list/1',
    'news/view/([0-9]+)' => 'news/view/$1',

    '' => 'main/main'
);