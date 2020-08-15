<div class="bootstrap-wplc-content">
    <div class="container-fluid">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-11 col-md-10 col-lg-9 col-xl-8 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong><?= __( "Welcome to 3CX Live Chat Support" ) ?></strong></h2>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <div id="wplc_wizard">
                                <ul id="wplc_wizard_progressbar">
                                    <li class="active" id="success_finish">
                                        <span class="wizard-step-icon">
                                        <i class="fa fa-check-circle"></i>
                                        </span>
                                        <strong><?= __( "Finish" ) ?></strong>
                                    </li>
                                </ul>
                                <fieldset data-step-id="success_finish">
                                    <div class="form-card">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-6   <?= $fully_completed ? 'success':'warning' ?>" id="messagebox">
                                                    <div class="row">
                                                        <div class="col-md-2" id="messagebox-icon">
                                                            <span class="fa fa-2x  <?= $fully_completed ? 'fa-check-circle text-success':'fa-exclamation-triangle text-warning' ?> "></span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row h5" id="messagebox-header">Activation Complete
                                                            </div>
	                                                        <?php foreach ( $activation_result['Agents']['Success']  as $username ) { ?>
                                                                <div class="row">
                                                                    <div class="col-md-1">
                                                                        <span class="fa fa-check-circle text-success"></span>
                                                                    </div>
                                                                    <div class="col-md-10">
																		 <?= __("Agent").' '. $username. ' ' . __( "added" ) ?>
                                                                    </div>
                                                                </div>
															<?php } ?>
	                                                        <?php foreach ( $activation_result['Agents']['Error']  as $username=> $error ) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <span class="fa fa-exclamation-triangle text-warning"></span>
                                                                        </div>
                                                                        <div class="col-md-10">
					                                                        Unable to add agent <?=$username?>. Error:<?=$error?>
                                                                        </div>
                                                                    </div>
	                                                        <?php }
	                                                        ?>

															<?php foreach ( $single_settings as $key => $setting ) {
																if ( array_key_exists($key , $activation_result) &&  $activation_result[ $key ] ) {
																	?>
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <span class="fa fa-check-circle text-success"></span>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <?= $setting ?>
                                                                        </div>
                                                                    </div>
																<?php }
															}
															?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <input type="button" name="start_now"
                                           id="button_start_now"
                                           class="action-button"
                                           value="<?= __( "Start Now" ) ?>"/>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
