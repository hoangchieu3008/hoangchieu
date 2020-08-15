<h2 class="wplc_wizard_title"><?= __("Chat styling")?></h2>
<div class="row">
	<div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-4">
                <label class="col-form-label" for="base_color">Base Color</label>
                <input class="form-control" type="color" id="base_color" name="base_color"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label class="col-form-label" for="agent_color">Agent bubble Color</label>
                <input class="form-control" type="color" id="agent_color" name="agent_color"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label class="col-form-label" for="client_color">Client bubble Color</label>
                <input class="form-control" type="color" id="client_color" name="client_color"/>
            </div>
        </div>
	</div>
	<div class="col-md-6">
		<?php $preview_component->run(); ?>
	</div>
</div>