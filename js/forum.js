document.onclick = function() {
    // get all discussion grids on HOME page
    document.querySelectorAll('.discussion-grid').forEach(function(e) {
        // delegate the click event on one row to the inner a tag
        e.addEventListener('click', function(event) {
            e.getElementsByTagName('a')[0].click();
        });
    });

}

document.onreadystatechange = function() {
    if(document.readyState == 'interactive') {
        document.querySelectorAll('.button-warning').forEach(function(e) {
            e.onclick = false;
            e.addEventListener('click', function(event) {

                if(!confirm("Are you sure?")) {
                    event.preventDefault();
                } else {
                    // call clickhandler of button
                    clickHandler.call(this, event);
                }
            });

        });
    }
}
