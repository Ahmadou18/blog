
<?php
$entries = array_diff (scandir("articles", SCANDIR_SORT_DESCENDING), array(".", ".."));
$myarticle = array_search($_GET['page'], $entries);
$beforePosition = $myarticle - 1;
$afterPosition = $myarticle + 1;
$before = $entries[$beforePosition];
$after = $entries[$afterPosition];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>Blog</title>
</head>
<body>

  <main class="img">
    <header class="head">
      <nav>
        <ul class="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
    <section class="container">
      <aside class="post">
        <ol>

          <?php

          foreach ($entries as $entry)
          {
            if ($entry != ".." && $entry != ".")
            {
              $rest = pathinfo($entry);



              echo '<li><a href="index.php?page=' . $entry .'">' . $rest['filename'] . '</a></li>';
            }
          }
          ?>



        </ol>
      </aside>
      <article class="index">

        <?php include ('articles/') . $_GET["page"]; ?>
        <?php echo "<a href='index.php?page=$before'
        >Précèdent</a>";
        
        ?>
        <?php echo "<a href='index.php?page=$after'
        >Suivant</a>" ?>



      </article>
    </section>
  </main>
  <?php

  $articles_dir = "articles";
  $show_article = false;

  if (isset($_GET['wanted']))
  {
    $article_path = "$articles_dir/" . $_GET["wanted"] . ".php";
    if (
      dirname(
        realpath($article_path)
        ) == (
          realpath("./$articles_dir")
          )
          )
          {
            $show_article = true;
            include($article_path);

          }
        }
        ?>
      </body>
      </html>
