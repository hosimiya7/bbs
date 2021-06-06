<?php
require_once("Tweet.php");
require_once("Request.php");

$request = new Request;
$name = $request->getPostedValue('name');
$content = $request->getPostedValue('content');
// ここまで入力内容

$tweet = new Tweet;
$tweet->create($name, $content);
$records = $tweet->getRecords();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bbs</title>
  <link rel="stylesheet" href="stylesns-common.css">
  <link rel="stylesheet" href="stylesns-sp.css" media="screen and (max-width:480px)">
  <link rel="stylesheet" href="stylesns-tb.css" media="screen and (min-width:480px) and (max-width:960px)">
  <link rel="stylesheet" href="stylesns-pc.css" media="screen and (min-width:960px)">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
</head>

<body>
  <header>
    <img src="sns.img/sns-header.jpg" alt="" class="header-img">
  </header>
  <main>
    <div class="input-form form-text">
      <h1>welcome</h1>
      <form action="bbs.php" method="post">
        <div class="text-wrapper">
          <p>name:</p>
          <input type="text" name="name" required>
        </div>
        <div class="textarea-wrapper">
          <p>content:</p>
          <textarea name="content" id="" cols="40" rows="10" required></textarea>
        </div>
        <div class="btn">
          <!-- <input type="submit" value="送信"> -->
          <button type="submit" class="clear-decoration button-decoration">送信</button>
        </div>
      </form>
    </div>
    <div id="timeline">
      <div class="output">
        <?php foreach ($records as $key => $value) : ?>
          <div id="tweet_<?php echo $value['id'] ?>" class="tweet <?php if (!is_null($value['parent_id'])) : ?>reply<?php endif; ?>">
            <p class="output-name"> <?php echo htmlspecialchars($value['name']); ?> </p>
            <p class="output-content"> <?php echo nl2br(htmlspecialchars($value['content'])); ?> </p>
            <div class="flex-center">
              <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                <button type="submit" class="clear-decoration button-decoration">削除</button>
              </form>
              <div class="form-reply">
                <form action="reply.php" method="get">
                  <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                  <button type="submit" class="clear-decoration button-decoration">返信</button>
                </form>
              </div>
            </div>
            <div class="good-button-wrapper flex-center">

              <button type="button" data-id="<?php echo $value['id'] ?>" class="clear-decoration good-button"><i class="fas fa-heart fa-2x"></i></button>

              <span class="good-count" data-id="<?php echo $value['id'] ?>"> <?php echo $value['favorites_count']; ?></span>
            </div>
            <p> <?php echo $value['created_at'] ?> </p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <footer>
    <div id="page_top"><a href="#"></a></div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="sns.js"></script>
  <script>
    jQuery(function() {
      var pagetop = $('#page_top');
      pagetop.hide();
      $(window).on("scroll", () => {
        if ($(this).scrollTop() > 100) { //100pxスクロールしたら表示
          pagetop.fadeIn();
        } else {
          pagetop.fadeOut();
        }
      });
      pagetop.on("click", () => {
        $('body,html').animate({
          scrollTop: 0
        }, 500); //0.5秒かけてトップへ移動
        return false;
      });
    });
  </script>
  <script>
    $(window).on("resize", () => {
      var w = $(window).innerWidth()
      if (w <= 284) {
        console.log(w)
        window.resizeTo(284, $(window).innerHeight())
      }
    })
  </script>
</body>

</html>