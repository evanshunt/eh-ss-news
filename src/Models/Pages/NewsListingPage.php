<?php

namespace EH;

use Page;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\Forms\DropdownField;

class NewsListingPage extends Page {

    // get list of years which has any newsItem
    // returns array of year with year index ready to be used for drop-down ([YYYY] => YYYY)
    public static function getActiveYears() {

        // get DB table name from NewsItem dataObject
        $newsTable = NewsItem::getTableName();

        // perform distinct query to get available years, select them twice so it will work for mapping function
        $query = new SQLSelect();
        $result = $query->setFrom($newsTable)->setSelect('YEAR(`Date`)')->selectField('YEAR(`Date`)','publishYear')->setDistinct(true)->setOrderBy('PublishYear', 'DESC')->execute();
        $years = $result->map();

        // do we have any results? we need more than one ... at least two to display filter drop down to make sense
        $field = false;

        if (is_array($years) && count($years) > 1) {
            $years = [0 => 'View all years'] + $years;
            $field = new DropdownField('publishYear', 'publishYear', $years);
        }

        return $field;
    }

}
