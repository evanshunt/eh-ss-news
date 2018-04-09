<?php

namespace EvansHunt;

use PageController;
use SilverStripe\Forms\DateField;
use SilverStripe\View\Requirements;


class NewsListingPageController extends PageController
{
    private static $allowed_actions = [
        'init',
        'news',
        'detail'
    ];

    public function init() {
        parent::init();
    }

	public function news() {

        Requirements::javascript('resources/silverstripe/admin/thirdparty/jquery/jquery.js');
        Requirements::javascript('evanshunt/news-addons:javascript/news.js');

		$news = NewsItem::get();

		$year = $this->getYear();

		if ($year) {

            $news = $news->filter(
                [
                    'Date:GreaterThan' => $year . '-1-1 00:00:00',
                    'Date:LessThan' => $year . '-12-31 23:59:59'
                ]
            );

		}

		return $news;
	}

    public function years() {
        $year = $this->getYear();
        $yearsField = NewsListingPage::getActiveYears();
        if ($yearsField && $year) {
            $yearsField->setValue($year);
        }
        return $yearsField;
    }

	public function getYear() {
		return $this->getRequest()->getVar('publishYear');
	}

    public function detail($request) {

        // get the news item
        $newsItem = NewsItem::get()->byID($request->param('ID'));

        // validate if this news item exists
        if (!$newsItem) {
            return $this->httpError(404,'That News Item could not be found');
        }

        // add some more information into Content
        $date = strtotime($newsItem->getField('Date'));
        $date = date('l, F jS, Y', $date);

        $backUrl = '';
        $refer = $this->getReferer();
        $urlSegment = $this->getField('URLSegment');
        if (!empty($refer) && strpos($refer, $urlSegment)) {
            $backUrl = htmlspecialchars($refer);
            $backUrl = '<a href="' . $backUrl . '">Back</a>';
        }

        $content = $newsItem->getField('Content');
        $content = '<span class="publishedDate">Published: ' . $date . '</span>' . $content;
        $content.= $backUrl;

        // set content field which is rendered in template
        $newsItem->setField('Content', $content);

        // return news item and render with Page
        return $newsItem->renderWith('Page');
    }
}
