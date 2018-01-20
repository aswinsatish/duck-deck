<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dynamic Deck</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/layout.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico">

</head>
<body class="joys-home-page">

<!-- Container Fluid -->
<div class="container-fluid">
    <div class="row">

        <!-- header -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="main-head-wrapper">
                        <div class="navbar-menu"><!-- navbar-menu -->
                            <a href="javaScript:void(0)" class="nav-toggle"></a>
                            <ul class="deck-tabs">
                                <li><a href="javaScript:void(0);" class="nav-deck active" data-tab="#tab-deck"></a></li>
                                <li><a href="javaScript:void(0);" class="nav-attach" data-tab="#tab-attach"></a></li>
                                <li><a href="javaScript:void(0);" class="nav-insights" data-tab="#tab-insights"></a></li>
                                <li><a href="javaScript:void(0);" class="nav-updates" data-tab="#tab-updates"></a></li>
                                <li><a href="javaScript:void(0);" class="nav-print"></a></li>
                            </ul>
                        </div><!-- navbar-menu -->
                        <figure class="deck-logo"><a href="javaScript:void(0);"><img src="<?=base_url()?>assets/images/logo.png" alt="Dynamic Deck"></a></figure>
                        <div class="main-head-right">

                            <div class="mobile-toggle" id="mobiletoggle">
                                <button class="button signin right-margin" data-account="#sharelogin">Login</button>
                            </div>
                            <div class="account-holder" id="sharelogin"><!-- account-holder -->
                                <div class="ah-head"><h6>Share Login</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <span id="loginerror"></span>

                                <div class="ah-content">
                                    <div class="ah-form">
                                        <input type="hidden" id="deckid" name="deckid"  value="<?php echo $deckid;?>">
                                        <label>Deck Name</label>
                                        <input type="text" id="deckname" name="deckname"  <?php echo $readonly; ?> value="<?php echo $deckname;?>">
                                    </div>
                                    <div class="ah-form">
                                        <label>Deck Description</label>
                                        <input type="text"  id="deckdesc" name="deckdesc"  <?php echo $readonly; ?> value="<?php echo $deckdesc;?>">

                                    </div>
                                    <div class="ah-form">
                                        <label>Deck Password</label>
                                        <input type="password"  id="deckpassword" name="deckpassword" placeholder="* * * * * * * * * *">

                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" id="slogin"  class="button signup right-margin">Login</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.js"></script>
    <!--<script src="<?=base_url()?>assets/js/jquery.min.js"></script>-->
    <script src="<?=base_url()?>assets/js/jquery.ui.widget.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-tmpl.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.iframe-transport.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fileupload.js"></script>
    <script src="<?=base_url()?>assets/js/loadingoverlay.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datepicker.min.js"></script>
    <script src="<?=base_url()?>assets/js/layout.min.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>