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
                                <?php if($uid) {?>  <button class="button track" id="trackbtn" onclick="javascript:button_interested('<?=$uid?>','<?=$orgid?>')">Track</button>  <?php } else {?> <button class="button track" id="trackbtn" onclick="javascript:showmodaltrack()">Track</button> <?php } ?>
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
                                            <?php  if($uid)
                                            {
                                                if($alltrackdeck)
                                                {
                                                    foreach($alltrackdeck as $item)
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

                                                            <div>
                                                                <h3><?=$item->deck_name?></h3>
                                                                <p>/<?=$item->org_name?></p>
                                                                <span class="deck-item-span icon-track"></span>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } else {?>
                                                    <div class="deck-file-panel ">
                                                        <div>
                                                            <h3>No Decks Tracked</h3>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else  { ?>
                                                <div class="deck-file-panel ">
                                                    <div>
                                                        <h3>No Decks Tracked</h3>
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
                                            <div class="user-item-panel"><a href="<?=site_url()?>/Deck/createdeck">Switch to Deck Building</a></div>
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
                                            <div class="user-item-panel"><a href="<?=site_url()?>//Login/logout">Log Out</a></div>
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
                                                <div class="edit-done"><h3><?=$deckname?></h3><a href="javaScript:void(0);"  data-edit="#deckname"></a></div>
                                                <div class="edit-to"><input type="text" placeholder="Deck Name" id="deck_name" value="<?=$deckname?>"name="deck_name" onchange="savedeck('deck_name')"><a href="javaScript:void(0);" class="icon-tic" data-edit="#deckname"></a></div>
                                            </div>
                                            <!--
                                            <div class="deck-url" id="decknurl">
                                                <div class="edit-done"><h4><a href="" target="_blank">www.dynamicdeck.io/<span>deck-name</span></a></h4><a href="javaScript:void(0);" class="icon-edit" data-edit="#decknurl"></a></div>
                                                <div class="edit-to"><h4><a href="" target="_blank">www.dynamicdeck.io/<input type="text" value="deck-name" name=""></a></h4><a href="javaScript:void(0);" class="icon-tic" data-edit="#decknurl"></a></div>
                                            </div>-->

                                        </div>

                                    </div>
                                    <div class="right-item"><p></p></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- deck-sub-head -->
                    <div class="cover-image-panel">
                        <div class="save-block"  id="coversave" style="display:none">
                            <button onclick= "save_cover()"><i class="fa fa-check"></i></button>
                            <button onclick= "cancel_cover()"><i class="fa fa-times"></i></button>
                        </div>
                        <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET?>"  method="POST"  enctype="multipart/form-data" class="direct-upload" id="formcover">
                            <?php if($cover_photo)
                            {?>
                                <img src="<?=$cover_path?>"    id="image_cover" name="image_cover">
                            <?php }  else { ?>
                                <img src="<?=base_url()?>assets/images/cover-image.png"  id="image_cover" name="image_cover">
                            <?php  }?>
                            <?php $unId = uniqid(); ?>
                            <input type="hidden" name="key" value="<?='logos/'.$unId."_"?>${filename}" >
                            <input type="hidden" id="hiddenuniq_id1" value= "<?= $unId?>">
                            <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                            <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                            <input type="hidden" name="success_action_status" value="201">
                            <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                            <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                            <input type="hidden" id="editfname1" value="">

                        </form>

                    </div>

                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo">
                                    <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="formlogo">
                                        <?php if($logo_pic)
                                        { ?>
                                            <img src="<?=$logo_path?>"   id="image_logo" name="image_logo">
                                        <?php } else { ?>
                                            <img src="<?=base_url()?>assets/images/logo-placeholder.png"  id="image_logo" name="image_logo">
                                        <?php }?>
                                        <?php $unId = uniqid(); ?>
                                        <input type="hidden" name="key" value="<?='logos/'.$unId."_"?>${filename}" >
                                        <input type="hidden" id="hiddenuniq_ids" value= "<?= $unId?>">
                                        <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                        <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                        <input type="hidden" name="success_action_status" value="201">
                                        <input  type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                        <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                        <input type="hidden" id="editlogo1" value="">

                                    </form>
                                    <div class="save-block"  id="logosave" style="display:none">
                                        <button onclick= "save_logo()"><i class="fa fa-check"></i></button>
                                        <button onclick= "cancel_logo()"><i class="fa fa-times"></i></button>
                                    </div>
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
                                            <a href="javaScript:void(0);"  data-edit="#profileitem"></a>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <?php if($investment){ ?>
                                                            <h3><?=$investment?></h3>
                                                        <?php } else { ?>
                                                            <h3>Value</h3>
                                                        <?php } ?>
                                                        <?php if($equity){ ?>
                                                            <p><?=$equity?>--% equity</p>
                                                        <?php } else { ?>
                                                            <p>--% equity</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <?php if($valuation){ ?>
                                                            <h3><?=$valuation?></h3>
                                                        <?php } else { ?>
                                                            <h3>Value</h3>
                                                        <?php }?>
                                                        <?php if($pre_commited_money){ ?>
                                                            <p><?=$pre_commited_money?>Pre-Money</p>
                                                        <?php } else { ?>
                                                            <p>Pre-Money</p>
                                                        <?php } ?>
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
                                        <div class="edit-to">
                                            <a href="javaScript:void(0);" class="icon-tic" data-edit="#profileitem"></a>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Sought</h5>
                                                        <h3><input type="text" placeholder="Value" value="<?=$investment;?>" name="investment_sought" id="investment_sought"  onkeyup="valuation_percent();" onchange="savedeck('investment_sought')"></h3>
                                                        <p><input type="text" placeholder="--% equity" id="equity" value="<?=$equity;?>" onkeyup="valuation_percent();" onchange="savedeck('equity')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3><input type="text" placeholder="Value" name="valuation" id="valuation" value="<?=$valuation?>"></h3>
                                                        <p><input type="text" placeholder="--% Committed" id="pre1_commited_money" name="pre1_commited_money" value="<?=$pre_commited_money;?>" onkeyup="prev_fund_format()" onchange="savedeck('pre1_commited_money')"></p>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span><?=$updatecount?></span></li> <?php } else { ?><li class="icon-speeker"><span>###</span></li> <?php } ?>
                                        </ul>
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
                    <div class="cover-image-panel">
                        <?php if($cover_photo)
                        {?>
                            <img src="<?=base_url()?>assets/images/cover-image.png" >
                        <?php }
                        else
                        {?>
                            <img src="<?=base_url()?>assets/images/cover-image.png" >
                        <?php } ?>

                    </div>
                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo">
                                    <?php if($logo_pic)
                                    {?>
                                        <img src="<?=$logo_path?>">
                                    <?php }
                                    else
                                    {?><img src="<?=base_url()?>assets/images/logo-placeholder.png">
                                    <?php } ?>
                                </div>
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
                                                    <p class="top-margin">Subtitle</p>
                                                    <p>Subtitle</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span><?=$updatecount?></span></li> <?php } else { ?><li class="icon-speeker"><span>###</span></li> <?php } ?>
                                        </ul>
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
                                                <div class="attachment stage-2" id="attach">
                                                    <div class="attach-image">
                                                        <?php $unId = uniqid(); ?>
                                                        <form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="docform"  enctype="multipart/form-data" class="direct-upload">
                                                            <input type="hidden" name="key" value="<?='assets/docs/'.$unId."_"?>${filename}" >
                                                            <input type="hidden" id="hiddenuniqid1" value= "<?= $unId?>">
                                                            <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                            <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                            <input type="hidden" name="success_action_status" value="201">
                                                            <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                            <input type="hidden"name="signature" value="<?php echo $signature; ?>">
                                                            <input type="hidden" id="docname" >
                                                            <input type="hidden" id="docid" value="<?=$unId?>">
                                                            <input type="hidden" id="doctype">
                                                            <input type="hidden" id="docsize">
                                                            <label class="file-upload"><input type="file" name="file" id="doc1"><span>Choose File</span></label>
                                                        </form>
                                                        <p>MS Office, iWorks or PDF</p>
                                                    </div>
                                                    <span id="lblError"></span>
                                                    <div class="attach-content">
                                                        <input type="text" placeholder="Attachment Title" name="attachtitle" id="attachtitle">
                                                        <textarea id="attachdesc"> Short description of the attachment </textarea>
                                                        <div class="attach-acttion">
                                                            <a href="javaScript:save_attach()" class="save-attach"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="attachment stage-3" id="attach1" style="display:none">
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
                                                        <label class="file-upload"><input type="file" name="file"><span>Choose File</span></label>
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
                                                        <label class="file-upload"><input type="file" name="file" ><span>Choose File</span></label>
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
                                                    <p class="top-margin">Subtitle</p>
                                                    <p>Subtitle</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span><?=$updatecount?></span></li> <?php } else { ?><li class="icon-speeker"><span>###</span></li> <?php } ?>
                                        </ul>
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
                                                    <p class="top-margin">Subtitle</p>
                                                    <p>Subtitle</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span><?=$updatecount?></span></li> <?php } else { ?><li class="icon-speeker"><span>###</span></li> <?php } ?>

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
                            <div class="cp-details" id="companydetails">
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#companydetails"></a>
                                    <?php if($name){ ?>
                                        <h3><?=$name?></h3>
                                    <?php } else { ?>
                                        <h3>Company Name</h3>
                                    <?php } ?>
                                    <?php if($desc){ ?>
                                        <p><?=$desc?></p>
                                    <?php } else { ?>
                                        <p>Simple strapline that explains company purpose</p>
                                    <?php } ?>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydetails"></a>
                                    <h3><input type="text" placeholder="Company Name"  value="<?=$name?>" id="org_name" name="org_name" onchange="savecompany('org_name')"></h3>
                                    <p><textarea id="org_desc" placeholder="Simple strapline that explains company purpose" onchange="savecompany('org_desc')"><?=$desc?></textarea></p>
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
                                                <p class="top-margin">Subtitle</p>
                                                <p>Subtitle</p>
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
                            <div class="cp-links" id="cplink">
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#cplink"></a>
                                    <ul>
                                        <?php if($regnumber){ ?>
                                            <li class="icon-cno"><?=$regnumber?></li>
                                        <?php } else { ?>
                                            <li class="icon-cno">CN: 123456789</li>
                                        <?php } ?>

                                        <?php if($location){ ?>
                                            <li class="icon-nav"><?=$location?></li>
                                        <?php } else { ?>
                                            <li class="icon-nav">City, Country</li>
                                        <?php } ?>

                                        <?php if($sector){ ?>
                                            <li class="icon-bag"><?=$sector?></li>
                                        <?php } else { ?>
                                            <li class="icon-bag">Sector</li>
                                        <?php } ?>

                                        <?php if($website){ ?>
                                            <li class="icon-globe"><?=$website?></li>
                                        <?php } else { ?>
                                            <li class="icon-globe">Website</li>
                                        <?php } ?>
                                        <?php if($estabdate){ ?>
                                            <li class="icon-calender"><?=$estabdate?></li>
                                        <?php } else { ?>
                                            <li class="icon-calender">Date Est.</li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#cplink"></a>
                                    <ul>
                                        <li class="icon-cno"><input type="text" placeholder="CN: 123456789" value="<?=$regnumber?>" id="org_reg_number" name="org_reg_number" onchange="savelocation('org_reg_number')"></li>
                                        <li class="icon-nav"><input type="text" placeholder="City, Country" value="<?=$location?>" name="location"  onchange="savelocation('location')" placeholder="City, Country" id="location"></li>
                                        <li class="icon-bag"><input type="text" placeholder="Sector" id="org_sector" value="<?=$sector?>" onchange="savelocation('org_sector')" ></li>
                                        <li class="icon-globe"><input type="text" placeholder="Website" id="website" value="<?=$website?>" onchange="savelocation('website')" ></li>
                                        <li class="icon-calender"><input type="text" placeholder="Date Est." id="date"  data-language="en"  onblur="savelocation('date')" ></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cp-links" id="cplinks">
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#cplinks"></a>
                                    <ul>
                                        <?php if($link_org){ ?>
                                            <li class="icon-fb"><?=$link_org?></li>
                                        <?php } else { ?>
                                            <li class="icon-fb">Social link</li>
                                        <?php } ?>

                                        <?php if($twitter){ ?>
                                            <li class="icon-tw"><?=$twitter?></li>
                                        <?php } else { ?>
                                            <li class="icon-tw">Social link</li>
                                        <?php } ?>

                                        <?php if($linkedin){ ?>
                                            <li class="icon-ig"><?=$linkedin?></li>
                                        <?php } else { ?>
                                            <li class="icon-ig">Social link</li>
                                        <?php } ?>

                                    </ul>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#cplinks"></a>
                                    <ul>
                                        <li class="icon-fb"><input type="text" placeholder="Social link" value="<?=$link_org?>" id="link_organisation" onchange="savesocial('link_organisation')"></li>
                                        <li class="icon-tw"><input type="text" placeholder="Social link" value="<?=$twitter?>" id="twitter_page" onchange="savesocial('twitter_page')"></li>
                                        <li class="icon-ig"><input type="text" placeholder="Social link" value="<?=$linkedin?>" id="linkedin_page" onchange="savesocial('linkedin_page')"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="investor-metrics none-bg for-tab">
                                <ul class="invest-item">
                                    <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                    <?php if($updatecount){?> <li class="icon-speeker"><span><?=$updatecount?></span></li> <?php } else { ?><li class="icon-speeker"><span>###</span></li> <?php } ?>

                                </ul>
                            </div>
                        </div><!-- company-profile -->
                        <div class="company-detail-container"><!-- company-detail-container -->
                            <div class="company-panel" id="companydet"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#companydet"></a>
                                    <h3>What</h3>
                                    <div class="cd-panel">
                                        <h5>What We Do</h5>
                                        <?php if($what_we){ ?>
                                            <p><?=$what_we?></p>
                                        <?php } else { ?>
                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Our Competitors</h5>
                                        <?php if($comp){ ?>
                                            <p><?=$comp?></p>
                                        <?php } else { ?>
                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Problems Solved</h5>
                                        <ul>
                                            <?php if($prob1){ ?>
                                                <li><?=$prob1?></li>
                                            <?php } else { ?>
                                                <li>Bullet point goes here, with space for up to two lines of text</li>
                                            <?php } ?>
                                            <?php if($prob2){ ?>
                                                <li><?=$prob2?></li>
                                            <?php } else { ?>
                                                <li>Bullet point goes here, with space for up to two lines of text</li>
                                            <?php } ?>
                                            <?php if($prob3){ ?>
                                                <li><?=$prob3?></li>
                                            <?php } else { ?>
                                                <li>Bullet point goes here, with space for up to two lines of text</li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydet"></a>
                                    <h3><input type="text" value="What"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="What We Do"></h5>
                                        <?php if($what_we){ ?>
                                            <p><textarea id="what_we_do" name="what_we_do" onchange="savewhat('what_we_do')"><?=$what_we?></textarea></p>
                                        <?php } else { ?>
                                            <p><textarea id="what_we_do" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." name="what_we_do" onchange="savewhat('what_we_do')"></textarea></p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Our Competitors"></h5>
                                        <?php if($comp){ ?>
                                            <p><textarea id="competitors" name="competitors" onchange="savewhat('competitors')"><?=$comp?></textarea></p>
                                        <?php } else { ?>
                                            <p><textarea id="competitors" name="competitors" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely."onchange="savewhat('competitors')"><?=$comp?></textarea></p>
                                        <?php } ?>

                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Problems Solved"></h5>
                                        <ul>
                                            <?php if($prob1){ ?>
                                                <li><textarea id="problem1" onchange="savewhat('problem1')"><?=$prob1?></textarea></li>
                                            <?php } else { ?>
                                                <li><textarea id="problem1" placeholder="Bullet point goes here, with space for up to two lines of text" onchange="savewhat('problem1')"></textarea></li>
                                            <?php } ?>
                                            <?php if($prob2){ ?>
                                                <li><textarea id="problem2" onchange="savewhat('problem2')" ><?=$prob2?></textarea></li>
                                            <?php } else { ?>
                                                <li><textarea id="problem2" onchange="savewhat('problem2')" placeholder="Bullet point goes here, with space for up to two lines of text"><?=$prob2?></textarea></li>
                                            <?php } ?>
                                            <?php if($prob3){ ?>
                                                <li><textarea id="problem3" onchange="savewhat('problem3')"><?=$prob3?></textarea></li>
                                            <?php } else { ?>
                                                <li><textarea id="problem3" placeholder="Bullet point goes here, with space for up to two lines of text" onchange="savewhat('problem3')"><?=$prob3?></textarea></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- company-panel -->
                            <div class="company-panel" id="companydets"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#companydets"></a>
                                    <h3>How</h3>
                                    <div class="cd-panel">
                                        <h5>Business Model</h5>
                                        <?php if($buss_model){ ?>
                                            <p><?=$buss_model?></p>
                                        <?php } else { ?>
                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Our Advantage</h5>
                                        <?php if($adv){ ?>
                                            <p><?=$adv?></p>
                                        <?php } else { ?>
                                            <p>Content of the what, how and who areas goes here so that it fills the available space nicely.</p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Notable Achievements</h5>

                                        <ul>
                                            <?php
                                            if($getachieve) {
                                                if ($achieve1) { ?>
                                                    <li name="achieve[]"><?= $achieve1 ?></li>
                                                <?php } else { ?>
                                                    <li>What are your Notable Achievements ?#1</li>
                                                <?php } ?>
                                                <?php if ($achieve2) { ?>
                                                    <li><?= $achieve2 ?></li>
                                                <?php } else { ?>
                                                    <li>What are your Notable Achievements ?#2</li>
                                                <?php } ?>
                                                <?php if ($achieve3) { ?>
                                                    <li><?= $achieve3 ?></li>
                                                <?php } else { ?>
                                                    <li>What are your Notable Achievements ?#3</li>
                                                <?php }
                                            }  else {?>
                                                <li>What are your Notable Achievements ?#1</li>
                                                <li>What are your Notable Achievements ?#2</li>
                                                <li>What are your Notable Achievements ?#3</li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydets"></a>
                                    <h3><input type="text" value="How"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Business Model"></h5>
                                        <?php if($buss_model){ ?>
                                            <p><textarea id="business_model" name="business_model" onchange="savehow('business_model')"><?=$buss_model?></textarea></p>
                                        <?php } else { ?>
                                            <p><textarea id="business_model" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." name="business_model" onchange="savehow('business_model')"></textarea></p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Our Advantage"></h5>
                                        <?php if($buss_model){ ?>
                                            <p><textarea id="advantage" onchange="savehow('advantage')"><?=$adv?></textarea></p>
                                        <?php } else { ?>
                                            <p><textarea id="advantage" placeholder="Content of the what, how and who areas goes here so that it fills the available space nicely." onchange="savehow('advantage')"><?=$adv?></textarea></p>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Notable Achievements"></h5>
                                        <ul>
                                            <?php  if($getachieve) { if($achieve1) {?>
                                                <li><textarea  id="achieve1" onchange="saveachievements('achieve1')"><?=$achieve1?></textarea></li>
                                            <?php  } else { ?>
                                                <li><textarea  id="achieve1" placeholder="What are your Notable Achievements ?#1" onchange="saveachievements('achieve1')"></textarea></li>
                                            <?php  } ?>
                                                <?php if($achieve2) {?>
                                                    <li><textarea id="achieve2"  onchange="saveachievements('achieve2')"><?=$achieve2?></textarea></li>
                                                <?php  } else { ?>
                                                    <li><textarea  id="achieve2" placeholder="What are your Notable Achievements ?#2" onchange="saveachievements('achieve2')"></textarea></li>
                                                <?php  } ?>
                                                <?php if($achieve3) {?>
                                                    <li><textarea  id="achieve3" onchange="saveachievements('achieve3')"><?=$achieve3?></textarea></li>
                                                <?php  } else { ?>
                                                    <li><textarea  id="achieve3" placeholder="What are your Notable Achievements ?#3" onchange="saveachievements('achieve3')"></textarea></li>
                                                <?php    } } else {?>

                                                <li><textarea  id="achieve1" placeholder="What are your Notable Achievements ?#1" onchange="saveachievements('achieve1')"></textarea></li>
                                                <li><textarea  id="achieve2" placeholder="What are your Notable Achievements ?#2" onchange="saveachievements('achieve2')"></textarea></li>
                                                <li><textarea  id="achieve3" placeholder="What are your Notable Achievements ?#3" onchange="saveachievements('achieve3')"></textarea></li>
                                            <?php  } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div><!-- company-panel -->
                            <div class="company-panel" id="decklist"><!-- company-panel -->
                                <div class="edit-done">
                                    <a href="javaScript:void(0);"  data-edit="#decklist"></a>
                                    <h3>Who</h3>
                                    <div class="cd-panel">
                                        <h5>Management</h5>
                                        <?php
                                        $tid='t1';
                                        $geteamember=$this->M_deck->getmember($orgid,$tid);
                                        if($geteamember)
                                        {

                                            foreach($geteamember as $item)
                                            {

                                                $pic=$item->photo;
                                                $member_name=$item->member_name;
                                                $role=$item->role;
                                                $achieve=$item->achievement;
                                                $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                $pic_path =  $thumbpath.'/photos/'.$item->photo;


                                            }  ?>
                                            <div class="deck-item">
                                                <?php  if($pic) { ?>
                                                    <img src="<?=$pic_path?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <?php }?>
                                                <div>
                                                    <h6><?=$member_name?></h6>
                                                    <p><?=$role?></p>
                                                    <span><?=$achieve?></span>
                                                </div>
                                            </div>
                                        <?php }
                                        else
                                        { ?>
                                            <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <div>
                                                    <h6>Enter Team Member Name</h6>
                                                    <p>Team Member Role</p>
                                                    <span>Prior role or experience</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $tid='t2';
                                        $geteamember=$this->M_deck->getmember($orgid,$tid);
                                        if($geteamember)
                                        {

                                            foreach($geteamember as $item)
                                            {

                                                $pic2=$item->photo;
                                                $member_name2=$item->member_name;
                                                $role2=$item->role;
                                                $achieve2=$item->achievement;
                                                $thumbpath2   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                $pic_path2 =  $thumbpath.'/photos/'.$item->photo;


                                            }  ?>
                                            <div class="deck-item">
                                                <?php  if($pic2) { ?>
                                                    <img src="<?=$pic_path2?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <?php }?>
                                                <div>
                                                    <h6><?=$member_name2?></h6>
                                                    <p><?=$role2?></p>
                                                    <span><?=$achieve2?></span>
                                                </div>
                                            </div>
                                        <?php }
                                        else
                                        { ?>
                                            <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <div>
                                                    <h6>Enter Team Member Name</h6>
                                                    <p>Team Member Role</p>
                                                    <span>Prior role or experience</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $tid='t3';
                                        $geteamember=$this->M_deck->getmember($orgid,$tid);
                                        if($geteamember)
                                        {

                                            foreach($geteamember as $item)
                                            {

                                                $pic3=$item->photo;
                                                $member_name3=$item->member_name;
                                                $role3=$item->role;
                                                $achieve3=$item->achievement;
                                                $thumbpath3  = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                $pic_path3 =  $thumbpath.'/photos/'.$item->photo;


                                            }  ?>
                                            <div class="deck-item">
                                                <?php  if($pic3) { ?>
                                                    <img src="<?=$pic_path3?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <?php }?>
                                                <div>
                                                    <h6><?=$member_name3?></h6>
                                                    <p><?=$role3?></p>
                                                    <span><?=$achieve3?></span>
                                                </div>
                                            </div>
                                        <?php }
                                        else
                                        { ?>
                                            <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <div>
                                                    <h6>Enter Team Member Name</h6>
                                                    <p>Team Member Role</p>
                                                    <span>Prior role or experience</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="cd-panel">
                                        <h5>Notable Investors & Advisors</h5>
                                        <?php
                                        $tid='I1';
                                        $geteamember=$this->M_deck->getmember($orgid,$tid);
                                        if($geteamember)
                                        {
                                            foreach($geteamember as $item)
                                            {
                                                $pic=$item->photo;
                                                $member_name=$item->member_name;
                                                $role=$item->role;
                                                $achievement1=$item->achievement;
                                                $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                $pic_path =  $thumbpath.'/photos/'.$item->photo;
                                            }?>
                                            <div class="deck-item">
                                                <?php if($pic) { ?>
                                                    <img src="<?=$pic_path?>"  alt="" >
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <?php }?>
                                                <div>
                                                    <h6><?=$member_name?></h6>
                                                    <p><?=$role?></p>
                                                    <span><?=$achievement1?></span>
                                                </div>
                                            </div>
                                        <?php } else {?>
                                            <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <div>
                                                    <h6>Enter Team Member Name</h6>
                                                    <p>Team Member Role</p>
                                                    <span>Prior role or experience</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $tid='I2';
                                        $geteamember=$this->M_deck->getmember($orgid,$tid);
                                        if($geteamember)
                                        {
                                            foreach($geteamember as $item)
                                            {
                                                $pic2=$item->photo;
                                                $membername2=$item->member_name;
                                                $role2=$item->role;
                                                $achieve2=$item->achievement;
                                                $thumbpath2   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                $pic_path2 =  $thumbpath.'/photos/'.$item->photo;
                                            }?>
                                            <div class="deck-item">
                                                <?php if($pic2) { ?>
                                                    <img src="<?=$pic_path2?>"  alt="" >
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <?php }?>
                                                <div>
                                                    <h6><?=$membername2?></h6>
                                                    <p><?=$role2?></p>
                                                    <span><?=$achieve2?></span>
                                                </div>
                                            </div>
                                        <?php } else {?>
                                            <div class="deck-item">
                                                <img src="<?=base_url()?>assets/images/deck.png" alt="">
                                                <div>
                                                    <h6>Enter Team Member Name</h6>
                                                    <p>Team Member Role</p>
                                                    <span>Prior role or experience</span>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="edit-to">
                                    <a href="javaScript:void(0);" class="icon-tic" data-edit="#decklist"></a>
                                    <h3><input type="text" value="Who"></h3>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Management"></h5>
                                        <div class="deck-item">
                                            <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form">
                                                <?php
                                                $tid='t1';
                                                $geteamember=$this->M_deck->getmember($orgid,$tid);
                                                if($geteamember)
                                                {

                                                foreach($geteamember as $item)
                                                {

                                                    $pic=$item->photo;
                                                    $member_name=$item->member_name;
                                                    $role=$item->role;
                                                    $achieve=$item->achievement;
                                                    $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                    $pic_path =  $thumbpath.'/photos/'.$item->photo;


                                                }  if($pic) { ?>
                                                    <img src="<?=$pic_path?>"  id="memberimage_t1" >
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t1" >
                                                <?php }?>
                                                <?php $unId = uniqid(); ?>
                                                <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                <input type="hidden" id="hidenunid" value= "<?= $unId?>">
                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                <input type="hidden" name="success_action_status" value="201">
                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                <input  type="hidden" id="picname" value="">
                                                <label class="deck-upload"><input type="file" id="memberimageedit_t1" name="file" name="memberimage"><span></span></label>
                                            </form>
                                            <div>
                                                <h6><input type="text"  id="membername_t1" value="<?=$member_name?>" onchange="saveteam_member('membername_t1')"></h6>
                                                <p><input type="text" id="role_t1" value="<?=$role?>" onchange="saveteam_member('role_t1')" ></p>
                                                <span><input type="text" id="achievement_t1" value="<?=$achieve?>"  onchange="saveteam_member('achievement_t1')"></span>
                                            </div>
                                            <?php } else { ?>

                                                <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form">
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t1" >
                                                    <?php $unId = uniqid(); ?>
                                                    <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                    <input type="hidden" id="hidenunid" value= "<?= $unId?>">
                                                    <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                    <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                    <input type="hidden" name="success_action_status" value="201">
                                                    <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                    <input  type="hidden" id="picname" value="">
                                                    <label class="deck-upload"><input type="file" id="memberimageedit_t1" name="file" name="memberimage"><span></span></label>
                                                </form>
                                                <div>
                                                    <h6><input type="text"  id="membername_t1" placeholder="Enter Team Member Name" onchange="saveteam_member('membername_t1')"></h6>
                                                    <p><input type="text" id="role_t1" placeholder="Team Member Role" onchange="saveteam_member('role_t1')" ></p>
                                                    <span><input type="text" id="achievement_t1" placeholder="Prior role or experience"  onchange="saveteam_member('achievement_t1')"></span>
                                                </div>
                                            <?php } ?>
                                            <div class="save-block"  id="teamsave-block_t1" style="display:none">
                                                <button onclick= "save_team1('t1')"><i class="fa fa-check"></i></button>
                                                <button onclick= "cancel_team()"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form2">
                                                <?php
                                                $tid2='t2';
                                                $geteamember=$this->M_deck->getmember($orgid,$tid2);
                                                if($geteamember)
                                                {

                                                foreach($geteamember as $item)
                                                {

                                                    $pic2=$item->photo;
                                                    $member_name2=$item->member_name;
                                                    $role2=$item->role;
                                                    $achieve2=$item->achievement;
                                                    $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                    $pic_path2 =  $thumbpath.'/photos/'.$item->photo;


                                                }  if($pic2) { ?> <img src="<?=$pic_path2?>"  id="memberimage_t2">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t2" >
                                                <?php }?>
                                                <?php $unId = uniqid(); ?>
                                                <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                <input type="hidden" id="hidenunid2" value= "<?= $unId?>">
                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                <input type="hidden" name="success_action_status" value="201">
                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                <input  type="hidden" id="picname2" value="">
                                                <label class="deck-upload"><input type="file" name="file" id="memberimageedit_t2" name="memberimage"><span></span></label>
                                            </form>
                                            <div>
                                                <h6><input type="text" id="membername_t2" value="<?=$member_name2?>" onchange="saveteam_member('membername_t2')"></h6>
                                                <p><input type="text" id="role_t2"  value="<?=$role2?>" onchange="saveteam_member('role_t2')"></p>
                                                <span><input type="text" id="achievement_t2" value="<?=$achieve2?>" onchange="saveteam_member('achievement_t2')" ></span>
                                            </div>
                                            <?php } else { ?>
                                                <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form2">

                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t2" >
                                                    <?php $unId = uniqid(); ?>
                                                    <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                    <input type="hidden" id="hidenunid2" value= "<?= $unId?>">
                                                    <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                    <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                    <input type="hidden" name="success_action_status" value="201">
                                                    <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                    <input  type="hidden" id="picname2" value="">
                                                    <label class="deck-upload"><input type="file" name="file" id="memberimageedit_t2" name="memberimage"><span></span></label>
                                                </form>

                                                <div>
                                                    <h6><input type="text"  id="membername_t2" placeholder="Enter Team Member Name" onchange="saveteam_member('membername_t2')"></h6>
                                                    <p><input type="text" id="role_t2" placeholder="Team Member Role" onchange="saveteam_member('role_t2')" ></p>
                                                    <span><input type="text" id="achievement_t2" placeholder="Prior role or experience"  onchange="saveteam_member('achievement_t2')"></span>
                                                </div>
                                            <?php } ?>
                                            <div class="save-block"  id="teamsave-block_t2" style="display:none">
                                                <button onclick= "save_team2('t2')"><i class="fa fa-check"></i></button>
                                                <button onclick= "cancel_team()"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form3">
                                                <?php
                                                $tid3='t3';
                                                $geteamember=$this->M_deck->getmember($orgid,$tid3);
                                                if($geteamember)
                                                {

                                                foreach($geteamember as $item)
                                                {

                                                    $pic3=$item->photo;
                                                    $member_name3=$item->member_name;
                                                    $role3=$item->role;
                                                    $achieve3=$item->achievement;
                                                    $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                    $pic_path3 =  $thumbpath.'/photos/'.$item->photo;


                                                }  if($pic3) { ?>
                                                    <img src="<?=$pic_path3?>" id="memberimage_t3">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t3" >
                                                <?php } ?>
                                                <?php $unId = uniqid(); ?>
                                                <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                <input type="hidden" id="hidenunid3" value= "<?= $unId?>">
                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                <input type="hidden" name="success_action_status" value="201">
                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                <input  type="hidden" id="picname3" value="">
                                                <label class="deck-upload"><input type="file" name="file" id="memberimageedit_t3" name="memberimage"><span></span></label>
                                            </form>
                                            <div>
                                                <h6><input type="text" id="membername_t3"  value="<?=$member_name3?>" onchange="saveteam_member('membername_t3')"></h6>
                                                <p><input type="text" id="role_t3" value="<?=$role3?>"  onchange="saveteam_member('role_t3')"></p>
                                                <span><input type="text" id="achievement_t3"  value="<?=$achieve3?>" onchange="saveteam_member('achievement_t3')"></span>
                                            </div>
                                            <?php } else {?>
                                                <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="member_form3">

                                                    <img src="<?=base_url()?>assets/images/deck.png" id="memberimage_t3" >
                                                    <?php $unId = uniqid(); ?>
                                                    <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                    <input type="hidden" id="hidenunid3" value= "<?= $unId?>">
                                                    <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                    <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                    <input type="hidden" name="success_action_status" value="201">
                                                    <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                    <input  type="hidden" id="picname3" value="">
                                                    <label class="deck-upload"><input type="file" name="file" id="memberimageedit_t3" name="memberimage"><span></span></label>
                                                </form>


                                                <div>
                                                    <h6><input type="text" id="membername_t3"  placeholder="Enter Team Member Name" onchange="saveteam_member('membername_t3')"></h6>
                                                    <p><input type="text" id="role_t3"  placeholder="Team Member Role" onchange="saveteam_member('role_t3')"></p>
                                                    <span><input type="text" id="achievement_t3"  placeholder="Prior role or experience" onchange="saveteam_member('achievement_t3')"></span>
                                                </div>
                                            <?php } ?>
                                            <div class="save-block"  id="teamsave-block_t3" style="display:none">
                                                <button onclick= "save_team3('t3')"><i class="fa fa-check"></i></button>
                                                <button onclick= "cancel_team()"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cd-panel">
                                        <h5><input type="text" value="Notable Investors & Advisors"></h5>
                                        <div class="deck-item">
                                            <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="invest_form">
                                                <?php
                                                $tid='I1';
                                                $geteamember=$this->M_deck->getmember($orgid,$tid);
                                                if($geteamember)
                                                {
                                                foreach($geteamember as $item)
                                                {
                                                    $pic=$item->photo;
                                                    $member_name=$item->member_name;
                                                    $role=$item->role;
                                                    $achievement1=$item->achievement;
                                                    $thumbpath   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                    $pic_path =  $thumbpath.'/photos/'.$item->photo;
                                                }  if($pic) { ?>
                                                    <img src="<?=$pic_path?>"  id="investorimage_I1" >
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="investorimage_I1" >
                                                <?php } ?>
                                                <?php $unId = uniqid(); ?>
                                                <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                <input type="hidden" id="hidenunid1" value= "<?= $unId?>">
                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                <input type="hidden" name="success_action_status" value="201">
                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                <input   id="picname_inv1" type="hidden" value="">
                                                <label class="deck-upload"><input type="file" name="file" id="investorimageedit_I1" name="memberimage"><span></span></label>
                                            </form>

                                            <div>
                                                <h6><input type="text"  id="membername_I1" value="<?=$member_name?>" onchange="saveteam_member('membername_I1')"></h6>
                                                <p><input type="text" id="role_I1" value="<?=$role?>" onchange="saveteam_member('role_I1')"></p>
                                                <span><input type="text"  id="achievement_I1" value="<?=$achievement1?>"  onchange="saveteam_member('achievement_I1')"></span>
                                            </div>
                                            <?php }   else { ?>
                                                <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="invest_form">

                                                    <img src="<?=base_url()?>assets/images/deck.png" id="investorimage_I1" >
                                                    <?php $unId = uniqid(); ?>
                                                    <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                    <input type="hidden" id="hidenunid1" value= "<?= $unId?>">
                                                    <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                    <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                    <input type="hidden" name="success_action_status" value="201">
                                                    <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                    <input   id="picname_inv1" type="hidden" value="">
                                                    <label class="deck-upload"><input type="file" name="file" id="investorimageedit_I1" name="memberimage"><span></span></label>
                                                </form>

                                                <div>
                                                    <h6><input type="text"  id="membername_I1" placeholder="Enter Team Member Name" onchange="saveteam_member('membername_I1')"></h6>
                                                    <p><input type="text" id="role_I1" placeholder="Team Member Role" onchange="saveteam_member('role_I1')"></p>
                                                    <span><input type="text"  id="achievement_I1"   placeholder="Prior role or experience" onchange="saveteam_member('achievement_I1')"></span>
                                                </div>
                                            <?php }?>
                                            <div id="investsave-block"  class="save-item" style="display:none">
                                                <?php $tid='I1';?>
                                                <button onclick= "save_invest1('<?=$tid?>')"><i class="fa fa-check"></i></button>
                                                <button onclick= "cancel_invest()"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="deck-item">
                                            <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="invest_form2">
                                                <?php
                                                $tid='I2';
                                                $geteamember=$this->M_deck->getmember($orgid,$tid);
                                                if($geteamember)
                                                {
                                                foreach($geteamember as $item)
                                                {
                                                    $pic2=$item->photo;
                                                    $member_name2=$item->member_name;
                                                    $achievement2=$item->achievement;
                                                    $role2=$item->role;
                                                    $thumbpath2   = $this->general->thumbpath('thumbnail').S3_BUCKET;
                                                    $pic_path2 =  $thumbpath2.'/photos/'.$item->photo;
                                                }  if($pic2) { ?>
                                                    <img src="<?=$pic_path2?>"  id="investorimage_I2">
                                                <?php } else { ?>
                                                    <img src="<?=base_url()?>assets/images/deck.png" id="investorimage_I2">
                                                <?php }?>
                                                <?php $unId = uniqid(); ?>
                                                <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                <input type="hidden" id="hidunid2" value= "<?= $unId?>">
                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                <input type="hidden" name="success_action_status" value="201">
                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                <input  type="hidden" id="picname_inv2" value="">
                                                <label class="deck-upload"><input type="file" name="file" id="investorimageedit_I2" name="memberimage"><span></span></label>
                                            </form>
                                            <div>
                                                <h6><input type="text"  id="membername_I2" value="<?=$member_name2?>" onchange="saveteam_member('membername_I2')"></h6>
                                                <p><input type="text"  id="role_I2" value="<?=$role2?>" onchange="saveteam_member('role_I2')"></p>
                                                <span><input type="text"  id="achievement_I2" value="<?=$achievement2?>"  onchange="saveteam_member('achievement_I2')"></span>
                                            </div>
                                            <?php } else { ?>
                                                <form action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"  method="POST" enctype="multipart/form-data" class="direct-upload" id="invest_form2">

                                                    <img src="<?=base_url()?>assets/images/deck.png" id="investorimage_I2">
                                                    <?php $unId = uniqid(); ?>
                                                    <input type="hidden" name="key" value="<?='photos/'.$unId."_"?>${filename}" >
                                                    <input type="hidden" id="hidunid2" value= "<?= $unId?>">
                                                    <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                    <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                    <input type="hidden" name="success_action_status" value="201">
                                                    <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                                                    <input  type="hidden" id="picname_inv2" value="">
                                                    <label class="deck-upload"><input type="file" name="file" id="investorimageedit_I2" name="memberimage"><span></span></label>
                                                </form>

                                                <div>
                                                    <h6><input type="text"  id="membername_I2"  placeholder="Enter Team Member Name" onchange="saveteam_member('membername_I2')"></h6>
                                                    <p><input type="text"  id="role_I2"  placeholder="Team Member Role" onchange="saveteam_member('role_I2')"></p>
                                                    <span><input type="text"  id="achievement_I2"  placeholder="Prior role or experience" onchange="saveteam_member('achievement_I2')"></span>
                                                </div>
                                            <?php } ?>
                                            <div id="investsave-block_I2"  class="save-item" style="display:none">
                                                <?php $tid='I2';?>
                                                <button onclick= "save_invest2('<?=$tid?>')"><i class="fa fa-check"></i></button>
                                                <button onclick= "cancel_invest()"><i class="fa fa-times"></i></button>
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
            <div class="deck-messages" id="tracklogin">
                <div class="dm-content">
                    <div class="dm-body">
                        <div class="dm-dev">
                            <p>Please Signup or Signin  to continue</p>
                            <button class="button signup" onclick="location.href='<?=site_url()?>/Login/index/<?php echo $endeckid?>';">OK</button>
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
    <script src="<?=base_url()?>assets/js/loadingoverlay.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datepicker.min.js"></script>
    <script src="<?=base_url()?>assets/js/layout.min.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>
