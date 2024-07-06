<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lilac-Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
     
        body {
            background-color: #d9dee6;
            padding: 20px; 
        }
    </style>
</head>
<body>

    <div class="container p-5">
        <h2 class="my-4">Search</h2>

        <input type="text" id="searchInput" class="form-control mb-4" placeholder="Search...">

        <div id="card-container" class="row">
            <!-- Cards will be dynamically appended here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchData(searchTerm = '') {
                $.ajax({
                    url: '/staffs', 
                    method: 'GET',
                    data: { search: searchTerm },
                    success: function(response) {
                        $('#card-container').empty();
                        
                        response.forEach(function(item) {
                            var cardHtml = '<div class=" col-lg-6 col-md-6 col-sm-12 g-2">'
                            cardHtml += '<div class="card g-5 p-5">'; 
                            cardHtml += '<h3>' + item.name + '</h3>';
                            cardHtml += '<p> ' + item.designation.name + '</p>';
                            cardHtml += '<p> ' + item.department.name + '</p>';
                            cardHtml += '</div>';
                            $('#card-container').append(cardHtml);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            fetchData();

            $('#searchInput').on('keyup', function() {
                var searchTerm = $(this).val().trim();
                fetchData(searchTerm);
            });
        });
    </script>
</body>
</html>
