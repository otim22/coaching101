/** Start student notes */
$(function() {
    let pdfState = {
        pdf: null,
        currentPage: 1,
        zoom: 1,
    };
    let pdfRendering = false;
    let pdfNumPending = null;
    let userState = {};

    function getSubnotes() {
        let subnotes = $('#v-pills-tab a.active').attr('data-notes');
        let slug = $('#v-pills-tab a.active').attr('data-slug');
        if(subnotes && slug) {
            return {
                'url' : subnotes,
                'slug' : slug
            };
        }
    }

    let config = getSubnotes();

    if(config) {
        loadPdf(config.url, config.slug);
    }

    // New active tab
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (event) {
        config = getSubnotes();
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
        pdfState.pdf.getPage(pdfState.currentPage).then((page) => {
            let canvas = document.getElementById(slug);
            let context = canvas.getContext('2d');
            let viewport = page.getViewport(pdfState.zoom);

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            let renderTask = page.render({
                canvasContext: context,
                viewport: viewport
            });

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pdfRendering = false;
                userState[slug] = $.extend({}, pdfState);    // Clone pdfState object
                if(pdfNumPending !== null) {
                    // New page rendering is pending
                    render(slug);
                    pdfNumPending = null;
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
            var code = (e.keyCode ? e.keyCode : e.which);

            // If key code matches that of the Enter key
            if(code == 13) {
                var desiredPage = document.getElementById('current_page-' + slug).valueAsNumber;

                if(desiredPage >= 1 && desiredPage <= pdfState.pdf._pdfInfo.numPages) {
                    pdfState.currentPage = desiredPage;
                    document.getElementById("current_page-" + slug).value = desiredPage;
                    // render(slug);
                    queueRenderPdf(pdfState.currentPage, slug);
                }
            }
        });
        document.getElementById('zoom_in-' + slug).addEventListener('click', (e) => {
            if(pdfState.pdf == null) return;
            pdfState.zoom += 0.5;
            // render(slug);
            queueRenderPdf(pdfState.currentPage, slug);
        });
        document.getElementById('zoom_out-' + slug).addEventListener('click', (e) => {
            if(pdfState.pdf == null) return;
            pdfState.zoom -= 0.5;
            // render(slug);
            queueRenderPdf(pdfState.currentPage, slug);
        });
    }
});

/** End student sub notes */
