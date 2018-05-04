<section class="content-wrapper">

    $Content

</section>

<section class="news-search-filter">

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

</section>

<section class="news">

    <hr />

    <% loop $news.Sort(Date).Reverse %>
        <div class="news-item">
            <span class="date">$Date.Month $Date.DayOfMonth, $Date.Year</span><br />
            <a href="{$Top.Link}detail/$Link">$Title</a>
        </div>
        <hr />
    <% end_loop %>

</section>