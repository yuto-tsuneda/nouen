<footer>
  <div class="footer">
    <div class="footer__left">
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="サイトロゴ"></a>
      <p>〒123-4567<br>千葉県〇〇市××町1丁目23-45</p>
      <p>TEL:123-4567-8910 <br>FAX:12-345-6789</p>
    </div>
    <div class="footer__right">
      <div class="footer__right__nav">
        <ul>
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li>私たちについて</li>
          <li>活動紹介</li>
          <li>よくあるご質問</li>
          <li><a href="<?php echo esc_url(home_url('/information/')); ?>">お知らせ</a></li>
          <li>アクセス</li>
        </ul>
      </div>
      <div class="footer__right__sns">
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/x-icon.webp" alt="エックスアイコン"></a>
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta-icon.webp" alt="インスタアイコン"></a>
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-icon.webp" alt="ユーチューブアイコン"></a>
      </div>
    </div>
  </div>
  <p class="footer__copy">&copy; shizen-no-megumi-nouen Inc .2023</p>
</footer>



<?php wp_footer(); ?>
</body>
</html>