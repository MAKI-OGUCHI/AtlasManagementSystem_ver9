$(function () {
  $('.search_conditions , .arrow').click(function () {
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
  });
});
$(function () {
  $('.search_conditions, .arrow').click(function () {
    $('.arrow').toggleClass('rotation');
  });
});
$(function () {
  $('.subject_edit_btn, .subject_arrow').click(function () {
    $('.subject_arrow').toggleClass('open');
  });
});
