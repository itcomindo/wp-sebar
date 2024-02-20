jQuery(document).ready(function () {
    if (new URLSearchParams(window.location.search).has('the_post_type_filter')) {
        var thePostTypeFilter = new URLSearchParams(window.location.search).get('the_post_type_filter');
        var newUrl = new URL(window.location.href);
        newUrl.searchParams.set('the_post_type_filter', thePostTypeFilter);
        window.history.pushState({ path: newUrl.href }, '', newUrl.href);
    }


















});
