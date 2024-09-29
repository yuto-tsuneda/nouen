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
  
</div>

<?php get_footer(); ?>