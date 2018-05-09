
jQuery.noConflict();

(function($, context) {

  $(document).ready(function() {
    initYearSelectChange();
    initLoadMore();
  });

  // auto submit form on year change
  function initYearSelectChange() {
    $('select#publishYear').on('change', function() {
      var form = $(this).parents('form:first');
      form.submit();
    });
  }

  // init "Load More" for ajax call, load more link is generate in PHP with all proper params
  function initLoadMore() {
    $('#btn-news-load-more').on('click', function(e) {
      e.preventDefault();

      // get this link URL to use for AJAX call
      var url = this.href;

      // remove old Load more and new one will be part of returned result
      $('.news-load-more').html('');

      // create AJAX call
      $.ajax(url)
        .done(function (response) {
          // add result into news-bucket-holder
          $('.news-buckets-holder').append(response);
          // re-init load more for new generated link
          initLoadMore();
        })
        .fail (function (xhr) {
        // AJAX failed
        alert('Error: ' + xhr.responseText);
      });
    });
  }

}(jQuery, window));