<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $location->title }}</h5>
        <ul class="list-group">
            @foreach($location->products as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $product->name }}
                    <span class="badge text-bg-primary rounded-pill">{{ $product->quantity }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
