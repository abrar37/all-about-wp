// Using js

// V1

document.addEventListener("DOMContentLoaded", function () {
    const tabLinks = document.querySelectorAll('.pd-tab-link');
    const tabs = document.querySelectorAll('.pd-tab');
    tabLinks[0].classList.add("active-tab");
    tabs[0].classList.add("active-content");

    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            // e.preventDefault();
            const tabId = this.getAttribute('tab-id');

            tabs.forEach(function (tab) {
                if (tab.getAttribute('tab-id') === tabId) {
                    tab.classList.add("active-content");
                } else {
                    tab.classList.remove("active-content");
                }
            });

            // Remove "active" class from all tab links
            tabLinks.forEach(function (link) {
                link.classList.remove("active-tab");
            });

            // Add "active" class to the parent of the clicked tab link
            this.classList.add("active-tab");
        });
    });
});


// V2
document.addEventListener("DOMContentLoaded", function () {
    const tabLinks = document.querySelectorAll('.el-tabs-btn > .elementor-element');
    const tabs = document.querySelectorAll('.el-tabs > .elementor-element');
    tabLinks[0].classList.add("active");
    tabs[0].classList.add("active");

    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            // e.preventDefault();
            const tabId = this.getAttribute('tab-id');

            tabs.forEach(function (tab) {
                if (tab.getAttribute('tab-id') === tabId) {
                    tab.classList.add("active");
                } else {
                    tab.classList.remove("active");
                }
            });

            // Remove "active" class from all tab links
            tabLinks.forEach(function (link) {
                link.classList.remove("active");
            });

            // Add "active" class to the parent of the clicked tab link
            this.classList.add("active");
        });
    });
});





// Using jQuery + data-id attribute
$(document).ready(function(){ 
    $('.tab-a').click(function(){  
      $(".tab").removeClass('tab-active');
      $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
      $(".tab-a").removeClass('active-a');
      $(this).parent().find(".tab-a").addClass('active-a');
     });
});


//Converted
document.addEventListener("DOMContentLoaded", function() {
    var tabLinks = document.querySelectorAll('.tab-a');

    tabLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            var dataId = this.getAttribute('data-id');
            
            var tabs = document.querySelectorAll('.tab');
            tabs.forEach(function(tab) {
                tab.classList.remove('tab-active');
                if (tab.getAttribute('data-id') === dataId) {
                    tab.classList.add('tab-active');
                }
            });

            tabLinks.forEach(function(link) {
                link.classList.remove('active-a');
            });
            this.classList.add('active-a');
        });
    });
});
