<!doctype html>
<html lang="<?php echo getenv('APP_LANG'); ?>">
    <head prefix="<?php echo $microdata->namespace; ?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, shrink-to-fit=no">
        <meta name="format-detection" content="telephone=no" />
        <meta name="format-detection" content="address=no" />
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="360" />
        <meta name="revisit-after" content="7 days">
        
        <base href="<?php echo getenv('APP_URL'); ?>" />
        
        <title><?php echo $microdata->title; ?></title>
        <meta name="description" content="<?php echo $microdata->description; ?>"> 

        <!--
        <link rel="manifest" href="manifest.webmanifest" />
        <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.6/pwacompat.min.js"
            integrity="sha384-GOaSLecPIMCJksN83HLuYf9FToOiQ2Df0+0ntv7ey8zjUHESXhthwvq9hXAZTifA"
            crossorigin="anonymous"></script>
        <link rel="icon" sizes="48x48" href="/assets/images/icons/icon-48.png">
        <meta name="msapplication-square310x310logo" content="assets/images/icons/icon-192.png">
        <meta name="theme-color" content="#000000">
        
        <link rel="apple-touch-startup-image" href="assets/images/icons/icon-192.png">
        <link rel="apple-touch-icon" href="/assets/images/icons/icon-192.png">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="Il Moro">
        -->

<?php
    foreach ($microdata->getOpenGraph() as $key => $value) { 
        if (is_array($value)) {
            foreach($value as $k => $v) {
                echo "\t\t<meta property=\"$k\" content=\"$v\" />\n";
            }
        } else {
            echo "\t\t<meta property=\"$key\" content=\"$value\" />\n";
        }
    }
?>

        <script type="application/ld+json"><?php echo $microdata->getJSONLDtoJSON(); ?></script>

    </head>
    <body>
        <noscript></noscript>
        <div id="app-root"></div>
        <?php
            if (getenv('APP_ENV') !== 'production') {
                echo "<script src=\"js/app.js\" async defer></script>\n";
            } else {
                echo "<script>";
                require 'js/app.js';
                echo "</script>";
            }
        ?>
    </body>
</html>
