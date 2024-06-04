<?php
// Get the current URL
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Parse the URL to get the scheme, host, and port
$parsed_url = parse_url($current_url);

// Construct the base URL
$base_url = $parsed_url['scheme'] . "://" . $parsed_url['host'];
if (isset($parsed_url['port'])) {
    $base_url .= ":" . $parsed_url['port'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinity LAMP STACK</title>
    <!-- <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/svg+xml"> -->
    <link rel="stylesheet" href="./assets/css/bulma.min.css">
</head>

<body>
    <section class="hero is-medium is-info is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    DOCKER LAMP STACK
                </h1>
                <h2 class="subtitle">
                    Your local development environment
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h3 class="title is-3 has-text-centered">Environment</h3>
                    <hr>
                    <div class="content">
                        <ul>
                            <li><?= apache_get_version(); ?></li>
                            <li>PHP <?= phpversion(); ?></li>
                            <li>
                                <?php
                                $link = mysqli_connect("localhost", "root", "", null);

                                /* check connection */
                                if (mysqli_connect_errno()) {
                                    printf("MySQL connecttion failed: %s", mysqli_connect_error());
                                } else {
                                    /* print server version */
                                    printf("MySQL Server %s", mysqli_get_server_info($link));
                                }
                                /* close connection */
                                mysqli_close($link);
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <h3 class="title is-3 has-text-centered">Quick Links</h3>
                    <hr>
                    <div class="content">
                        <ul>
                            <li><a href="./phpinfo.php" target="_blank">phpinfo()</a></li>
                            <li><a href="<?php echo $base_url; ?>/phpmyadmin" target="_blank">phpMyAdmin</a></li>
                            <li><a href="./test_db.php" target="_blank">Test DB Connection with mysqli</a></li>
                            <li><a href="./test_ssh2.php" target="_blank">Test SS2 PHP Extension</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <p>Infi - LAMP - Docker</p>
                <strong><a href="https://infinitysystems.in" target="_blank">Infinity Systems</a></strong><br>
            </p>
        </div>
    </footer>
</body>

</html>