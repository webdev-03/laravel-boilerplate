@csrf
<div class="form-group">
    <label for="name">Role Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $role->name }}"
        class="form-control @error('name') is-invalid @enderror" placeholder="Role name">
    @error('name')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="guard_name">Middleware Group</label>
    <input type="text" name="guard_name" id="guard_name" value="{{ old('guard_name') ?? $role->guard_name }}"
        class="form-control @error('guard_name') is-invalid @enderror" placeholder="Middleware group Default is WEB">
    @error('guard_name')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="permissions">Permissions</label>
    <select multiple class="form-control multiSelect @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions">
        @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}" 
                @foreach ((old('permissions') ?? $role->permissions) as $item)
                    {{(old('permissions') ?$item : $item->id)  == $permission->id ? 'selected' : null}} 
                @endforeach
                >{{ $permission->name }}</option>
        @endforeach
    </select>
    @error('permissions')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<button class="btn btn-primary w-100">Submit</button>
