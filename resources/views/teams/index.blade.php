@extends('dashboard')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of teams</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ url('team/create') }}">Add new team</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Name</th>
                                    <th width="20%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Description</th>
                                    <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Total member</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teams as $team)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $team->name }}</td>
                                        <td class="hidden-xs">{{ $team->description }}</td>
                                        <td class="hidden-xs">{{ $team->total_member }}</td>
                                        <td>
                                            <form class="row" method="POST" action="{{ url('team/destroy', ['id' => $team->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ url('team/edit', ['id' => $team->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                    Update
                                                </a>
                                                <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <tr role="row">
                                    <th width="20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Name</th>
                                    <th width="20%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Description</th>
                                    <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Total member</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($teams)}} of {{count($teams)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $teams->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
