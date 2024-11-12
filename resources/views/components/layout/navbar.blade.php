<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Estoque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.reports') }}">Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.movements') }}">Movimentações</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const url = window.location.href;

    navLinks.forEach(link => {
        if (link.href === url) {
            link.classList.add('active');
        }
    });
</script>

