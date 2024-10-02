<?php get_header('main'); ?>

<div class="about">
  <div class="about__topPic">
    <div class="about__topPic__left"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image01.webp" alt="やぎ"></div>
    <div class="about__topPic__mid"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="サイトロゴ"></div>
    <div class="about__topPic__bottom"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image02.webp" alt="トマト"></div>
  </div>
  <div class="about__topDescription">
    <p>自然の恵み農園は、<br>
      自然の恵みと動物の尊さが調和する特別な場所です。<br>
      新鮮で美味しい農産物を栽培し、心温まる動物たちと触れ合える場所でもあります。<br>
    </p>
    <p>
      自然の恵みを受け、動物たちとの特別なひとときを楽しんでいただける場所として、<br>
      私たちは誇りを持って活動をしています。<br>
      一緒に自然と動物の美しさを共有しましょう。<br>
    </p>
  </div>
  <div class="about__bottomPic">
    <div class="about__bottomPic__left"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image03.webp" alt="農家"></div>
    <div class="about__bottomPic__right"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image04.webp" alt="牛"></div>
  </div>
</div>

<div class="project">
  <div class="project__title">
    <h2>活動紹介</h2>
  </div>
  <div class="tab-container">
    <ul class="tabs">
      <li class="tab-link active" data-tab="tab-1">農園</li>
      <li class="tab-link" data-tab="tab-2">牧場</li>
      <li class="tab-link" data-tab="tab-3">オンライン販売</li>
    </ul>

    <div id="tab-1" class="tab-content active">
      <p>
        私たちは、「持続可能な農業」を掲げて、自然の恵みに感謝しながら、農作物を育てています。<br>
        無農薬で、体にも環境にも優しく、季節ごとに異なる品種を育て、提供しています。<br>
        ぜひ一度、農園にお越し頂き、自分の手で収穫した新鮮な野菜、果物をお召し上がりください。<br>
      </p>
      <div class="image-track">
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-nouen01.webp" alt="Image 1"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-nouen02.webp" alt="Image 2"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-nouen03.webp" alt="Image 3"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-nouen04.webp" alt="Image 4"></div>
      </div>
    </div>
    <div id="tab-2" class="tab-content">
      <p>私たちの牧場は、自然と動物との共存を尊重し、持続可能な農業の原則に基づいて運営されています。<br>
        広々とした環境で、動物たちとのふれ合いを通じて、自然の恵みと動物の尊さを感じ、<br>
        心温まるひとときを過ごしていただけます。<br>
      </p>
      <div class="image-track">
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-bokujo01.webp" alt="Image 1"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-bokujo02.webp" alt="Image 2"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-bokujo03.webp" alt="Image 3"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-bokujo04.webp" alt="Image 4"></div>
      </div>
    </div>
    <div id="tab-3" class="tab-content">
      <p>自然の恵み農園から直接お届けする、新鮮で美味しい農産物と<br>
        手作りのジャムやバターなどの加工品を提供しています。<br>
        自然の恩恵をご自宅でお楽しみいただけます。<br>
      </p>
      <div class="image-track">
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-ec01.webp" alt="Image 1"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-ec02.webp" alt="Image 2"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-ec03.webp" alt="Image 3"></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-ec04.webp" alt="Image 4"></div>
      </div>
    </div>
  </div>
</div>

<div class="question">
  <div class="question__title">
    <h2>よくあるご質問</h2>
  </div>

  <div class="accordion">
  <div class="questionTitle">
    <h3><span class="questionTitle__q">Q</span>農園の野菜や果物は有機栽培ですか？</h3>
    <button class="toggle"><span class="icon">+</span></button>
  </div>
  <div class="answer" style="display: none;">
    <span class="answer__a">A</span>
    <p>はい、私たちの農園では有機栽培の原則に従って野菜と果物を栽培しています。<br>
    化学肥料や農薬を極力使用せず、土壌と作物の健康を第一に考えております。</p>
  </div>
  </div>

<div class="accordion">
  <div class="questionTitle">
    <h3><span class="questionTitle__q">Q</span>農園での見学や体験ツアーは行っていますか？</h3>
    <button class="toggle"><span class="icon">+</span></button>
  </div>
  <div class="answer" style="display: none;">
    <span class="answer__a">A</span>
    <p>はい、農園での見学や体験ツアーを随時開催しています。<br>
    農場の日常や農作業を親しみやすく説明し、実際に農園での体験を楽しむことができます。</p>
  </div>
</div>

<div class="accordion">
  <div class="questionTitle">
    <h3><span class="questionTitle__q">Q</span>オンラインで注文した農産物はどのように配送されますか？</h3>
    <button class="toggle"><span class="icon">+</span></button>
  </div>
  <div class="answer" style="display: none;">
    <span class="answer__a">A</span>
    <p>オンラインで注文いただいた農産物は、専用の梱包で新鮮さを保ったまま、<br>
    指定された配送先にお届けします。</p>
  </div>
</div>

  <div class="accordion">
  <div class="questionTitle">
    <h3><span class="questionTitle__q">Q</span>農園で提供される季節ごとの野菜や果物の品種は何ですか？</h3>
    <button class="toggle"><span class="icon">+</span></button>
  </div>
  <div class="answer" style="display: none;">
    <span class="answer__a">A</span>
    <p>春にはイチゴ、夏にはトマトや茄子、秋にはカボチャやリンゴ、冬にはブロッコリーやみかん など、季節に応じた野菜、果物を提供、収穫体験することができます。</p>
  </div>
</div>
</div>


<div class="notice">
  <div class="notice__left">
    <h2>お知らせ</h2>
    <p>季節の農作物のお知らせ、見学ツアーのご案内、<br>
    オンライン販売セールのお知らせなど、自然の恵み農園の最新情報をお届けします。</p>
    <a href="#">View more</a>
  </div>
  <div class="notice__right">
    <?php echo display_recent_posts_with_limit(3); ?>
  </div>
</div>

<div class="access">
  <h2>アクセス</h2>
  <div class="access__information">
    <table>
      <tr>
        <th>会社名</th>
        <td>株式会社自然の恵み農園</td>
      </tr>
      <tr>
        <th>所在地</th>
        <td>〒123-4567 千葉県〇〇市××町1丁目23-45</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>012-3456-7890</td>
      </tr>
      <tr>
        <th>営業時間</th>
        <td>10:00〜18:00（土日祝を除く）</td>
      </tr>
    </table>
    <div class="access__map">
      <table>
        <tr>
          <th>Googleマップ<br>
            <a href="https://maps.app.goo.gl/CHDnqUDc3iJEF3YY8">地図を拡大表示</a>
          </th>
          <td><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6475.37385677559!2d140.060151!3d35.758499!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60227fc8bf976e9f%3A0x90dbab8929ab17d!2z5Zm05rC0!5e0!3m2!1sja!2sjp!4v1727875919029!5m2!1sja!2sjp" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
        </tr>
      </table>
    </div>
  </div>
</div>


<?php get_footer(); ?>