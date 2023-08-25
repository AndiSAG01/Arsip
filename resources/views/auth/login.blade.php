<x-auth>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-xl"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        @error('email')
            <p class="text-danger fw-bold my-3">
                {{ $message }}
            </p>
        @enderror

        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password" type="password"
                class="form-control @error('password') is-invalid @enderror  form-control-xl" name="password"
                value="{{ old('password') }}" required autocomplete="password">
            <div class="form-control-icon">
                <i class="bi bi-grid"></i>
            </div>
            @error('password')
                <p class="text-danger fw-bold my-3">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
    </form>
</x-auth>
