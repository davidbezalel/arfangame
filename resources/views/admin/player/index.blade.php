@extends('layouts.admin_master')

@section('content')

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
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection