@extends('layouts.main',['name' => 'home'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('role.update', $role->id) }}" method="post">
                        @method('patch')
                        @include('admin.roles.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
