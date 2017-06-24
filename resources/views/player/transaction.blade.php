@extends('layouts.player_master')

@section('content')
    {{-- header --}}
    <section class="content-header clear-float">
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-balance-scale"></i>Deposit</a>
            </li>
            <li>
                <a href="/notice/index">List</a>
            </li>
        </ol>
    </section>

    {{-- content --}}
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
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
            <div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
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
    </section>
@endsection