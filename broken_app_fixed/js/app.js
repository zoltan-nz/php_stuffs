var jsDelete;

jsDelete = function(e) {
    e.preventDefault();
    if (!confirm('Are you sure you want to delete this ?')) {
        return;
    }
    return $.ajax({
        type: 'GET',
        url: $(this).attr('href'),
        success: function(results) {
            return location.reload();
        }
    });
};


$(function() {
    return $('a.js-delete').on('click', jsDelete);
});