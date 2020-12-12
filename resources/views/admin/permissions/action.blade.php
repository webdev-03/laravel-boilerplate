<div class="d-flex">
    <a href="{{ route('permission.edit', $model->id) }}" class="btn btn-warning btn-sm mx-1">
        <i class="fas fa-pencil-alt"></i>
    </a>
    @csrf
    <a href="#" class="btn btn-danger btn-sm mx-1"
        onclick="window.deleteData(event,'{{ route('permission.destroy', $model->id) }}');">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
</div>
