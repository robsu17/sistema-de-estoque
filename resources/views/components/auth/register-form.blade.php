<div class="w-[500px] bg-white rounded-md shadow-sm p-4">
  <div class="flex flex-col items-center gap-4 mb-4">
    <img class="h-[100px]" src="{{ asset('img/box.svg') }}" alt="package">
    <h1 class="text-xl font-semibold text-gray-700">Meu Estoque - Cadastro</h1>
    @if ($errors->has('userAlreadyExist'))
      <span class="text-red-500">{{ $errors->first('userAlreadyExist') }}</span>
    @endif
  </div>
  <form method="POST" action="{{ route('register.signup') }}" class="space-y-4">
    @csrf
    <x-forms.input name="username" type="text" placeholder="johndoe" label="Usuário" />
    <x-forms.input name="email" type="email" placeholder="example@example.com" label="E-mail" />
    <x-forms.input name="password" type="password" placeholder="********" label="Senha" />
    <div class="flex flex-col gap-3">
      <x-forms.button type="submit" text="Cadastrar" />
      <div class="flex justify-between items-center mt-4">
        <a href="{{ route('login') }}" class="text-gray-500 underline">Já tem conta?</a>
      </div>
    </div>
  </form>
</div>