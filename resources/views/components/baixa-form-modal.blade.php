<a type="button" class="link link-danger" data-bs-toggle="modal" data-bs-target="#{{ $product->id }}">
    Baixa
</a>

<!-- Modal -->
<div class="modal fade" id="{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('dashboard.baixa', $product->id) }}" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dar baixa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            {{ $product->name }}
                        </h5>
                        <p class="card-text">
                            Quantidade do produto: <span>{{ $product->quantity }}</span>
                        </p>
                        <div>
                            <div class="input-group mb-3">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    id="remover-{{ $product->id }}"
                                >
                                    Remover
                                </button>
                                <input
                                    id="quantidade-{{ $product->id }}"
                                    name="quantidade"
                                    type="text"
                                    class="form-control text-center"
                                    placeholder="Quantidade"
                                    aria-label="quantidade"
                                    aria-describedby="adicionar-{{ $product->id }}"
                                    value="0"
                                >
                                <button
                                    class="btn btn-danger"
                                    type="button"
                                    id="adicionar-{{ $product->id }}"
                                >
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.querySelector('#adicionar-{{ $product->id }}');
        const removeButton = document.querySelector('#remover-{{ $product->id }}');
        const inputQuantidade = document.querySelector('#quantidade-{{ $product->id }}');

        addButton.addEventListener('click', function() {
            let currentValue = parseInt(inputQuantidade.value) || 0;

            if ({{ $product->quantity }} > currentValue) {
                inputQuantidade.value = currentValue + 1;
            }
        });

        removeButton.addEventListener('click', function() {
            let currentValue = parseInt(inputQuantidade.value) || 0;
            if (currentValue > 0) {
                inputQuantidade.value = currentValue - 1;
            }
        });
    });
</script>
