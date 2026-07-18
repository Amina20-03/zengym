@extends('layouts.app')
<style>


    .card-like {
        margin-top: 50px;
        margin-bottom: 50px;
        color: white;
    // background: rgba(0,0,0,0.8);
        border-radius: 6px;
        padding: 50px;
    //box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }
    .btn {
        background: #922ead;
        color: #fff!important;
    }
    .btn-irv {
        width: 100%;
        background: #922ead;
        color: #fff!important;
        font-weight: bold;
        padding: 10px 0;
        transition: all 0.3s;
        &:hover {
            background: #02738d;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
    }

    .btn-irv-default {
        font-weight: bold;
        background: #922ead;
        color: #fff!important;

        &:hover {
            background: #aaa;
        }
    }

    .wizard {
        overflow: hidden;
        .wizard-header {
            margin-bottom: 30px;
            h1 {
                margin-top: 0;
                margin-bottom: 20px;
                small {
                    color: #bbb;
                }
            }
            hr {
                border-color: #922ead;
                border-top-width: 2px;
                margin-top: -50px;
            }
            .steps {
                height: 15px;
                .wizard-step {
                    background: #922ead;
                    width: 15px;
                    height: 15px;
                    display: inline-block;
                    margin: 0 10px;
                    opacity: 0.2;
                    border-radius: 50%;
                    transition: all 0.8s;
                    &.active {
                        opacity: 1;
                    }
                }
            }
        }
        .wizard-body {
            height: auto !important; /* Ensure the wizard body adjusts dynamically */
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
            transition: all 0.3s cubic-bezier(0.68, -0.30, 0.37, 0.6);
            .step {
                transition: all 0.3s ease-in-out;
                position: absolute;
                width: 100%;
                top: 0;
                right: -100%;
                opacity: 0;
                &.initial {
                    position: relative;
                }
                &.off {
                    opacity: 0!important;
                    right: 100%!important;
                }
                &.active {
                    right: 0;
                    margin-left: 0;
                    margin-top: 0;
                    opacity: 1;
                    transition: all 0.4s linear;
                    transition-delay: 0.1s;
                }
            }
        }
        .wizard-footer {
            margin-top: 30px;
        }
    }
</style>
<style>
    /* Your existing CSS styles */
    :root {
        --clouds: #ecf0f1;
        --silver: #bdc3c7;
        --concrete: #95a5a6;
        --asbestos: #7f8c8d;

        --wetAsphalt: #34495e;
        --midnightBlue: #2c3e50;

        --alizarin: #e74c3c;
        --pomegranate: #c0392b;

        --emerald: #2ecc71;
        --nephritis: #27ae60;
    }

    * {
        font-family: sans-serif;
    }

    ::-webkit-scrollbar {
        width: .5rem;
    }

    ::-webkit-scrollbar-track {
        background: var(--silver);
        border-radius: .75rem;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--wetAsphalt);
        border-radius: .75rem;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--midnightBlue);
    }

    .container {
        max-width: 920px;
        margin: auto;
        padding: 1.25rem;
        border-radius: 10px;
        background: var(--clouds);
    }

    .file-form {
        position: relative;
        padding: 2.5rem;
        border: 2px dashed var(--silver);
    }

    .file-form:hover {
        border-color: var(--asbestos);
    }

    .file-form.highlight {
        border-color: var(--asbestos);
    }

    .drop-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        cursor: pointer;
        text-align: center;
        padding-top: 2rem;
        font-weight: bold;
        color: var(--wetAsphalt);
    }

    #fileInput, #videoInput, #docInput, #audioInput {
        display: none;
    }

    #uploadedImage, #uploadedVideo, #uploadedDoc, #uploadedAudio {
        margin-top: 1.25rem;
        max-height: 750px;
        overflow-y: auto;
        overflow-x: hidden;
        display: flex;
        flex-wrap: wrap;
    }

    .d-none {
        display: none !important;
    }

    #actionContainer {
        display: flex;
        justify-content: space-between;
        margin: 1.25rem 1rem;
    }

    #actionContainer input {
        padding: .75rem;
        border: none;
        margin-right: .5rem;
        color: var(--midnightBlue);
        border-radius: .5rem;
    }

    #actionContainer input:focus {
        outline: none !important;
        box-shadow: 0 1px 5px var(--wetAsphalt);
    }

    #actionContainer button {
        border: none;
        border-radius: .5rem;
        font-size: 12px;
        cursor: pointer;
        color: var(--clouds);
        padding: .75rem;
    }

    #executeBtn {
        background-color: var(--wetAsphalt);
    }

    #executeBtn:hover {
        background-color: var(--midnightBlue);
    }

    #executeBtn:active {
        background-color: var(--midnightBlue);
        transform: scale(1.1);
    }

    #clearAllBtn {
        color: var(--clouds);
        background-color: var(--alizarin);
    }

    #clearAllBtn:active {
        background-color: var(--pomegranate);
        transform: scale(1.1);
    }

    #clearAllBtn:hover {
        background-color: var(--pomegranate);
    }

    .image-content, .video-content, .doc-content, .audio-content {
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        border: 1px dashed var(--silver);
        border-radius: .25rem;
        margin: .70rem;
        padding: .25rem;
    }

    .image-wrapper, .video-wrapper, .doc-wrapper, .audio-wrapper {
        position: relative;
    }

    .image-wrapper img {
        transition: 1s;
        width: 150px;
    }
    .video-wrapper video {
        transition: 1s;
        width: 300px;
    }
    .doc-wrapper doc {
        transition: 1s;
        width: 300px;
    }
    .audio-wrapper audio {
        transition: 1s;
        width: 300px;
    }
    .image-wrapper:hover img, .video-wrapper:hover video, .doc-wrapper:hover doc, .audio-wrapper:hover audio {
        filter: blur(2px);
    }

    .image-wrapper span, .video-wrapper span, .doc-wrapper span, .audio-wrapper span {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
        font-size: 1.5rem;
        background: #454545;
        padding: 1rem;
        border-radius: 50%;
        line-height: 1rem;
    }

    .image-wrapper:hover span, .video-wrapper:hover span, .doc-wrapper:hover span, .audio-wrapper:hover span {
        display: block;
    }

    .download-button {
        background-color: var(--emerald);
        padding: .75rem;
        font-size: 0.75rem;
        text-decoration: none;
        border-radius: .5rem;
        animation: 1s;
        color: var(--clouds);
        margin-bottom: 0.5rem;
        margin-top: 0.5rem;
    }

    .download-button:hover {
        background-color: var(--nephritis);
        color: var(--clouds);
    }

    .download-button:active {
        transform: scale(1.1);
    }

    .title {
        text-align: center;
        margin-top: 4rem;
        color: var(--wetAsphalt);
    }

    @media only screen and (max-width: 620px) {
        #actionContainer .execute-section {
            width: 50%;
        }

        #actionContainer input, #actionContainer button {
            margin: .25rem;
        }

        #uploadedImage, #uploadedVideo, #uploadedDoc, #uploadedAudio {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Adjust the gap between images as needed */
            min-height: 100px; /* Set a minimum height */
            max-height: 100%; /* Allow it to grow as needed */
            overflow-y: auto; /* Add a scrollbar if the content overflows */
        }
    }
