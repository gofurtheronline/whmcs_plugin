<?php if (isset($_GET['style'])) {
    include(dirname(__DIR__) . '/templates/' . htmlspecialchars($_GET['style']) . '/templates/index.php');
} else {
    include(dirname(__DIR__) . '/templates/default/templates/index.php');
}
