@php
    use App\Models\Category;
    use App\Models\Location;

    $categories = Category::all();
    $locations = Location::all();
@endphp

<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('put')

    @error('quantity')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <label class="d-block mb-3">
        <span class="mb-2 d-block">Nome</span>
        <input id="name" name="name" class="form-control" autocomplete="off" value="{{ $product->name }}"/>
    </label>

    <label class="d-block mb-3">
        <span class="mb-2 d-block">Descrição</span>
        <textarea id="description" name="description" class="form-control" autocomplete="off">{{$product->description}}</textarea>
    </label>

    <label class="d-block mb-3">
        <span class="mb-2 d-block">Quantidade</span>
        <input id="quantity" name="quantity" type="number" class="form-control" value="{{ $product->quantity }}"/>
    </label>

    <label class="d-block mb-3">
        <span class="mb-2 d-block">Preço</span>
        <input id="price" name="price" type="number" class="form-control" value="{{ $product->price }}"/>
    </label>

    <select id="category_id" name="category_id" class="form-select mb-3" aria-label="Default select example">
        <option disabled {{ !$product->category ? 'selected' : '' }}>Selecione uma categoria</option>
        @foreach($categories as $category)
            <option value="{{ $category['id'] }}"
                {{ $product->category && $product->category->id == $category['id'] ? 'selected' : '' }}>
                {{ $category['title'] }}
            </option>
        @endforeach
    </select>

    <select id="location_id" name="location_id" class="form-select mb-3" aria-label="Default select example">
        <option disabled {{ !$product->location ? 'selected' : '' }}>Selecione um local</option>
        @foreach($locations as $location)
            <option
                value="{{ $location['id'] }}"
                {{ $product->location && $product->location->id == $location['id'] ? 'selected' : '' }}
            >
                {{ $location['title'] }}
            </option>
        @endforeach
    </select>
    <div class="d-flex justify-content-end align-items-center gap-2">
        <form>
            <button class="btn btn-danger" type="button" onclick="deleteProduct({{ $product->id }})">
                Excluir do estoque
            </button>
        </form>
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</form>

<script>
    function deleteProduct(productId) {
        if (!confirm("Tem certeza de que deseja excluir este produto?")) {
            return;
        }

        fetch(`/products/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
            .then(response => {
                if (response.ok) {
                    alert("Produto excluído com sucesso!");
                    window.location.href = "{{ route('dashboard') }}";
                } else {
                    alert("Erro ao excluir o produto. Tente novamente.");
                }
            })
            .catch(error => console.error('Erro:', error));
    }

    const inputName = document.querySelector('#name')
    const inputDescription = document.querySelector('#description')
    const inputPrice = document.querySelector('#price')
    const categoryId = document.querySelector('#category_id')
    const locationId = document.querySelector('#location_id')
    const inputQuantity = document.querySelector('#quantity')

    @error('quantity')
        inputQuantity.classList.add('is-invalid')
    @enderror

    @error('name')
         inputName.classList.add('is-invalid')
    @enderror

    @error('description')
        inputDescription.classList.add('is-invalid')
    @enderror

    @error('price')
        inputPrice.classList.add('is-invalid')
    @enderror

    @error('category_id')
        categoryId.classList.add('is-invalid')
    @enderror

    @error('location_id')
        locationId.classList.add('is-invalid')
    @enderror
</script>
