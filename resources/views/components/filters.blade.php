@php
    $categories = \App\Models\Category::all();
    $locations = \App\Models\Location::all();
@endphp

<form action="" method="get" class="w-50 d-flex align-items-center gap-3">
    <div class="input-group">
        <input value="{{ request()->query('query') }}" name="query" type="text" class="form-control" placeholder="Pesquisar produto..." aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
    </div>
    <div class="input-group">
        <select name="category" class="form-control">
            <option value="0" {{ request()->query('category') ? '' : 'selected' }}>Todos</option>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ request()->query('category') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="input-group">
        <select name="location" class="form-control">
            <option value="0" {{ request()->query('location') ? '' : 'selected' }}>Todos</option>
            @foreach($locations as $location)
                <option
                    value="{{ $location->id }}"
                    {{ request()->query('location') == $location->id ? 'selected' : '' }}
                >
                    {{ $location->title }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-secondary">
        Filtrar
    </button>
</form>
