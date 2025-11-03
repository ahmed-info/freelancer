<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>


<script>
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            //let query = $('#search').val();
           fetch_data(page);
        });

        function fetch_data(page = 1) {
            $.ajax({
                url: "/pagination/history-data?page="+page,
                success: function (res) {
                    $('.table-responsive').html(res);
                }
            });
        }
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_string = $('#search').val();

            $.ajax({
                url: "{{ route('histories.search') }}",
                method: 'GET',
                data:{search_string: search_string},
                success: function(res){
                    $('.table-responsive').html(res);
                }
            });
        })
</script>
