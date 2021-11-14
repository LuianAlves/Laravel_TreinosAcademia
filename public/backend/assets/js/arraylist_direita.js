$(document).ready(function() {
    $('.vclick').click(function() {
        $(this).closest('.vflipper').toggleClass('vflip');
    });


    //
    // Listen for change event 
    //
    $('.vback :checkbox').on('change', function(e) {
        //
        // get the labels list of all  checked elements
        //
        var result = $('.vback :checkbox:checked').map(function(index, element) {
            if (element.checked) {
                return element.parentNode.textContent;
            }

        }).get();

        //
        // add this text to the label
        //

        $('#lbl').text(result.join(""))
    })
});