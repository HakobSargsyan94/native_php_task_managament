$(document).ready(() => {
    (function () {
        $('.activeItem').show();
        $('.activeItem').prev().show();
        $('.activeItem').prev().prev().show();
        $('.activeItem').next().show();
        $('.activeItem').next().next().show();
    })();
});