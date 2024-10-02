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

jQuery(document).ready(function($) {
  $('.image-track').slick({
      slidesToShow: 3.5,       // 表示する画像の数
      slidesToScroll: 1,     // スクロールする画像の数
      infinite: true,        // ループさせる
      autoplay: true,        // 自動でスライド
      autoplaySpeed: 2000,   // スライド間隔 (ミリ秒)
      speed: 1000,
      arrows: false,          // 次へ・前へボタンを表示
      dots: false,            // ナビゲーションのドットを表示
  });
});

jQuery(document).ready(function($) {
  $('.toggle').on('click', function() {
    var $answer = $(this).closest('.accordion').find('.answer');
    $answer.slideToggle();

    // ボタンの状態をアニメーションで切り替え
    $(this).toggleClass('open');

    // アイコンのテキストを "+" と "-" に切り替え
    var $icon = $(this).find('.icon');
    $icon.text($icon.text() === '+' ? '-' : '+');
  });
});