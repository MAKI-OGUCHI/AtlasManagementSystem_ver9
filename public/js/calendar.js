$(function () {
  $('.cancel_modal_open').on('click', function () {
    $('.modal').fadeIn();
    var day = $(this).attr('day');
    var part = $(this).attr('part');
    $('.modal-reserveDay').text(day);
    $('.modal-reservePart').text(part);
    return false;
    // $(function () {
    //   $(document).on('click', '.btn-danger', function () {
    //     e.preventDefault();
    //     $('.modal').fadeIn();
    //   });

    //   $(document).on('click', 'modal_bg', function () {
    //     $('.modal').fadeOut();
    //   });

    //   $(document).on('click', '.modal', function () {
    //     $('.modal').fadeOut();
    //   });

    //   $(document).on('click', function () {
    //     e.stopPropagation();
    //   });

  });
  $('.js_modal_close').on('click', function () {
    $('.modal').fadeOut();
    return false;
  })
});
