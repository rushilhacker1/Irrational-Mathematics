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

        <script type="text/javascript">
	atOptions = {
		'key' : 'f1c5fba56ee3583a745700cd70a0c29a',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="//www.highcpmcreativeformat.com/f1c5fba56ee3583a745700cd70a0c29a/invoke.js"></scr' + 'ipt>');
</script>

    <footer>
        &copy; 2023 Irrational Mathematics
    </footer>

    <!-- JavaScript to handle constant value display -->
    <script src="index.js"></script>
</body>
</html>
