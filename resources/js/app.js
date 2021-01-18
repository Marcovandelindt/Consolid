require('./bootstrap');

require('alpinejs');

// Sidebar Toggle
$('#sidebar-toggle').on('click', function (e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
});