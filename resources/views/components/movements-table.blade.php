<table class="table table-hover table-bordered table-responsive">
    <thead>
    <tr class="table-secondary">
        <th scope="col" class="text-center">Id</th>
        <th scope="col" class="text-center">ID do produto</th>
        <th scope="col" class="text-center">Produto</th>
        <th scope="col" class="text-center">Valor do produto</th>
        <th scope="col" class="text-center">Quantidade</th>
        <th scope="col" class="text-center">Total</th>
        <th scope="col" class="text-center">Data</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($movements as $movement)
        <tr class="{{ $movement->status ? 'table-success' : 'table-danger' }}">
            <th class="text-center" scope="row">{{ $movement->id }}</th>
            <th class="text-center">{{ $movement->product->id }}</th>
            <td class="text-center">{{ $movement->product->name }}</td>
            <td class="text-center total">{{ $movement->product->price }}</td>
            <td class="text-center">{{ $movement->quantity }}</td>
            <td class="text-center total">{{ $movement->total }}</td>
            <td class="text-center">
                {{ \Carbon\Carbon::createFromDate($movement->created_at)->timezone('America/Sao_Paulo')->format('d/m/Y H:i') }}
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

    const priceRows = document.querySelectorAll('.total');

    priceRows.forEach(priceRow => {
        priceRow.innerHTML = formatarParaReal(priceRow.innerHTML);
    });
</script>
