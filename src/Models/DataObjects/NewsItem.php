<?php

namespace EH;

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

    public static function getTableName() {
        return NewsItem::$table_name;
    }

    public function Link()
    {
        return $this->ID . '/' . SiteTree::create()->generateURLSegment($this->Date . ' ' . $this->Title);
    }
}
