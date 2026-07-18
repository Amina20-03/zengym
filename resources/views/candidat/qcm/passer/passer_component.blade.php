@extends('layouts.app')

@section('content')

    @include('candidat.qcm.passer.passer')
@endsection
@section('datatable')
    <script>
        function check_scoore(rep, quest){
            console.log("{{session('TOKEN')}}");
            $.ajax({
                url: '{{env('API_URL')}}candidat/verifier_la_bonne_reponse',
                type: 'POST', // Use POST if the DELETE method is restricted
                headers: {
                    'Authorization': 'Bearer ' + '{{session('TOKEN')}}',
                    'Content-Type': 'application/json',
                },
                data: JSON.stringify(
                    {
                        quest: quest,
                        rep: rep
                    }), // Send the ID as JSON
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        console.log('Success:', response);
                    } else {
                        alert('Error deleting the category.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting category: " + error);
                    alert('There was an error deleting the category.');
                }
            });



        }
    </script>
<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     const radioButtons = document.querySelectorAll('input[name="question_1"]');
    //
    //     radioButtons.forEach(radio => {
    //         radio.addEventListener("change", function () {
    //             if (this.checked) {
    //                 console.log("Selected value:", this.value);
    //                 $('#rep').val(this.value);
    //                 $('#quest').val("question_1");
    //
    //             }
    //         });
    //     });
    //     check_scoore($('#rep').val(),$('#quest').val());
    // });

    document.addEventListener("DOMContentLoaded", function () {
        function disableElements() {
            document.querySelectorAll("button, a").forEach(element => {
                if (!element.classList.contains("btn-primary")) { // Exclude the "Valider" button
                    element.classList.add("disabled"); // Add disabled styling
                    element.setAttribute("disabled", "true"); // Disable buttons
                    element.setAttribute("onclick", "return false;"); // Prevent a tag clicks
                }
            });
        }

        function enableElements() {
            document.querySelectorAll("button, a").forEach(element => {
                element.classList.remove("disabled");
                element.removeAttribute("disabled");
                element.removeAttribute("onclick");
            });
        }

        // Call disableElements() when the exam starts
        disableElements();
    });


    document.addEventListener("DOMContentLoaded", function () {
        let timerDisplay = document.getElementById("timer");
        let totalTime = 30 * 60; // 30 minutes in seconds

        function updateTimer() {
            let minutes = Math.floor(totalTime / 60);
            let seconds = totalTime % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (totalTime <= 0) {
                clearInterval(countdown);
                alert("Temps écoulé ! Le quiz sera soumis.");
                document.getElementById("submitQuiz").click(); // Simulate quiz submission
            } else {
                totalTime--;
            }
        }

        // Call the function once immediately to update UI
        updateTimer();

        // Start countdown interval
        let countdown = setInterval(updateTimer, 1000);
    });


</script>


@endsection
