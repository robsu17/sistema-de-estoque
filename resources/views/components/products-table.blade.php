<table class="table table-hover table-bordered table-responsive">
    <thead>
        <tr class="table-secondary">
            <th scope="col" class="text-center">Id</th>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">Preço</th>
            <th scope="col" class="text-center">Quantidade</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Localização</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($products as $product)
            <tr>
                <th class="text-center" scope="row">{{ $product->id }}</th>
                <td class="text-center">
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </td>
                <td class="price text-center">{{ $product->price }}</td>
                <td class="text-center">{{ $product->quantity }}</td>
                <td class="text-center">{{ $product->category->title }}</td>
                <td class="text-center">{{ $product->location->title }}</td>
                <td class="text-center">
                    <x-baixa-form-modal :product="$product" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function formatarParaReal(valor) {
        return new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(valor);
    }

    const priceRows = document.querySelectorAll('.price');

    priceRows.forEach(priceRow => {
        priceRow.innerHTML = formatarParaReal(priceRow.innerHTML);
    });
</script>
