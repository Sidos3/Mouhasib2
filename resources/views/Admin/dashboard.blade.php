<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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
        .main-container {
            padding: 20px;
        }
        .main-title p {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .main-cards, .charts, .user-management, .role-management, .system-settings, .fournisseur-section {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="#"><img src="{{ asset('images/logo.jpeg') }}" alt="admin_logo" class="hidden-xs hidden-sm">
                    <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="admin_logo" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi">
                <ul>
                    <li class="active"><a href="#dashboard" class="menu-link"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                    <li><a href="#reports" class="menu-link"><i class="fa fa-file-alt" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reports</span></a></li>
                    <li><a href="#fournisseur" class="menu-link"><i class="fa fa-comments" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Fournisseur Room</span></a></li>
                    <li><a href="#produits" class="menu-link"><i class="fa fa-cube" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Products</span></a></li>
                    <li><a href="#system-settings" class="menu-link"><i class="fa fa-cogs" aria-hidden="true"></i><span class="hidden-xs hidden-sm">System Settings</span></a></li>
                    <li><a href="#admin-list" class="menu-link"><i class="fa fa-users" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Comptbles</span></a></li>
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
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li>
                                    <a href="#" class="icon-info">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                        <span class="label label-primary">3</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('images/Admin.png') }}" alt="user">
                                        <b class="caret"></b></a>
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
                                <p class="text-primary">TOTAL RAPPORTS</p>
                                <span class="material-icons-outlined text-blue">description</span>
                            </div>
                            <span class="text-primary font-weight-bold">1200</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">TAUX D'AVANCEMENT</p>
                                <span class="material-icons-outlined text-orange">hourglass_top</span>
                            </div>
                            <span class="text-primary font-weight-bold">45</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">RAPPORTS DÉJÀ LUS</p>
                                <span class="material-icons-outlined text-green">done_all</span>
                            </div>
                            <span class="text-primary font-weight-bold">30</span>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <p class="text-primary">SYSTEM ALERTS</p>
                                <span class="material-icons-outlined text-red">notification_important</span>
                            </div>
                            <span class="text-primary font-weight-bold">8</span>
                        </div>
                    </div>
                </div>

                <!-- Admin List Section -->
                <div id="admin-list" class="section">
                    <div class="main-title">
                        <p class="font-weight-bold">ADMIN LIST</p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="admin-entries">
                            <!-- Rows will be added here dynamically -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Reports Section -->
                <div id="reports" class="section">
                    <h2>Reports</h2>
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Comptable Name</th>
                                <th>Total Charge</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January 1, 2024</td>
                                <td>10:00 AM</td>
                                <td>Jane Smith</td>
                                <td>$5000</td>
                                <td>
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="validate-btn"><i class="fas fa-check"></i> Valider</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Fournisseur Section -->
                <div id="fournisseur" class="section">
                    <h2>Fournisseur Room</h2>
                    <!-- Input fields for message content, product name, quantity, and price -->
                    <div id="messageForm">
                        <div class="inputWithIcon">
                            <i class="fas fa-shopping-cart"></i>
                            <select id="productNameSelect">
                                <option value="">Select Product</option>
                                <option value="product1">Product 1</option>
                                <option value="product2">Product 2</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="inputWithIcon">
                            <i class="fas fa-boxes"></i>
                            <input type="number" id="quantityInput" placeholder="Quantity">
                        </div>
                        <div class="inputWithIcon">
                            <i class="fas fa-comment"></i>
                            <input type="text" id="messageInput" placeholder="Type your message here...">
                        </div>
                        <button id="sendMessageButton"><i class="fas fa-paper-plane"></i> Send Message</button>
                    </div>
                </div>
                
                <!-- Products Section -->
                <div id="produits" class="section">
                    <h2>Products</h2>
                    <!-- Products Section Content Here -->
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
                
                <!-- System Settings Section -->
                <div id="system-settings" class="section">
                    <h2>System Settings</h2>
                    <div class="settings-content">
                        <div class="setting-option">
                            <a href="#" data-toggle="modal" data-target="#addProductModal">
                                <i class="fas fa-plus-circle fa-5x setting-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </div>
                        <div class="setting-option">
                            <a href="#" data-toggle="modal" data-target="#addComptableModal">
                                <i class="fas fa-user-plus fa-5x setting-icon"></i>
                                <p>Add New Comptable</p>
                            </a>
                        </div>
                        
                        <div class="setting-option">
                            <a href="#" data-toggle="modal" data-target="#reportProblemModal">
                                <i class="fas fa-exclamation-triangle fa-5x setting-icon"></i>
                                <p>Signaler un problème</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<!-- Add Comptable Modal -->
<div class="modal fade" id="addComptableModal" tabindex="-1" role="dialog" aria-labelledby="addComptableModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addComptableModalLabel">Add New Comptable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addComptableForm">
                    <div class="form-group">
                        <label for="comptableName">Name</label>
                        <input type="text" class="form-control" id="comptableName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="comptableEmail">Email</label>
                        <input type="email" class="form-control" id="comptableEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="comptablePhone">Phone</label>
                        <input type="text" class="form-control" id="comptablePhone" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="comptableEmail">Password</label>
                        <input type="password" class="form-control" id="comptableEmail" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="comptableEmail">ConfirmPassword</label>
                        <input type="Password" class="form-control" id="comptableEmail" placeholder="Enter ConfirmPassword">
                    </div>
                    <!-- Add other fields as needed -->
                    <button type="submit" class="btn ">Add Comptable</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" class="form-control" id="productPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="productStock">Stock</label>
                        <input type="number" class="form-control" id="productStock" placeholder="Enter stock quantity">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" placeholder="Enter product description"></textarea>
                    </div>
                    <button type="submit" class="btn">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Report Problem Modal -->
<div class="modal fade" id="reportProblemModal" tabindex="-1" role="dialog" aria-labelledby="reportProblemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportProblemModalLabel">Report a Problem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reportProblemForm">
                    <div class="form-group">
                        <label for="problemDescription">Description</label>
                        <textarea class="form-control" id="problemDescription" placeholder="Describe the problem"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="problemPriority">Priority</label>
                        <select class="form-control" id="problemPriority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Send Report</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn{
    background-color: teal;
    border-color: teal;
    color: white;
}

   
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".menu-link").click(function(){
        var sectionId = $(this).attr("href");
        $(".section").hide();
        $(sectionId).show();
    });

    

   
});
</script>
</body>
</html>
