<?php get_header('information'); ?>

<div class="bled">
  <?php if(function_exists('bcn_display'))
      {
        bcn_display();
      }?>
</div>
<div class="contentDate">
  <h2 class="contentDate__title"><?php the_title(); ?></h2>
  <span class="contentDate__time"><?php the_time('Y.m.d'); ?></span>
  <span class="contentDate__category"><?php my_custom_category_list(); ?></span>
</div>

<div class="content">
    <div class="content__img">
    <?php 
    if ( has_post_thumbnail() ) { // アイキャッチ画像が設定されているか確認
        the_post_thumbnail(); // デフォルトのサムネイルサイズで出力
    }
    ?>
    </div>
      <?php echo generate_toc_from_acf(); ?>

      <div class="content__top">
    <h2 id="toc-h2title1"><?php the_field('h2title1'); ?></h2>
    <p><?php the_field('h2txtArea1'); ?></p>
    <h3 id="toc-h3title1"><?php the_field('h3title'); ?></h3>
    <p><?php the_field('h3txtArea'); ?></p>
</div>

<div class="content__flex">
    <div class="content__flex__left">
        <h2 id="toc-h2title2"><?php the_field('h2title2'); ?></h2>
        <p><?php the_field('h2txtArea2'); ?></p>
    </div>
      <div class="content__flex__right">
      <?php 
$image = get_field('pic'); // ACFフィールド 'pic' から画像情報を取得
if( $image ) : ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
    </div>
    </div>
    <div class="goInformation">
      <a href="<?php echo esc_url(home_url('/information/'))?>">一覧に戻る</a>
    </div>
</div>

    

  <div class="contact">
  <h2>お問い合わせ</h2>
  <p>お仕事のご相談、農園体験、牧場の見学、その他ご質問<br>
  お気軽にお問い合わせください。</p>
  <a href="#">お問い合わせ</a>
  <p class="contact__bold">問い合わせ番号：<span>123-567-8901</span></p>
  <p class="contact__bold">【受付時間】10:00 ~ 18:00（土日祝を除く）</p>
</div>

<?php get_footer(); ?>