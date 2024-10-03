jQuery(document).ready(function($) {
  $('.tab-link').click(function() {
    var tab_id = $(this).attr('data-tab');

    // すべてのタブリンクとコンテンツを非アクティブ化
    $('.tab-link').removeClass('active');
    $('.tab-content').removeClass('active');

    // クリックされたタブリンクと対応するコンテンツをアクティブ化
    $(this).addClass('active');
    $('#' + tab_id).addClass('active');
  });
});


