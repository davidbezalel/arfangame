@extends('layouts.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <a href="" id="add" class="general-action add"><i class="fa fa-pencil"></i></a>
                        <table id="bank-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no">#</th>
                                <th>Bank</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="bank-modal" class="modal fade" data-backdrop="static" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="bank-form">
                <input type="hidden" name="id">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" arial-lable="Close" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert nonmodalalert redalert" id="error"></div>
                    <div class="form-group has-feedback">
                        <input type="text" name="bank" class="form-control" placeholder="Bank. ex: Mandiri">
                        <span class="fa fa-cc-mastercard form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="accountno" class="form-control"
                               placeholder="Account Number">
                        <span class="form-control-feedback">12</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn pull-right btn-primary btn-flat">Add</button>
                    <button type="submit" id="update-btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn pull-right btn-primary btn-flat">Update</button>
                    <button id="cancel-btn" data-dismiss="modal" arial-lable="Close" class="btn pull-right btn-danger btn-flat">Cancel</button>
                </div>
            </form>

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