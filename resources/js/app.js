require('./bootstrap');

require('alpinejs');

// Sidebar Toggle
$('#sidebar-toggle').on('click', function (e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
});

// Initialize CKEditor
CKEDITOR.replace('customEditor');

// Music Tabs
$('#musicTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
})