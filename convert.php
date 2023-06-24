<?php

require('image_converter.php');

$imageType = '';
$download = false;

if ($_GET) {
    $imageType = urldecode($_GET['imageType']);
    $imageName = urldecode($_GET['imageName']);
} else {
    header('Location:index.php');
}

if ($_POST) {

    $convert_type = $_POST['convert_type'];

    $obj = new Image_converter();
    $target_dir = 'uploads';
    $image = $obj->convert_image($convert_type, $target_dir, $imageName);
    if ($image) {
        $download = true;
    }
}
$types = array(
    'png' => 'PNG',
    'jpg' => 'JPG',
    'gif' => 'GIF',
);
?>
<html>

<head>
    <title>Image Converter</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Image Converter">
    <meta name="keywods" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <a href="index.html" class="logo">
                        <strong>
                            Image Converter
                        </strong>
                    </a>
                </header>
                <section id="banner">
                    <div class="content">
                        <?php if (!$download) { ?>
                            <form method="post" action="">
                                <table width="500" align="center">
                                    <tr>
                                        <td align="center">
                                            File Uploaded, Select below option to convert!
                                            <img src="uploads/<?= $imageName; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            Convert To:
                                            <select name="convert_type">
                                                <?php foreach ($types as $key => $type) { ?>
                                                    <?php if ($key != $imageType) { ?>
                                                        <option value="<?= $key; ?>"><?= $type; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <br /><br />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="submit" value="convert" /></td>
                                    </tr>
                                </table>
                            </form>
                        <?php } ?>
                        <?php if ($download) { ?>
                            <table width="500" align="center">
                                <tr>
                                    <td align="center">
                                        Image Converted to
                                        <?php echo ucwords($convert_type); ?>
                                        <img src="<?= $target_dir . '/' . $image; ?>" />
                                    </td>
                                </tr>
                                <td align="center">

                                    <a href="download.php?filepath=<?php echo $target_dir . '/' . $image; ?>" />Download
                                    Converted Image</a>
                                </td>
                                </tr>
                                <tr>
                                    <td align="center"><a href="index.php">Convert Another</a></td>
                                </tr>
                            </table>
                        <?php } ?>
                    </div>
                </section>

            </div>
        </div>
        <div id="sidebar">
            <div class="inner">
                <section id="search" class="alt">
                    <h1> Image Tools </h1>
                </section>
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html">PNG to JPG</a></li>
                        <li><a href="index.html">JPG to PNG</a></li>

                    </ul>
                </nav>
                <footer id="footer">
                    <p class="copyright">&copy; Thank you for using This Website</p>
                </footer>

            </div>
        </div>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>