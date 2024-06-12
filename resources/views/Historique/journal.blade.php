<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journales Historique</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        body {
            color: teal;
        }
        .btn {
            background-color: #FFC312;
            border-color: teal;
            color: #000;
        }
        .filter-container {
            margin-bottom: 20px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2 class="center">Journales Historique</h2>
        <div class="filter-container">
            <div class="row">
                <div class="col-md-4">
                    <label for="filter-month">Month:</label>
                    <select id="filter-month" class="form-control">
                        <option value="">Select Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filter-year">Year:</label>
                    <select id="filter-year" class="form-control">
                        <option value="">Select Year</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <!-- Add more years as needed -->
                    </select>
                </div>
                <div class="col-md-4">
                    <button id="filter-btn" class="btn btn-primary" style="margin-top: 25px;">Filter</button>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <button class="btn btn-primary" onclick="showCrudModal('add')">Add Entry</button>
            <thead>
                <tr>
                    <th>N° Compte Débit</th>
                    <th>N° Compte Crédit</th>
                    <th>Emplois</th>
                    <th>Date</th>
                    <th>Ressources</th>
                    <th>Montant Crédit</th>
                    <th>Montant Débit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="journales-tbody">
                <!-- Journal entries will be dynamically added here -->
                <tr>
                    <td>600</td>
                    <td>400</td>
                    <td>Montant</td>
                    <td>05/10</td>
                    <td>Fournisseur</td>
                    <td>1000000</td>
                    <td>1000 000</td>
                    <td>
                        <button class="btn btn-info" onclick="showCrudModal('view')">View</button>
                        <button class="btn btn-warning" onclick="showCrudModal('edit')">Edit</button>
                        <button class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        
                    </td>
                </tr>
              
            </tbody>
        </table>
    </div>

    <!-- Modal for CRUD operations -->
    <div id="crudModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="crudModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="crudModalLabel">Journal Entry</h4>
                </div>
                <div class="modal-body">
                    <form id="journal-form">
                        <input type="hidden" id="journal-id">
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
                            <label for="montant_credit">Montant Crédit</label>
                            <input type="number" name="montant_credit" class="form-control" id="montant_credit" required>
                        </div>
                        <div class="form-group">
                            <label for="montant_debit">Montant Débit</label>
                            <input type="number" name="montant_debit" class="form-control" id="montant_debit" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- Modal for Delete Confirmation -->
<div id="deleteConfirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Deletion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this entry?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteJournalEntry()">Delete</button>
            </div>
        </div>
    </div>
</div>


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function showCrudModal(action, entryId = null) {
            if (action === 'add') {
                $('#journal-form')[0].reset();
                $('#journal-id').val('');
                $('#crudModalLabel').text('Add Journal Entry');
                $('#submitBtn').text('Add');
            } else if (action === 'edit') {
                var entryData = fetchDataForEntry(entryId); // Function to fetch data
                $('#journal-id').val(entryData.id);
                $('#compte_debit').val(entryData.compte_debit);
                // Populate other form fields with entryData
                $('#crudModalLabel').text('Edit Journal Entry');
                $('#submitBtn').text('Update');
            } else if (action === 'view') {
                var entryData = fetchDataForEntry(entryId); // Function to fetch data
                $('#journal-id').val(entryData.id);
                $('#compte_debit').val(entryData.compte_debit);
                // Populate other form fields with entryData
                $('#crudModalLabel').text('view Journal Entry');
                $('#submitBtn').text('Journal');
            }

            $('#crudModal').modal('show');
        }

        
    function confirmDelete() {
        $('#deleteConfirmationModal').modal('show');
    }

    function deleteJournalEntry() {
        var btn = $('#deleteConfirmationModal').data('btn');
        $(btn).closest('tr').remove();
        $('#deleteConfirmationModal').modal('hide');
    }





        // Example function to fetch data for an entry
        function fetchDataForEntry(entryId) {
          
            return {
                id: entryId,
                compte_debit: 12345, // Example data
                // Include other data fields
            };
        }
    </script>
</body>
</html>
