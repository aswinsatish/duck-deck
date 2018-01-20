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
                                <li><a href="javaScript:void(0);" class="nav-updates" data-account="#nvupdates"></a></li>
                                <li><a href="javaScript:void(0);" class="nav-print"></a></li>
                            </ul>
                            <div class="account-holder" id="nvupdates"><!-- account-holder -->
                                <div class="ah-head"><h6>Updates</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-comment-post">
                                    <div class="ah-commment-panel">
                                        <span class="chat-smile"></span>
                                        <textarea placeholder="What's happening?"></textarea>
                                        <span class="chat-round"></span>
                                    </div>
                                    <div class="chat-button-panel">
                                        <div class="chat-checkbox"><input type="checkbox" name=""><span></span>Email update to Investors</div>
                                        <button class="button post">Post</button>
                                    </div>
                                </div>
                                <div class="ah-comments-posted">
                                    <div class="ah-comments-panel">
                                        <div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt="">Company Name </h3> <span class="pc-date">31/12/2017</span></div>
                                            <div class="pc-content"><p>An update message goes here with up to 140 characters. Can include emojis and offers some basic stats about investor view, likes and shares.</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love">#</li><li class="icon-reply">#</li></ul></div>
                                        </div>
                                        <div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt="">Company Name </h3> <span class="pc-date">31/12/2017</span></div>
                                            <div class="pc-content"><p>An update message goes here with up to 140 characters. Can include emojis and offers some basic stats about investor view, likes and shares.</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love">#</li><li class="icon-reply replied">#</li></ul></div>
                                        </div>
                                        <div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt="">Company Name </h3> <span class="pc-date">31/12/2017</span></div>
                                            <div class="pc-content"><p>An update message goes here with up to 140 characters. Can include emojis and offers some basic stats about investor view, likes and shares.</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love liked">#</li><li class="icon-reply">#</li></ul></div>
                                        </div>
                                        <div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt="">Company Name </h3> <span class="pc-date">31/12/2017</span></div>
                                            <div class="pc-content"><p>An update message goes here with up to 140 characters. Can include emojis and offers some basic stats about investor view, likes and shares.</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love liked">#</li><li class="icon-reply">#</li></ul></div>
                                        </div>
                                        <div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt="">Company Name </h3> <span class="pc-date">31/12/2017</span></div>
                                            <div class="pc-content"><p>An update message goes here with up to 140 characters. Can include emojis and offers some basic stats about investor view, likes and shares.</p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love">#</li><li class="icon-reply replied">#</li></ul></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="javaScript:void(0);" class="scroll-py"></a>
                            </div><!-- account-holder -->
                        </div><!-- navbar-menu -->
                        <figure class="deck-logo"><a href="javaScript:void(0);"><img src="<?=base_url()?>assets/images/logo.png" alt="Dynamic Deck"></a></figure>
                        <div class="main-head-right">
                            <a href="javaScript:void(0);" class="icon-share" data-mobile-toggle="#mobiletoggle"></a>
                            <div class="mobile-toggle" id="mobiletoggle">
                                <a href="javaScript:void(0);" class="deck-file" data-account=#deckfile></a>
                                <a href="javaScript:void(0);" class="deckuser" data-account="#userpanel"></a>
                                <button class="button share" data-account="#shareitem">Share</button>
                            </div>
                            <div class="account-holder" id="signin"><!-- account-holder -->
                                <div class="ah-head"><h6>Log In</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Your Email</label>
                                        <input type="text" placeholder="name@email.com" name="">
                                        <a href="javaScript:void(0);" class="icon-info">Forgot your email?</a>
                                    </div>
                                    <div class="ah-form">
                                        <label>Password</label>
                                        <input type="Password" placeholder="* * * * * * * * * *" name="">
                                        <a href="javaScript:void(0);" class="icon-info" data-account="#forgotaccount">Forgot your password?</a>
                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" class="button signup right-margin">Log In</button>
                                        <button class="button create" data-account="#signup">Create Account</button>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="signup"><!-- account-holder -->
                                <div class="ah-head"><h6>Create Account</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Your Email</label>
                                        <input type="text" placeholder="name@email.com" name="">
                                        <span class="validation success">Email validation</span>
                                    </div>
                                    <div class="ah-form">
                                        <label>Password</label>
                                        <input type="Password" placeholder="* * * * * * * * * *" name="">
                                        <span class="validation failed">Password validation</span>
                                    </div>
                                    <div class="ah-form">
                                        <h6>Your Primary Role</h6>
                                        <ul class="ah-switchs">
                                            <li><div class="ah-radio"><input type="radio" name="switch"><span></span></div>Entrepreneur</li>
                                            <li><div class="ah-radio"><input type="radio" name="switch"><span></span></div>Investor</li>
                                        </ul>
                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" class="button signup right-margin">Create</button>
                                        <button class="button create" data-account="#signin">Log In</button>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="forgotaccount"><!-- account-holder -->
                                <div class="ah-head"><a href="javaScript:void(0);" class="ah-back" data-account="#signin"></a><h6>Recover Account</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-description">
                                    <h6>How to recover your account</h6>
                                    <p>Enter your email address you signed up to Dynamic Deck with. We’ll send you a special link to recover your account.</p>
                                </div>
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Your Email</label>
                                        <input type="text" placeholder="name@email.com" name="">
                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" class="button signup right-margin">Recover Account</button>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="deckfile"><!-- account-holder -->
                                <div class="ah-head"><h6>Decks</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="deck-file-panel active">
                                                <img src="<?=base_url()?>assets/images/deck-file.png" alt="">
                                                <div>
                                                    <h3>Company Name</h3>
                                                    <p>/deck-name</p>
                                                    <span class="deck-item-span icon-track"></span>
                                                </div>
                                            </div>
                                            <div class="deck-file-panel">
                                                <img src="<?=base_url()?>assets/images/deck-file.png" alt="">
                                                <div>
                                                    <h3>Company Name</h3>
                                                    <p>/deck-name</p>
                                                    <span class="deck-item-span icon-track not"></span>
                                                </div>
                                            </div>
                                            <div class="deck-file-panel">
                                                <img src="<?=base_url()?>assets/images/deck-file.png" alt="">
                                                <div>
                                                    <h3>Company Name</h3>
                                                    <p>/deck-name</p>
                                                    <span class="deck-item-span icon-file"></span>
                                                </div>
                                            </div>
                                            <div class="deck-file-panel">
                                                <img src="<?=base_url()?>assets/images/deck-file.png" alt="">
                                                <div>
                                                    <h3>Company Name</h3>
                                                    <p>/deck-name</p>
                                                    <span class="deck-item-span icon-track not"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="userpanel"><!-- account-holder -->
                                <div class="ah-head"><h6>User Name</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="javaScript:void(0);">Switch to Deck Building</a></div>
                                        </div>
                                    </div>
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="<?=site_url()?>/Deck/editprofile">Profile</a></div>
                                            <div class="user-item-panel"><a href="<?=site_url()?>/Deck/editsettings">Settings</a></div>
                                        </div>
                                    </div>
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="javaScript:void(0);">Tutorials</a></div>
                                            <div class="user-item-panel"><a href="javaScript:void(0);">Support</a></div>
                                        </div>
                                    </div>
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="<?=site_url()?>/Login/logout">Log Out</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="shareitem"><!-- account-holder -->
                                <div class="ah-head"><h6>Share Deck</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Your Unique Deck Link <a href="javaScript:void(0);" class="color-violet">Copy</a></label>
                                        <input type="text" placeholder="www.dynamicdeck.io/deck-name" name="">
                                    </div>
                                    <div class="ah-form">
                                        <label>Set Deck Password <a href="javaScript:void(0);">Remove</a></label>
                                        <input type="Password" placeholder="* * * * * * * * * *" name="">
                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" class="button signup right-margin">Save</button>
                                        <div class="share-switch-panel">
                                            <div class="share-switch active"></div>
                                            Sharing on
                                        </div>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header -->

        <!-- deck-middle-section -->
        <section class="deck-middle-section">
            <div class="row">

                <!-- deck-tab-container -->
                <div class="deck-tab-container active" id="tab-deck">
                    <div class="deck-sub-head"><!-- deck-sub-head -->
                        <div class="container">
                            <div class="row">
                                <div class="flex-panel">
                                    <div class="left-item">
                                        <div class="deck-name" id="deckname">
                                            <div class="edit-done">
                                                <ul class="page-section">
                                                    <li><a href="<?=site_url()?>/Deck/editprofile">Profile</a></li>
                                                    <li class="active-sec"><a href="<?=site_url()?>/Deck/editsettings">Settings</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-sub-head -->




                    </div>
                    <!-- deck-tab-container -->

                    <!-- deck-tab-container -->
                    <div class="deck-tab-container" id="tab-attach">
                        <div class="deck-sub-head"><!-- deck-sub-head -->
                            <div class="container">
                                <div class="row">
                                    <div class="flex-panel">
                                        <div class="left-item">
                                            <div class="deck-name"><h3>Attachments</h3></div>
                                        </div>
                                        <div class="right-item"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-sub-head -->
                        <div class="cover-image-panel"><img src="<?=base_url()?>assets/images/cover-image.png" alt=""></div>
                        <div class="deck-profle"><!-- deck-profle -->
                            <div class="container">
                                <div class="row">
                                    <div class="profile-photo"><img src="<?=base_url()?>assets/images/logo-placeholder.png" alt=""></div>
                                    <div class="profile-container">
                                        <div class="cp-details">
                                            <h3>Company Name</h3>
                                            <p>Simple strapline that explains company purpose</p>
                                        </div>
                                        <div class="profile-item-panel">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <h3>Value</h3>
                                                        <p>--% equity</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <h3>Value</h3>
                                                        <p>Profitable</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Prior Funding</h5>
                                                        <p class="top-margin">Subtitle</p>
                                                        <p>Subtitle</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="investor-metrics none-bg">
                                            <ul class="invest-item">
                                                <li class="icon-track"><span>###</span></li>
                                                <li class="icon-speeker"><span>###</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-profle -->
                        <div class="attachment-container"><!-- attachment-container -->
                            <div class="container">
                                <div class="row">
                                    <div class="attach-panel">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_1">
                                                    <div class="attachment stage-1">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2">
                                                        <div class="attach-image">
                                                            <label class="file-upload"><input type="file" name=""><span>Choose File</span></label>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="Attachment Title" name="">
                                                            <textarea>Short description of the attachment goes here</textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0)" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3>Attachment Title</h3>
                                                            <p>Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li>File size</li>
                                                                <li>File type</li>
                                                                <li>Date</li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0);" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a href="javaScript:void(0);" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_2">
                                                    <div class="attachment stage-1">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2">
                                                        <div class="attach-image">
                                                            <label class="file-upload"><input type="file" name=""><span>Choose File</span></label>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="Attachment Title" name="">
                                                            <textarea>Short description of the attachment goes here</textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0)" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3>Attachment Title</h3>
                                                            <p>Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li>File size</li>
                                                                <li>File type</li>
                                                                <li>Date</li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0);" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a href="javaScript:void(0);" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_3">
                                                    <div class="attachment stage-1">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2">
                                                        <div class="attach-image">
                                                            <label class="file-upload"><input type="file" name=""><span>Choose File</span></label>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="Attachment Title" name="">
                                                            <textarea>Short description of the attachment goes here</textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0)" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3>Attachment Title</h3>
                                                            <p>Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li>File size</li>
                                                                <li>File type</li>
                                                                <li>Date</li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:void(0);" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a href="javaScript:void(0);" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- attachment-container -->
                    </div>
                    <!-- deck-tab-container -->

                    <!-- deck-tab-container -->
                    <div class="deck-tab-container" id="tab-insights">
                        <div class="deck-sub-head"><!-- deck-sub-head -->
                            <div class="container">
                                <div class="row">
                                    <div class="flex-panel">
                                        <div class="left-item">
                                            <div class="deck-name"><h3>Insights</h3></div>
                                        </div>
                                        <div class="right-item">
                                            <div class="date-panel">
                                                <input type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="deck-datepicker" placeholder="05/04/17 – 17/04/17" />
                                            </div>
                                            <div class="date-sort">
                                                <ul>
                                                    <li class="active">Day</li>
                                                    <li>Week</li>
                                                    <li>Month</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-sub-head -->
                        <div class="cover-image-panel"><img src="<?=base_url()?>assets/images/cover-image.png" alt=""></div>
                        <div class="deck-profle"><!-- deck-profle -->
                            <div class="container">
                                <div class="row">
                                    <div class="profile-photo"><img src="<?=base_url()?>assets/images/logo-placeholder.png" alt=""></div>
                                    <div class="profile-container">
                                        <div class="cp-details">
                                            <h3>Company Name</h3>
                                            <p>Simple strapline that explains company purpose</p>
                                        </div>
                                        <div class="profile-item-panel">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <h3>Value</h3>
                                                        <p>--% equity</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <h3>Value</h3>
                                                        <p>Profitable</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Prior Funding</h5>
                                                        <p class="top-margin">Subtitle</p>
                                                        <p>Subtitle</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="investor-metrics none-bg">
                                            <ul class="invest-item">
                                                <li class="icon-track"><span>###</span></li>
                                                <li class="icon-speeker"><span>###</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-profle -->
                        <div class="attachment-container"><!-- attachment-container -->
                            <div class="container">
                                <div class="row">
                                    <div class="insight-details">
                                        <div class="insight">
                                            <div class="profile-item">
                                                <h5>Investors Tracking</h5>
                                                <h3>Value</h3>
                                                <p>(DD Avg: -- )</p>
                                            </div>
                                        </div>
                                        <div class="insight">
                                            <div class="profile-item">
                                                <h5>Deck Views</h5>
                                                <h3>Value</h3>
                                                <p>(DD Avg: -- )</p>
                                            </div>
                                        </div>
                                        <div class="insight">
                                            <div class="profile-item">
                                                <h5>Summaries Printed</h5>
                                                <h3>Value</h3>
                                                <p>(DD Avg: -- )</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attach-panel graph-container">
                                        <div class="row">
                                            <div class="graph-panel"><img src="<?=base_url()?>assets/images/graph.jpg" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- attachment-container -->
                    </div>
                    <!-- deck-tab-container -->

                    <!-- deck-tab-container -->
                    <div class="deck-tab-container" id="tab-updates">
                        <div class="deck-sub-head"><!-- deck-sub-head -->
                            <div class="container">
                                <div class="row">
                                    <div class="flex-panel">
                                        <div class="left-item">
                                            <div class="deck-name"><h3>Deck Updates</h3></div>
                                        </div>
                                        <div class="right-item"><p>Create an account or Sign In to Track Decks</p></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-sub-head -->
                        <div class="cover-image-panel"><img src="<?=base_url()?>assets/images/cover-image.png" alt=""></div>
                        <div class="deck-profle"><!-- deck-profle -->
                            <div class="container">
                                <div class="row">
                                    <div class="profile-photo"><img src="<?=base_url()?>assets/images/logo-placeholder.png" alt=""></div>
                                    <div class="profile-container">
                                        <div class="cp-details">
                                            <h3>Company Name</h3>
                                            <p>Simple strapline that explains company purpose</p>
                                        </div>
                                        <div class="profile-item-panel">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <h3>Value</h3>
                                                        <p>--% equity</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <h3>Value</h3>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <h3>Value</h3>
                                                        <p>Profitable</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Prior Funding</h5>
                                                        <p class="top-margin">Subtitle</p>
                                                        <p>Subtitle</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="investor-metrics none-bg">
                                            <ul class="invest-item">
                                                <li class="icon-track"><span>###</span></li>
                                                <li class="icon-speeker"><span>###</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- deck-profle -->
                    </div>
                    <!-- deck-tab-container -->

                </div>
        </section>
        <!-- deck-middle-section -->

        <!-- deck-bottom-section -->
        <section class="deck-settings-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="settings-container">

                        <h1 class="header-tag">Settings</h1>
                        <div class="email-settings">
                            <h4>Email settings</h4>
                            <span class="divider"></span>
                            <div class="your-email divider">
                                <div class="left-text">
                                    <h5>Your email</h5>
                                    <p>willneill@gmail.com</p>
                                </div>
                                <div class="right-text">
                                    <p class="email-block">
                                        <button class="button email-button">Edit email</button>
                                    </p>
                                </div>
                            </div>
                            <div class="your-email divider">
                                <div class="left-text">
                                    <h5>Medium membership</h5>
                                    <p>we'll email you with updates about new features and content included in your membership, as well as our weekly members newsletter <i>The Edition</i>.</p>
                                </div>
                                <div class="right-text">
                                    <form class="form-class disable">
                                        <div class="switch-field">
                                            <input type="radio" id="switch_left" name="switch_2" value="yes" checked="">
                                            <label for="switch_left" class="left-wing"><span class="toggle-text">On</span></label>
                                            <input type="radio" id="switch_right" name="switch_2" value="no">
                                            <label for="switch_right" class="right-wing"><span class="toggle-text">Off</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="your-email divider">
                                <div class="left-text">
                                    <h5>Notifications on your content</h5>
                                    <p>we'll email you when there are notifications on your stories and publications.</p>
                                </div>
                                <div class="right-text">
                                    <form class="form-class">
                                        <div class="switch-field">
                                            <input type="radio" id="switch_left_2" name="switch_2" value="yes" checked="">
                                            <label for="switch_left_2" class="left-wing"><span class="toggle-text">On</span></label>
                                            <input type="radio" id="switch_right_2" name="switch_2" value="no">
                                            <label for="switch_right_2" class="right-wing"><span class="toggle-text">Off</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="your-email divider">
                                <div class="left-text">
                                    <h5>Social notifications</h5>
                                    <p>we'll email you when your network interacts with you on Medium.</p>
                                </div>
                                <div class="right-text">
                                    <form class="form-class">
                                        <div class="switch-field">
                                            <input type="radio" id="switch_left_3" name="switch_2" value="yes" checked="">
                                            <label for="switch_left_3" class="left-wing"><span class="toggle-text">On</span></label>
                                            <input type="radio" id="switch_right_3" name="switch_2" value="no">
                                            <label for="switch_right_3" class="right-wing"><span class="toggle-text">Off</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="your-email divider">
                                <div class="left-text">
                                    <h5>Mention notifications</h5>
                                    <p>we'll email you when people mention you in their stories on Medium.</p>
                                </div>
                                <div class="right-text">
                                    <form class="form-class">
                                        <div class="switch-field">
                                            <input type="radio" id="switch_3_left" name="switch_3" value="yes">
                                            <label for="switch_3_left" class="left-wing"><span class="toggle-text">All</span></label>
                                            <input type="radio" id="switch_3_center" name="switch_3" value="maybe"  checked="">
                                            <label for="switch_3_center" class="middle-wing"><span class="toggle-text">Network</span></label>
                                            <input type="radio" id="switch_3_right" name="switch_3" value="no">
                                            <label for="switch_3_right" class="right-wing"><span class="toggle-text">Off</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="your-email ">
                                <div class="left-text">
                                    <h5>Reader and writer digests</h5>
                                    <p>we'll email you with new stories written and applauded for by people you follow on Medium.</p>
                                </div>
                                <div class="right-text">
                                    <form class="form-class">
                                        <div class="switch-field">
                                            <input type="radio" id="switch_4_left" name="switch_3" value="yes">
                                            <label for="switch_4_left" class="left-wing"><span class="toggle-text">Daily</span></label>
                                            <input type="radio" id="switch_4_center" name="switch_3" value="maybe"  checked="">
                                            <label for="switch_4_center" class="middle-wing"><span class="toggle-text">Weekly</span></label>
                                            <input type="radio" id="switch_4_right" name="switch_3" value="no">
                                            <label for="switch_4_right" class="right-wing"><span class="toggle-text">Off</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- deck-bottom-section -->

    </div>
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
