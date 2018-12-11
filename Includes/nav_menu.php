   
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">   
        <li class="nav-item <?php
        if ($current == 'home') {
            echo ' active';
        }
        ?>" >
            <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home</a></li>

        <li class="nav-item <?php
        if ($current == 'about') {
            echo ' active';
        }
        ?>">
            <a class="nav-link" href="about.php"><i class="fas fa-question-circle"></i>About</a>
        </li>

        <li class="nav-item  <?php
        if ($current == 'contact') {
            echo ' active';
        }
        ?>">
            <a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i>Contact</a>
        </li>

        <li class="nav-item dropdown <?php
        if ($current == 'article') {
            echo ' active';
        }
        ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownArticles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-newspaper"></i>
                Articles</a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="articles.php">All articles</a>
                <div class="dropdown-divider"></div>



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

                foreach ($category_list as $row) {
                    echo "<a class='dropdown-item' href='articles.php?id={$row['id']}'> <span class='badge badge-pill badge-primary'>{$row['total']}</span>{$row['category']}</a>";
                }
                ?>
                <!--     <a class="dropdown-item" href="articles.php">All articles</a>
                     <a class="dropdown-item" href="portfolio-2-col.html">Common attacks</a>
                     <a class="dropdown-item" href="portfolio-3-col.html">General web security</a> -->
            </div>
        </li>
        <!-- account menu -->
        <li class="nav-item dropdown  <?php if ($current == 'account') echo 'active' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i>
                Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (!empty($_SESSION['user_id'])) {
                    //registered user 
                    ?>
                    <a class="dropdown-item" href="#"><i class="fas fa-registered"></i>My Account</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <?php
                    } else {
                    ?>

                    <a class="dropdown-item" href="#"><i class="fas fa-registered"></i>Register</a>
                    <a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
                   <?php
                    }
                    ?>
            </div>
        </li>
    </ul>
