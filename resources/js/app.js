require('./bootstrap');

require('alpinejs');

require('./hierachy');

// Sidebar Toggle
$('#sidebar-toggle').on('click', function (e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
});

// Initialize CKEditor
CKEDITOR.replace('customEditor');

$(document).ready(function () {
    $('#foodTypeSelect').hierarchySelect({
        hierarchy: false,
        width: 'auto'
    });
});

$('.hs-menu-inner .dropdown-item').on('click', function () {
    $('#hiddenFoodType').val($(this).data('value'));
});
