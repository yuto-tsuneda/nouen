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
    // 現在開いているアコーディオン以外を閉じる
    $('.accordion .answer').not($(this).closest('.accordion').find('.answer')).slideUp();
    $('.accordion .toggle').not($(this)).removeClass('open');
    $('.accordion .icon').not($(this).find('.icon')).text('+');

    // クリックされたアコーディオンの開閉処理
    var $answer = $(this).closest('.accordion').find('.answer');
    $answer.slideToggle();

    // ボタンの状態をアニメーションで切り替え
    $(this).toggleClass('open');

    // アイコンのテキストを "+" と "-" に切り替え
    var $icon = $(this).find('.icon');
    $icon.text($icon.text() === '+' ? '-' : '+');
  });
});

jQuery(document).ready(function($) {
  function checkVisibility() {
      $('.about__fadeIn').each(function() {
          var elementTop = $(this).offset().top;
          var windowBottom = $(window).scrollTop() + $(window).height();

          if (windowBottom > elementTop) {
              $(this).addClass('show');
          }
      });
  }

  // スクロールイベントで関数を呼び出す
  $(window).on('scroll', function() {
      checkVisibility();
  });

  // ページ読み込み時にもチェック
  checkVisibility();
});

jQuery(document).ready(function($) {
  var $news = $('.top__inner__news');
  var initialRight = parseInt($news.css('right')); // 初期のrightの値を取得

  // スクロールイベントを監視
  $(window).on('scroll', function() {
    var windowTop = $(window).scrollTop(); // スクロール位置
    var windowBottom = windowTop + $(window).height(); // 表示領域の下端

    var elementTop = $news.offset().top; // 要素の上端
    var elementBottom = elementTop + $news.outerHeight(); // 要素の下端

    // 要素が一部画面外に出た場合
    if (elementTop < windowTop || elementBottom > windowBottom) {
      // 右にフェードアウト (rightの値をさらに大きくして移動)
      $news.stop().animate({
        opacity: 0,
        right: initialRight + 100 // 100px 右に移動
      }, 500);
    } else {
      // 右からフェードイン (元の位置に戻す)
      $news.stop().animate({
        opacity: 1,
        right: initialRight // 初期のrightに戻す
      }, 500);
    }
  });
});