<?php

return [

    [
        'name' => 'Category',
        'permissions' => [
            ['key' => 'categories.add', 'value' => 'Can Add Category'],
            ['key' => 'categories.edit', 'value' => 'Can Edit Category'],
            ['key' => 'categories.view', 'value' => 'Can View Category'],
            ['key' => 'categories.delete', 'value' => 'Can Delete Category'],
        ]
    ],
    [
        'name' => 'Sub Category',
        'permissions' => [
            ['key' => 'sub_categories.add', 'value' => 'Can Add Sub Category'],
            ['key' => 'sub_categories.edit', 'value' => 'Can Edit Sub Category'],
            ['key' => 'sub_categories.view', 'value' => 'Can View Sub Category'],
            ['key' => 'sub_categories.delete', 'value' => 'Can Delete Sub Category'],
        ]
    ],
    [
        'name' => 'Source',
        'permissions' => [
            ['key' => 'sources.add', 'value' => 'Can Add Source'],
            ['key' => 'sources.edit', 'value' => 'Can Edit Source'],
            ['key' => 'sources.view', 'value' => 'Can View Source'],
            ['key' => 'sources.delete', 'value' => 'Can Delete Source'],
        ]
    ],
    [
        'name' => 'Post',
        'permissions' => [
            ['key' => 'posts.add', 'value' => 'Can Add Post'],
            ['key' => 'posts.edit', 'value' => 'Can Edit Post'],
            ['key' => 'posts.view', 'value' => 'Can View Post'],
            ['key' => 'posts.delete', 'value' => 'Can Delete Post'],
        ]
    ],
    [
        'name' => 'Tag',
        'permissions' => [
            ['key' => 'tags.view', 'value' => 'Can View Tag'],
            ['key' => 'tags.delete', 'value' => 'Can Delete Tag'],
        ]
    ],
    [
        'name' => 'Ratings',
        'permissions' => [
            ['key' => 'ratings.view', 'value' => 'Can View Ratings'],
            ['key' => 'ratings.delete', 'value' => 'Can Delete Ratings'],
        ]
    ],
    [
        'name' => 'Page',
        'permissions' => [
            ['key' => 'pages.add', 'value' => 'Can Add Page'],
            ['key' => 'pages.edit', 'value' => 'Can Edit Page'],
            ['key' => 'pages.view', 'value' => 'Can View Page'],
            ['key' => 'pages.delete', 'value' => 'Can Delete Page'],
        ]
    ],
    [
        'name' => 'User',
        'permissions' => [
            ['key' => 'users.add', 'value' => 'Can Add User'],
            ['key' => 'users.edit', 'value' => 'Can Edit User'],
            ['key' => 'users.view', 'value' => 'Can View User'],
            ['key' => 'users.delete', 'value' => 'Can Delete User'],
        ]
    ],
    [
        'name' => 'Ad Sections',
        'permissions' => [
            ['key' => 'ad_sections.add', 'value' => 'Can Add Ad Sections'],
            ['key' => 'ad_sections.edit', 'value' => 'Can Edit Ad Sections'],
            ['key' => 'ad_sections.view', 'value' => 'Can View Ad Sections'],
            ['key' => 'ad_sections.delete', 'value' => 'Can Delete Ad Sections'],
        ]
    ],
    [
        'name' => 'Statistics',
        'permissions' => [
            ['key' => 'statistics.view', 'value' => 'Can View Statistics'],
        ]
    ],
    [
        'name' => 'Cron Logs',
        'permissions' => [
            ['key' => 'crons.run', 'value' => 'Can Add Crons'],
            ['key' => 'crons.view', 'value' => 'Can View Specific Crons'],
            ['key' => 'crons.all', 'value' => 'Can View All Cron'],
            ['key' => 'crons.delete', 'value' => 'Can Delete Crons'],
        ]
    ],
    [
        'name' => 'User Roles',
        'permissions' => [
            ['key' => 'roles.add', 'value' => 'Can Add User Roles'],
            ['key' => 'roles.edit', 'value' => 'Can Edit User Roles'],
            ['key' => 'roles.view', 'value' => 'Can View User Roles'],
            ['key' => 'roles.delete', 'value' => 'Can Delete User Roles'],
        ]
    ],
    [
        'name' => 'Setting',
        'permissions' => [
            ['key' => 'settings.general', 'value' => 'Can Update General Setting'],
            ['key' => 'settings.seo', 'value' => 'Can Update SEO Setting'],
            ['key' => 'settings.comments', 'value' => 'Can Update Comments Setting'],
            ['key' => 'settings.socials', 'value' => 'Can Update Socials Setting'],
            ['key' => 'settings.custom_js', 'value' => 'Can Update Custom JS Setting'],
            ['key' => 'settings.custom_css', 'value' => 'Can Update Custom CSS Setting'],
            ['key' => 'settings.view', 'value' => 'Can View Setting'],
        ]
    ]

];
