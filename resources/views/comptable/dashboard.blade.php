<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comptable</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboread.css') }}">
    <style>
        .section {
            display: none;
        }
        #dashboard {
            display: block;
        }
        .modal-title {
            font-weight: bold;
        }
        .btn {
            margin: 5px;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #FFC312;
        }
    </style>
</head>
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Navigation -->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="#"><img src="{{ asset('images/logo.jpeg') }}" alt="accountant_logo" class="hidden-xs hidden-sm">
                    <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="accountant_logo" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi">
                <ul>
                    <li class="active"><a href="#dashboard" class="menu-link"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                    <li><a href="#journal" class="menu-link"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Journal</span></a></li>
                    <li><a href="#reports" class="menu-link"><i class="fa fa-file-text" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reports</span></a></li>
                    <li><a href="#factures" class="menu-link"><i class="fa fa-file" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Factures</span></a></li>
                    <li><a href="#stock-products" class="menu-link"><i class="fa fa-cubes" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Stock Products</span></a></li>
                    <li><a href="#compte-resultat" class="menu-link"><i class="fa fa-balance-scale" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Compte de Résultat</span></a></li>
                    <li><a href="#settings" class="menu-link"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Settings</span></a></li>
                    <!-- Other menu items -->
                </ul>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-10 col-sm-11 display-table-cell v-align" style="background-color: teal;">
            <div class="row">
                <header style="background-color: teal;">
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <li class="hidden-xs"><a href="" class="add-project" data-toggle="modal" data-target="#crudModal" style="background-color: #FFC312;">Ajouter journal</a></li>
                                <!-- Other header items -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('images/user.jpg') }}" alt="user">
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                @if(Auth::check())
                                                    <span>{{ Auth::user()->name }}</span>
                                                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                                                @else
                                                    <span>Guest</span>
                                                    <p class="text-muted small">guest@example.com</p>
                                                @endif
                                                <div class="divider"></div>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="#" class="logout btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout <i class="fas fa-sign-out-alt"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
            <!-- Main -->
            <main class="main-container">
                <div id="dashboard" class="section">
                    <div class="main-title">
                        <p class="font-weight-bold">DASHBOARD</p>
                    </div>
                    <div class="main-cards">
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">PRODUCTS</p>
                                <i class="fas fa-box-open text-blue" style="font-size: 40px;"></i>
                            </div>
                            <span class="text-primary font-weight-bold">249</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">JOURNALS</p>
                                <i class="fas fa-book-open text-orange" style="font-size: 40px;"></i>
                            </div>
                            <span class="text-primary font-weight-bold">83</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">REPORTS</p>
                                <i class="fas fa-chart-bar text-green" style="font-size: 40px;"></i>
                            </div>
                            <span class="text-primary font-weight-bold">79</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">INVENTORY ALERTS</p>
                                <span class="material-icons-outlined text-red">notification_important</span>
                            </div>
                            <span class="text-primary font-weight-bold">56</span>
                        </div>
                    </div>
                    
                    <div class="charts">
                        <div class="charts-card">
                            <p class="chart-title">Top 5 Products</p>
                            <div id="bar-chart"></div>
                        </div>
                        <div class="charts-card">
                            <p class="chart-title">Seueil de rentabilite</p>
                            <div id="area-chart"></div>
                        </div>
                    </div>
                </div>
                <div id="journal" class="section">
                    <div class="main-title">
                        <p class="font-weight-bold">JOURNAL ENTRIES</p>
                    </div>
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>N° Compte Débit</th>
                                <th>N° Compte Crédit</th>
                                <th>Emplois</th>
                                <th>Date</th>
                                <th>Ressources</th>
                                <th>Montant Débit</th>
                                <th>Montant Crédit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: aliceblue">
                            @foreach($journals as $journal)
                            <tr>
                                <td>{{ $journal->compte_debit }}</td>
                                <td>{{ $journal->compte_credit }}</td>
                                <td>{{ $journal->emplois }}</td>
                                <td>{{ $journal->date }}</td>
                                <td>{{ $journal->ressources }}</td>
                                <td>{{ $journal->montant_debit }}</td>
                                <td>{{ $journal->montant_credit }}</td>
                                <td>
                                    <a href="{{ route('journals.edit', $journal) }}" class="">Edit</a>
                                    <form action="{{ route('journals.destroy', $journal) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="totals">
                        <p>Total Débit: <span id="totalDebit">0</span></p>
                        <p>Total Crédit: <span id="totalCredit">0</span></p>
                    </div>
                </div>
                <!-- Other sections -->
                <style>
                    .btn {
                            margin: 5px;
                            padding: 10px 20px;
                            cursor: pointer;
                            border: none;
                            border-radius: 5px;
                            background-color: #FFC312;
                        }
                 </style>
                                <div id="reports" class="section">
                                    <div class="main-title">
                                        <p class="font-weight-bold">REPORTS</p>
                                        <div class="actions">
                                            <button class="btn btn-add-new"><i class="fas fa-plus"></i> Add New</button>
                                            <button class="btn btn-send"><i class="fas fa-paper-plane"></i> Send</button>
                                        </div>
                                        
                                    </div>
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>type</th>
                                                <th>Montant</th>
                                                <th>Variable/Fixe</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report-entries">
                                           
                                        </tbody>
                                    </table>
                                    <div class="totals">
                                        <p>Total Charge vaiable: <span id="totalDebit">0</span></p>
                                        <p>Total Charge Fixe: <span id="totalCredit">0</span></p>
                                    </div>
                                </div>
                
                                <div id="factures" class="section">
                                    <div class="main-title">
                                        <p class="font-weight-bold">factures</p>
                                    </div>
                                    <div class="actions">
                                        
                                        <button class="btn btn-update-tva"><i class="fas fa-sync"></i> Update TVA</button>
                                       
                                    </div>
                                    
                                    <table class="journaltable">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>N° Facture</th>
                                                <th>Description</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire (Dh)</th>
                                                <th>Montant HT (Dh)</th>
                                                <th>TVA (%)</th>
                                                <th>Montant TTC (Dh)</th>
                
                                            </tr>
                                        </thead>
                                        <tbody id="stock-entries">
                                            <!-- Rows will be added here dynamically -->
                                        </tbody>
                                        </table>
                                            <div class="totals">
                                                <p>Total Charge vaiable avec TVA: <span id="totalDebit">0</span></p>
                                                <p>Total Charge Fixe avec TVA: <span id="totalCredit">0</span></p>
                                            </div>
                                </div>
                                <div id="stock-products" class="section">
                                    <div class="main-title">
                                        <p class="font-weight-bold">STOCK PRODUCTS</p>
                                    </div>
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="stock-entries">
                                            <!-- Rows will be added here dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                <!-- Compte de resultat -->
                <div id="compte-resultat" class="section">
                    <div class="main-title">
                        <p class="font-weight-bold">COMPTE DE RÉSULTAT</p>
                    </div>     
                     <table id="financial-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>Montant</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Chiffres d'affaires hors taxes</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Rabais, remises et ristournes accordés</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="section-header" colspan="3">I. Chiffre d'affaires net hors taxes</td>
                            </tr>
                            <tr>
                                <td>- coût variable de production des produits vendus.</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- coût variable de commercialisation.</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="section-header" colspan="3">II. Marge sur coût variable</td>
                            </tr>
                            <tr>
                                <td class="section-header" colspan="3">III. Charges fixes</td>
                            </tr>
                            <tr>
                                <td>. d'approvisionnement</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>. de production</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>. de commercialisation</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>. d'administration</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="section-header" colspan="3">IV.  Résultat courant (II - III)</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                
                
                </style>
                
                                <!-- Setting -->
                                <div id="settings" class="section">
                                    <div class="main-title">
                                        <p class="font-weight-bold">SETTINGS</p>
                                    </div>
                                    <div class="settings-content">
                                        <div class="setting-option">
                                            <a href="#addProductPage">
                                                <i class="fas fa-plus-circle fa-5x setting-icon"></i>
                                                <p>Add Product</p>
                                            </a>
                                        </div>
                                        <div class="setting-option">
                                            <a href="#updateBilanPage">
                                                <i class="fas fa-chart-line fa-5x setting-icon"></i>
                                                <p>Update Bilan</p>
                                            </a>
                                        </div>
                                        <div class="setting-option">
                                            <a href="#addRapportPage">
                                                <i class="fas fa-exclamation-triangle fa-5x setting-icon"></i>
                                                <p>Signaler un problème</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                
                                
                                <!-- Include FontAwesome -->
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                 <!-- Ajouter un journal -->
                 
            </main>
        </div>
    </div>
