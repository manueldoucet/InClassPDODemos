    <div class="icon-bar">
        <a href="allarticles.php" class="facebook"><i class="fab fa-sticker-mule"></i></a> 
        
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
    //exit();
   if (isset($_GET['id']) && (is_numeric($_GET['id']))   ){
            //FOR GET ONLY!!
            //good
            $id = $_GET['id'];
            //get specific articles based on id
         $q ="SELECT id, title, description FROM pages WHERE category_id = $id";
        }else{
     //       echo "<div class='alert alert-danger' role='alert'>
      //         this page has been accesed in error!<br>
      //         <a href='articles.php'>View all articles</a>
      //     </div>";
      //      echo "</div>";
       //     include './includes/footer.php';
      //      exit();
            $q = "select id, title,description FROM pages";
            
        }
        //echo $q;
        
        //2.
                  $stmt = $dbc->query($q);
                  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  //var_dump($articles);
                 // exit();
                 echo   "<div class='row'>";
                  foreach($articles as $row){
                     echo "<div class='col-md-2 col-lg-4  mb-4'>
                <div class'card h-100'>
            <h4 class='card-header'>Card Title</h4>
            <div class='card-body'>
              <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class='card-footer'>
              <a href='article.php?id={$row['id']}' class='btn btn-primary'>Read More</a>
            </div>
        </div>
      </div>";
                 
   }
                  
 echo "</div>";
    ?>

</div>