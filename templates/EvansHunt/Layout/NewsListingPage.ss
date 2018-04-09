This is [ NewsListingPage.ss ] template file <br />


<section class="content-wrapper">

    $Content

</section>

<section class="year-filter">

    <% if $Years %>

        <hr />
        <form method="GET" action="$Link#newslisting">
            $Years
        </form>

    <% end_if %>

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