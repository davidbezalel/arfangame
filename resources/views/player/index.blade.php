@extends('layouts.player_master')

@section('content')
    <article>
        <h2 class="templatemo-header">What ?</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius facilis iure laudantium molestiae placeat
            quidem, reiciendis rem sequi suscipit tempora ut veritatis. Corporis eligendi laboriosam quia quo sunt
            vero.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis, cum deserunt dolores
            ducimus eaque expedita id illum molestias nesciunt nostrum numquam, obcaecati, quod totam vel voluptates
            voluptatum. At, expedita.</p>

        <div class="templatemo-item callout callout-info">
            <h2 class="text-center">Singapore</h2>

            <div class="text-center">
                <i class="fa fa-cloud templatemo-service-icon"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio esse inventore qui
                voluptatum. Ab animi asperiores deserunt distinctio harum itaque maxime neque odit perspiciatis quia
                repellat sapiente, unde, voluptatum?</p>
        </div>
        <div class="templatemo-item callout callout-warning">
            <h2 class="text-center">Singapore</h2>

            <div class="text-center">
                <i class="fa fa-cloud templatemo-service-icon"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio esse inventore qui
                voluptatum. Ab animi asperiores deserunt distinctio harum itaque maxime neque odit perspiciatis quia
                repellat sapiente, unde, voluptatum?</p>
        </div>
        <div class="templatemo-item callout callout-success">
            <h2 class="text-center">Singapore</h2>

            <div class="text-center">
                <i class="fa fa-cloud templatemo-service-icon"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio esse inventore qui
                voluptatum. Ab animi asperiores deserunt distinctio harum itaque maxime neque odit perspiciatis quia
                repellat sapiente, unde, voluptatum?</p>
        </div>
        <div class="templatemo-item callout callout-danger">
            <h2 class="text-center">Singapore</h2>

            <div class="text-center">
                <i class="fa fa-cloud templatemo-service-icon"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio esse inventore qui
                voluptatum. Ab animi asperiores deserunt distinctio harum itaque maxime neque odit perspiciatis quia
                repellat sapiente, unde, voluptatum?</p>
        </div>
    </article>

    <div id="noticemodal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="login">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="User ID">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password">
                            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="pull-right btn btn-flat btn-info">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <div id="registermodal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert redalert" id="error" role="alert"></div>
                    <form action="" id="registerform">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="playerid" placeholder="User ID">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" name="repassword" placeholder="Re-Password">
                            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-flat btn-danger" data-dismiss="modal">Cancel</button>
                    <button class="pull-right btn btn-flat btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'>" id="register">Register</button>
                </div>
            </div>
        </div>
    </div>
    <div id="successmodal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalalert greenalert">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <span id="successaddmessage"></span>
                </div>
            </div>
        </div>
    </div>
@endsection