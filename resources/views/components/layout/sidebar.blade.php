@php
    use Illuminate\Support\Facades\Request;

    $options = [
        [
            'title' => 'Produtos',
            'icon' => "product.svg",
            'route' => "/"
        ],
        [
            'title' => 'Relatórios',
            'icon' => "file.svg",
            'route' => "/relatorios"
        ]
    ]
@endphp
<li>
    <ul role="list" class="-mx-2 space-y-1">
        @foreach($options as $option)
            <li>
                <a
                    href="{{ $option['route'] }}"
                    class="group flex items-center gap-x-3 p-2 rounded-md {{ Request::getRequestUri() === $option['route'] ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} text-sm/6 font-semibold"
                >
                    <img src="{{ asset("img/".$option['icon']) }}" alt="file">
                    {{ $option['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
