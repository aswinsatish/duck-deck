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
                                            <div class="user-item-panel"><a href="<?=site_url()?>Deck/createdeck">Create New Deck</a></div>
                                            <?php  if($alldecks)
                                            {
                                                foreach($alldecks as $item)
                                                {
                                                    $logopic=$item->logo;
                                                    $thumbpath = $this->general->thumbpath('thumbnail') . S3_BUCKET1;
                                                    $logopath = $thumbpath . '/logos/' . $logopic;
													$did=$item->id;
												    $enc_id = $this->general->crypt($did);
                                                    ?>
                                                    <div class="deck-file-panel ">
                                                        <?php if($logopic)
                                                        {?>
                                                            <img src="<?=$logopath?>">
                                                        <?php }
                                                        else{ ?>
                                                            <img src="<?=base_url()?>assets/images/deck-file.png" >
                                                        <?php } ?>

                                                        <div onclick="javascript:deckview('<?=$enc_id?>')">
                                                            <h3><?=$item->deck_name?></h3>
                                                            <p>/<?=$item->org_name?></p>
                                                            <span class="deck-item-span icon-track"></span>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else {?>
                                            <div class="deck-file-panel ">
                                                <div>
                                                <h3>No Decks Created</h3>
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="userpanel"><!-- account-holder -->
                                <div class="ah-head"><h6>User Name</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="<?=site_url()?>Deck/listprofiledeck">Switch to Investing</a></div>
                                        </div>
                                    </div>
                                    <div class="ah-deck-file-panel">
                                        <div class="row">
                                            <div class="user-item-panel"><a href="<?=site_url()?>Deck/editprofile">Profile</a></div>
                                            <div class="user-item-panel"><a href="<?=site_url()?>Deck/editsettings">Settings</a></div>
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
                                            <div class="user-item-panel"><a href="<?=site_url()?>Login/logout">Log Out</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- account-holder -->
                            <div class="account-holder" id="shareitem"><!-- account-holder -->
                                <div class="ah-head"><h6>Share Deck</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <div class="ah-form">
                                        <label>Your Unique Deck Link <a href="javaScript:void(0);" class="color-violet">Copy</a></label>
                                        <input type="text" placeholder="www.dynamicdeck.io/deck-name" <?php echo $readonly; ?>>
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
                                    <div class="flex-panel">
                                        <div class="left-item">

                                            <div class="deck-name" id="deckname">
                                                <div class="edit-done"><h3 id="dename">Deck Name</h3><a href="javaScript:void(0);" class="icon-edit" data-edit="#deckname"></a></div>
                                                <div class="edit-to"><input type="text"  class="width-dynamic proba dva" placeholder="Deck Name" id="deck_name" name="deck_name"><a href="javaScript:saveorganisation('deck_name')" class="icon-tic" data-edit="#deckname"></a></div>
                                            </div>
                                            <div class="deck-url" id="decknurl">
                                                <div class="edit-done"><h4><a>www.dynamicdeck.io/<span>deck-name</span></a></h4><a href="javaScript:void(0);" class="icon-edit" data-edit="#decknurl"></a></div>
                                                <div class="edit-to"><h4><a>www.dynamicdeck.io/<input type="text" id="deckurl" value="deck-name" name="deckurl" onchange="saveorganisation('deckurl')"></a></h4><a href="javaScript:void(0);" class="icon-tic" data-edit="#decknurl"></a></div>
                                            </div>
                                        </div>
                                        <input  type="hidden" name="org_id" id="org_id" value="">
                                        <input   type="hidden" name="encorid" id="encorid" value="">
                                    </div>
                                    <div class="right-item"><p></p></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- deck-sub-head -->
                    <div class="cover-image-panel">
                        <span class="placeholder-text-cover">Cover Image</span><img src="<?=base_url()?>assets/images/cover-image-v1.png"  id="image_cover" name="image_cover">
                            <label class="photo-upload">
                                <input type="file" name="file" id="imgcover-edit" onchange="saveorganisation('imgcover-edit')"><span></span></label>
                    </div>
                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo">
                                    <span class="placeholder-text-icon">Logo</span><img src="<?=base_url()?>assets/images/logo-placeholder-v1.png" alt="" id="image_logo" name="image_logo">
                                    <label class="photo-upload"><input type="file" id="imglogo-edit" onchange="saveorganisation('imglogo-edit')"><span></span></label>
                                </div>
                                <div class="profile-container">
                                    <div class="cp-details" id="companydetailsmob">
                                        <div class="edit-done">
                                            <a href="javaScript:void(0);" class="icon-edit block" data-edit="#companydetailsmob"></a>
                                            <h3>Company Name</h3>
                                            <p>Simple strapline that explains company purpose</p>
                                        </div>
                                        <div class="edit-to">
                                            <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydetailsmob"></a>
                                            <h3><input type="text" value="Company Name" name=""></h3>
                                            <p><textarea>Simple strapline that explains company purpose</textarea></p>
                                        </div>
                                    </div>
                                    <div class="profile-item-panel" id="profileitem">
                                        <div class="edit-done">
                                            <a href="javaScript:void(0);" class="icon-edit" data-edit="#profileitem"></a>
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
                                                            <p>Pre-Money</p>

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
                                                        <p class="top-margin"><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                        <p><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="edit-to">
                                            <a href="javaScript:void(0);" class="icon-tic" data-edit="#profileitem"></a>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <h3 class="funds"><span>$</span><input type="text" placeholder="Value" value="" name="investment_sought" id="investment_sought"  onkeyup="valuation_percent();" onchange="saveorganisation('investment_sought')"></h3>
                                                        <p><input type="text" placeholder="--% equity" id="equity" value="" onkeyup="valuation_percent();" onchange="saveorganisation('equity')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3 class="funds"><span>$</span><input type="text" placeholder="Value" name="valuation" id="valuation" value=""></h3>
                                                        <p><input type="text" placeholder="Pre-Money" id="pre1_commited_money" name="pre1_commited_money" value="" onkeyup="prev_fund_format()" onchange="saveorganisation('pre1_commited_money')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <h3 class="funds"><span>$</span><input type="text" value="Value" name=""></h3>
                                                        <p><input type="text" value="--% Committed"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <h3 class="funds"><span>$</span><input type="text" value="Value" name=""></h3>
                                                        <p><input type="text" value="Profitable"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item priorfund">
                                                        <h5>Prior Funding</h5>
                                                        <div class="prior-value top-margin"><input class="date-input" type="text" placeholder="Date Est." id="date1"  data-language="en" onchange="saveorganisation('date1')"><div class="prior-fund"><span id="currency_type"  onchange="saveorganisation('currency_type')">$</span><input class="currency-input"  type="text" placeholder="Subtitle" id="currency"  value="Subtitle"  onchange="saveorganisation('currency')" ></div></div>
                                                        <div class="prior-value prevfund"><input class="date-input" type="text" placeholder="Date Est." id="date2"  data-language="en"  onblur="saveorganisation('date2')" ><div class="prior-fund"><span id="currency_type"  onchange="saveorganisation('currency_type')">$</span><input  class="currency-input"  type="text" placeholder="Subtitle" id="currency1"  value="currency"  onchange="saveorganisation('currency1')"></div></div>
                                                    </div>
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
                    <div class="cover-image-panel"><img src="<?=base_url()?>assets/images/cover-image-v1.png" alt=""></div>
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
                                                    <p>Pre-Money</p>
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
                                                    <p class="top-margin"><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                    <p><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
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
                                                    <p>Pre-Money</p>
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
                                                    <p class="top-margin"><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                    <p><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
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
                                                    <p>Pre-Money</p>
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
                                                    <p class="top-margin"><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                    <p><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
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

        <div class="profile-item">

            <!-- deck-bottom-section -->
            <section class="deck-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="company-profile"><!-- company-profile -->
                            <div class="cp-details saved-text" id="companydetails">
                                <div class="edit-done">
                                    <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydetails"></a>
                                    <h3>Company Name</h3>
                                    <p>Simple strapline that explains company purpose</p>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydetails"></a>
                                    <h3><input type="text" value="Company Name" id="org_name" onchange="saveorganisation('org_name')"></h3>
                                    <p><textarea id="org_desc" onchange="saveorganisation('org_desc')">Simple strapline that explains company purpose</textarea></p>
                                </div>
                                <div class="cp-links" id="cplink">
                                    <div class="edit-done">

                                        <ul>
                                            <li class="icon-cno">CN: 123456789</li>
                                            <li class="icon-nav">City, Country</li>
                                            <li class="icon-bag">Sector</li>
                                            <li class="icon-globe">Website</li>
                                            <li class="icon-calender">Date Est.</li>
                                        </ul>
                                    </div>
                                    <div class="edit-to">
                                        <ul>
                                            <li class="icon-cno"><input type="text" value="CN: 123456789" id="org_reg_number" name="org_reg_number" onchange="saveorganisation('org_reg_number')"></li>
                                            <li class="icon-nav"><input type="text" value="City, Country" id="location" name="location" onchange="saveorganisation('location')"></li>
                                            <li class="icon-bag"><input type="text" value="Sector" id="org_sector" name="org_sector" onchange="saveorganisation('org_sector')"></li>
                                            <li class="icon-globe"><input type="text" value="Website" id="website" name="website" onchange="saveorganisation('website')"></li>
                                            <li class="icon-calender"><input type="text" value="Date Est." id="date" name="date" onchange="saveorganisation('date')"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cp-links" id="cplinks">
                                    <div class="edit-done">

                                        <ul>
                                            <li class="icon-fb">Social link</li>
                                            <li class="icon-tw">Social link</li>
                                            <li class="icon-ig">Social link</li>
                                        </ul>
                                    </div>
                                    <div class="edit-to">
                                        <ul>
                                            <li class="icon-fb"><input type="text" value="Social link" id="link_organisation" onchange="saveorganisation('link_organisation')"></li>
                                            <li class="icon-tw"><input type="text" value="Social link" id="twitter_page" onchange="saveorganisation('twitter_page')"></li>
                                            <li class="icon-ig"><input type="text" value="Social link" id="linkedin_page" onchange="saveorganisation('linkedin_page')"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-item-panel" id="profileitemmobile">
                                <div class="edit-done">
                                    <a href="javaScript:void(0);" class="icon-edit block" data-edit="#profileitemmobile"></a>
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
                                                <p>Pre-Money</p>
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
                                                <p class="top-margin"><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                <p><span class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="investor-metrics none-bg">
                                                <ul class="invest-item">
                                                    <li class="icon-track"><span>###</span></li>
                                                    <li class="icon-speeker"><span>###</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#profileitemmobile"></a>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="profile-item">
                                                <h5>Funds Sought</h5>
                                                <h3><input type="text" value="Value" name=""></h3>
                                                <p><input type="text" value="--% equity"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="profile-item">
                                                <h5>Valuation</h5>
                                                <h3><input type="text" value="Value" name=""></h3>
                                                <p><input type="text" value="--% Committed"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="profile-item">
                                                <h5>Funds Pledged</h5>
                                                <h3><input type="text" value="Value" name=""></h3>
                                                <p><input type="text" value="--% Committed"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="profile-item">
                                                <h5>Current MRR</h5>
                                                <h3><input type="text" value="Value" name=""></h3>
                                                <p><input type="text" value="Profitable"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="profile-item">
                                                <h5>Prior Funding</h5>
                                                <p class="top-margin"><input type="text" value="Subtitle"></p>
                                                <p><input type="text" value="Subtitle"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="investor-metrics none-bg">
                                                <ul class="invest-item">
                                                    <li class="icon-track"><span>###</span></li>
                                                    <li class="icon-speeker"><span>###</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="investor-metrics none-bg for-tab">
                                <ul class="invest-item">
                                    <li class="icon-track"><span>###</span></li>
                                    <li class="icon-speeker"><span>###</span></li>
                                </ul>
                            </div>
                        </div><!-- company-profile -->
                        <div class="company-detail-container shade-container"><!-- company-detail-container -->
                            <div class="company-panel" id="companydet"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydet"></a>
                                    <h3>What</h3>
                                    <div class="cd-panel">
                                        <h5>What We Do</h5>

                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>

                                    </div>
                                    <div class="cd-panel">
                                        <h5>Our Competitors</h5>

                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>

                                    </div>
                                    <div class="cd-panel">
                                        <h5>Problems Solved</h5>
                                        <ul>

                                                <li>Bullet point goes here, with space for up to two lines of text</li>

                                                <li>Bullet point goes here, with space for up to two lines of text</li>

                                                <li>Bullet point goes here, with space for up to two lines of text</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydet"></a>
                                    <h3><input type="text" value="What"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="What We Do"></h5>
                                        <p><textarea id="what_we_do" name="what_we_do" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." onchange="saveorganisation('what_we_do')"></textarea></p>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Our Competitors"></h5>
                                        <p><textarea id="competitors" name="competitors"  placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." onchange="saveorganisation('competitors')"></textarea></p>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Problems Solved"></h5>
                                        <ul>
                                            <li><textarea id="problem1" onchange="saveorganisation('problem1')"  placeholder="Bullet point goes here, with space for up to two lines of text"></textarea></li>
                                            <li><textarea id="problem2" onchange="saveorganisation('problem2')"  placeholder="Bullet point goes here, with space for up to two lines of text"></textarea></li>
                                            <li><textarea id="problem3" onchange="saveorganisation('problem3')"  placeholder="Bullet point goes here, with space for up to two lines of text"></textarea></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- company-panel -->
                            <div class="company-panel" id="companydets"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydets"></a>
                                    <h3>How</h3>
                                    <div class="cd-panel">
                                        <h5>Business Model</h5>

                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>

                                    </div>
                                    <div class="cd-panel">
                                        <h5>Our Advantage</h5>

                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>

                                    </div>
                                    <div class="cd-panel">
                                        <h5>Notable Achievements</h5>
                                        <ul>
                                            <li>Bullet point goes here, with space for up to two lines of text</li>
                                            <li>Bullet point goes here, with space for up to two lines of text</li>
                                            <li>Bullet point goes here, with space for up to two lines of text</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydets"></a>
                                    <h3><input type="text" value="How"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Business Model"></h5>
                                        <p><textarea id="business_model" name="business_model" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." onchange="saveorganisation('business_model')"></textarea></p>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Our Advantage"></h5>
                                        <p><textarea id="advantage" onchange="saveorganisation('advantage')" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." ></textarea></p>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Notable Achievements"></h5>
                                        <ul>
                                            <li><textarea id="achieve1" onchange="saveorganisation('achieve1')">Bullet point goes here, with space for up to two lines of text</textarea></li>
                                            <li><textarea id="achieve2" onchange="saveorganisation('achieve2')" >Bullet point goes here, with space for up to two lines of text</textarea></li>
                                            <li><textarea id="achieve3" onchange="saveorganisation('achieve3')">Bullet point goes here, with space for up to two lines of text</textarea></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- company-panel -->
                            <div class="company-panel" id="decklist"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);" class="icon-edit" data-edit="#decklist"></a>
                                    <h3>Who</h3>
                                    <div class="cd-panel">
                                        <h5>Management</h5>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <div>
                                                <h6>Enter Team Member Name</h6>
                                                <p>Team Member Role</p>
                                                <span>Prior role or experience</span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <div>
                                                <h6>Enter Team Member Name</h6>
                                                <p>Team Member Role</p>
                                                <span>Prior role or experience</span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <div>
                                                <h6>Enter Team Member Name</h6>
                                                <p>Team Member Role</p>
                                                <span>Prior role or experience</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Notable Investors & Advisors</h5>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <div>
                                                <h6>Enter Team Member Name</h6>
                                                <p>Team Member Role</p>
                                                <span>Prior role or experience</span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <div>
                                                <h6>Enter Team Member Name</h6>
                                                <p>Team Member Role</p>
                                                <span>Prior role or experience</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#decklist"></a>
                                    <h3><input type="text" value="Who"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Management"></h5>
                                        <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t1" >
                                                <input type="file" name="file" id="profile_pic"  style="display:none"/>

                                                <label class="deck-upload"><input type="file" id="memberimageedit_t1" name="memberimage"><span></span></label>

                                            <div>
                                                <h6><input type="text" placeholder="Enter Team Member Name" id="membername_t1" onchange="saveorganisation('membername_t1')"></h6>
                                                <p><input type="text" id="role_t1" placeholder="Team Member Role" onchange="saveorganisation('role_t1')" ></p>
                                                <span><input type="text" id="achievement_t1" placeholder="Prior role or experience" onchange="saveorganisation('achievement_t1')"></span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <label class="deck-upload"><input type="file" name=""><span></span></label>
                                            <div>
                                                <h6><input type="text" id="membername_t2" placeholder="Enter Team Member Name" onchange="saveorganisation('membername_t2')"></h6>
                                                <p><input type="text" id="role_t2" placeholder="Team Member Role" onchange="saveorganisation('role_t2')"></p>
                                                <span><input type="text" id="achievement_t2" onchange="saveorganisation('achievement_t2')" placeholder="Prior role or experience"></span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <label class="deck-upload"><input type="file" name=""><span></span></label>
                                            <div>
                                                <h6><input type="text" id="membername_t3" placeholder="Enter Team Member Name" onchange="saveorganisation('membername_t3')"></h6>
                                                <p><input type="text" id="role_t3" placeholder="Team Member Role" onchange="saveorganisation('role_t3')"></p>
                                                <span><input type="text" id="achievement_t3" placeholder="Prior role or experience" onchange="saveorganisation('achievement_t3')"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Notable Investors & Advisors"></h5>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <label class="deck-upload"><input type="file" name=""><span></span></label>
                                            <div>
                                                <h6><input type="text" placeholder="Enter Team Member Name" id="membername_I1" onchange="saveorganisation('membername_I1')" ></h6>
                                                <p><input type="text" placeholder="Team Member Role" id="role_I1" onchange="saveorganisation('role_I1')" ></p>
                                                <span><input type="text" placeholder="Prior role or experience" id="achievement_I1" onchange="saveorganisation('achievement_I1')"></span>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                            <label class="deck-upload"><input type="file" name=""><span></span></label>
                                            <div>
                                                <h6><input type="text" placeholder="Enter Team Member Name" id="membername_I2" onchange="saveorganisation('membername_I2')" ></h6>
                                                <p><input type="text" placeholder="Team Member Role" id="role_I2" onchange="saveorganisation('role_I2')" ></p>
                                                <span><input type="text" placeholder="Prior role or experience" onchange="saveorganisation('achievement_I2')" id="achievement_I2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- company-panel -->
                        </div><!-- company-detail-container -->
                    </div>
                </div>
            </section>
            <!-- deck-bottom-section -->
            <div class="deck-messages" id="error1">
                <div class="dm-content">
                    <div class="dm-body">
                        <div class="dm-dev">
                            <p>Deck Name cannot be empty</p>
                            <button class="button signup" onclick="cancel_modal()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deck-messages" id="error">
                <div class="dm-content">
                    <div class="dm-body">
                        <div class="dm-dev">
                            <p>Please Enter Deck Name to continue....</p>
                            <button class="button signup" onclick="cancel_modal()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deck-messages" id="successmodal">
                <div class="dm-content">
                    <div class="dm-body">
                        <div class="dm-dev">
                            <p>You have successfully added your Deck, you can use the Tab key to proceed through this form</p>
                            <button class="button signup" onclick="saveorg()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>assets/js/loadingoverlay.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datepicker.min.js"></script>
    <script src="<?=base_url()?>assets/js/layout.min.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>