</style>

@section('content')
    @include('instructeur.formation.demande.ajouter.ajouter')
@endsection
@section('datatable')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("editUserForm");
            var submitButton = document.getElementById("wizard-subm");

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
    <script>
        // Checking button status ( wether or not next/previous and
        // submit should be displayed )
        const checkButtons = (activeStep, stepsCount) => {
            const prevBtn = $("#wizard-prev");
            const nextBtn = $("#wizard-next");
            const submBtn = $("#wizard-subm");

            switch (activeStep / stepsCount) {
                case 0: // First Step
                    prevBtn.hide();
                    submBtn.hide();
                    nextBtn.show();
                    break;
                case 1: // Last Step
                    nextBtn.hide();
                    prevBtn.show();
                    submBtn.show();
                    break;
                default:
                    submBtn.hide();
                    prevBtn.show();
                    nextBtn.show();
            }
        };

        // Scrolling the form to the middle of the screen if the form
        // is taller than the viewHeight
        const scrollWindow = (activeStepHeight, viewHeight) => {
            if (viewHeight < activeStepHeight) {
                $(window).scrollTop($(steps[activeStep]).offset().top - viewHeight / 2);
            }
        };

        // Setting the wizard body height, this is needed because
        // the steps inside of the body have position: absolute
        const setWizardHeight = activeStepHeight => {
            $(".wizard-body").height(activeStepHeight);
        };

        $(function() {
            // Form step counter (little cirecles at the top of the form)
            const wizardSteps = $(".wizard-header .wizard-step");
            // Form steps (actual steps)
            const steps = $(".wizard-body .step");
            // Number of steps (counting from 0)
            const stepsCount = steps.length - 1;
            // Screen Height
            const viewHeight = $(window).height();
            // Current step being shown (counting from 0)
            let activeStep = 0;
            // Height of the current step
            let activeStepHeight = $(steps[activeStep]).height();

            checkButtons(activeStep, stepsCount);
            setWizardHeight(activeStepHeight);

            // Resizing wizard body when the viewport changes
            $(window).resize(function() {
                setWizardHeight($(steps[activeStep]).height());
            });

            // Previous button handler
            $("#wizard-prev").click(() => {
                // Sliding out current step
                $(steps[activeStep]).removeClass("active");
                $(wizardSteps[activeStep]).removeClass("active");

                activeStep--;

                // Sliding in previous Step
                $(steps[activeStep]).removeClass("off").addClass("active");
                $(wizardSteps[activeStep]).addClass("active");

                activeStepHeight = $(steps[activeStep]).height();
                setWizardHeight(activeStepHeight);
                checkButtons(activeStep, stepsCount);
            });

            // Next button handler
            $("#wizard-next").click(() => {
                // Sliding out current step
                $(steps[activeStep]).removeClass("inital").addClass("off").removeClass("active");
                $(wizardSteps[activeStep]).removeClass("active");

                // Next step
                activeStep++;

                // Sliding in next step
                $(steps[activeStep]).addClass("active");
                $(wizardSteps[activeStep]).addClass("active");

                activeStepHeight = $(steps[activeStep]).height();
                setWizardHeight(activeStepHeight);
                checkButtons(activeStep, stepsCount);
            });
        });

    </script>
    <script>
        const app = {
            selector: {
                dropArea: document.getElementById("dropSection"),
                actionContainer: document.getElementById("actionContainer"),
                uploadedImages: document.getElementById("uploadedImage"),
                uploadedVideos: document.getElementById("uploadedVideo"),
                uploadedDocs: document.getElementById("uploadedDoc"),
                uploadedAudios: document.getElementById("uploadedAudio"),
                widthValue: document.getElementById("widthValue"),
                heightValue: document.getElementById("heightValue"),
                loader: document.getElementById("loader") // Loader element
            },
            actions: {
                highlightAdd: function () {
                    app.selector.dropArea.classList.add('highlight')
                },
                highlightRemove: function () {
                    app.selector.dropArea.classList.remove('highlight')
                },
                handleFiles: function (files, type) {
                    app.selector.loader.style.display = 'block'; // Show loader
                    files = [...files];
                    let promises = files.map(file => app.actions.previewFile(file, type));

                    Promise.all(promises).then(() => {
                        app.selector.loader.style.display = 'none'; // Hide loader
                    }).catch(() => {
                        app.selector.loader.style.display = 'none'; // Hide loader on error
                    });
                },
                handleDrop: function (e) {
                    var dt = e.dataTransfer;
                    var files = dt.files;
                    app.actions.handleFiles(files);
                },
                previewFile: function (file, type) {
                    return new Promise((resolve) => {
                        let reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onloadend = function () {
                            let elems = '';
                            if (type === 'image') {
                                elems = `<div class="image-content"><div class="image-wrapper"><img alt="${file.name}" src="${reader.result}"><span onclick="app.actions.imageDelete(this)">X</span></div></div>`;
                                app.selector.uploadedImages.insertAdjacentHTML("beforeend", elems);
                            } else if (type === 'video') {
                                elems = `<div class="video-content"><div class="video-wrapper"><video controls alt="${file.name}" src="${reader.result}"></video><span onclick="app.actions.videoDelete(this)">X</span></div></div>`;
                                app.selector.uploadedVideos.insertAdjacentHTML("beforeend", elems);
                            } else if (type === 'doc') {
                                elems = `<div class="doc-content"><div class="doc-wrapper"><iframe src="${reader.result}" style="width: 100%;height: 100%;"></iframe><span onclick="app.actions.docDelete(this)">X</span></div></div>`;
                                app.selector.uploadedDocs.insertAdjacentHTML("beforeend", elems);
                            }else if (type === 'audio') {
                                elems = `<div class="audio-content"><div class="audio-wrapper"><iframe src="${reader.result}" style="width: 100%;height: 100%;"></iframe><span onclick="app.actions.audioDelete(this)">X</span></div></div>`;
                                app.selector.uploadedAudios.insertAdjacentHTML("beforeend", elems);
                            }
                            app.selector.actionContainer.classList.remove('d-none');
                            resolve(); // Resolve after processing the file
                        };
                        reader.onerror = function () {
                            resolve(); // Resolve even if an error occurs
                        };
                    });
                },
                imageDelete: function (scope) {
                    scope.parentNode.parentNode.remove();
                    app.selector.uploadedImages.innerHTML === '' && app.selector.actionContainer.classList.add('d-none');
                },
                videoDelete: function (scope) {
                    scope.parentNode.parentNode.remove();
                    app.selector.uploadedVideos.innerHTML === '' && app.selector.actionContainer.classList.add('d-none');
                },
                docDelete: function (scope) {
                    scope.parentNode.parentNode.remove();
                    app.selector.uploadedDocs.innerHTML === '' && app.selector.actionContainer.classList.add('d-none');
                },
                audioDelete: function (scope) {
                    scope.parentNode.parentNode.remove();
                    app.selector.uploadedAudios.innerHTML === '' && app.selector.actionContainer.classList.add('d-none');
                },
                clearAll: function () {
                    app.selector.uploadedImages.innerHTML = '';
                    app.selector.uploadedVideos.innerHTML = '';
                    app.selector.uploadedDocs.innerHTML = '';
                    app.selector.uploadedAudios.innerHTML = '';
                    app.selector.actionContainer.classList.add('d-none');
                },
                preventDefaults: function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                },
                execute: function () {
                    var images = Array.from(app.selector.uploadedImages.querySelectorAll('img'));
                    var width = app.selector.widthValue.value || 400;
                    var height = app.selector.heightValue.value || 400;

                    images.forEach(item => {
                        app.actions.resizeImages(item.getAttribute('src'), width, height).then((result) => {
                            let downloadBtn = `<a class="download-button" href="${result}" download="${item.getAttribute('alt')}">Download</a>`;
                            item.parentNode.insertAdjacentHTML("afterend", downloadBtn);
                        });
                    });
                }
            },
            init: function () {
                app.selector.dropArea.addEventListener('drop', app.actions.handleDrop, false);

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    app.selector.dropArea.addEventListener(eventName, app.actions.preventDefaults, false);
                    document.body.addEventListener(eventName, app.actions.preventDefaults, false);
                });

                ['dragenter', 'dragover'].forEach(eventName => {
                    app.selector.dropArea.addEventListener(eventName, app.actions.highlightAdd, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    app.selector.dropArea.addEventListener(eventName, app.actions.highlightRemove, false);
                });
            }
        };

        app.init();
    </script>




@endsection
