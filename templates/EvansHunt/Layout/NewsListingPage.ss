<section class="content-wrapper">
  <div class="row-wrap">
    <h1>$Title</h1>
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
      <% loop $news.Sort(Date).Reverse %>
        <div class="news-item news-bucket">
          <div class="top-news">
            <span class="news-date">$Date.Month $Date.DayOfMonth, $Date.Year</span>
            <h4 class="news-title"><a href="{$Top.Link}detail/$Link">$Title</a></h4>
          </div><!-- /.top-news -->
          <div class="bottom-news">
            <a href="{$Top.Link}detail/$Link" class="news-read-more text-link">READ MORE</a>
          </div><!-- /.bottom-news -->
        </div>
        <hr />
      <% end_loop %>
    </div>
  </div><!-- /.row-wrap -->
</section><!-- /.news -->