


    <div class="container">
        <h1>Admin Fournisseur</h1>
        <p>Welcome to the admin dashboard.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf <!-- CSRF Protection -->
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

