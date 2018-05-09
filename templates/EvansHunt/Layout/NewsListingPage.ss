<div class="news-banner">
  <div class="row-wrap">
    <span class="news-banner-title">News</span>
  </div><!-- /.row-wrap -->
</div><!-- /.news-banner -->

<section class="content-wrapper">
  <div class="row-wrap">
    <h1 class="news-title">$Title</h1>
    <div class="content">
      $Content
    </div>
  </div><!-- /.row-wrap -->
</section><!-- /.content-wrapper -->

<section class="news-search-filter">
  <div class="row-wrap">
    <hr />
    <form method="GET" action="$Link#newslisting">
        <div class="years-filter">
            $Years
        </div>
        <div class="search-filter">
            <input type="text" name="searchTerm" value="$searchTerm" placeholder="Enter Search Term">
            <button class="button">Search</button>
        </div>
    </form>
    <hr />
  </div><!-- /.row-wrap -->
</section><!-- /.news-search-filter -->

<section class="news news-buckets">
  <div class="row-wrap">
    <div class="news-buckets-holder">

      <% include EvansHunt/Layout/NewsListingResults %>

    </div>
  </div><!-- /.row-wrap -->
</section><!-- /.news -->
