jQuery(document).ready(function ($) {
    var autoSlideInterval = 5000; // Adjust the interval time in milliseconds
    var $heroSlider = $('.hero-slider');
    var currentIndex = 0;
    var autoSlide;

    function startAutoSlide() {
        autoSlide = setInterval(function () {
            showSlide(currentIndex);
            currentIndex = (currentIndex + 1) % $heroSlider.find('.hero-post').length;
        }, autoSlideInterval);
    }

    function stopAutoSlide() {
        clearInterval(autoSlide);
    }

    // Start auto-sliding
    startAutoSlide();

    // Pause auto-sliding on hover
    $heroSlider.hover(stopAutoSlide, startAutoSlide);

    // Example: Add a click event to the read-more button
    $('.read-more').on('click', function (event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Add your custom code here, such as opening a modal or navigating to the post page
        var postUrl = $(this).attr('href');
        console.log('Read more clicked! Post URL: ' + postUrl);
    });

    // Function to show a specific slide
    function showSlide(index) {
        $heroSlider.find('.hero-post').hide().eq(index).fadeIn();
    }
});
