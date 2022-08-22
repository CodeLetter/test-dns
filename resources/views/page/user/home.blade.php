@extends('layouts.index')

@section('content')

      <div class="container-fluid">
        <div class="col-12">
            <div class="card">
              <form action="/home/search" method="get">
                {{ csrf_field() }}
              <div class="card-header">
                <h3 class="card-title">
                  Users Table
                </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">



                    <input type="text" name="tableSearch" class="form-control float-right" placeholder="Search Name">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>



                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    @forelse($userDatas as $userData)
                    <tr>
                      <td>
                        {{ $userData->id }}
                        @if($errors->has('title'))
                        213213
                        @endif
                      </td>
                      <td>{{ $userData['name'] }}</td>
                      <td>{{ $userData->email }}</td>
                      <!-- <td><button type="button" class="btn btn-info btn-sm edit" data-id="{{ $userData->id }}">Edit</button></td>  -->
                      <td><a class="btn btn-success" href="/home/user/edit/{{ $userData->id }}?title=123" style="background-color: blue;">Edit</a></td>
                      <td><a class="btn btn-danger"  href="/home/user/delete/{{ $userData->id }}?title=123" style="background-color: red;">Delete</a></td>
                    </tr>
                    @empty
                    <p>No user</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
              </form>
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->

@endsection

@section('script')
  <script>
  </script>
@endsection