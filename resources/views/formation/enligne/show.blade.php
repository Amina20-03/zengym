<!DOCTYPE html>
<html>
<head>
    <title>{{ $formation['titre'] }}</title>
    <style>
        html, body, #jaas-container {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script src="https://8x8.vc/external_api.js"></script>
</head>
<body>

<h2>{{ $formation['titre'] }}</h2>
<p>Démarre à : {{ $formation['heure'] }}</p>

<div id="jaas-container"></div>
<script>
    const roomName = "room_{{ $formation['code'] }}";
    const userName = "{{ session('nom') }} {{ session('prenom') }}";

    fetch('/get-jitsi-token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ room: roomName, name: userName })
    }).then(res => res.json())
        .then(data => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: roomName,
                parentNode: document.querySelector('#jaas-container'),
                userInfo: {
                    displayName: userName
                },
                jwt: data.token
            });
        });
</script>
{{--<script>--}}
{{--    const roomName = "{{ $formation['code'] }}_{{ md5($formation['code']) }}";--}}
{{--    const userName = "{{ session('nom') }} {{ session('prenom') }}";--}}

{{--    const api = new JitsiMeetExternalAPI("8x8.vc", {--}}
{{--        roomName: roomName,--}}
{{--        parentNode: document.querySelector('#jaas-container'),--}}
{{--        userInfo: {--}}
{{--            displayName: userName--}}
{{--        },--}}
{{--        configOverwrite: {--}}
{{--            // Optional settings--}}
{{--        },--}}
{{--        interfaceConfigOverwrite: {--}}
{{--            // Optional UI settings--}}
{{--        },--}}
{{--        jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTNhMDczODhhNDg3NDNmZThiNDE5MWRkZGQzMDNjMjUvMmMyN2FmLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3NTEwMjE5ODIsImV4cCI6MTc1MTAyOTE4MiwibmJmIjoxNzUxMDIxOTc3LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTNhMDczODhhNDg3NDNmZThiNDE5MWRkZGQzMDNjMjUiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlLCJmbGlwIjpmYWxzZX0sInVzZXIiOnsiaGlkZGVuLWZyb20tcmVjb3JkZXIiOmZhbHNlLCJtb2RlcmF0b3IiOnRydWUsIm5hbWUiOiJoYW1tYW1pYmFzbWE5MDciLCJpZCI6Imdvb2dsZS1vYXV0aDJ8MTExNDExMjA4MTEzOTczNTY4OTgyIiwiYXZhdGFyIjoiIiwiZW1haWwiOiJoYW1tYW1pYmFzbWE5MDdAZ21haWwuY29tIn19LCJyb29tIjoiKiJ9.zNjviTgYJHNj_CrjmJfeFStyfmNrD9WR1a-yCpprfDePFNhRnPaEau7V1xpRK_X2zgVQ__F0ib-4-mndmV33hvYOUghgcasvIRANdV3O0P1dn6JM92b-DPi1RtlNdqhBOqGuIh9NdJGaswbn4Pnp7Srszyy8B01Oh40Rxtg5Z_lzNus3iD477C1UF5UNdCkvP-ansWXMJ64jYzP1IeTs_sWxur_Bs0CMxx2Ba48-SCT_0xQtZqY6AB9FgIk3w_5sX-o3tp3Z-0Q12g7wgB9QfxOPuk2TnJz18pd4CkErjNfYSKV0DyuRxGCboCetYl5kKDwK7n0m_vERjxhTbyc34A" // 🔐 JWT signed with your API Key + Secret--}}
{{--    });--}}
{{--</script>--}}

</body>
</html>
