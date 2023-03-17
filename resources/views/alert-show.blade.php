@if(session('success'))
    <!-- show alert -->
    <script>
        window.onload = function() {
            showAlert("{{session('success')}}");
        }
    </script>
@endif

@if(session('errors'))
    <!-- show alert -->
    <script>
        window.onload = function() {
            showAlert('{{ implode('', $errors->all(':message'))  }}', '', false, 5000, 'error', 'center');
        }
    </script>
@endif