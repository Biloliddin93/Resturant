
@section("title")
    Фойдаланувчилар
@endsection

@section("content")




    <div class="container-fluid">
        <section class="card">
            <header class="card-header">
               Фойдаланувчни кошиш

            </header>
            <div class="card-block">
<form method="post" action="{{ URL("users_edit") }}">
    @foreach($db as $vl)
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{!! $vl->id !!}">
                <p class="card-text"><label>*ФИШ</label><input class="form-control" name="fio" value="{!! $vl->fio !!}"></p>
                <p class="card-text"><label>*Логин</label><input class="form-control" type="text" name="login" value="{!! $vl->login !!}" required></p>
                <p class="card-text"><label>Парол</label><input class="form-control" type="password" name="password"  ></p>
                <p class="card-text"><label>Почта</label><input class="form-control" type="email" name="email" value="{!! $vl->email !!}"></p>
                <p class="card-text"><label>*Рол</label>

                   <select name="stats_id" class="form-control">
                        @foreach($stats as $vlx)

                            @if($vlx->id == $vl->stats_id)
                                               <option value="{!! $vlx->id !!}" selected>{!! $vlx->stats_name !!}</option>
                            @endif

                                @if($vlx->id != $vl->stats_id)
                                    <option value="{!! $vlx->id !!}">{!! $vlx->stats_name !!}</option>
                                @endif
                            @endforeach
                   </select>



                </p>
                <p class="card-text"><button class="btn btn-default" type="submit" >Саклаш</button></p>
        @endforeach
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