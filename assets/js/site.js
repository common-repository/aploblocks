document.addEventListener("DOMContentLoaded", function(e) {

  
    var aplointerval = setInterval(function() {
        initBlock()
    },1000);

    function initBlock() {

        let observerOptions = {rootMargin: '0px',threshold: 0.3}
        var observer = new IntersectionObserver(observerCallback, observerOptions);
        
        function observerCallback(entries, observer) {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                  entry.target.classList.add("aploshow");
                  observer.unobserve(entry.target);
                }
            });
        };
        
        document.querySelectorAll('.aploanim').forEach((i) => {
            if (i) {
                observer.observe(i);
            }
        });
    
		var el = document.querySelector(".is-style-aplo-sticky-hide-in")
        
        if (el) { // add undefined check
            const stickyobserver = new IntersectionObserver( 
                function([e]){
                    e.target.classList.toggle("aplo-header-stuck", e.intersectionRatio < 1);
                },
                {threshold:1}
            );
            stickyobserver.observe(el);
        };

        if (document.querySelector(".wp-block-group.is-style-aplo-sticky-hide")) {
            var el = document.querySelector(".wp-block-group.is-style-aplo-sticky-hide");
            var height = el.offsetHeight;
        } else if (document.querySelector(".wp-block-group.is-style-aplo-sticky-hide-in")) {
            var el = document.querySelector(".wp-block-group.is-style-aplo-sticky-hide-in");
            var height = el.offsetHeight;
        }

        if (el) {
            var prevScrollpos = window.pageYOffset;
            var startHide = 200 // determines how much needs to be scrolled before hiding will start
            var tolerance =2; // determines how much scroll needs to move for hide to activate - not quite right - maybe need interval
            window.onscroll = function() {

                var currentScrollPos = window.pageYOffset;
                if (currentScrollPos > height + startHide) {
                    if (prevScrollpos > (currentScrollPos + tolerance) ) {
                        el.style.removeProperty('top'); // remove top so that it is controlled by css        
                    } else if (prevScrollpos < (currentScrollPos - tolerance)) {
                        el.style.top = - (height) + "px";
                    }
                    prevScrollpos = currentScrollPos;
                }
            }
        }

        clearInterval(aplointerval);
    }
    
})

