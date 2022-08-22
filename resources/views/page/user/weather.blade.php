@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Weather</h5>
                <div class="card-body">
{{--                    <p class="card-text">關鍵字</p>--}}
{{--                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}
                    <form action="/weather/search" method="get">
                        {{ csrf_field() }}
                        Key words：<input  type="text" name="searchText" placeholder="Local Name">

                        <asdasd>
                        Select type：
                            <input  type="radio" name="date" value="0">Yesterday
                            <input  type="radio" name="date" value="1" checked>Today
                            <input  type="radio" name="date" value="2">This Month
                            <input  type="radio" name="date" value="3">Last Month
                        </asdasd>

                        <button class="btn btn-primary btn-xs">Search</button>

                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>ID</th>
                                        <th>Local Name</th>
                                        <th>Geo</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>

                                    @forelse($iniDatas as $iniData)
                                    <tr>
                                        <td>{{ $iniData->id }}</td>
                                        <td>{{ $iniData->locationname }}</td>
                                        <td>{{ $iniData->geocode }}</td>
                                        <td>{{ $iniData->created_at }}</td>
                                        <td>{{ $iniData->updated_at }}</td>
                                    </tr>
                                    @empty
                                        <p>No user</p>
                                    @endforelse
                                    </tbody></table>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection