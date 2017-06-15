document.onclick = function() {
    // get all discussion grids on HOME page
    document.querySelectorAll('.discussion-grid').forEach(function(e) {
        // delegate the click event on one row to the inner a tag
        e.addEventListener('click', function(event) {
            e.getElementsByTagName('a')[0].click();
        });
    });

}