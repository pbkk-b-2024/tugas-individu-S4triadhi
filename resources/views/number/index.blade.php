<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Number</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Input Number for {{ ucfirst($operation) }}</h1>
    <form id="numberForm" method="POST">
        @csrf
        <label for="n">Enter a number:</label>
        <input type="number" name="n" id="n" required>
        <button type="submit" id="submitBtn">Calculate</button>
    </form>

    <div id="result">
        <!-- Hasil akan ditampilkan di sini -->
    </div>

    <script>
        $(document).ready(function() {
            $('#numberForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form agar tidak melakukan submit tradisional

                let operation = "{{ $operation }}";
                let n = $('#n').val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ route("number.calculate") }}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        n: n,
                        operation: operation
                    },
                    success: function(response) {
                        $('#result').html(response); // Menampilkan hasil di div #result
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
