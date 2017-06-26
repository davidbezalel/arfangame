@extends('layouts.player_master')

@section('content')

    {{-- content --}}
    <section class="content">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 id="deposit">IDR. <?php echo(number_format(Auth::guard('user')->user()->deposit, 2)) ?> </h3>
                        <p>Deposit</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-creative-commons"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="deposit-table-container">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <table id="deposit-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no">#</th>
                                <th>Ammount</th>
                                <th>Type</th>
                                <th>Transaction Description</th>
                                <th>Date Time</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection