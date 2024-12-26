<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center">Tournament</h1>
    <form method="POST" action="{{ route('start.tournament') }}">
        @csrf
        <div id="user-rows">
            <div class="row mb-3">
                <div class="col-md-5">
                    <input type="text" name="users[]" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-5">
                    <input type="email" name="emails[]" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success add-row">Add More</button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Start Tournament</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Handle the add-row button click
        $(document).on('click', '.add-row', function () {
            const newRow = `
                <div class="row mb-3">
                    <div class="col-md-5">
                        <input type="text" name="users[]" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="emails[]" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>
            `;
            $('#user-rows').append(newRow);
        });

        // Handle the remove-row button click
        $(document).on('click', '.remove-row', function () {
            $(this).closest('.row').remove();
        });
    });
</script>
</body>
</html>
