@extends('layouts.admin_master')

@section('content')

    {{-- content --}}
    <section class="content">
        <div class="row" id="transaction-form-verify-container">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 col-xs-12">
                <div class="box box-default">
                    <form action="" id="transaction-form-verify">
                        <div class="modal-body">
                            <div class="alert nonmodalalert redalert" id="error"></div>
                            <div class="form-group has-feedback">
                                <select disabled name="beneficiaryid" id="beneficiarys" class="form-control">
                                    <option value="{{ $data['data']['adminbankid'] }}">{{ $data['data']['adminbank']['bank'] }}</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <input disabled type="text" value="{{ $data['data']['playerbank'] }}" name="sourcebank"
                                       class="form-control" placeholder="Your Bank">
                                <span class="fa fa-cc-mastercard form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input disabled type="text" value="{{ $data['data']['playeraccountno'] }}"
                                       name="sourceaccount" class="form-control" placeholder="Your Account Number">
                                <span class="form-control-feedback">12</span>
                            </div>
                            <div class="form-group has-feedback">
                                <input disabled type="text" value="{{ $data['data']['playeraccountname'] }}"
                                       name="sourcename" class="form-control" placeholder="Your Account Name">
                                <span class="glyphicon glyphicon-text-size form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input disabled type="number" value="{{ $data['data']['ammount'] }}" name="ammount"
                                       class="form-control" placeholder="Ammount">
                                <span class="fa fa-money form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input disabled type="date" value="{{ $data['data']['date'] }}" name="date"
                                       class="form-control" placeholder="Date">
                                <span class="fa fa-calendar-o form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                    @if ($data['data']['status'] != \App\Model\Transaction::STATUS_CLAIMED)
                                    style="display: none;"
                                    @endif
                                    type="button" id="valid-btn" data-id="{{ $data['data']['id'] }}"
                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i>"
                                    class="btn pull-right btn-success btn-flat">Valid
                            </button>
                            <button
                                    @if ($data['data']['status'] != \App\Model\Transaction::STATUS_CLAIMED)
                                    style="display: none;"
                                    @endif
                                    type="button" id="invalid-btn" data-id="{{ $data['data']['id'] }}"
                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i>"
                                    class="btn pull-right btn-danger btn-flat">Invalid
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="successmodal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalalert greenalert">
                <div class="modal-body">
                    <button type="button" id="successmodalclose" class="close">&times;</button>
                    <span id="successaddmessage"></span>
                </div>
            </div>
        </div>
    </div>
@endsection