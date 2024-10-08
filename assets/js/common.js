jQuery(document).ready(function($) {
    $('.header__sp--humberger').click(function() {
      // navSpの表示切り替え
      $('.navSp').toggleClass('active');
  
      // ハンバーガーメニューのアニメーション
      $(this).toggleClass('open');
  
      // メニューのテキストを切り替え
      if ($(this).hasClass('open')) {
        $(this).find('span:nth-of-type(3)').text('CLOSE').css('opacity', 1); // 表示
      } else {
        $(this).find('span:nth-of-type(3)').text('MENU').css('opacity', 1);  // 表示
      }
    });
  });