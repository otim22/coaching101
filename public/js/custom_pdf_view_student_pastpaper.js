/** Start student questions */
$(function() {
    let pdfState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    };
    let pdfRendering = false;
    let pdfNumPending = null;
    let userState = {};

    function getPastpaper() {
        let pastpaper = $('#v-pills-tab a.active span').attr('data-pastpaper');
        let answer = $('#v-pills-tab a.active span').attr('data-answer');
        let slug = $('#v-pills-tab a.active').attr('data-slug');
        if(pastpaper && slug) {
            return {
                'url' : typeof pastpaper !== "undefined" ? pastpaper : answer,
                'slug' : slug
            };
        }
    }

    let config = getPastpaper();

    if(config) {
        loadPdf(config.url, config.slug);
    }

    // New active tab
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (event) {
        config = getPastpaper();
        removesEvents(config.slug);
        loadPdf(config.url, config.slug);
    });

    // Asynchronous download of PDF
    function loadPdf(url, slug) {
        if(userState.hasOwnProperty(slug)) {
            pdfState = userState[slug];
        } else {
            pdfjsLib.getDocument(url).promise.then(function(pdf) {
                pdfState.pdf = pdf;
                userState[slug] = pdfState;
                render(slug);
            });
        }
        controls(slug);
    }

    // Display pdf on canvas
    function render(slug) {
        pdfRendering = true;
        document.getElementById('current_page-' + slug).textContent = pdfState.currentPage;
        document.getElementById('num_pages-' + slug).textContent = pdfState.pdf._pdfInfo.numPages;
        userState[slug] = $.extend({}, pdfState);    // Clone pdfState object
        pdfState.pdf.getPage(pdfState.currentPage).then((page) => {
            let canvas = document.getElementById(slug);
            let ctx = canvas.getContext('2d');
            let viewport = page.getViewport(pdfState.zoom);

            canvas.width = viewport.width;
            canvas.height = viewport.height;
            let renderTask = page.render({
                canvasContext: ctx,
                viewport: viewport
            });

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pdfRendering = false;
                userState[slug] = $.extend({}, pdfState);    // Clone pdfState object
                if (pdfNumPending !== null) {
                    // New page rendering is pending
                    render(slug);
                    pdfNumPending = null;
                    // pdfState.currentPage = 1;
                    // userState[slug] = $.extend({}, pdfState);    // Clone pdfState object
                }
            });
        }, function(reason) {
            console.log(reason);
        });
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPdf(currentPage, slug) {
        if (pdfRendering) {
            pdfNumPending = currentPage;
        } else {
            render(slug);
        }
    }

    function goPrevious(slug) {
        if(pdfState.pdf == null || pdfState.currentPage == 1)
            return;
        pdfState.currentPage--;
        document.getElementById("current_page-" + slug).value = pdfState.currentPage;
        queueRenderPdf(pdfState.currentPage, slug);
    }

    function goNext(slug) {
        if(pdfState.pdf == null || pdfState.currentPage >= pdfState.pdf._pdfInfo.numPages)
            return;
        pdfState.currentPage++;
        document.getElementById("current_page-" + slug).value = pdfState.currentPage;
        queueRenderPdf(pdfState.currentPage, slug);
    }

    function clearEvents(element) {
        let old_element = document.getElementById(element);
        let new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element);
    }

    function removesEvents(slug) {
        clearEvents('go_previous-' + slug);
        clearEvents('go_next-' + slug);
    }

    // pdf controls next, previous, zoom in and zoom out
    function controls(slug) {
        document.getElementById('go_previous-' + slug).addEventListener('click', goPrevious.bind(null, slug), true);
        document.getElementById('go_next-' + slug).addEventListener('click', goNext.bind(null, slug), true);
        document.getElementById('current_page-' + slug).addEventListener('keypress', (e) => {
            if(pdfState.pdf == null) return;
            // Get key code
            let code = (e.keyCode ? e.keyCode : e.which);

            // If key code matches that of the Enter key
            if(code == 13) {
                let desiredPage = document.getElementById('current_page-' + slug).valueAsNumber;

                if(desiredPage >= 1 && desiredPage <= pdfState.pdf._pdfInfo.numPages) {
                    pdfState.currentPage = desiredPage;
                    document.getElementById("current_page-" + slug).value = desiredPage;
                    queueRenderPdf(slug);
                }
            }
        });

        document.getElementById('zoom_in-' + slug).addEventListener('click', (e) => {
            if(pdfState.pdf == null) return;
            pdfState.zoom += 0.5;
            queueRenderPdf(slug);
        });

        document.getElementById('zoom_out-' + slug).addEventListener('click', (e) => {
            if(pdfState.pdf == null) return;
            pdfState.zoom -= 0.5;
            queueRenderPdf(slug);
        });
    }
});
/** End student questions */
