jQuery(document).ready(function($) {
  let activeCategory = 'all'; // 初期は「すべて」のタブをアクティブに

  function loadPosts(category = 'all', page = 1) {
      console.log("Loading posts for category: " + category + " at page: " + page); // デバッグ用ログ
      $.ajax({
          url: ajaxurl, 
          type: 'POST',
          data: {
              action: 'load_posts',
              category: category,
              page: page
          },
          success: function(response) {
              console.log(response); // レスポンスデータをログで確認
              $('#post-container').html(response.posts); 
              $('#pagination').html(response.pagination); 

              // ページネーションクリックイベントを再バインド
              bindPaginationLinks(); 
          },
          error: function(xhr, status, error) {
              console.log("Error: " + error); 
          }
      });
  }

  // ページネーションリンクにクリックイベントをバインドする関数
  function bindPaginationLinks() {
      $('.pagination-link').off('click').on('click', function(e) {
          e.preventDefault(); // リンクのデフォルト動作を無効化
          const page = $(this).data('page');
          console.log("Pagination clicked: " + page); // デバッグ用ログ
          loadPosts(activeCategory, page);
      });

      // 戻るボタンのクリックイベント
      $('.pagination-prev').off('click').on('click', function(e) {
          e.preventDefault();
          const page = $(this).data('page');
          console.log("Previous page clicked: " + page); // デバッグ用ログ
          loadPosts(activeCategory, page);
      });

      // 次ボタンのクリックイベント
      $('.pagination-next').off('click').on('click', function(e) {
          e.preventDefault();
          const page = $(this).data('page');
          console.log("Next page clicked: " + page); // デバッグ用ログ
          loadPosts(activeCategory, page);
      });
  }

  // 初回読み込み
  loadPosts();

  // タブクリックイベント
  $('.tab-link').on('click', function() {
      console.log("Tab clicked: " + $(this).data('category')); // デバッグ用ログ
      activeCategory = $(this).data('category');
      $('.tab-link').removeClass('active');
      $(this).addClass('active');
      loadPosts(activeCategory, 1); // タブをクリックしたら1ページ目にリセット
  });
});
