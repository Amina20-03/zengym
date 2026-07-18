@extends('layouts.app')
<style>
    .et_pb_contact_form_label {
        display: block;
        color: black;
        font-weight: bold;
        letter-spacing: 1.2px;
        font-size: 18px;
        padding-bottom: 5px;
    }
    input[id="et_pb_contact_brand_file_request_0"] {
        display: none;
    }
    label[for="et_pb_contact_brand_file_request_0"] {

        height: 145px;

        position: absolute;
        background-size: 7%;
        color: transparent;
        margin: auto;
        width: 100%;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        box-sizing: border-box;
    }
    label[for="et_pb_contact_brand_file_request_0"]:before {
        content: "Drag and Drop a file here";
        display: block;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #202020;
        font-weight: 400;
        left:0;
        right:0;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    label[for="et_pb_contact_brand_file_request_0"]:after {
        display: block;
        content: 'Browse';
        background: #16a317;
        width: 86px;
        height: 27px;
        line-height: 27px;
        position: absolute;
        bottom: 19px;
        font-size: 14px;
        color: white;
        font-weight: 500;
        left:0;
        right:0;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    label[for="et_pb_contact_brand_request_0"]:after {
        content: " (Provide link or Upload files if you already have guidelines)";
        font-size: 12px;
        letter-spacing: -0.31px;
        color: #7a7a7a;
        font-weight: normal;
    }
    label[for="et_pb_contact_design_request_0"]:after {
        content: " (Provide link or Upload design files)";
        font-size: 12px;
        letter-spacing: -0.31px;
        color: #7a7a7a;
        font-weight: normal;
    }
    label[for="et_pb_contact_brand_file_request_0"].changed, label[for="et_pb_contact_brand_file_request_0"]:hover {
        background-color: #e3f2fd;
    }
    label[for="et_pb_contact_brand_file_request_0"] {
        cursor: pointer;
        transition: 400ms ease;
    }
    .file_names {
        display: block;
        position: absolute;
        color: black;
        left: 0;
        bottom: -30px;
        font-size: 13px;
        font-weight: 300;
    }
    .file_names {
        text-align: center;
    }
</style>
@section('content')
    @include('instructeur.formation.demande.ajouter.video_basic_one.video_basic_one')
@endsection
@section('datatable')
    <script>
        $(document).ready(function() {
            $('input[type="file"]').on('click', function() {
                $(".file_names").html("");
            })
            if ($('input[type="file"]')[0]) {
                var fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
                fileInput.ondragover = function() {
                    this.className = "et_pb_contact_form_label changed";
                    return false;
                }
                fileInput.ondragleave = function() {
                    this.className = "et_pb_contact_form_label";
                    return false;
                }
                fileInput.ondrop = function(e) {
                    e.preventDefault();
                    var fileNames = e.dataTransfer.files;
                    for (var x = 0; x < fileNames.length; x++) {
                        console.log(fileNames[x].name);
                        $=jQuery.noConflict();
                        $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames[x].name +"</div>");
                    }
                }
                $('#et_pb_contact_brand_file_request_0').change(function() {
                    var fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
                    $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
                    $('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
                });
            }
        });


    </script>
@endsection
