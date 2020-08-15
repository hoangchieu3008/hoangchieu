<div class="bootstrap-wplc-content">
    <div class="container-fluid">
        <div class="row justify-content-center mt-0">
            <div class="col-12 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong><?=__("Welcome to WP Live Chat Support")?></strong></h2>
                    <p><?=__("Complete the activation wizard to start using the plugin")?></p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="wplc_wizard" method="post" action="<?=$saveUrl?>">
                                <ul id="wplc_wizard_progressbar">
									<?php foreach ( $steps as $key=>$step ) { ?>
                                        <li  <?= $key==0? 'class="active"':''?> id="<?= $step->id ?>" data-include="<?= $step->id == 'step-channel'? 'true' : 'false' ?>" style="display:<?= $step->id == 'step-channel'? 'inline-block':'none'  ?>">
                                                <span class="wizard-step-icon">
                                                <i class="<?= $step->icon ?>"></i>
                                                </span>
                                            <strong><?= $step->label ?></strong>
                                        </li>
									<?php } ?>
                                </ul>
								<?php foreach ( $steps as $key=>$step  ) { ?>
                                    <fieldset data-include="false"  data-channels="<?=$step->channels?>"  data-step-id="<?= $step->id ?>">
                                        <div class="form-card">
                                            <?php include_once(plugin_dir_path(__FILE__) . $step->view); ?>
                                        </div>
                                        <?php if($key < count($steps)-1){ ?>
                                         <input type="button" name="previous" id="button_previous_<?=$step->id?>"  class="previous action-button-previous" style="display:<?= $key == 0 ? 'none' : 'inline-block' ?>;"  value="<?=__("Back")?>"/>
                                         <input type="button" name="next" id="button_next_<?=$step->id?>" class="next action-button" value="<?= __("Next")  ?>"/>
                                        <?php } ?>
                                    </fieldset>
								<?php } ?>

                               <!-- <input type="submit" value="submit" />-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
