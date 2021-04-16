/* Start handle filtering subjects videos*/
$(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreSubjects(page);
    });

    $('#category, #year, #term').on('change', function() {
        getMoreSubjects();
    });
});

function getMoreSubjects(page) {
    var selectedCategory = $("#category option:selected").val();
    var selectedYear = $("#year option:selected").val();
    var selectedTerm = $("#term option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'category': selectedCategory,
            'year': selectedYear,
            'term': selectedTerm
        },
        url: "get-more-subjects" + "?page=" + page,
        success: function(data) {
            $('#subject_data').html(data);
            window.livewire.rescan();
        }
    });
}
/* End handle filtering subjects videos*/

/* Start get exact location of tab*/
$(function() {
    let url = location.href.replace(/\/$/, "");
    if (location.hash) {
        const hash = url.split("#");
        $('#nav-tab a[href="#'+hash[1]+'"]').tab("show");
        url = location.href.replace(/\/#/, "#");
        history.replaceState(null, null, url);

        setTimeout(() => {
            $(window).scrollTop(0);
        }, 400);
    }

    $('a[data-toggle="tab"]').on("click", function() {
        let newUrl;
        const hash = $(this).attr("href");
        if(hash == "#home") {
            newUrl = url.split("#")[0];
        }   else {
            newUrl = url.split("#")[0] + hash;
        }

        newUrl += "/";
        history.replaceState(null, null, newUrl);
    });
});
/* End get exact location of tab*/
