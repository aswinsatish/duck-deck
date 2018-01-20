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
                    <button class="button signin right-margin" data-account="#signin">Sign In</button>
                    <button class="button signup" data-account="#signup">Sign Up</button>
                  </div>
                  <div class="account-holder" id="signin"><!-- account-holder -->
                                <div class="ah-head"><h6>Log In</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                                <div class="ah-content">
                                    <span  id="loginerror"></span>
                                    <div class="ah-form">
                                        <label>Your Email</label>
                                        <input type="text" placeholder="name@email.com" name="username" id="username" data-validation="validate" data-action="clear" data-error="Email address should not be empty" required="" data-pattern="^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|'((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?')@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$" data-patternerror="Invalid email address">
                                        <span id="firstDesc" class="desc"></span>
                                        <a href="javaScript:void(0);" class="icon-info">Forgot your email?</a>
                                    </div>
                                    <div class="ah-form">
                                        <label>Password</label>
                                        <input type="Password" placeholder="* * * * * * * * * *" id="password" name="password"  data-validation="validate" data-error="Password should not be empty" required="">
                                        <a href="javaScript:void(0);" class="icon-info" data-account="#forgotaccount">Forgot your password?</a>
                                    </div>
                                    <div class="ah-button">
                                        <button id="loggin" type="submit" class="button signup right-margin">Log In</button>
                                        <button  class="button create" data-account="#signup">Create Account</button>
                                    </div>
                                </div>
                  </div><!-- account-holder -->
                  <div class="account-holder" id="signup"><!-- account-holder -->
                    <div class="ah-head"><h6>Create Account</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                    <div class="ah-content">
                      <div class="ah-form">
                                        <label>Your Email</label>
                                        <input data-validation="validate" value=""  data-pattern="^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|'((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?')@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$" data-patternerror="Invalid email address" required="" data-error="email should not be empty" type="text" class="input-text" id="email" name="email" data-success-message="Email is valid">
                                        <?php echo form_error('email'); ?>

                      </div>
                      <div class="ah-form">
                           <label>Password</label>
                           <div class="password">
								<input data-short-error="Password is too short"  data-password="yes" data-week-error="Password is Weak - Add special characters and numbers!" data-success-message="Strong Password - Good Job!" data-validation="validate" value=""  required="" data-error="Password should not be empty" type="password" name="pswd" id="pswd" class="input-text" >
								<span data-target="#pswd" class="view-password"></span>
                           </div>

                            <span id="view-password" class="view-password"></span>
                            <span class="error_form hide" id="password_error_message"></span>
                            <?php echo form_error('pswd'); ?>
                            <span id="result"></span>

                      </div>
                      <div class="ah-form">
                        <h6>Your Primary Role</h6>
                        <ul class="ah-switchs">
                          <li><div class="ah-radio"><input type="radio" name="utype" id="utype"  checked="checked" value="entrepreneur"><span></span></div>Entrepreneur</li>
                          <li><div class="ah-radio"><input type="radio" name="utype" id="utype"   value="investor"><span></span></div>Investor</li>
						  <input  type="hidden" id="usertype">
                        </ul>
                      </div>
                      <div class="ah-button">
                        <button id="create" type="submit" class="button signup right-margin">Create</button>
                        <button class="button create" data-account="#signin">Log In</button>
                      </div>
                    </div>
                  </div><!-- account-holder -->
                  <div class="account-holder" id="forgotaccount"><!-- account-holder -->
                    <div class="ah-head"><a href="javaScript:void(0);" class="ah-back" data-account="#signin"></a><h6>Recover Account</h6><a href="javaScript:void(0);" class="ah-close"></a></div>
                    <div class="ah-description">
                        <span id="mailmsg"></span>
                      <h6>How to recover your account</h6>
                      <p>Enter your email address you signed up to Dynamic Deck with. We’ll send you a special link to recover your account.</p>
                    </div>
                    <div class="ah-content">
                        <div class="ah-form">
                          <label>Your Email</label>
                            <input data-validation="validate" data-pattern="^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|'((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?')@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$" data-patternerror="Invalid email address" required="" data-error="email should not be empty" type="text" id="fusername" name="fusername" data-action="clear"  data-patternerror="Invalid email address" placeholder="name@email.com" >
                                        
                        </div>
                         <div class="ah-button">
                         <button type="submit" id="recoverpassword" class="button signup right-margin">Recover Account</button>
                        </div>
                    </div>
					 <input  type="hidden" id="uid">
                     <input  type="hidden" id="emailid">
                      <input  type="hidden" id="deckid" value="<?=$encid?>">

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
                          <div class="user-item-panel"><a href="profile.html">Profile</a></div>
                          <div class="user-item-panel"><a href="settings.html">Settings</a></div>
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
                          <div class="user-item-panel"><a href="javaScript:void(0);">Log Out</a></div>
                        </div>
                      </div>
                    </div>
                  </div><!-- account-holder -->
                  <div class="account-holder" id="userpanel"><!-- account-holder -->
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
                          <div class="edit-done"><h3>Deck Name</h3><a href="javaScript:void(0);" class="icon-edit" data-edit="#deckname"></a></div>
                          <div class="edit-to"><input type="text"  class="width-dynamic proba dva" value="Deck Name" value="Deck Name "name="deck_name" onchange="checklogin('deck_name')"><a href="javaScript:void(0);" class="icon-tic" data-edit="#deckname"></a></div>
                        </div>
                        <div class="deck-url" id="decknurl">
                          <div class="edit-done"><h4><a>www.dynamicdeck.io/<span>deck-name</span></a></h4><a href="javaScript:void(0);" class="icon-edit" data-edit="#decknurl"></a></div>
                          <div class="edit-to"><h4><a>www.dynamicdeck.io/<input type="text" value="deck-name" id="deckurl" onchange="checklogin('deckurl')"></a></h4><a href="javaScript:void(0);" class="icon-tic" data-edit="#decknurl"></a></div>
                        </div>
                      </div>
                      <div class="right-item"><p>Create an account or Sign In to Track Decks</p></div>
                    </div>
                  </div>
                </div>
              </div><!-- deck-sub-head -->
              <div class="cover-image-panel"><span class="placeholder-text-cover">Cover Image</span><img src="<?=base_url()?>assets/images/cover-image-v1.png" alt=""><label class="photo-upload"><input type="file" id="imgcover-edit" onchange="checklogin('imgcover-edit')"><span></span></label></div>
              <div class="deck-profle"><!-- deck-profle -->
                <div class="container">
                  <div class="row">
                    <div class="profile-photo"><span class="placeholder-text-icon">Logo</span><img src="<?=base_url()?>assets/images/logo-placeholder-v1.png" alt=""><label class="photo-upload"><input type="file" id="imglogo-edit" onchange="checklogin('imglogo-edit')"><span></span></label></div>
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
                                <h3 class="funds"><span>$</span><input type="text" id="investment_sought" onchange="checklogin('investment_sought')" value="Value" ></h3>
                                <p><input type="text" value="--% equity" onchange="checklogin('equity')"></p>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="profile-item">
                                <h5>Valuation</h5>
                                <h3 class="funds"><span>$</span><input type="text" id="valuation" onchange="checklogin('valuation')"value="Value" name=""></h3>
                                <p><input type="text"  id="pre1_commited_money" onchange="checklogin('pre1_commited_money')"value="Pre-Money"></p>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="profile-item">
                                <h5>Funds Pledged</h5>
                                <h3 class="funds"><span>$</span><input type="text" id="funds1" onchange="checklogin('funds1')"value="Value" name=""></h3>
                                <p><input type="text" id="funds2" onchange="checklogin('funds2')" value="--% Committed"></p>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="profile-item">
                                <h5>Current MRR</h5>
                                <h3 class="funds"><span>$</span><input type="text" id="currentmrr1" onchange="checklogin('currentmrr1')" value="Value" name=""></h3>
                                <p><input type="text" id="currentmrr2" onchange="checklogin('currentmrr2')" value="Profitable"></p>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="profile-item">
                                <h5>Prior Funding</h5>
                                <p class="top-margin"><input type="text" value="Subtitle" id="priorfund1" onchange="checklogin('priorfund1')"></p>
                                <p><input type="text"  value="Subtitle"  id="priorfund2" onchange="checklogin('priorfund2')"></p>
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
                    <h3><input type="text" value="Company Name" id="org_name" onchange="checklogin('org_name')"></h3>
                    <p><textarea id="org_desc" onchange="checklogin('org_desc')">Simple strapline that explains company purpose</textarea></p>
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
                                <li class="icon-cno"><input type="text" value="CN: 123456789" id="org_reg_number" name="org_reg_number" onchange="checklogin('org_reg_number')"></li>
                                <li class="icon-nav"><input type="text" value="City, Country" id="location" name="location" onchange="checklogin('location')"></li>
                                <li class="icon-bag"><input type="text" value="Sector" id="org_sector" name="org_sector" onchange="checklogin('org_sector')"></li>
                                <li class="icon-globe"><input type="text" value="Website" id="website" name="website" onchange="checklogin('website')"></li>
                                <li class="icon-calender"><input type="text" value="Date Est." id="date" name="date" onchange="checklogin('date')"></li>
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
                                <li class="icon-fb"><input type="text" value="Social link" id="link_organisation" onchange="checklogin('link_organisation')"></li>
                                <li class="icon-tw"><input type="text" value="Social link" id="twitter_page" onchange="checklogin('twitter_page')"></li>
                                <li class="icon-ig"><input type="text" value="Social link" id="linkedin_page" onchange="checklogin('linkedin_page')"></li>
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
                      <p><textarea id="what_we_do" onchange="checklogin('what_we_do')">Content of the what, how and who areas goes here so that it fills the available space nicely.</textarea></p>
                    </div>
                    <div class="cd-panel">
                      <h5><input type="text" value="Our Competitors"></h5>
                      <p><textarea id="competitors" name="competitors" onchange="checklogin('competitors')">Content of the what, how and who areas goes here so that it fills the available space nicely.</textarea></p>
                    </div>
                    <div class="cd-panel">
                      <h5><input type="text" value="Problems Solved"></h5>
                      <ul>
                        <li><textarea id="problem1" onchange="checklogin('problem1')">Bullet point goes here, with space for up to two lines of text</textarea></li>
                        <li><textarea id="problem2" onchange="checklogin('problem2')">Bullet point goes here, with space for up to two lines of text</textarea></li>
                        <li><textarea id="problem3" onchange="checklogin('problem3')">Bullet point goes here, with space for up to two lines of text</textarea></li>
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
                      <p><textarea id="business_model" onchange="checklogin('business_model')">Content of the what, how and who areas goes here so that it fills the available space nicely.</textarea></p>
                    </div>
                    <div class="cd-panel">
                      <h5><input type="text" value="Our Advantage"></h5>
                      <p><textarea id="advantage" onchange="checklogin('advantage')" >Content of the what, how and who areas goes here so that it fills the available space nicely.</textarea></p>
                    </div>
                    <div class="cd-panel">
                      <h5><input type="text" value="Notable Achievements"></h5>
                      <ul>
                        <li><textarea id="achieve1" onchange="checklogin('achieve1')" >Bullet point goes here, with space for up to two lines of text</textarea></li>
                        <li><textarea id="achieve2" onchange="checklogin('achieve2')">Bullet point goes here, with space for up to two lines of text</textarea></li>
                        <li><textarea id="achieve3" onchange="checklogin('achieve3')">Bullet point goes here, with space for up to two lines of text</textarea></li>
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
                        <img src="<?=base_url()?>assets/images/deck.png" alt="" >
                        <label class="deck-upload"><input type="file" id="teamimage1" onchange="checklogin('teamimage1')"><span></span></label>
                        <div>
                          <h6><input type="text" id="membername_t1" onchange="checklogin('membername_t1')" value="Enter Team Member Name"></h6>
                          <p><input type="text" id="role_t1" onchange="checklogin('role_t1')" value="Team Member Role"></p>
                          <span><input type="text" id="achievement_t1" onchange="checklogin('achievement_t1')" value="Prior role or experience"></span>
                        </div>
                      </div>
                      <div class="deck-item">
                        <img src="<?=base_url()?>assets/images/deck.png" >
                        <label class="deck-upload"><input type="file" id="teamimage2" onchange="checklogin('teamimage2')"><span></span></label>
                        <div>
                          <h6><input type="text"  id="membername_t2" onchange="checklogin('membername_t2')" value="Enter Team Member Name"></h6>
                          <p><input type="text" id="role_t2" onchange="checklogin('role_t2')" value="Team Member Role"></p>
                          <span><input type="text" id="achievement_t2" onchange="checklogin('achievement_t2')" value="Prior role or experience"></span>
                        </div>
                      </div>
                      <div class="deck-item">
                        <img src="<?=base_url()?>assets/images/deck.png" >
                        <label class="deck-upload"><input type="file" id="teamimage3" onchange="checklogin('teamimage3')"><span></span></label>
                        <div>
                          <h6><input type="text" id="membername_t3" onchange="checklogin('membername_t3')"  value="Enter Team Member Name"></h6>
                          <p><input type="text" id="role_t3" onchange="checklogin('role_t3')"  value="Team Member Role"></p>
                          <span><input type="text"  id="achievement_t3" onchange="checklogin('achievement_t3')" value="Prior role or experience"></span>
                        </div>
                      </div>
                    </div>
                    <div class="cd-panel">
                      <h5><input type="text" value="Notable Investors & Advisors"></h5>
                      <div class="deck-item">
                        <img src="<?=base_url()?>assets/images/deck.png" >
                        <label class="deck-upload"><input type="file" id="investimage1" onchange="checklogin('investimage1')"><span></span></label>
                        <div>
                          <h6><input type="text" id="membername_I1" onchange="checklogin('membername_I1')" value="Enter Team Member Name"></h6>
                          <p><input type="text" id="role_I1" onchange="checklogin('role_I1')" value="Team Member Role"></p>
                          <span><input type="text"  id="achievement_I1"  onchange="checklogin('achievement_I1')" value="Prior role or experience"></span>
                        </div>
                      </div>
                      <div class="deck-item">
                        <img src="<?=base_url()?>assets/images/deck.png" >
                        <label class="deck-upload"><input type="file" id="investimage2" onchange="checklogin('investimage2')"><span></span></label>
                        <div>
                          <h6><input type="text" id="membername_I2" onchange="checklogin('membername_I2')"value="Enter Team Member Name"></h6>
                          <p><input type="text" id="role_I2" onchange="checklogin('role_I2')" value="Team Member Role"></p>
                          <span><input type="text" id="achievement_I2"  onchange="checklogin('achievement_I2')" value="Prior role or experience"></span>
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
          <div class="deck-messages" id="error">
              <div class="dm-content">
                  <div class="dm-body">
                      <div class="dm-dev">
                          <p>Please Signin Or Signup  to continue..</p>
                          <button class="button signup" onclick="cancel_login()">OK</button>
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
   <!-- <script src="assets/js/jquery.min.js"></script>-->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datepicker.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>assets/js/layout.min.js"></script>
	<script src="<?=base_url()?>assets/js/main.js"></script>
  </body>
</html>