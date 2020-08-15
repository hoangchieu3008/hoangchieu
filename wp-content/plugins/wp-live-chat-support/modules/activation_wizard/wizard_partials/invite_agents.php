<h2 class="wplc_wizard_title"><?= __( "Invite agents" ) ?></h2>
<div class="row mx-2">
    <div id="myCarousel" class="carousel slide col-md-12" data-interval="false" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto">
            <div class="carousel-item col-sm-12 col-lg-4 col-md-4 active">
                <div class="card border-dark">
                    <div class="card-header">
                        <i class="fas fa-users"></i><span>New Agent</span>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="Username">Username</label>
                                <input name="agentEntry[1][Username]" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="Name">Name</label>
                                <input name="agentEntry[1][Name]" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="Email">Email</label>
                                <input name="agentEntry[1][Email]" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div style="text-align: center;" class="form-group col-md-4 offset-md-2">
                                <label class="col-form-label" for="AgentCheck">Agent</label>
                                <input type="radio" name="agentEntry[1][AgentRole]" id="agentEntry_1_AgentCheck" value="agent" checked>
                            </div>
                            <div style="text-align: center;" class="form-group col-md-4">
                                <label class="col-form-label" for="AdminCheck">Admin</label>
                                <input type="radio" name="agentEntry[1][AgentRole]" id="agentEntry_1_AdminCheck" value="admin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 mb-1">
                <div class="card h-100 border-dark ">
                    <div class="row h-100">
                        <div class="col-md-12 align-self-center">
                            <div class="card-body">
                                <p class="card-text" style="font-size:70px; text-align:center;"><i
                                            class="add-agent fas fa-plus-circle"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="carousel-arrows">
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class="fas fa-chevron-circle-left fa-2x"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class="fas fa-chevron-circle-right fa-2x"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="carousel-item-template col-sm-12 col-lg-4 col-md-4" style="display: none">
    <div class="card border-dark">
        <div class="card-header">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="col-form-label" for="Temp0">Username</label>
                    <input class="form-control" disabled type="text" name="Username" id="Temp0" data-array-id="Username">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="col-form-label" for="Temp1">Name</label>
                    <input class="form-control" disabled type="text" name="Name" id="Temp1" data-array-id="Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="col-form-label" for="Temp2">Email</label>
                    <input class="form-control" disabled type="text" name="Email" id="Temp2" data-array-id="Email">
                </div>
            </div>
            <div class="form-row">
                <div style="text-align: center;" class="form-group col-md-4 offset-md-2">
                    <label class="col-form-label" for="Temp3">Agent</label>
                    <input type="radio" disabled name="AgentRole" id="Temp3" data-array-id="AgentCheck" data-maintain-name="true" value="agent" checked>
                </div>
                <div style="text-align: center;" class="form-group col-md-4">
                    <label class="col-form-label" for="Temp5">Admin</label>
                    <input type="radio" disabled name="AgentRole" id="Temp5" data-array-id="AdminCheck" data-maintain-name="true" value="admin">
                </div>
            </div>
        </div>
    </div>
</div>