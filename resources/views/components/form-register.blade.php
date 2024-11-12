<form method="post" action="{{ route('register.store') }}" style="width: 400px;">
    @csrf
    @error('user_exist')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('error_internal')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="John Doe"
            autocomplete="off"
            value="{{ old('name') }}"
        />
        <div id="name" class="invalid-feedback">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>
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
        <a href="{{ route('login') }}" class="link-primary">Fazer login</a>
        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
    </div>
</form>

<script>
    const inputName = document.querySelector('#name')
    const inputEmail = document.querySelector('#email')
    const inputPassword = document.querySelector('#password')

    @error('name')
        inputName.classList.add('is-invalid')
    @enderror

    @error('email')
        inputEmail.classList.add('is-invalid')
    @enderror

    @error('password')
        inputPassword.classList.add('is-invalid')
    @enderror
</script>
