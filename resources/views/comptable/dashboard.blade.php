

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comptable</title>
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
    </style>
</head>
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="#"><img src="../logo.jpeg" alt="accountant_logo" class="hidden-xs hidden-sm">
                    <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="accountant_logo" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi">
                <ul>
                    <li class="active"><a href="#dashboard" class="menu-link"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                    <li><a href="#journal" class="menu-link"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Journal</span></a></li>
                    <li><a href="#reports" class="menu-link"><i class="fa fa-file-text" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reports</span></a></li>
                    <li><a href="#stock-products" class="menu-link"><i class="fa fa-cubes" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Stock Products</span></a></li>
                    <li><a href="#compte-resultat" class="menu-link"><i class="fa fa-balance-scale" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Compte de Résultat</span></a></li>
                    <li><a href="#settings" class="menu-link"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Settings</span></a></li>
                </ul>
            </div>
        </div>
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
                                <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#crudModal" style="background-color: #FFC312;">Add Entry</a></li>
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li>
                                    <a href="#" class="icon-info">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                        <span class="label label-primary">3</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://jskrishna.com/work/merkury/images/user-pic.jpg" alt="user">
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <span>Accountant Name</span>
                                                <p class="text-muted small">email@example.com</p>
                                                <div class="divider"></div>
                                               
                                                <a href="{{ route('logout') }}" class="logout btn-sm">Logout <i class="fas fa-sign-out-alt"></i></a>

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
                        <tbody id="tableBody">
                            <!-- Rows will be added here dynamically -->
                        </tbody>
                    </table>
                    <div class="totals">
                        <p>Total Débit: <span id="totalDebit">0</span></p>
                        <p>Total Crédit: <span id="totalCredit">0</span></p>
                    </div>
                </div>

                <div id="reports" class="section">
                    <div class="main-title">
                        <p class="font-weight-bold">REPORTS</p>
                    </div>
                    <table class="tablerepport">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Montant</th>
                                <th>Charge</th>
                                <th>Montant</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="report-entries">
                            <!-- Rows will be added here dynamically -->
                        </tbody>
                    </table>
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
                
<!-- Modal -->
<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="crudModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="crudModalLabel">Add Entry</h4>
            </div>
            <div class="modal-body">
                <form id="crudForm">
                    <div class="form-group">
                        <label for="debitAccount">N° Compte Débit</label>
                        <input type="text" class="form-control" id="debitAccount" required>
                    </div>
                    <div class="form-group">
                        <label for="creditAccount">N° Compte Crédit</label>
                        <input type="text" class="form-control" id="creditAccount" required>
                    </div>
                    <div class="form-group">
                        <label for="emplois">Emplois</label>
                        <input type="text" class="form-control" id="emplois" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="ressources">Ressources</label>
                        <input type="text" class="form-control" id="ressources" required>
                    </div>
                    <div class="form-group">
                        <label for="debitAmount">Montant Débit</label>
                        <input type="number" class="form-control" id="debitAmount" required>
                    </div>
                    <div class="form-group">
                        <label for="creditAmount">Montant Crédit</label>
                        <input type="number" class="form-control" id="creditAmount" required>
                    </div>
                    <input type="hidden" id="entryId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEntryButton">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    let currentSection = '';

    $(document).ready(function () {
        $('.menu-link').click(function (event) {
            event.preventDefault();
            var section = $(this).attr('href');
            $('.section').hide();
            $(section).show();
            $('.menu-link').parent().removeClass('active');
            $(this).parent().addClass('active');
            currentSection = section.replace('#', '');
            $('#crudModalLabel').text(`Add ${capitalize(currentSection)} Entry`);
        });

        $('#saveEntryButton').click(function () {
            saveEntry();
        });
    });

    function saveEntry() {
        const entry = {
            debitAccount: $('#debitAccount').val(),
            creditAccount: $('#creditAccount').val(),
            emplois: $('#emplois').val(),
            date: $('#date').val(),
            ressources: $('#ressources').val(),
            debitAmount: $('#debitAmount').val(),
            creditAmount: $('#creditAmount').val(),
            id: $('#entryId').val()
        };
        const sectionBody = `#${currentSection}-entries`;

        if (entry.id) {
            $(`#${currentSection}-entries tr[data-id="${entry.id}"]`).replaceWith(generateRow(entry));
        } else {
            entry.id = Date.now();
            $(sectionBody).append(generateRow(entry));
        }

        $('#crudModal').modal('hide');
        resetForm();
    }

    function editEntry(section, id) {
        const row = $(`#${section}-entries tr[data-id="${id}"]`);
        $('#debitAccount').val(row.find('td').eq(0).text());
        $('#creditAccount').val(row.find('td').eq(1).text());
        $('#emplois').val(row.find('td').eq(2).text());
        $('#date').val(row.find('td').eq(3).text());
        $('#ressources').val(row.find('td').eq(4).text());
        $('#debitAmount').val(row.find('td').eq(5).text());
        $('#creditAmount').val(row.find('td').eq(6).text());
        $('#entryId').val(id);

        $('#crudModal').modal('show');
        $('#crudModalLabel').text(`Edit ${capitalize(section)} Entry`);
    }

    function deleteEntry(section, id) {
        $(`#${section}-entries tr[data-id="${id}"]`).remove();
    }

    function generateRow(entry) {
        return `<tr data-id="${entry.id}">
            <td>${entry.debitAccount}</td>
            <td>${entry.creditAccount}</td>
            <td>${entry.emplois}</td>
            <td>${entry.date}</td>
            <td>${entry.ressources}</td>
            <td>${entry.debitAmount}</td>
            <td>${entry.creditAmount}</td>
            <td>
                <button class="btn btn-primary" onclick="editEntry('${currentSection}', ${entry.id})">Edit</button>
                <button class="btn btn-danger" onclick="deleteEntry('${currentSection}', ${entry.id})">Delete</button>
            </td>
        </tr>`;
    }

    function resetForm() {
        $('#crudForm')[0].reset();
        $('#entryId').val('');
    }

    function saveSettings() {
        const role = $('#role').val();
        alert(`Settings saved! Role: ${role}`);
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>
</body>
</html>
