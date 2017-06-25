@extends('layouts.admin_master')

@section('content')

   {{-- content --}}
    <section class="content">
        <div class="row" id="transaction-table-container">
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
@endsection