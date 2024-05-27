


    <div class="container">
        <h1>Comptable Page</h1>
        <p>Welcome to the Comptable dashboard.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf <!-- CSRF Protection -->
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>