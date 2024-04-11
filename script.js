document.addEventListener('DOMContentLoaded', function() {
    // Get references to the images
    var image1 = document.querySelector('.image-1');
    var image2 = document.querySelector('.image-2');
    var image3 = document.querySelector('.image-3');
    var image4 = document.querySelector('.image-4');

    // Add click event listeners to the images
    image1.addEventListener('click', function() {
        scrollToElement('concept-one');
    });

    image2.addEventListener('click', function() {
        scrollToElement('concept-two');
    });

    image3.addEventListener('click', function() {
        scrollToElement('concept-three');
    });

    image4.addEventListener('click', function() {
        scrollToElement('concept-four');
    });

    // Function to scroll to a specific element by ID
    function scrollToElement(id) {
        var element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
});
