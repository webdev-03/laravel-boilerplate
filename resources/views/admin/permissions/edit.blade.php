@extends('layouts.main',['name' => 'home'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('permission.update', $permission->id) }}" method="post">
                        @method('patch')
                        @include('admin.permissions.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
