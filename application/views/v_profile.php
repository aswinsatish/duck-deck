<?php
define('S3_BUCKET', 'dynamicdeck');
define('S3_KEY', 	'AKIAIAEQKI43QMFTGF7A');
define('S3_SECRET', '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');
define('S3_ACL', 	'public-read-write');
$policy = json_encode(array(
    'expiration' => date('Y-m-d\TG:i:s\Z', strtotime('+6 hours')),
    'conditions' => array(
        array(
            'bucket' => S3_BUCKET
        ),
        array(
            'acl' => S3_ACL
        ),
        array(
            'starts-with',
            '$key',
            ''
        ),
        array(
            'success_action_status' => '201'
        )
    )
));

$base64Policy = base64_encode($policy);
$signature = base64_encode(hash_hmac("sha1", $base64Policy, S3_SECRET, $raw_output = true));
?>
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
    <style>
	#imgpic{
		height:96px;
		width:96px;
	}
	
	</style>
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
                                                    <li class="active-sec"><a href="<?=site_url()?>/Deck/editprofile">Profile</a></li>
                                                    <li><a href="<?=site_url()?>/Deck/editsettings">Settings</a></li>
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
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
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
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
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
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
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
        <section class="deck-settings-section white-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="general-container">
					<?php 
								if($user_details)
								{
       
								foreach($user_details as $item)
       					       {
                                   $usertype=$item->user_type;
                                  $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET; 
						          $pic_path =  $thumbpath.'/photos/'.$item->profile_pic;
				           ?>
                        <div class="profile-block">
							<form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="editform"  enctype="multipart/form-data" class="direct-upload">
									<?php $unId=uniqid();?>
									<input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
					                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
					                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
					                <input type="hidden" name="success_action_status" value="201">
					                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
					                <input type="hidden"name="signature" value="<?php echo $signature; ?>"><input type="hidden" id="picname"><input type="hidden" id="picid" value="<?=$unId?>">	
							    <div class="dp-upload">
							<?php if($item->profile_pic)
								{ ?>
									<img src="<?=$pic_path?>"  id="imgpic" >
								<?php } else { ?>
									<img src="<?=base_url()?>assets/images/dp-placeholder.png" id="imgpic">
								<?php } ?>
                                
                                <input type="file" name="file" id="editpic" >
                            </div>
							</form>
							<span id="success" ></span>
                            <h4>Your Name</h4>
                            <div class="bio-form">
                                <label>Bio</label>
                                <textarea class="bio-text-area" placeholder="Write a brief bio" id="brief_bio" ><?=$item->brief_bio?></textarea>
                                <div class="personal-details-form">
                                    <input type="text" placeholder="First Name" name="" class="box-1" id="first_name" value="<?=$item->first_name?>">
                                    <input type="text" placeholder="Last Name" name="" class="box-2" id="last_name" value="<?=$item->last_name?>">
                                    <input type="text" placeholder="Email" name="" class="email-box" id="email" value="<?=$item->email_id?>">
                                </div>
                                <div class="ah-form">
                                    <h6>Your Primary Role</h6>
                                    <ul class="ah-switchs">
                                        <li><div class="ah-radio"><input type="radio" class="utype" name="utyp" id="utyp" value="entrepreneur"<?php if($usertype=='entrepreneur'){ echo 'checked="checked"';} ?> ><span></span></div>Entrepreneur</li>
                                        <li><div class="ah-radio"><input type="radio" class="utype" name="utyp" id="utyp" value="investor"   <?php if($usertype=='investor'){ echo 'checked="checked"';} ?>  ><span></span></div>Investor</li>
										<input  type="hidden" id="usertyp">
                                    </ul>
                                </div>
                                <div class="action-buttons">
                                    <button class="button signin right-margin save" onclick="editprofile()"  >Save</button>
                                    <button class="button signin right-margin cancel">Cancel</button>
                                    <button class="button signin right-margin dlt-ac">Delete Account</button>
                                </div>
                            </div>
                            
                        </div>
						<?php  } } ?>
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
