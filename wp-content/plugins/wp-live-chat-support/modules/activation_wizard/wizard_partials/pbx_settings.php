<h2 class="wplc_wizard_title"><?= __( "3CX PBX settings" ) ?></h2>
<div class="row mx-2">
    <div class="col-md-12">
        <div class="form-row">
            <div class="form-group col-md-12" id="existing_pbx_settings">
                <label class="col-form-label" for="clickToTalkUrl">3CX Click2Talk url</label>
                <input id="clickToTalkUrl" name="clickToTalkUrl" class="form-control" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label" for="c2cMode">Mode</label>
                <select class="form-control" name="c2cMode">
                    <option value="all">Phone, Video and Chat</option>
                    <option value="videochat">Video and Chat</option>
                    <option value="phonechat">Phone and Chat</option>
                    <option value="phone">Only Phone</option>
                    <option value="chat">Only Chat</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="c2cAuthType">Mode</label>
                <select class="form-control" name="c2cAuthType">
                    <option value="both">Name and Email</option>
                    <option value="email">Email</option>
                    <option value="name">Name</option>
                    <option value="none">No auth required</option>
                </select>
            </div>
        </div>
    </div>
</div>