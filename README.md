# eh-ss-news
EH SilverStripe module to install basic NewsItem extension

## Setup

Steps to install this on your SilverStripe:

- Open your SilverStripe's `src/composer.json`.
- Add the `https://github.com/evanshunt/eh-ss-news` URL to a `repositories` parameter.
    ```
      "repositories": [{
        "type": "vcs",
        "url": "https://github.com/evanshunt/eh-ss-news"
      }]
    ```
- Add `"evanshunt/news-addons": "dev-master"` to your `require` list.
- Run `composer update --ignore-platform-reqs`.
