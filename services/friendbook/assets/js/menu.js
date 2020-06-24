(function() {
    var bodyEl = $('body'),
    navToggleBtn = bodyEl.find('.nav-toggle-btn');
    navToggleBtn.on('click', function(e) {
        bodyEl.toggleClass('active-nav');
        e.preventDefault();
    });
    closeBtn = bodyEl.find('.closebtn');
    closeBtn.on('click', function(e) {
        bodyEl.toggleClass('active-nav');
        e.preventDefault();
    });
})();	