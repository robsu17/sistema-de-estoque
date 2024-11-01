<div class="w-[500px] bg-white rounded-md shadow-sm p-4">
  <div class="flex flex-col items-center gap-4 mb-4">
    <img class="h-[100px]" src="{{ asset('img/box.svg') }}" alt="package">
    <h1 class="text-xl font-semibold text-gray-700">Meu Estoque - Fazer login</h1>
    @if ($errors->has('userNotAlreadyExist'))
      <span class="text-red-500">{{ $errors->first('userNotAlreadyExist') }}</span>
    @endif
  </div>
  <form method="POST" action="{{ route('login.signin') }}" class="space-y-4">
    @csrf
    <x-forms.input name="email" type="email" placeholder="example@example.com" label="E-mail" />
    <x-forms.input name="password" type="password" placeholder="********" label="Senha" />
    <div class="flex flex-col gap-3">
      <x-forms.button type="submit" text="Entrar" />
      <div class="flex justify-between items-center mt-4">
        <a href="#" class="text-gray-500 underline">Esqueceu a senha?</a>
        <a href="{{ route('register.index') }}" class="text-gray-500 underline">Cadastre-se</a>
      </div>
    </div>
  </form>
</div>