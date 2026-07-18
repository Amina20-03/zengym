@extends('layouts.app')

@section('content')
    @include('admin.parametrage.categorie_representant.modifier.modifier')
@endsection
@section('datatable')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("editUserForm");
            var submitButton = document.getElementById("submitButton");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                myFunction();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
            function myFunction() {
                $('#editUserForm').submit();
                setTimeout(function () {
                    console.log("Function completed");
                }, 2000);
            }
        });
    </script>

@endsection
