@extends('layouts.main',['name' => 'home'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                        @can('user.index')
                        <li class="nav-item">
                            <a class="nav-link active" href="{!! route('user.index') !!}"><i
                                    class="fa fa-list mr-2"></i>{{__('User List')}}</a>
                        </li>
                        @endcan
                        @can('user.create')
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('user.create') !!}"><i
                                    class="fa fa-plus mr-2"></i>{{__('Create')}}</a>
                        </li>
                        @endcan
                    </ul>
                </div>
                <div class="card-body table-responsive">
                    <table class="table text-center" id="tableCustom">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                @foreach ($roles as $role)
                                <th>{{$role->name}}</th>
                                @endforeach
                                <th>Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $srn => $user)
                            <tr>
                                <td>{{$srn+1}}</td>
                                <td>{{$user->name}}</td>
                                @foreach ($roles as $role)
                                <td>
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="user" value="{{$user->id}}">
                                        <input type="hidden" name="roles" value="{{$role->id}}">
                                        <input type="checkbox" onchange="submit();" class="form-check-input" name="role" value="{{$role->id}}" @if ($user->hasRole($role)) checked @endif>
                                    </form>
                                </td>
                                @endforeach
                                <td>{{$user->number ?? 'Not Available'}}</td>
                                <td>
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-info btn-sm mx-1"><i class="fa fa-key" aria-hidden="true"></i></a>
                                    <a href="#" data-id="delete-form-{{ $user->id }}"
                                        class="btn btn-sm btn-danger mx-1" onclick="deleteData(event,this);">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function() {
            $('#tableCustom').DataTable({
                "columnDefs": [{
                    targets: [1,2,3,4],
                    orderable: false,
                }]
            });
        });
    </script>
@endsection