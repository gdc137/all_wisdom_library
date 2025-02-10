/*!
=========================================================
* HappyToHelp Landing page
=========================================================

* Copyright: 2019 HappyToHelp (https://HappyToHelp.com)
* Licensed: (https://HappyToHelp.com/licenses)
* Coded by www.HappyToHelp.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
});
