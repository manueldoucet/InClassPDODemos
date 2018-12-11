   <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">   
<li class="nav-item">
              <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home</a>
              </li>
     <li class="nav-item">
              <a class="nav-link" href="about.php"><i class="fas fa-question-circle"></i>About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i>Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownArticles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Articles
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                   <a class="dropdown-item" href="articles.php">All articles</a>
                  <?php
                  //1. build the query
                  $q = "SELECT id, category,Summary.total 
                       FROM categories JOIN (SELECT COUNT(*) AS total, 
                                      category_id
                                      FROM pages
                                      GROUP BY category_id) AS Summary
                       WHERE categories.id = Summary.category_id
                      ORDER BY category";
                  
     //2. Execute the query (remember, we are using PDO, not MYSQLI)
                  $stmt = $dbc->query($q);
                  $category_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  //var_dump($category_list);
                  //exit();
                  
                  foreach($category_list as $row){
                      echo "<a class='dropdown-item' href='articles.php?id={$row['id']}'> <span class='badge badge-pill badge-primary'>{$row['total']}</span>{$row['category']}</a>";
                  }
                  

                  ?>
           <!--     <a class="dropdown-item" href="articles.php">All articles</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Common attacks</a>
                <a class="dropdown-item" href="portfolio-3-col.html">General web security</a> -->
              </div>
            </li>          
          </ul>
