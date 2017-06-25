@extends('layouts.player_master')

@section('content')

    {{-- content --}}
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h5>How to do a transaction with us?</h5>

                        <div class="box-tools pull-right">
                            <button type="button" id="closeclue" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <p>You can charge your deposit by transfer your money to one of this account:</p>
                        <table class="table table-bordered" style="font-size: 13px;">
                            <tbody id="bank-table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Bank</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                            </tr>
                            </tbody>
                        </table>
                        <br />
                        <p>Widget "<strong><u>Claim Payment</u></strong>" is used to claim a payment you have done before.</p>
                        <p>Widget "<strong><u>Transaction Log</u></strong>" is used to see all the transaction based on your account.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="claimwidget" class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                <a href="">
                    <div class="info-box bg-aqua">
                    <span class="info-box-icon">
                        <i class="fa fa-cc-mastercard"></i>
                    </span>

                        <div class="info-box-content">
                            <span class="info-box-number">Claim Payment</span>
                        </div>
                    </div>
                </a>
            </div>
            <div id="logwidget" class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
                <a href="">
                    <div class="info-box bg-green">
                    <span class="info-box-icon">
                        <i class="fa fa-list-ul"></i>
                    </span>

                        <div class="info-box-content">
                            <span class="info-box-number">Transaction Log</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="display: none;" id="transaction-form-container">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 col-xs-12">
                <div class="box box-default">
                    <form action="" id="transaction-form">
                        <div class="modal-body">
                            <div class="alert nonmodalalert redalert" id="error"></div>
                            <div class="form-group has-feedback">
                                <select name="beneficiaryid" id="beneficiarys" class="form-control">
                                    <option value="0">Choose beneficiary account</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="sourcebank" class="form-control" placeholder="Your Bank">
                                <span class="fa fa-cc-mastercard form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="sourceaccount" class="form-control" placeholder="Your Account Number">
                                <span class="form-control-feedback">12</span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="sourcename" class="form-control" placeholder="Your Account Name">
                                <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="number" name="ammount" class="form-control" placeholder="Ammount">
                                <span class="fa fa-money form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="date" name="date" class="form-control" placeholder="Date">
                                <span class="fa fa-calendar-o form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="claim-btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn pull-right btn-primary btn-flat">Claim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;" id="transaction-table-container">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <table id="transaction-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no">#</th>
                                <th>Admin Bank</th>
                                <th>Player Bank</th>
                                <th>Player Account Number</th>
                                <th>Player Account Name</th>
                                <th>Ammount</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

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