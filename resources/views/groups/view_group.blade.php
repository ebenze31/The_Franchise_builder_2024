@extends('layouts.theme_admin')

@section('content')

<!-- เพิ่ม jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
	
	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_view_group();
    });

    function get_data_view_group(){

        fetch("{{ url('/') }}/api/get_data_view_group")
            .then(response => response.json())
            .then(result => {
                console.log(result);

            });
    }

</script>

@endsection
