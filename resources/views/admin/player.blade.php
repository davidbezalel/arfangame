@extends('layouts.admin_master')

@section('content')
    <section class="content-header clear-float">
        <ol class="breadcrumb">
            <li><a href="/admin/player"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <section class="content">
        <input type="hidden" id="id" value="{!! Auth::user()->id !!}">
        {{--<input type="hidden" id="role" value="{!! $data['role'] !!}">--}}

        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <table id="player-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no">#</th>
                                <th>Name</th>
                                <th>Player ID</th>
                                <th>Deposite</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection