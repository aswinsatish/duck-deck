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
                                <button class="button signin right-margin" data-account="#recover">Recover Password</button>
                            </div>
                            <div class="account-holder" id="recover"><!-- account-holder -->
                                <div class="ah-head"><h6>Recover Password</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <input   id="uid" type="hidden" value="<?=$uid?>">
                                <input   id="emailid"  type="hidden" value="<?=$email?>">
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Password</label>
                                        <input type="Password" placeholder="* * * * * * * * * *" name="newpassword" id="newpassword" data-validation="validate"data-short-error="Password is too short"  data-week-error="Password is Weak - Add special characters and numbers!" data-success-message="Strong Password - Good Job!" data-error="Password should not be empty" required="" >
                                    </div>
                                    <div class="ah-form">
                                        <label>Confirm Password</label>
                                        <input type="Password" placeholder="* * * * * * * * * *" name="confirmpassword" data-parent="#newpassword" id="confirmpassword" data-validation="validate" data-error="Password should not be empty" required="" data-short-error="Password is too short"  data-week-error="Password is Weak - Add special characters and numbers!" data-success-message="Matching" data-mismatch-Error="password is mismatching">

                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" id="reset"  class="button signup right-margin">Reset</button>
                                        <button  onclick="window.location='http://dynamicdeck.labsls.com/Login';" class="button create">Log In</button>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header -->

        <!-- deck-middle-section -->



    </div>



    <!-- Container Fluid -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
