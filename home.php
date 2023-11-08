<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Your head section content here -->
    <link rel="stylesheet" href="styles.css">
    <title>
        Home
    </title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="About_us.php">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="Contact.php">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="support_us.php">
                        Support Us
                    </a>
                </li>
            </ul>
        </nav>
    </header>

<aside class="adds">

<script async="async" data-cfasync="false" src="//pl21028615.toprevenuegate.com/09a41e95dc5be81b117d7004290f8f9c/invoke.js"></script>
<div id="container-09a41e95dc5be81b117d7004290f8f9c"></div>

</aside>
        <!-- This is where the numerical value will be displayed -->

        
<div id="constantValue">
    <h3>
        Numerical Value:--
    </h3>
    <p id="constant">

    </p>
</div>
    <aside id="list">
            <h3>
                Constant Navigation
            </h3>
            <ul class="list">
                <?php
                // Include the PHP script to fetch constants
                include('get_constants.php');

                // Loop through the constants and generate links with data attributes
                foreach ($constants as $constant) {
                    echo '<li>
                    <a href="#" class="lst">' . $constant["name"] . ' (' . $constant["symbol"] . ')
                    </a>
                    </li>';
                }
                ?>
            </ul>

            </aside>

    <footer>
        &copy; 2023 Irrational Mathematics
    </footer>

    <!-- JavaScript to handle constant value display -->
    <script src="index.js"></script>
</body>
</html>
