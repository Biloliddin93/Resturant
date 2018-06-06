
@section("title")
    Фойдаланувчилар
@endsection

@section("content")




    <div class="container-fluid">
        <section class="card">
            <header class="card-header">
              Тизимга кириш

            </header>
            <div class="card-block">
<form method="post" action="{{ URL("auth") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <p class="card-text"><label>*Логин</label><input class="form-control" type="text" name="login" required></p>
                <p class="card-text"><label>*Парол</label><input class="form-control" type="password" name="password" required></p>





                </p>
                <p class="card-text"><button class="btn btn-default" type="submit" >Кириш</button></p>
</form>
            </div>
        </section>

    </div>









@endsection

@section("js")

    <script>
        function getdelete($id) {

            if(confirm("Учирмокчимисиз?")){

                window.location.assign("{{ URL("/deleteusers") }}"+"/"+$id);
            }

        }

    </script>


    @endsection