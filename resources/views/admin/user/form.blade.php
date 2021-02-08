@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}"
        class="form-control @error('name') is-invalid @enderror" placeholder="Name">
    @error('name')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}"
        class="form-control @error('email') is-invalid @enderror" placeholder="Email">
    @error('email')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
        placeholder="password">
    @error('password')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="role">Role</label>
    <select multiple class="form-control multiSelect @error('role') is-invalid @enderror" name="role[]" id="role">
        <option value="" disabled>Please choose a role</option>
        @foreach ($roles as $role)
            <option @foreach (old('role') ?? $user->roles as $item) {{ ($item->id ?? $item) == $role->id ? 'selected' : null }} @endforeach
                value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    @error('role')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<button class="btn btn-primary w-100">Submit</button>
