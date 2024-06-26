document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: 'textarea',  // Your textarea selector
        plugins: 'bold italic underline lists link',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link',
    });
});
