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
                                <li><a href="javaScript:print_page()" class="nav-print" id="print"></a></li>
                            </ul>
                            <div class="account-holder" id="nvupdates"><!-- account-holder -->
                                <div class="ah-head"><h6>Updates</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-comment-post">
                                    <div class="ah-commment-panel">
                                        <span class="chat-smile"></span>
                                        <textarea placeholder="What's happening?" name="msg" id="msg" maxlength="280"></textarea>
                                        <span id="chatcount" class="chat-round custom-round"></span>
                                    </div>
                                    <div class="chat-button-panel">
                                        <div class="chat-checkbox"><input type="checkbox" name=""><span></span>Email update to Investors</div>
                                        <button class="button post" id="post">Post</button>
                                    </div>
                                </div>
                                <div class="ah-comments-posted scrolld-list">
                                    <div class="ah-comments-panel" id="comment">
									<?php if($getupdate)
									{
										foreach($getupdate as $item)
										{

										   $updatedate=$item->update_date;
										   $udate=date('d/m/Y', strtotime($updatedate));
										 ?>
											<div class="posted-comments">
                                            <div class="pc-head"><h3><img src="<?=base_url()?>assets/images/chat.png" alt=""><?=$item->org_name?></h3> <span class="pc-date"><?= $udate?></span></div>
                                            <div class="pc-content"><p><?=$item->msg?></p></div>
                                            <div class="pc-footer"><ul><li class="icon-views">#</li><li class="icon-love">#</li><li class="icon-reply">#</li></ul></div>
                                        </div>
										<?php }
									}  ?>								                                    
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
                                            }else {?>
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
                                            <div class="user-item-panel"><a href="<?=site_url()?>Deck/createdeck">Switch to Investing</a></div>
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
                                    <span id="sharemessage"></span>
                                    <span id="shareaccess"></span>
                                    <div class="ah-form">
                                        <label>Your Unique Deck Link <a href="javaScript:copyToClipboard('surl');" class="color-violet">Copy</a></label>
                                        <input type="text" placeholder="www.dynamicdeck.io/deck-name" id="surl" name="surl" <?php echo $readonly; ?> value="<?=$shareurl?>">
                                    </div>
                                    <div class="ah-form">
                                        <label>Set Deck Password <a href="javaScript:removefromClipboard('deckpassword');">Remove</a></label>
                                        <input type="text" placeholder="* * * * * * * * * *" name="deckpassword" id="deckpassword" value="<?=$deckpassword?>">
                                    </div>
                                    <div class="ah-button">
                                        <button type="submit" id="share" onclick="share_deckdetails()"class="button signup right-margin">Save</button>
                                        <div class="share-switch-panel">
                                            <div class="share-switch active" id="shareoff"></div>
                                            Sharing on
                                        </div>
                                        <input type="hidden"  id="access">
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
                                                <div class="edit-done"><h3 id="dname"><?=$deckname?></h3><a href="javaScript:void(0);" class="icon-edit" data-edit="#deckname"></a></div>
                                                <div class="edit-to"><input class="width-dynamic proba dva" type="text" placeholder="Deck Name" id="deck_name" value="<?=$deckname?>"name="deck_name" onchange="savedeck('deck_name')"><a href="javaScript:void(0);" class="icon-tic" data-edit="#deckname"></a></div>
                                            </div>

                                            <div class="deck-url" id="decknurl">
                                                <?php  if($decklink) { ?>
                                                    <div class="edit-done"><h4><a>www.dynamicdeck.io/<span id="dename"><?=$decklink?></span></a></h4><a href="javaScript:void(0);" class="icon-edit" data-edit="#decknurl"></a></div>
                                                   <?php }
                                                    else
                                                    { ?>
                                                <div class="edit-done"><h4><a>www.dynamicdeck.io/<span id="dename">deck-name</span></a></h4><a href="javaScript:void(0);" class="icon-edit" data-edit="#decknurl"></a></div>
                                                <?php }?>

                                                <div class="edit-to"><h4><a>www.dynamicdeck.io/<input type="text" placeholder="deck-name" value="<?=$decklink?>" name="deckurl" id="deckurl" onchange="savedeckurl('deckurl')"></a></h4><a href="javaScript:void(0);" class="icon-tic" data-edit="#decknurl"></a></div>
                                            </div>
                                            
                                        </div>
                                        <input type="hidden" name="uid" id="uid" value="<?=$uid;?>"/>
                                        <input type="hidden" name="org_id" id="org_id" value="<?=$orgid;?>"/>
                                        <input type="hidden" name="encrid" id="encrid" value="<?=$encorid;?>"/>
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
                                <img src="<?=$cover_path?>" id="image_cover" name="image_cover">
                            <?php }  else { ?>
                                <span class="placeholder-text-cover">Cover Image</span><img src="<?=base_url()?>assets/images/cover-image-v1.png"  id="image_cover" name="image_cover">
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
                            <label class="photo-upload">
                                <input type="file" name="file" id="imgcover-edit" ><span></span></label>
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
                                            <span class="placeholder-text-icon">Logo</span><img src="<?=base_url()?>assets/images/logo-placeholder-v1.png"  id="image_logo" name="image_logo">
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
                                        <label class="photo-upload">
                                            <input type="file" name="file" id="imglogo-edit"><span></span></label>
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
                                            <?php if($name){ ?>
                                                <h3 ><?=$name?></h3>
                                            <?php } else { ?>
                                                <h3>Company Name</h3>
                                            <?php } ?>
                                            <?php if($desc){ ?>
                                                <p ><?=$desc?></p>
                                            <?php } else { ?>
                                                <p >Simple strapline that explains company purpose</p>
                                            <?php } ?>
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
														<?php if($investment){ ?>
                                                        <h3 id="invst"><div class="invstmnt"><?=$investment?></div></h3>
														<?php } else { ?>
														<h3 id="invst">Value</h3>
														<?php } ?>
														<?php if($equity){ ?>
                                                        <p id="eqty"><?=$equity?>--% equity</p>
														<?php } else { ?>
														<p id="eqty">--% equity</p>
														<?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
														<?php if($valuation){ ?>
                                                        <h3 id="val"><div class="invstmnt"><?=$valuation?></div></h3>
														<?php } else { ?>
														<h3 id="val">Value</h3>
														<?php }?>
														<p>Pre-Money</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <?php if($fund_currency){ ?>
                                                        <h3 id="fcy"><div class="invstmnt"><?=$fund_currency?></div></h3>
                                                        <?php } else { ?>
                                                        <h3 id="fcy">Value</h3>
                                                        <?php } ?>
                                                        <p>--% Committed</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <?php if($revenue_currency){ ?>
                                                            <h3 id="rcy" ><div class="invstmnt"><?=$revenue_currency?></div></h3>
                                                        <?php } else { ?>
                                                            <h3 id="rcy">Value</h3>
                                                        <?php } ?>
                                                            <p>Profitable</p>

                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Prior Funding</h5>
                                                        <?php if($prev_fund){?>
                                                        <?php if($currency){ ?>
                                                        <p id="dacy1" class="top-margin"><span id="day1" class="place-date"><?=$date1?>,</span> <span id="crcy" class="place-fund"><?=$currency?></span></p>
                                                        <?php } else { ?>
                                                        <p id="dacy1" class="top-margin"><span id="day1" class="place-date">Date,</span> <span id="crcy" class="place-fund">Subtitle</span></p>
                                                        <?php } ?>
                                                        <?php if($currency1){ ?>
                                                        <p id="dacy2"><span id="day2"class="place-date"><?=$date2?>,</span> <span id="crcy1" class="place-fund"><?=$currency1?></span></p>
                                                        <?php } else { ?>
                                                        <p  id="dacy2"><span id="day2" class="place-date">Date,</span> <span  id="crcy1" class="place-fund">Subtitle</span></p>
                                                        <?php }  } else {?>
                                                            <p id="dacy1" class="top-margin"><span  id="day1"  class="place-date">Date,</span> <span id="crcy" class="place-fund">Subtitle</span></p>
                                                            <p  id="dacy2"><span class="place-date" id="day2">Date,</span> <span  id="crcy1" class="place-fund">Subtitle</span></p>
                                                        <?php } ?>
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
                                                        <h3 class="funds"><span id="invest_type" onchange="savefunds('invest_type')">$</span><input type="text" placeholder="Value" value="<?=$invest;?>" name="investment_sought" id="investment_sought"  onkeyup="valuation_percent();" onchange="savefunds('investment_sought')"></h3>
                                                        <p><input type="text" placeholder="--% equity" id="equity" value="<?=$equity;?>" onkeyup="valuation_percent();" onchange="savefunds('equity')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Valuation</h5>
                                                        <h3 class="funds"><span id="v_type" onchange="savefunds('v_type')">$</span><input type="text" placeholder="Value" name="valuation" id="valuation" value="<?=$valtn?>"></h3>
                                                        <p><input type="text" placeholder="Pre-Money" id="pre1_commited_money" name="pre1_commited_money" value="Pre-Money" onkeyup="prev_fund_format()" onchange="savefunds('pre1_commited_money')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Funds Pledged</h5>
                                                        <h3 class="funds"><span id="fund_type"   onchange="savefunds('fund_type')">$</span><input type="text" placeholder="Value" name="fund_currency" id="fund_currency"  value="<?=$fund_cy?>" onkeyup="fundcurrency_format()" onchange="savefunds('fund_currency')"></h3>
                                                        <p><input type="text" placeholder="--% Committed" id="pre_commited_type" name="pre_commited_type"  value="--% Committed" onchange="savefunds('pre_commited_type')"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item">
                                                        <h5>Current MRR</h5>
                                                        <h3 class="funds"><span id="revenue_type"  onchange="savefunds('revenue_type')">$</span><input type="text" placeholder="Value" name="revenue_currency" id="revenue_currency"  value="<?=$revenue?>" onkeyup="revenue_format()" onchange="savefunds('revenue_currency')"></h3>
                                                        <p><input type="text" placeholder="Profitable" id="estimated_sequence" name="estimated_sequence"  value="Profitable" onchange="savefunds('estimated_sequence')" onkeyup="est_revenue_format()"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="profile-item priorfund">
                                                        <h5>Prior Funding</h5>
                                                        <?php if($prev_fund){ ?>
                                                        <?php if($currency){ ?>
                                                        <div class="prior-value top-margin"><input class="date-input" type="text" placeholder="Date Est." id="date1"  data-language="en"  onblur="saveprevfunds('date1')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input class="currency-input" type="text" placeholder="Subtitle" id="currency"  value="<?=$curcy?>" onkeyup="currency_format()" onchange="saveprevfunds('currency')"></div></div>
                                                        <?php } else { ?>
                                                                <div class="prior-value top-margin"><input class="date-input" type="text" placeholder="Date Est." id="date1"  data-language="en"  onblur="saveprevfunds('date1')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input class="currency-input"  type="text" placeholder="Subtitle" id="currency"  value="Subtitle"  onkeyup="currency_format()" onchange="saveprevfunds('currency')" ></div></div>
                                                        <?php } ?>
                                                        <?php if($currency1){ ?>
                                                        <div class="prior-value prevfund"><input class="date-input" type="text" placeholder="Date Est." id="date2"  data-language="en"  onblur="saveprevfunds('date2')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input class="currency-input"  type="text" placeholder="Subtitle" id="currency1"  value="<?=$curcy1?>" onkeyup="currency1_format()" onchange="saveprevfunds('currency1')"></div></div>
                                                        <?php } else { ?>
                                                        <div class="prior-value prevfund"><input class="date-input" type="text" placeholder="Date Est." id="date2"  data-language="en"  onblur="saveprevfunds('date2')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input class="currency-input"  type="text" placeholder="Subtitle" id="currency1"  value="Subtitle" onkeyup="currency1_format()" onchange="saveprevfunds('currency1')"></div></div>
                                                        <?php }  } else { ?>
                                                            <div class="prior-value top-margin"><input class="date-input" type="text" placeholder="Date Est." id="date1"  data-language="en"  onblur="saveprevfunds('date1')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input class="currency-input"  type="text" placeholder="Subtitle" id="currency"  value="currency" onkeyup="currency_format()" onchange="saveprevfunds('currency')"></div></div>
                                                            <div class="prior-value prevfund"><input class="date-input" type="text" placeholder="Date Est." id="date2"  data-language="en"  onblur="saveprevfunds('date2')" ><div class="prior-fund"><span id="currency_type"  onchange="saveprevfunds('currency_type')">$</span><input  class="currency-input"  type="text" placeholder="Subtitle" id="currency1"  value="currency" onkeyup="currency1_format()" onchange="saveprevfunds('currency1')"></div></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span id="update"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update">###</span></li> <?php } ?>

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
                            <img src="<?=base_url()?>assets/images/cover-image-v1.png" >
                        <?php }
                        else
                        {?>
                            <img src="<?=base_url()?>assets/images/cover-image-v1.png" >
                       <?php } ?>

                    </div>
                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo">
                                    <?php if($logo_pic)
                                    {?>
                                    <img src="<?=$logo_path?>" id="ilogo">
                                    <?php }
                                    else
                                    {?><img src="<?=base_url()?>assets/images/logo-placeholder.png" id="ilogo">
                                    <?php } ?>
                                </div>
                                <div class="profile-container">
                                    <div class="cp-details">
                                        <?php if($name){ ?>
                                            <h3 ><?=$name?></h3>
                                        <?php } else { ?>
                                            <h3>Company Name</h3>
                                        <?php } ?>
                                        <?php if($desc){ ?>
                                            <p ><?=$desc?></p>
                                        <?php } else { ?>
                                            <p >Simple strapline that explains company purpose</p>
                                        <?php } ?>
                                    </div>
                                    <div class="profile-item-panel">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Sought</h5>
                                                    <?php if($investment){ ?>
                                                        <h3 id="invst1"><div class="invstmnt"><?=$investment?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="invst1">Value</h3>
                                                    <?php } ?>
                                                    <?php if($equity){ ?>
                                                        <p id="eqty1"><?=$equity?>--% equity</p>
                                                    <?php } else { ?>
                                                        <p id="eqty1">--% equity</p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Valuation</h5>
                                                    <?php if($valuation){ ?>
                                                        <h3 id="val1"><div class="invstmnt"><?=$valuation?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="val1">Value</h3>
                                                    <?php }?>
                                                        <p >Pre-Money</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Pledged</h5>
                                                    <?php if($fund_currency){ ?>
                                                        <h3 id="fcy1"><div class="invstmnt"><?=$fund_currency?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="fcy1">Value</h3>
                                                    <?php } ?>
                                                        <p >--% Committed</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Current MRR</h5>
                                                    <?php if($revenue_currency){ ?>
                                                        <h3 id="rcy1"><div class="invstmnt"><?=$revenue_currency?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="rcy1">Value</h3>
                                                    <?php } ?>
                                                        <p>Profitable</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Prior Funding</h5>
                                                    <?php if($prev_fund){?>
                                                        <?php if($currency){ ?>
                                                            <p id="dacy3" class="top-margin"><span id="day3" class="place-date"><?=$date1?>,</span> <span id="crcy3" class="place-fund"><?=$currency?></span></p>
                                                        <?php } else { ?>
                                                            <p id="dacy3" class="top-margin"><span id="day3" class="place-date">Date,</span> <span id="crcy3" class="place-fund">Subtitle</span></p>
                                                        <?php } ?>
                                                        <?php if($currency1){ ?>
                                                            <p id="dacy4"><span id="day4"class="place-date"><?=$date2?>,</span> <span id="crcy4" class="place-fund"><?=$currency1?></span></p>
                                                        <?php } else { ?>
                                                            <p  id="dacy4"><span id="day4" class="place-date">Date,</span> <span  id="crcy4" class="place-fund">Subtitle</span></p>
                                                        <?php }  } else {?>
                                                        <p id="dacy3" class="top-margin"><span  id="day3"  class="place-date">Date,</span> <span id="crcy3" class="place-fund">Subtitle</span></p>
                                                        <p  id="dacy4"><span class="place-date" id="day4">Date,</span> <span  id="crcy4" class="place-fund">Subtitle</span></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span id="update3"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update3">###</span></li> <?php } ?>
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
                                        <?php
                                        $pid='p1';
                                        $attach1=$this->M_deck->get_docs($orgid,$pid);
                                        if($attach1)
                                        {
                                            foreach($attach1 as $item)
                                            {
                                        $attachid1 = $item->id;
                                        $deckid1 = $item->org_id;
                                        $attachtype1 = $item->type;
                                        $sourcePath= base_url();
                                        if($attachtype1=='image/jpeg')
                                        {

                                           $doc_path = $sourcePath.'assets/images/image.jpg';
                                        }
                                        else if($attachtype1=='application/pdf')
                                        {
                                            $doc_path = $sourcePath.'assets/images/pdf.jpg';
                                        }
                                        else
                                        {
                                            $doc_path = $sourcePath.'assets/images/document.jpg';
                                        }
                                        $file_name1 = $item->file_name;
                                        $attachname1 = $item->name;
                                        $size1 = $item->size;
                                        $format1 = $item->format;
                                        $title1 = $item->title;
                                        $description1 = $item->description;
                                        $pid1 = $item->pid;
                                        $cdate1 = $item->create_date;
                                        $cfmtdate1 = date('Y-m-d', strtotime($cdate1));
                                            } ?>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_3">
                                                    <div class="attachment stage-1"  id="attch">
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
                                                            <label class="file-upload"><input type="file" name="file" id="doc1"><span id="dc1">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                <div id="attachArea" class="progress-bar" aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p id="errordoc">MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="<?=$title1?>" name="attachtitle" id="attachtitle">
                                                            <input type="hidden" value="p1" name="pid1" id="pid1">
                                                            <textarea id="attachdesc"><?=$description1?></textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:edit_attach('<?=$attachid1?>','<?=$deckid1?>','<?=$pid1?>')" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="<?=$doc_path?>"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit1"><?=$title1?></h3>
                                                            <p id="des1"><?=$description1?></p>
                                                            <ul>
                                                                <li id="siz1"><?=$size1?></li>
                                                                <li id="formt1"><?=$format1?></li>
                                                                <li id="dte1"><?=$cfmtdate1?></li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:deletedoc('<?=$attachid1?>','<?=$deckid1?>','p1')" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a id="dcdwnld1" onclick="javaScript:docdownload('<?=$attachid1?>','<?=$deckid1?>','<?=$attachname1?>','<?=$format1?>','<?=$attachtype1?>','<?=$file_name1?>','d1')" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <?php } else { ?>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_1">
                                                    <div class="attachment stage-1" id="attch">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2" id="attach">
                                                        <div class="attach-image">
                                                            <?php $unId = uniqid(); ?>
                                                            <form method="POST"
                                                                  action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>"
                                                                  id="docform" enctype="multipart/form-data"
                                                                  class="direct-upload">
                                                                <input type="hidden" name="key"
                                                                       value="<?= 'assets/docs/' . $unId . "_" ?>${filename}">
                                                                <input type="hidden" id="hiddenuniqid1"
                                                                       value="<?= $unId ?>">
                                                                <input type="hidden" name="AWSAccessKeyId"
                                                                       value="<?php echo S3_KEY; ?>">
                                                                <input type="hidden" name="acl"
                                                                       value="<?php echo S3_ACL; ?>">
                                                                <input type="hidden" name="success_action_status"
                                                                       value="201">
                                                                <input type="hidden" name="policy"
                                                                       value="<?php echo $base64Policy; ?>">
                                                                <input type="hidden" name="signature"
                                                                       value="<?php echo $signature; ?>">
                                                                <input type="hidden" id="docname">
                                                                <input type="hidden" id="docid" value="<?= $unId ?>">
                                                                <input type="hidden" id="doctype">
                                                                <input type="hidden" id="docsize">
                                                                <label class="file-upload"><input type="file"
                                                                                                  name="file" id="doc1"><span
                                                                            id="dc1">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                    <div id="attachArea" class="progress-bar"
                                                                         aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p id="errordoc">MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" placeholder="Attachment Title"
                                                                   name="attachtitle" id="attachtitle">
                                                            <input type="hidden" value="p1" name="pid1" id="pid1">
                                                            <textarea id="attachdesc">Short description of the attachment goes here</textarea>
                                                            <div class="attach-acttion">
                                                                <a id="saved1" href="javaScript:save_attach()"
                                                                   class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3" id="attached">
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit1">Attachment Title</h3>
                                                            <p id="desc1">Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li id="siz1">File size</li>
                                                                <li id="formt1">File type</li>
                                                                <li id="dte1">Date</li>
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
                                            <?php
                                        }
                                        $pid='p2';
                                        $attach2=$this->M_deck->get_docs($orgid,$pid);
                                        if($attach2)
                                        {
                                            foreach($attach2 as $item)
                                            {
                                                $attachid2 = $item->id;
                                                $deckid2 = $item->org_id;
                                                $attachtype2 = $item->type;
                                                $sourcePath= base_url();
                                                if($attachtype2=='image/jpeg')
                                                {

                                                    $doc_path = $sourcePath.'assets/images/image.jpg';
                                                }
                                                else if($attachtype2=='application/pdf')
                                                {
                                                    $doc_path = $sourcePath.'assets/images/pdf.jpg';
                                                }
                                                else
                                                {
                                                    $doc_path = $sourcePath.'assets/images/document.jpg';
                                                }
                                                $file_name2 = $item->file_name;
                                                $attachname2 = $item->name;
                                                $size2 = $item->size;
                                                $format2 = $item->format;
                                                $title2 = $item->title;
                                                $description2 = $item->description;
                                                $pid2 = $item->pid;
                                                $cdate2 = $item->create_date;
                                                $cfmtdate2 = date('Y-m-d', strtotime($cdate2));
                                            } ?>

                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_3">
                                                    <div class="attachment stage-1">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2">
                                                        <div class="attach-image">
                                                            <?php $unId = uniqid(); ?>
                                                            <form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="docform2"  enctype="multipart/form-data" class="direct-upload">
                                                                <input type="hidden" name="key" value="<?='assets/docs/'.$unId."_"?>${filename}" >
                                                                <input type="hidden" id="hiddenuniqid2" value= "<?= $unId?>">
                                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                                <input type="hidden" name="success_action_status" value="201">
                                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                                <input type="hidden"name="signature" value="<?php echo $signature; ?>">
                                                                <input type="hidden" id="docname2" >
                                                                <input type="hidden" id="docid2" value="<?=$unId?>">
                                                                <input type="hidden" id="doctype2">
                                                                <input type="hidden" id="docsize2">
                                                                <label class="file-upload"><input type="file" name="file" id="doc2"><span id="dc2">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                    <div id="attachArea2" class="progress-bar" aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="<?=$title2?>" name="attachtitle2" id="attachtitle2">
                                                            <input type="hidden" value="p2" name="pid2" id="pid2">
                                                            <textarea id="attachdesc2"><?=$description2?></textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:edit_attach2('<?=$attachid2?>','<?=$deckid2?>','<?=$pid2?>')" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="<?=$doc_path?>"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit2"><?=$title2?></h3>
                                                            <p id="desc2"><?=$description2?></p>
                                                            <ul>
                                                                <li id="siz2"><?=$size2?></li>
                                                                <li id="formt2"><?=$format2?></li>
                                                                <li id="dte2"><?=$cfmtdate2?></li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:deletedoc('<?=$attachid2?>','<?=$deckid2?>' ,'p2')" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a id="dcdwnld2" onclick="javaScript:docdownload('<?=$attachid2?>','<?=$deckid2?>','<?=$attachname2?>','<?=$format2?>','<?=$attachtype2?>','<?=$file_name2?>','d2')" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } else {?>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_1">
                                                    <div class="attachment stage-1" id="attch2">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2" id="attach2">
                                                        <div class="attach-image">
                                                            <?php $unId = uniqid(); ?>
                                                            <form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="docform2"  enctype="multipart/form-data" class="direct-upload">
                                                            <input type="hidden" name="key" value="<?='assets/docs/'.$unId."_"?>${filename}" >
                                                            <input type="hidden" id="hiddenuniqid2" value= "<?= $unId?>">
                                                            <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                            <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                            <input type="hidden" name="success_action_status" value="201">
                                                            <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                            <input type="hidden"name="signature" value="<?php echo $signature; ?>">
                                                            <input type="hidden" id="docname2" >
                                                            <input type="hidden" id="docid2" value="<?=$unId?>">
                                                            <input type="hidden" id="doctype2">
                                                            <input type="hidden" id="docsize2">
                                                            <label class="file-upload"><input type="file" name="file" id="doc2"><span id="dc2">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                    <div id="attachArea2" class="progress-bar" aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <span id="lblError"></span>
                                                        <div class="attach-content">
                                                            <input type="text" placeholder="Attachment Title" name="attachtitle2" id="attachtitle2">
                                                            <input type="hidden" value="p2" name="pid2" id="pid2">
                                                            <textarea id="attachdesc2"> Short description of the attachment </textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:save_attach2()" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3" id="attached2">
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit2">Attachment Title</h3>
                                                            <p id="des2">Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li id="siz2">File size</li>
                                                                <li id="formt2">File type</li>
                                                                <li id="dte2">Date</li>
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
                                        <?php }
                                        $pid='p3';
                                        $attach3=$this->M_deck->get_docs($orgid,$pid);
                                        if($attach3)
                                        {
                                            foreach($attach3 as $item)
                                            {
                                                $attachid3 = $item->id;
                                                $deckid3 = $item->org_id;
                                                $attachtype3 = $item->type;
                                                $sourcePath= base_url();
                                                if($attachtype3=='image/jpeg')
                                                {

                                                    $doc_path = $sourcePath.'assets/images/image.jpg';
                                                }
                                                else if($attachtype3=='application/pdf')
                                                {
                                                    $doc_path = $sourcePath.'assets/images/pdf.jpg';
                                                }
                                                else
                                                {
                                                    $doc_path = $sourcePath.'assets/images/document.jpg';
                                                }
                                                $file_name3 = $item->file_name;
                                                $attachname3 = $item->name;
                                                $size3 = $item->size;
                                                $format3 = $item->format;
                                                $title3 = $item->title;
                                                $description3 = $item->description;
                                                $pid3 = $item->pid;
                                                $cdate3 = $item->create_date;
                                                $cfmtdate3 = date('Y-m-d', strtotime($cdate2));
                                            } ?>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_3">
                                                    <div class="attachment stage-1">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2">
                                                        <div class="attach-image">
                                                            <?php $unId = uniqid(); ?>
                                                            <form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="docform3"  enctype="multipart/form-data" class="direct-upload">
                                                                <input type="hidden" name="key" value="<?='assets/docs/'.$unId."_"?>${filename}" >
                                                                <input type="hidden" id="hiddenuniqid3" value= "<?= $unId?>">
                                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                                <input type="hidden" name="success_action_status" value="201">
                                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                                <input type="hidden"name="signature" value="<?php echo $signature; ?>">
                                                                <input type="hidden" id="docname3" >
                                                                <input type="hidden" id="docid3" value="<?=$unId?>">
                                                                <input type="hidden" id="doctype3">
                                                                <input type="hidden" id="docsize3">
                                                                <label class="file-upload"><input type="file" name="file" id="doc3"><span id="dc3">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                    <div id="attachArea3" class="progress-bar" aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <div class="attach-content">
                                                            <input type="text" value="<?=$title3?>" name="attachtitle3" id="attachtitle3">
                                                            <input type="hidden" value="p3" name="pid3" id="pid3">
                                                            <textarea id="attachdesc3"><?=$description3?></textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:edit_attach3('<?=$attachid3?>','<?=$deckid3?>','<?=$pid3?>')" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3">
                                                        <div class="attach-image"><img src="<?=$doc_path?>"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit3"><?=$title3?></h3>
                                                            <p id="desc3"><?=$description3?></p>
                                                            <ul>
                                                                <li id="siz3"><?=$size3?></li>
                                                                <li id="formt3"><?=$format3?></li>
                                                                <li id="dte3"><?=$cfmtdate3?></li>
                                                            </ul>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:deletedoc('<?=$attachid3?>','<?=$deckid3?>','p3')" class="delete-attach"></a>
                                                                <a href="javaScript:void(0);" class="edit-attach"></a>
                                                                <a id="dcdwnld3" onclick="javaScript:docdownload('<?=$attachid3?>','<?=$deckid3?>','<?=$attachname3?>','<?=$format3?>','<?=$attachtype3?>','<?=$file_name3?>','d3')" class="download-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } else {?>
                                            <div class="col-sm-4">
                                                <div class="attachment-panel stage_1">
                                                    <div class="attachment stage-1" id="attch3">
                                                        <button class="button attach">+ Add Attachment</button>
                                                    </div>
                                                    <div class="attachment stage-2" id="attach3">
                                                        <div class="attach-image">
                                                            <?php $unId = uniqid(); ?>
                                                            <form method="POST" action="http://s3.amazonaws.com/<?php echo S3_BUCKET; ?>" id="docform3"  enctype="multipart/form-data" class="direct-upload">
                                                                <input type="hidden" name="key" value="<?='assets/docs/'.$unId."_"?>${filename}" >
                                                                <input type="hidden" id="hiddenuniqid3" value= "<?= $unId?>">
                                                                <input type="hidden" name="AWSAccessKeyId" value="<?php echo S3_KEY; ?>">
                                                                <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
                                                                <input type="hidden" name="success_action_status" value="201">
                                                                <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">
                                                                <input type="hidden"name="signature" value="<?php echo $signature; ?>">
                                                                <input type="hidden" id="docname3" >
                                                                <input type="hidden" id="docid3" value="<?=$unId?>">
                                                                <input type="hidden" id="doctype3">
                                                                <input type="hidden" id="docsize3">
                                                                <label class="file-upload"><input type="file" name="file" id="doc3"><span id="dc3">Choose File</span></label>
                                                                <div class="progress audit-progress">
                                                                    <div id="attachArea3" class="progress-bar" aria-valuemax="100"></div>
                                                                </div>
                                                            </form>
                                                            <p>MS Office, iWorks or PDF</p>
                                                        </div>
                                                        <span id="lblError"></span>
                                                        <div class="attach-content">
                                                            <input type="text" placeholder="Attachment Title" name="attachtitle3" id="attachtitle3">
                                                            <input type="hidden" value="p3" name="pid3" id="pid3">
                                                            <textarea id="attachdesc3"> Short description of the attachment </textarea>
                                                            <div class="attach-acttion">
                                                                <a href="javaScript:save_attach3()" class="save-attach"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="attachment stage-3" id="attached3" >
                                                        <div class="attach-image"><img src="<?=base_url()?>assets/images/attachment.png"></div>
                                                        <div class="attach-content">
                                                            <h3 id="tit3">Attachment Title</h3>
                                                            <p id="des3">Short description of the attachment goes here</p>
                                                            <ul>
                                                                <li id="siz3">File size</li>
                                                                <li id="formt3">File type</li>
                                                                <li id="dte3">Date</li>
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
                                        <?php }?>
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
                    <div class="cover-image-panel">
                        <?php if($cover_photo)
                        {?>
                            <img src="<?=$cover_path?>" id="img_cover">
                        <?php }
                        else
                        {?>
                            <img src="<?=base_url()?>assets/images/cover-image.png" id="img_cover">
                        <?php } ?>

                    </div>
                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo">
                                    <?php if($logo_pic)
                                    {?>
                                        <img src="<?=$logo_path?>" id="imlogo">
                                    <?php }
                                    else
                                    {?><img src="<?=base_url()?>assets/images/logo-placeholder.png" id="imlogo">
                                    <?php } ?>
                                </div>
                                <div class="profile-container">
                                    <div class="cp-details">
                                        <?php if($name){ ?>
                                            <h3 ><?=$name?></h3>
                                        <?php } else { ?>
                                            <h3>Company Name</h3>
                                        <?php } ?>
                                        <?php if($desc){ ?>
                                            <p ><?=$desc?></p>
                                        <?php } else { ?>
                                            <p >Simple strapline that explains company purpose</p>
                                        <?php } ?>
                                    </div>
                                    <div class="profile-item-panel">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Sought</h5>
                                                    <?php if($investment){ ?>
                                                        <h3 id="invst2"><div class="invstmnt"><?=$investment?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="invst2">Value</h3>
                                                    <?php } ?>
                                                    <?php if($equity){ ?>
                                                        <p id="eqty2"><?=$equity?>--% equity</p>
                                                    <?php } else { ?>
                                                        <p id="eqty2">--% equity</p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Valuation</h5>
                                                    <?php if($valuation){ ?>
                                                        <h3 id="val2"><div class="invstmnt"><?=$valuation?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="val2">Value</h3>
                                                    <?php }?>
                                                        <p >Pre-Money</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Pledged</h5>
                                                    <?php if($fund_currency){ ?>
                                                        <h3 id="fcy2"><div class="invstmnt"><?=$fund_currency?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="fcy2">Value</h3>
                                                    <?php } ?>
                                                        <p >--% Committed</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Current MRR</h5>
                                                    <?php if($revenue_currency){ ?>
                                                        <h3 id="rcy2"><div class="invstmnt"><?=$revenue_currency?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 id="rcy2">Value</h3>
                                                    <?php } ?>
                                                        <p >Profitable</p>

                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Prior Funding</h5>
                                                    <?php if($prev_fund){?>
                                                        <?php if($currency){ ?>
                                                            <p id="dacy5" class="top-margin"><span id="day5" class="place-date"><?=$date1?>,</span> <span id="crcy5" class="place-fund"><?=$currency?></span></p>
                                                        <?php } else { ?>
                                                            <p id="dacy5" class="top-margin"><span id="day5" class="place-date">Date,</span> <span id="crcy5" class="place-fund">Subtitle</span></p>
                                                        <?php } ?>
                                                        <?php if($currency1){ ?>
                                                            <p id="dacy6"><span id="day6"class="place-date"><?=$date2?>,</span> <span id="crcy6" class="place-fund"><?=$currency1?></span></p>
                                                        <?php } else { ?>
                                                            <p  id="dacy6"><span id="day6" class="place-date">Date,</span> <span  id="crcy6" class="place-fund">Subtitle</span></p>
                                                        <?php }  } else {?>
                                                        <p id="dacy5" class="top-margin"><span id="day5" class="place-date">Date,</span> <span id="crcy5" class="place-fund">Subtitle</span></p>
                                                        <p  id="dacy6"><span id="day6" class="place-date">Date,</span> <span  id="crcy6" class="place-fund">Subtitle</span></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span id="update4"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update4">###</span></li> <?php } ?>
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
                    <div class="cover-image-panel"><img src="<?=base_url()?>assets/images/cover-image.png"></div>
                    <div class="deck-profle"><!-- deck-profle -->
                        <div class="container">
                            <div class="row">
                                <div class="profile-photo"><img src="<?=base_url()?>assets/images/logo-placeholder.png" ></div>
                                <div class="profile-container">
                                    <div class="cp-details">
                                        <?php if($name){ ?>
                                            <h3 ><?=$name?></h3>
                                        <?php } else { ?>
                                            <h3>Company Name</h3>
                                        <?php } ?>
                                        <?php if($desc){ ?>
                                            <p ><?=$desc?></p>
                                        <?php } else { ?>
                                            <p >Simple strapline that explains company purpose</p>
                                        <?php } ?>
                                    </div>
                                    <div class="profile-item-panel">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Sought</h5>
                                                    <?php if($investment){ ?>
                                                    <h3><div class="invstmnt"><?=$investment?></div></h3>
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
                                                        <h3><div class="invstmnt"><?=$valuation?></div></h3>
                                                    <?php } else { ?>
                                                    <h3>Value</h3>
                                                    <?php }?>
                                                    <p>Pre-Money</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Funds Pledged</h5>
                                                    <?php if($fund_currency){ ?>
                                                        <h3><div class="invstmnt"><?=$fund_currency?></div></h3>
                                                    <?php } else { ?>
                                                    <h3>Value</h3>
                                                    <?php } ?>
                                                    <p>--% Committed</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Current MRR</h5>
                                                    <?php if($revenue_currency){ ?>
                                                        <h3 ><div class="invstmnt"><?=$revenue_currency?></div></h3>
                                                    <?php } else { ?>
                                                        <h3 >Value</h3>
                                                    <?php } ?>
                                                        <p >Profitable</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="profile-item">
                                                    <h5>Prior Funding</h5>
                                                    <?php if($prev_fund){?>
                                                    <?php if($currency){ ?>
                                                        <p  class="top-margin"><span  class="place-date"><?=$date1?>,</span> <span class="place-fund"><?=$currency?></span></p>
                                                    <?php } else { ?>
                                                        <p  class="top-margin"><span  class="place-date">Date,</span> <span  class="place-fund">Subtitle</span></p>
                                                    <?php } ?>
                                                    <?php if($currency1){ ?>
                                                        <p><span class="place-date"><?=$date2?>,</span> <span  class="place-fund"><?=$currency1?></span></p>
                                                    <?php } else { ?>
                                                        <p><span  class="place-date">Date,</span> <span   class="place-fund">Subtitle</span></p>
                                                    <?php }  } else {?>
                                                        <p class="top-margin"><span  class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                        <p ><span  class="place-date">Date,</span> <span  class="place-fund">Subtitle</span></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-metrics none-bg">
                                        <ul class="invest-item">
                                            <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                            <?php if($updatecount){?> <li class="icon-speeker"><span id="update5"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update5">###</span></li> <?php } ?>
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
                            <div class="edit-done" id="companyedit">
                                <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydetails"></a>
                                <?php if($name){ ?>
								<h3 id="cname"><?=$name?></h3>
								<?php } else { ?>
								<h3 id="cname">Company Name</h3>
								<?php } ?>
								<?php if($desc){ ?>
                                <p id="cdesc" class="block-one-desc"><?=$desc?></p>
								<?php } else { ?>
								<p id="cdesc">Simple strapline that explains company purpose</p>
								<?php } ?>
                            </div>
                            <div class="edit-to">
                                <a href="javaScript:void(0);" class="icon-tic" data-edit="#companydetails"></a>
                                <h3><input type="text" placeholder="Company Name"  value="<?=$name?>" id="org_name" name="org_name" onchange="savecompany('org_name')"></h3>
                                <p><textarea id="org_desc" placeholder="Simple strapline that explains company purpose" onchange="savecompany('org_desc')"><?=$desc?></textarea></p>
                            </div>
                            <div class="cp-links" id="cplink">
                            <div class="edit-done">
                                <ul>
                                    <?php if($regnumber){ ?>
                                    <li id="regnumber" class="icon-cno"><?=$regnumber?></li>
                                    <?php } else { ?>
                                    <li id="regnumber" class="icon-cno">CN: 123456789</li>
                                    <?php } ?>
                                     
                                    <?php if($location){ ?>
                                    <li id="loc"class="icon-nav"><?=$location?></li>
                                    <?php } else { ?>
                                    <li id="loc"class="icon-nav">City, Country</li>
                                    <?php } ?>
                                     
                                    <?php if($sector){ ?>
                                    <li id="sec"class="icon-bag"><?=$sector?></li>
                                    <?php } else { ?>
                                    <li id="sec"class="icon-bag">Sector</li>
                                    <?php } ?>
                                    
                                    <?php if($website){ ?>
                                    <li id="web" class="icon-globe"><?=$website?></li>
                                    <?php } else { ?>
                                    <li id="web" class="icon-globe">Website</li>
                                    <?php } ?>
                                    <?php if($estabdate){ ?>
                                    <li  id="dated" class="icon-calender"><?=$estabdate?></li>
                                    <?php } else { ?>
                                    <li id="dated" class="icon-calender">Date Est.</li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="edit-to">
                                <ul>
                                    <li class="icon-cno"><input type="text" placeholder="CN: 123456789" value="<?=$regnumber?>" id="org_reg_number" name="org_reg_number" onchange="savecompany('org_reg_number')"></li>
                                    <li class="icon-nav"><input type="text" placeholder="City, Country" value="<?=$location?>" name="location"  onchange="savecompany('location')" placeholder="City, Country" id="location"></li>
                                    <li class="icon-bag"><input type="text" placeholder="Sector" id="org_sector" value="<?=$sector?>" onchange="savecompany('org_sector')" ></li>
                                    <li class="icon-globe"><input type="text" placeholder="Website" id="website" value="<?=$website?>" onchange="savecompany('website')" ></li>
                                    <li class="icon-calender"><input type="text" placeholder="Date Est." id="date"  data-language="en"  onblur="savecompany('date')" ></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cp-links" id="cplinks">
                            <div class="edit-done">
                                <ul>
                                    <?php if($link_org){ ?>
                                    <li id="fb" class="icon-fb"><?=$link_org?></li>
                                    <?php } else { ?>
                                    <li id="fb" class="icon-fb">Social link</li>
                                    <?php } ?>
                                    
                                    <?php if($twitter){ ?>
                                    <li id="twitter" class="icon-tw"><?=$twitter?></li>
                                    <?php } else { ?>
                                    <li id="twitter" class="icon-tw">Social link</li>
                                    <?php } ?>
                                    
                                    <?php if($linkedin){ ?>
                                    <li id="linked" class="icon-ig"><?=$linkedin?></li>
                                    <?php } else { ?>
                                    <li id="linked" class="icon-ig">Social link</li>
                                    <?php } ?>
                                    
                                </ul>
                            </div>
                            <div class="edit-to">

                                <ul>
                                    <li class="icon-fb"><input type="text" placeholder="Social link" value="<?=$link_org?>" id="link_organisation" onchange="savecompany('link_organisation')"></li>
                                    <li class="icon-tw"><input type="text" placeholder="Social link" value="<?=$twitter?>" id="twitter_page" onchange="savecompany('twitter_page')"></li>
                                    <li class="icon-ig"><input type="text" placeholder="Social link" value="<?=$linkedin?>" id="linkedin_page" onchange="savecompany('linkedin_page')"></li>
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
                                            <?php if($investment){ ?>
                                            <h3 ><div class="invstmnt"><?=$investment?></div></h3>
                                            <?php } else { ?>
                                                <h3 >Value</h3>
                                            <?php } ?>
                                            <?php if($equity){ ?>
                                                <p ><?=$equity?>--% equity</p>
                                            <?php } else { ?>
                                                <p >--% equity</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="profile-item">
                                            <h5>Valuation</h5>
                                            <?php if($valuation){ ?>
                                                <h3 ><div class="invstmnt"><?=$valuation?></div></h3>
                                            <?php } else { ?>
                                                <h3 >Value</h3>
                                            <?php }?>
                                                <p >Pre-Money</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="profile-item">
                                            <h5>Funds Pledged</h5>
                                            <?php if($fund_currency){ ?>
                                                <h3><div class="invstmnt"><?=$fund_currency?></div></h3>
                                            <?php } else { ?>
                                                <h3>Value</h3>
                                            <?php } ?>
                                                <p >--% Committed</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="profile-item">
                                            <h5>Current MRR</h5>
                                            <?php if($revenue_currency){ ?>
                                                <h3><div class="invstmnt"><?=$revenue_currency?></div></h3>
                                            <?php } else { ?>
                                                <h3>Value</h3>
                                            <?php } ?>
                                                <p>Profitable</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="profile-item">
                                            <h5>Prior Funding</h5>
                                            <?php if($prev_fund){?>
                                                <?php if($currency){ ?>
                                                    <p  class="top-margin"><span  class="place-date"><?=$date1?>,</span> <span class="place-fund"><?=$currency?></span></p>
                                                <?php } else { ?>
                                                    <p  class="top-margin"><span  class="place-date">Date,</span> <span  class="place-fund">Subtitle</span></p>
                                                <?php } ?>
                                                <?php if($currency1){ ?>
                                                    <p><span class="place-date"><?=$date2?>,</span> <span  class="place-fund"><?=$currency1?></span></p>
                                                <?php } else { ?>
                                                    <p><span  class="place-date">Date,</span> <span   class="place-fund">Subtitle</span></p>
                                                <?php }  } else {?>
                                                <p class="top-margin"><span  class="place-date">Date,</span> <span class="place-fund">Subtitle</span></p>
                                                <p ><span  class="place-date">Date,</span> <span  class="place-fund">Subtitle</span></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="investor-metrics none-bg">
                                            <ul class="invest-item">
                                                <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                                <?php if($updatecount){?> <li class="icon-speeker"><span id="update2"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update2">###</span></li> <?php } ?>
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
                                <?php if($deckcount){?> <li class="icon-track"><span><?=$deckcount?></span></li> <?php } else { ?><li class="icon-track"><span>###</span></li> <?php } ?>
                                <?php if($updatecount){?> <li class="icon-speeker"><span id="update1"><?=$updatecount?></span></li> <?php } else { ?> <li class="icon-speeker"><span id="update1">###</span></li> <?php } ?>
                            </ul>
                        </div>
                    </div><!-- company-profile -->
                    <div class="company-detail-container shade-container"><!-- company-detail-container -->
                        <div class="company-panel" id="companydet"><!-- company-panel -->
                            <div class="edit-done">
                                <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydet"></a>
                                <h3>What</h3>
                                <div class="cd-panel truncate-text">
                                    <h5>What We Do</h5>
									<?php if($what_we){ ?>
                                        <p id="whatwe" class="tool-tip"><?=$what_we?>
                                            <span id="wtwe" class="pop-over"><?=$what_we?></span>
                                        </p>

									<?php } else { ?>
                                        <p id="whatwe" class="tool-tip">Content of the what, how and who areas goes here so that it fills the available space nicely. <span id="wtwe" class="pop-over"></span></p>
									<?php } ?>
                                </div>
                                <div class="cd-panel truncate-text">
                                    <h5>Our Competitors</h5>
									<?php if($comp){ ?>
                                    <p id="comp" class="tool-tip"><?=$comp?> <span id="cmp" class="pop-over"><?=$comp?></span></p>
									<?php } else { ?>
									<p id="comp" class="tool-tip">Content of the what, how and who areas goes here so that it fills the available space nicely. <span id="cmp" class="pop-over"></span></p>
									<?php } ?>
                                </div>
                                <div class="cd-panel">
                                    <h5>Problems Solved</h5>
                                    <ul>
										<?php if($prob1){ ?>
                                        <li id="prob1"><?=$prob1?></li>
										<?php } else { ?>
										<li id="prob1" >Bullet point goes here, with space for up to two lines of text</li>
										<?php } ?>
										<?php if($prob2){ ?>
                                        <li id="prob2"><?=$prob2?></li>
										<?php } else { ?>
										<li id="prob2">Bullet point goes here, with space for up to two lines of text</li>
										<?php } ?>
										<?php if($prob3){ ?>
                                        <li id="prob3"><?=$prob3?></li>
										<?php } else { ?>
										<li id="prob3">Bullet point goes here, with space for up to two lines of text</li>
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
                        <div class="company-panel col-how" id="companydets"><!-- company-panel -->
                            <div class="edit-done">
                                <a href="javaScript:void(0);" class="icon-edit" data-edit="#companydets"></a>
                                <h3>How</h3>
                                <div class="cd-panel truncate-text">
                                    <h5>Business Model</h5>
									<?php if($buss_model){ ?>
                                    <p id="bmodel" class="tool-tip"><?=$buss_model?> <span id="bmdl" class="pop-over"><?=$buss_model?></span></p>
									<?php } else { ?>
									<p id="bmodel" class="tool-tip">Content of the what, how and who areas goes here so that it fills the available space nicely.<span id="bmdl" class="pop-over"></span></p>
									<?php } ?>
                                </div>
                                <div class="cd-panel truncate-text">
                                    <h5>Our Advantage</h5>
									<?php if($adv){ ?>
                                    <p id="adv" class="tool-tip"><?=$adv?> <span class="pop-over" id="avd"><?=$adv?></span></p>
									<?php } else { ?>
                                        <p id="adv" class="tool-tip">Content of the what, how and who areas goes here so that it fills the available space nicely.<span class="pop-over" id="avd"></span></p>
									<?php } ?>
                                </div>
                                <div class="cd-panel">
                                    <h5>Notable Achievements</h5>

                                   <ul>
                                       <?php
                                          if($getachieve) {
                                              if ($achieve1) { ?>
                                                  <li id="ac1" ><?= $achieve1 ?></li>
                                              <?php } else { ?>
                                                  <li id="ac1">Bullet point goes here, with space for up to two lines of text</li>
                                              <?php } ?>
                                              <?php if ($achieve2) { ?>
                                                  <li id="ac2" ><?= $achieve2 ?></li>
                                              <?php } else { ?>
                                                  <li id="ac2" >Bullet point goes here, with space for up to two lines of text</li>
                                              <?php } ?>
                                              <?php if ($achieve3) { ?>
                                                  <li id="ac3" ><?= $achieve3 ?></li>
                                              <?php } else { ?>
                                                  <li id="ac3" >Bullet point goes here, with space for up to two lines of text</li>
                                              <?php }
                                          }  else {?>
                                       <li id="ac1">Bullet point goes here, with space for up to two lines of text</li>
                                       <li id="ac2">Bullet point goes here, with space for up to two lines of text</li>
                                       <li id="ac3">Bullet point goes here, with space for up to two lines of text</li>
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
                                        <li ><textarea  id="achieve1" onchange="saveachievements('achieve1')"><?=$achieve1?></textarea></li>
                                   <?php  } else { ?>
                                        <li><textarea  id="achieve1" placeholder="What are your Notable Achievements ?#1" onchange="saveachievements('achieve1')"></textarea></li>
                                   <?php  } ?>
                                        <?php if($achieve2) {?>
                                            <li ><textarea id="achieve2"  onchange="saveachievements('achieve2')"><?=$achieve2?></textarea></li>
                                        <?php  } else { ?>
                                            <li ><textarea  id="achieve2" placeholder="What are your Notable Achievements ?#2" onchange="saveachievements('achieve2')"></textarea></li>
                                        <?php  } ?>
                                        <?php if($achieve3) {?>
                                            <li ><textarea  id="achieve3" onchange="saveachievements('achieve3')"><?=$achieve3?></textarea></li>
                                        <?php  } else { ?>
                                            <li id="ac3"><textarea  id="achieve3" placeholder="What are your Notable Achievements ?#3" onchange="saveachievements('achieve3')"></textarea></li>
                                        <?php    } } else {?>

                                        <li ><textarea  id="achieve1" placeholder="What are your Notable Achievements ?#1" onchange="saveachievements('achieve1')"></textarea></li>
                                        <li ><textarea  id="achieve2" placeholder="What are your Notable Achievements ?#2" onchange="saveachievements('achieve2')"></textarea></li>
                                        <li ><textarea  id="achieve3" placeholder="What are your Notable Achievements ?#3" onchange="saveachievements('achieve3')"></textarea></li>
                                        <?php  } ?>

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
                                        <img src="<?=$pic_path?>" id="img1">
                                       <?php } else { ?>
                                        <img src="<?=base_url()?>assets/images/deck.png" id="img1">
                                       <?php }?>
                                        <div>
                                            <h6 id="name1"><?=$member_name?></h6>
                                            <p id="role1"><?=$role?></p>
                                            <span id="achive1"><?=$achieve?></span>
                                        </div>
                                    </div>
                                    <?php }
                                    else
                                    { ?>
                                    <div class="deck-item">
                                        <img src="<?=base_url()?>assets/images/deck.png" id="img1">
                                        <div>
                                            <h6 id="name1">Enter Team Member Name</h6>
                                            <p id="role1">Team Member Role</p>
                                            <span id="achive1">Prior role or experience</span>
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
                                                <img src="<?=$pic_path2?>" id="img2">
                                            <?php } else { ?>
                                                <img src="<?=base_url()?>assets/images/deck.png" id="img2">
                                            <?php }?>
                                            <div>
                                                <h6 id="name2"><?=$member_name2?></h6>
                                                <p id="role2"><?=$role2?></p>
                                                <span id="achive2"><?=$achieve2?></span>
                                            </div>
                                        </div>
                                    <?php }
                                    else
                                    { ?>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" id="img2">
                                            <div>
                                                <h6 id="name2">Enter Team Member Name</h6>
                                                <p id="role2">Team Member Role</p>
                                                <span id="achive2">Prior role or experience</span>
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
                                                <img src="<?=$pic_path3?>" id="img3">
                                            <?php } else { ?>
                                                <img src="<?=base_url()?>assets/images/deck.png" id="img3">
                                            <?php }?>
                                            <div>
                                                <h6 id="name3"><?=$member_name3?></h6>
                                                <p id="role3"><?=$role3?></p>
                                                <span id="achive3"><?=$achieve3?></span>
                                            </div>
                                        </div>
                                    <?php }
                                    else
                                    { ?>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png"  id="img3">
                                            <div>
                                                <h6 id="name3">Enter Team Member Name</h6>
                                                <p id="role3">Team Member Role</p>
                                                <span id="achive3">Prior role or experience</span>
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
                                        <img src="<?=$pic_path?>"  id="invsetimg1" >
                                        <?php } else { ?>
                                        <img src="<?=base_url()?>assets/images/deck.png" id="invsetimg1">
                                       <?php }?>
                                        <div>
                                            <h6 id="investname1"><?=$member_name?></h6>
                                            <p id="investrole1"><?=$role?></p>
                                            <span id="investachive1"><?=$achievement1?></span>
                                        </div>
                                    </div>
                                    <?php } else {?>
                                    <div class="deck-item">
                                        <img src="<?=base_url()?>assets/images/deck.png" id="invsetimg1">
                                        <div>
                                            <h6 id="investname1" >Enter Team Member Name</h6>
                                            <p id="investrole1">Team Member Role</p>
                                            <span id="investachive1">Prior role or experience</span>
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
                                                <img src="<?=$pic_path2?>"  id="invsetimg2" >
                                            <?php } else { ?>
                                                <img src="<?=base_url()?>assets/images/deck.png" id="invsetimg2">
                                            <?php }?>
                                            <div>
                                                <h6 id="investname2"><?=$membername2?></h6>
                                                <p id="investrole2"><?=$role2?></p>
                                                <span id="investachive2"><?=$achieve2?></span>
                                            </div>
                                        </div>
                                    <?php } else {?>
                                        <div class="deck-item">
                                            <img src="<?=base_url()?>assets/images/deck.png" id="invsetimg2">
                                            <div>
                                                <h6 id="investname2">Enter Team Member Name</h6>
                                                <p id="investrole2">Team Member Role</p>
                                                <span id="investachive2">Prior role or experience</span>
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
                                        <div id="investsave-block"  class="save-block" style="display:none">
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
                                        <div id="investsave-block_I2"  class="save-block" style="display:none">
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
