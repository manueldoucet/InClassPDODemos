    <div class="icon-bar">
        <a href="articles.php" class="facebook"><i class="fab fa-sticker-mule"></i></a> 
        
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
  
            $q = "select id, title,description FROM pages ORDER BY title";
                    
             //2.
                  $stmt = $dbc->query($q);
                  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  //var_dump($articles);
                 // exit();
                     //start the table
        echo '<table id="tablesorted" class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach($articles as $article){
                        $id = $article['id'];
                        $title = $article['title'];
                        $description = $article['description'];

                        //create a tr for each record
                        echo "<tr>
                                <th scope='row'>$title</th>
                                <td>$description</td>
                                <td><a href='article.php?id=$id'>Read Article</a>  
                                     <i class='fa fa-eye' aria-hidden='true'></i>
                                </td>
                             </tr>";
                    }//end of foreach
            
            //end the table
            echo '</tbody></table>';  
    ?>

</div>