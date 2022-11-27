document.addEventListener("DOMContentLoaded", function(event) {
    // if (window.jQuery && window.Alpine) {
    //     $('#trumbowyg').trumbowyg();
    //
    //     $('#trumbowyg').on('tbwchange', function(e) {
    //         console.log(e.target.value);
    //     });
    // } else {
    //     if (!window.jQuery) {
    //         console.error('jQuery is not loaded');
    //     }
    //
    //     if (!window.Alpine) {
    //         console.error('Alpine is not loaded');
    //     }
    // }
});
// document loaded vanilla js

document.addEventListener('alpine:init', () => {
    Alpine.data('trumbowyg', () => ({
        content: 'ssdsdds',
    }))
})
