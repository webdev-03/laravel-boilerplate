    @csrf
    <div class="form-group">
        <label for="name">Permission Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $permission->name }}"
            class="form-control @error('name') is-invalid @enderror" placeholder="Permission name">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="guard_name">Middleware Group</label>
        <input type="text" name="guard_name" id="guard_name" value="{{ old('guard_name') ?? $permission->guard_name }}"
            class="form-control @error('guard_name') is-invalid @enderror"
            placeholder="Middleware group Default is WEB">
        @error('guard_name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <button class="btn btn-primary w-100">Submit</button>
