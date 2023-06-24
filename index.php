<?php
require('image_converter.php');

if ($_FILES) {
    $obj = new Image_converter();
    $upload = $obj->upload_image($_FILES, 'uploads', 'fileToUpload');
    if ($upload) {
        $imageName = urlencode($upload[0]);
        $imageType = urlencode($upload[1]);

        if ($imageType == 'jpeg') {
            $imageType = 'jpg';
        }
        header('Location: convert.php?imageName=' . $imageName . '&imageType=' . $imageType);
    }
}
?>
<html>

<head>
    <title>Image Converter</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Image Converter">
    <meta name="keywods" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script>
        function checkEmpty() {
            var img = document.getElementById('fileToUpload').value;
            if (img == '') {
                alert('Please upload an image');
                return false;
            }
            return true;
        }
    </script>
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
                        <table width="500" align="center">
                            <tr>
                                <td align="center">
                                    <h2 align="center">Image Uploader & Converter by Theonlytutorials.com</h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4>Convert Any image to JPG, PNG, GIF</h4>
                                </td>
                                </th>
                            <tr>
                                <td align="center">
                                    <form action="" enctype="multipart/form-data" method="post"
                                        onsubmit="return checkEmpty()" />
                                    <input type="file" name="fileToUpload" id="fileToUpload" />
                                    <input type="submit" value="Upload" />
                                    </form>
                                </td>
                            </tr>
                        </table>
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
                        <li><a href="index.php">Image Converter</a></li>
                        <li><a href="index.html">DOCX to PDF</a></li>

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