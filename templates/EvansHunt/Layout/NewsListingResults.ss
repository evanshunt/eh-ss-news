<% loop $NewsResults %>
  <div class="news-item news-bucket news-page-{$getPageNumber($Pos)}">
    <div class="top-news">
      <span class="news-date">$Date.Month $Date.DayOfMonth, $Date.Year</span>
      <h4 class="news-title"><a href="{$Top.Link}detail/$Link">$Title</a></h4>
    </div><!-- /.top-news -->
    <div class="bottom-news">
      <a href="{$Top.Link}detail/$Link" class="news-read-more text-link">READ MORE</a>
    </div><!-- /.bottom-news -->
  </div>
<% end_loop %>

<% if $NewsResults.MoreThanOnePage %>
  <% if $NewsResults.NotLastPage %>
    <% if $NewsResults.NextLink %>
      <div class="news-load-more">
        <a href="$NewsResults.NextLink" id="btn-news-load-more">Load More</a>
      </div>
    <% end_if %>
  <% end_if %>
<% end_if %>