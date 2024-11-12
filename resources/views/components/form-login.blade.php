<form method="post" action="{{ route('login.store') }}" style="width: 400px;">
    @csrf
    @error('user_not_found')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('invalid_credentials')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="name@example.com"
            autocomplete="off"
            value="{{ old('email') }}"
        />
        <div id="email" class="invalid-feedback">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="********"
        />
        <div id="password" class="invalid-feedback">
            @error('password')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('register.index') }}" class="link-primary">Criar conta</a>
        <button type="submit" class="btn btn-primary">
            Entrar
        </button>
    </div>
</form>

<script>
    const inputEmail = document.querySelector('#email')
    const inputPassword = document.querySelector('#password')

    @error('email')
        inputEmail.classList.add('is-invalid')
    @enderror

    @error('password')
        inputPassword.classList.add('is-invalid')
    @enderror
</script>
