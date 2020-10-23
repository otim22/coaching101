// $(function() {
//     $('.expandible').each(function() {
//         var items = $(this),
//                 item = items.slice(0, 3),
//                 isExpanded = items.hasClass('expanded');
//                 item[isExpanded ? 'show' : 'hide']();
//         if(item.length > 0) {
//                 items
//                     .append($('<div class="showmore"><p class="expand">' + (isExpanded ? 'Show Less' : 'Show More') + '</p></div>')
//                     .click(function(event) {
//                         var isExpanded = items.hasClass('expanded');
//                         event.preventDefault();
//
//                         $(this).html(isExpanded ? 'Show More' : 'Show Less');
//                         items.toggleClass('expanded');
//                         item.toggle();
//                     }));
//             }
//     })
// })

// const Utils = {
//
//     addClass: function(element, theClass) {
//         element.classList.add(theClass);
//     },
//
//     removeClass: function(element, theClass) {
//         element.classList.remove(theClass);
//     },
//
//     showMore: function(element, excerpt) {
//         element.addEventListener("click", event => {
//             const linkText = event.target.textContent.toLowerCase();
//             event.preventDefault();
//
//             console.log(this);
//             if (linkText == "show more") {
//                 element.textContent = "Show less";
//                 this.removeClass(excerpt, "excerpt-hidden");
//                 this.addClass(excerpt, "excerpt-visible");
//             }  else  {
//                 element.textContent = "Show more";
//                 this.removeClass(excerpt, "excerpt-visible");
//                 this.addClass(excerpt, "excerpt-hidden");
//             }
//         });
//     }
// };
//
// const ExcerptWidget = {
//     showMore: function(showMoreLinksTarget, excerptTarget) {
//         const showMoreLinks = document.querySelectorAll(showMoreLinksTarget);
//
//         showMoreLinks.forEach(function(link) {
//             const excerpt = link.previousElementSibling.querySelector(excerptTarget);
//             Utils.showMore(link, excerpt);
//         });
//     }
// };
//
// ExcerptWidget.showMore('.js-show-more', '.js-excerpt');
