<?php

namespace EvansHunt;

use PageController;
use SilverStripe\Forms\DateField;
use SilverStripe\View\Requirements;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;

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

    public function index(HTTPRequest $request) {

        Requirements::javascript('evanshunt/news-addons:javascript/news.js');

        $news = NewsItem::get();

        $year = $this->getYear();

        $searchTerm = $this->getSearchTerm();

        if ($year) {

            $news = $news->filter(
                [
                    'Date:GreaterThan' => $year . '-1-1 00:00:00',
                    'Date:LessThan' => $year . '-12-31 23:59:59'
                ]
            );

        }

        if ($searchTerm) {

            $news = $news->filterAny(
                [
                    'Title:PartialMatch' => $searchTerm,
                    'Content:PartialMatch' => $searchTerm
                ]
            );

        }

        // add sort by date DESC
        $news = $news->Sort('Date', 'DESC');

        // use paginated list to get load more feature working
        $paginatedResults = PaginatedList::create(
            $news,
            $request
        )->setPageLength(NewsItem::getItemsPerPage());

        if($request->isAjax()) {
            return $this->customise([
                'NewsResults' => $paginatedResults
            ])->renderWith('EvansHunt/Layout/NewsListingResults');
        }

        return [
            'NewsResults' => $paginatedResults
        ];

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

    public function getSearchTerm() {
        return $this->getRequest()->getVar('searchTerm');
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

        // setup updated newsItem Content
        $newsItem->Content = '<span class="publishedDate">Published: ' . $date . '</span>' . $newsItem->getField('Content') . $backUrl;

        // set news item into array which is rendered in template and return this array
        $returnArr = ['NewsItem' => $newsItem];

        return $returnArr;
    }
}
