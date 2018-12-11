<div class="icon-bar">
    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
</div>

<div class="container">
    <br>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="articles.php">Articles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Article</li>
  </ol>
</nav>
    <h1 class="my-4">articles</h1>
    <?php
    $current = "article";
    
    ?>

    
       <?php    
    //exit();
   if (isset($_GET['id']) && (is_numeric($_GET['id']))   ){
            //FOR GET ONLY!!
            //good
            $id = $_GET['id'];
            //get specific articles based on id(pk)
         $q ="SELECT id, title, description, content FROM pages WHERE id = $id";
         
         //echo $q;
         $stmt = $dbc->query($q);
         $article= $stmt->fetch(PDO::FETCH_ASSOC);
         //var_dump($article);
         
         echo "<h3 class='my-4'>{$article['title']}</h3>";
         echo "<p>{$article['description']}</p>";
         echo "<div>{$article['content']}</div>";
        }else{
            //show an alert
            
            echo "<div class='alert alert-danger' role='alert'>;
            This page has been accesed in error! <br>;
            view all <a href='articles.php'>Articles</a>
        </div>";
            
        }
        ?>
</div>   