</div>
<!-- Modal for CRUD operations -->
<div id="crudModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="crudModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="crudModalLabel">Add/Edit Journal Entry</h4>
            </div>
            <div class="modal-body">
                <form id="journal-form" method="POST" action="{{ route('journals.store') }}">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <div class="form-group">
                        <label for="compte_debit">N° Compte Débit</label>
                        <input type="number" name="compte_debit" class="form-control" id="compte_debit" required>
                    </div>
                    <div class="form-group">
                        <label for="compte_credit">N° Compte Crédit</label>
                        <input type="number" name="compte_credit" class="form-control" id="compte_credit" required>
                    </div>
                    <div class="form-group">
                        <label for="emplois">Emplois</label>
                        <input type="text" name="emplois" class="form-control" id="emplois" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="ressources">Ressources</label>
                        <input type="text" name="ressources" class="form-control" id="ressources" required>
                    </div>
                    <div class="form-group">
                        <label for="montant_debit">Montant Débit</label>
                        <input type="number" name="montant_debit" class="form-control" id="montant_debit" required>
                    </div>
                    <div class="form-group">
                        <label for="montant_credit">Montant Crédit</label>
                        <input type="number" name="montant_credit" class="form-control" id="montant_credit" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.menu-link').click(function() {
            $('.section').hide();
            var target = $(this).attr('href');
            $(target).show();
        });

        // Calculate totals
        var totalDebit = 0;
        var totalCredit = 0;
        $('tbody tr').each(function() {
            var debit = parseFloat($(this).find('td:eq(5)').text());
            var credit = parseFloat($(this).find('td:eq(6)').text());
            if (!isNaN(debit)) totalDebit += debit;
            if (!isNaN(credit)) totalCredit += credit;
        });
        $('#totalDebit').text(totalDebit.toFixed(2));
        $('#totalCredit').text(totalCredit.toFixed(2));

        // Menu link click event
        $('.menu-link').click(function(event) {
            event.preventDefault();
            var section = $(this).attr('href');
            $('.section').hide();
            $(section).show();
            $('.menu-link').parent().removeClass('active');
            $(this).parent().addClass('active');
            var currentSection = section.replace('#', '');
            $('#crudModalLabel').text('Add ' + capitalize(currentSection) + ' Entry');
        });

        // Handle edit button click
        $('.edit-btn').click(function(e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            var data = row.children('td').map(function() {
                return $(this).text();
            }).get();
            var journalId = $(this).data('journal-id');
            $('#journal-form').attr('action', '/journals/' + journalId);
            $('#form-method').val('PUT');
            $('#compte_debit').val(data[0]);
            $('#compte_credit').val(data[1]);
            $('#emplois').val(data[2]);
            $('#date').val(data[3]);
            $('#ressources').val(data[4]);
            $('#montant_debit').val(data[5]);
            $('#montant_credit').val(data[6]);
            $('#crudModal').modal('show');
        });

        // Handle add button click
        $('.add-project').click(function() {
            $('#journal-form').attr('action', '{{ route('journals.store') }}');
            $('#form-method').val('POST');
            $('#journal-form')[0].reset();
        });
    });

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>

</body>
</html>
