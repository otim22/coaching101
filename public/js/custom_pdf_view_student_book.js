/** Start teacher book */
$(function() {
    let pdfState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    let pdfRendering = false;

    function getPdf() {
        let url = window.studentBook;
        if (url) {
            return { url };
        }
    }

    let config = getPdf();

    loadPdf(config.url);

    function loadPdf(url) {
        pdfjsLib.getDocument(config.url).then((pdf) => {
            pdfState.pdf = pdf;
            render();
        });
        controls();
    }

    function render() {
        pdfRendering = true;
        document.getElementById('current_page').textContent = pdfState.currentPage;
        document.getElementById('num_pages').textContent = pdfState.pdf._pdfInfo.numPages;
        pdfState.pdf.getPage(pdfState.currentPage).then((page) => {
            var canvas = document.getElementById("pdf_renderer");
            if (canvas) {
                var ctx = canvas.getContext('2d');
                var viewport = page.getViewport(pdfState.zoom);
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            }
        }, function(reason) {
            console.log(reason);
        });
    }

    function controls() {
        if (document.getElementById('go_previous')
            && document.getElementById('go_next')
            && document.getElementById('current_page')
            && document.getElementById('zoom_in')
            && document.getElementById('zoom_out')
        ) {
            document.getElementById('go_previous').addEventListener('click', (e) => {
                if(pdfState.pdf == null || pdfState.currentPage == 1)
                    return;
                pdfState.currentPage -= 1;
                document.getElementById("current_page").value = pdfState.currentPage;
                render();
            });

            document.getElementById('go_next').addEventListener('click', (e) => {
                if(pdfState.pdf == null || pdfState.currentPage >= pdfState.pdf._pdfInfo.numPages)
                    return;
                pdfState.currentPage += 1;
                document.getElementById("current_page").value = pdfState.currentPage;
                render();
            });

            document.getElementById('current_page').addEventListener('keypress', (e) => {
                if(pdfState.pdf == null) return;

                // Get key code
                let code = (e.keyCode ? e.keyCode : e.which);

                // If key code matches that of the Enter key
                if(code == 13) {
                    let desiredPage = document.getElementById('current_page').valueAsNumber;

                    if(desiredPage >= 1 && desiredPage <= pdfState.pdf._pdfInfo.numPages) {
                        pdfState.currentPage = desiredPage;
                        document.getElementById("current_page").value = desiredPage;
                        render();
                    }
                }
            });

            document.getElementById('zoom_in').addEventListener('click', (e) => {
                if(pdfState.pdf == null) return;
                pdfState.zoom += 0.5;
                render();
            });

            document.getElementById('zoom_out').addEventListener('click', (e) => {
                if(pdfState.pdf == null) return;
                pdfState.zoom -= 0.5;
                render();
            });
        }
    }
});
/** End teacher book */
