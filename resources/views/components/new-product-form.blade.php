@php
    use App\Models\Category;
    use App\Models\Location;

    $categories = Category::all();
    $locations = Location::all();
@endphp

<form action="{{ route('products.store') }}" method="post">
    @csrf
    <label class="d-block mb-3">
        <span class="mb-2 d-block">Nome</span>
        <input id="name" name="name" class="form-control" autocomplete="off"/>
    </label>
    <label class="d-block mb-3">
        <span class="mb-2 d-block">Descrição</span>
        <textarea id="description" name="description" class="form-control" autocomplete="off"></textarea>
    </label>
    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input id="price" name="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
    </div>
    <select id="category_id" name="category_id" class="form-select mb-3" aria-label="Default select example">
        <option selected disabled>Selecione uma categoria</option>
        @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
        @endforeach
    </select>
    <select id="location_id" name="location_id" class="form-select mb-3" aria-label="Default select example">
        <option selected disabled>Selecione um local</option>
        @foreach($locations as $location)
            <option value="{{ $location['id'] }}">{{ $location['title'] }}</option>
        @endforeach
    </select>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</form>

<script>
    const inputName = document.querySelector('#name')
    const inputDescription = document.querySelector('#description')
    const inputPrice = document.querySelector('#price')
    const categoryId = document.querySelector('#category_id')
    const locationId = document.querySelector('#location_id')

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
