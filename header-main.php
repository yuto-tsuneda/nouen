<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
  <title>自然の恵み農園｜自然の恵みを感じ、豊かな未来をつくる</title>
  <meta name="description" content="自然の恵み農園は、農園運営・牧場運営・オンライン販売を通じて、豊かな未来を想像して頂ける取り組みを行なっています。">
  <meta propety="ogp:title" content="自然の恵み農園｜自然の恵みを感じ、豊かな未来をつくる">
  <meta propety="og:type" content="website">
  <meta propety="og:url" content="">
  <meta propety="og:image" content="<?php echo get_template_directory_uri()?>/assets/images/ogp-image.png">
  <meta propety="og:description" content="自然の恵み農園は、農園運営・牧場運営・オンライン販売を通じて、豊かな未来を想像して頂ける取り組みを行なっています。">
  <meta propety="og:site_name" content="自然の恵み農園">
  <?php wp_head(); ?>
</head>
<body>
  <div class="top">
    <div class="pcHeader">
    <h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="サイトロゴ"></a></h1>
      <ul>
        <li><a href="#">私たちについて</a></li>
        <li><a href="#">活動紹介</a></li>
        <li><a href="#">よくあるご質問</a></li>
        <li><a href="<?php echo esc_url(home_url('/information/')); ?>">お知らせ</a></li>
        <li><a href="#">アクセス</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
      </ul>
    </div>

    <div class="header__sp">
      <div class="header__sp--menu">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo.webp" alt="ホームページロゴ"></a>
        <button class="header__sp--humberger">
          <span></span>
          <span></span>
          <span>MENU</span>
        </button>
      </div>
    </div>
    
    <div class="navSp">
      <div class="navSp__list">
        <ul>
          <li><a href="<?php echo home_url(); ?>">トップ<span>TOP</span></a></li>
          <li><a href="#">私たちについて<span>ABOUT</span></a></li>
          <li><a href="#">活動紹介<span>WORKS</span></a></li>
          <li><a href="#">よくあるご質問<span>FAQ</span></a></li>
          <li><a href="<?php echo esc_url('/information/'); ?>">お知らせ<span>NEWS</span></a></li>
          <li><a href="#">アクセス<span>ACCESS</span></a></li>
        </ul>
      </div>
      <div class="navSp__contact">
      <p class="navSp__contact__tel">問い合わせ番号</p>
      <p class="navSp__contact__number">123-567-8901</p>
      <p class="navSp__contact__ok">【受付時間】</p>
      <p class="navSp__contact__time">10:00 ~ 18:00（土日祝を除く）</p>
      <a href="#">お問い合わせ</a>
      </div>
    </div>


    <div class="top__inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-2.webp" alt="サイトロゴ">
      <h2 class="top__inner__subtitle">自然の恵みを感じ、<br class="top__inner__sp">豊かな未来を。</h2>
      <div class="top__inner__news">
        <h2>NEWS</h2>
        <?php display_latest_posts(); ?>
      </div>
      <div class="top__inner__scroll" id="scroll">
        <a href="#">Scroll</a>
      </div>
    </div>
  </div>