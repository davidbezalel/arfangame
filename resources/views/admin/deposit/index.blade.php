@extends('layouts.admin_master')

@section('content')

    {{-- content --}}
    <section class="content">
        <div class="row" id="deposit-table-container">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <table id="deposit-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no">#</th>
                                <th>Player</th>
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