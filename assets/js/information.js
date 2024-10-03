jQuery(document).ready(function($) {
  let activeCategory = 'all'; // 初期は「すべて」のタブをアクティブに

  function loadPosts(category = 'all', page = 1) {
      $.ajax({
          url: ajaxurl, // WordPressのAjax URL（functions.phpで設定）
          type: 'POST',
          data: {
              action: 'load_posts', // WordPressのAjaxアクション
              category: category,
              page: page
          },
          success: function(response) {
              $('#post-container').html(response.posts); // 記事一覧を更新
              $('#pagination').html(response.pagination); // ページネーションを更新
          }
      });
  }

  // 初回読み込み（すべてのカテゴリー）
  loadPosts();

  // タブクリックイベント
  $('.tab-link').on('click', function() {
      activeCategory = $(this).data('category'); // クリックされたタブのカテゴリーを取得
      $('.tab-link').removeClass('active'); // すべてのタブからactiveクラスを削除
      $(this).addClass('active'); // クリックされたタブにactiveクラスを追加
      loadPosts(activeCategory, 1); // タブをクリックしたら1ページ目にリセット
  });

  // ページネーションクリックイベント
  $(document).on('click', '.pagination-link', function(e) {
      e.preventDefault(); // リンクのデフォルト動作を無効化
      const page = $(this).data('page'); // ページ番号を取得
      loadPosts(activeCategory, page); // アクティブなカテゴリーとページ番号を使用して記事を読み込む
  });
});
