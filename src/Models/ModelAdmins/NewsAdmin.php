<?php

namespace EvansHunt;

use SilverStripe\Admin\ModelAdmin;

class NewsAdmin extends ModelAdmin {

    private static $managed_models = [
        'EvansHunt\NewsItem'
    ];

    private static $url_segment = 'news';

    private static $menu_title = 'News';
}
