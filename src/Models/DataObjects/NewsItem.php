<?php

namespace EvansHunt;

use SilverStripe\ORM\DataObject;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\DateField;

/**
 * Class NewsItem
 */
class NewsItem extends DataObject
{
    private static $db = [
        'NewsID' => 'Varchar(50)', // ID form the news feed
        'Title' => 'Varchar(255)',
        'Date' => 'Date',
        'Summary' => 'Text',
        'Content' => 'HTMLText',
        'Contact' => 'Varchar(255)',
        'Link' => 'Varchar(255)',
        'PDF' => 'Varchar(255)',
    ];

    private static $singular_name = 'News Item';

    private static $plural_name = 'News Items';

    private static $description = 'News Item Data Object';

    private static $table_name = 'NewsItem';

    private static $summary_fields = [
        'Date',
        'Title'
    ];

    private static $items_per_page = 12; // default show 12 items, so it works reponsive for multiple columns (4x3 , 3x4, 2x6, 1x12)

    public static function getTableName() {
        return NewsItem::$table_name;
    }

    public static function getItemsPerPage() {
        return NewsItem::$items_per_page;
    }

    public function Link()
    {
        return $this->ID . '/' . SiteTree::create()->generateURLSegment($this->Date . ' ' . $this->Title);
    }

    public function getPageNumber($position) {
        // position in SS starts with 1 not 0 I believe

        // return calculated page number start from 1
        return ceil($position/self::getItemsPerPage());
    }
}
