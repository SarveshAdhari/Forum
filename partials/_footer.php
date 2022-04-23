<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>csosa footer</title>
<!--
http://www.sitepoint.com/community/t/inline-elements-in-footer/201734
csosa
Sep 14,2015 6:10 PM
-->
    <style type="text/css">

html {
    font-family: sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}
body {
    padding:0;
    margin: 0;
}

.footer {
    position: relative;
    bottom:0;
    width:100%;
    background-color: #292b2c;
}

.footer p {
    color: #fff;
    font-size:.75em;
    display: inline-block;
}

.container {
    max-width: 1674px;  /* adjust to allow for padding as needed */
    padding:0 50px;
}

#ftr-wrap {
    display:table;
    table-layout:fixed;
    width:100%;
    margin:0 auto;
}
#ftr-wrap > div {
    display:table-cell;
    vertical-align:middle;  /* TEST Outline.  TO BE DELETED. */
}
#ftr-wrap > div:nth-child(1) {text-align:left;}
#ftr-wrap > div:nth-child(2) {text-align:center;}
#ftr-wrap > div:nth-child(3) {text-align:right;}

.ftr-links ul {
    padding: 0;
}
.ftr-links ul li {
    display: inline-block;
    padding-right: 15px;
    font-size:.75em;
}
.ftr-links ul li a {
    color: #fff;
    margin: 0;
}

    </style>
</head>
<body>

    <footer class="footer">
        <div class="container">
            <div id="ftr-wrap">
                <div class="ftr-links">
                    <ul>
                        <li><a href="#">Terms</a></li>     
                        <li><a href="#">Privacy Policy</a></li>     
                        <li><a href="#">Sitemap</a></li>     
                    </ul>
                </div>
                <div class="copyright-amazon">
                    <p class="copyright">&copy; Copyright Forum23 2021 | Lonavala, MH INDIA</p>
                </div>
                <div>
                </div>     
            </div>
        </div>
    </footer>

</body>
</html>