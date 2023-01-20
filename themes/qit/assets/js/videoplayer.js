const QIT_VideoPlayer = function () {
    $('.modal.bd-example-modal-lg').on('click', function () {
        $(this).find('iframe').attr("src", $(this).find('iframe').attr("src"));

    });
};

jQuery(document).ready(function () {
    QIT_VideoPlayer();
});
