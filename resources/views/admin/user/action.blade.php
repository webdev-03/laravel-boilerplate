<div class="d-flex">
    <a href="{{ route('user.edit', $id) }}" class="btn btn-sm btn-warning mx-1">
        <i class="fas fa-pencil-alt"></i>
    </a>
    <a href="#" class="btn btn-sm btn-danger mx-1"
        onclick="event.preventDefault();document.getElementById('delete{{ $id }}').submit();">
        <i class="fas fa-trash"></i>
        <form action="{{ route('user.destroy', $id) }}" method="post" id="delete{{ $id }}" class="d-none">
            @csrf @method('delete')</form>
    </a>
</div>
