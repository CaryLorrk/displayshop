$(document).ready(function(){
    $('#content').waypoint(function(event,direction) {
        if (direction === 'down') {
            $('#toTop').show("fast");
        }
        else {
            $('#toTop').hide("fast");
        }
    }, {
        offset: '-50%'
    });

    $('#toTop').click(function() {
        //$('body, html').animate({ scrollTop: 0}, 600);
        scrollToAnchor('content');
    });

    // add a hash to the URL when the user clicks on a tab
    $('a[data-toggle="tab"]').on('click', function(e) {
        history.pushState(null, null, $(this).attr('href'));
    });
    // navigate to a tab when the history changes
    $(window).bind("popstate", function(e) {
        var returnLocation = history.location || document.location;
        var activeTab = $('.nav-tabs [href=' + returnLocation.hash + ']');
        if (activeTab.length) {
            activeTab.tab('show');
        } else {
            $('.nav-tabs a:first').tab('show');
        }
    });
});

function scrollToAnchor(tid) {
    var etag = $("#"+tid);
    $('html,body').animate({scrollTop: etag.offset().top-60}, 600);
}

