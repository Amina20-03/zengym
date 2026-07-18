@extends('layouts.app')

@section('content')
    @include('admin.utilisateur.instructeur.modifier.modifier')
@endsection
@section('datatable')
    <script>
        function edituserform_funct(){
            var form = document.getElementById("editUserForm");
            var submitButton = document.getElementById("submitButton");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                edituserform_submit();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
        }
        function edituserform_submit() {
            if($('#pays_id').val()=='null'){
                alert('{{ __('content.veuillez_selectionner_un_pays') }}')
            }
            else if($('#categ_instructeur_id').val()=='null'){
                alert('{{ __('content.veuillez_selectionner_un_cat') }}')
            }
            else{

                $('#formaddmois2').submit();
            }
            setTimeout(function () {
                console.log("Function completed");
            }, 2000);
        }

        function editPasswordForm_funct(){
            var form = document.getElementById("editPasswordForm");
            var submitButton = document.getElementById("submitButton2");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                editPasswordForm_submit();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
        }
        function editPasswordForm_submit() {
            $('#editPasswordForm').submit();
            setTimeout(function () {
                console.log("Function completed");
            }, 2000);
        }



    </script>

@endsection

