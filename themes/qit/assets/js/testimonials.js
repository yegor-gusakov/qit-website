const ModalClick = function () {
    $('.section__reviews-row-with-modal').on('click', function () {
        var modalId = $(this).attr('data-bs-target');
        $(modalId).modal('show');
    });
    $('.section__video .section__video-row').on('click', function () {
        var modalId = $(this).attr('data-bs-target');
        $(modalId).modal('show');
    });
};

jQuery(document).ready(function () {
    ModalClick();
});