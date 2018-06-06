
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
<form method="post" action="{{ URL("users_add") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p class="card-text"><label>*ФИШ</label><input class="form-control" name="fio" ></p>
                <p class="card-text"><label>*Логин</label><input class="form-control" type="text" name="login" required></p>
                <p class="card-text"><label>*Парол</label><input class="form-control" type="password" name="password" required></p>
                <p class="card-text"><label>Почта</label><input class="form-control" type="email" name="email"></p>
                <p class="card-text"><label>*Рол</label>

                   <select name="stats_id" class="form-control">
                        @foreach($stats as $vl)
                                               <option value="{!! $vl->id !!}">{!! $vl->stats_name !!}</option>
                            @endforeach
                   </select>



                </p>
                <p class="card-text"><button class="btn btn-default" type="submit" >Саклаш</button></p>
</form>
            </div>
        </section>

    </div>



    <div class="container-fluid">
        <section class="card">
            <header class="card-header">
                Фойдаланувчилар

            </header>
            <div class="card-block" id="tb">

                <table class="table table-bordered table-hover">
                    <thead>
                    <td >#</td>
                    <td >ФИШ</td>
                    <td >Логин</td>
                    <td >Почта</td>
                    <td >Рол</td>
                    <td >#</td>
                    </thead>

                    <tbody>

                    @foreach($db as $key => $vl)
                    <tr>
                    <td >{{ $key+1 }}</td>
                    <td >{{ $vl->fio }}</td>
                    <td >{{$vl->login }}</td>
                    <td >{{$vl->email }}</td>
                    <td >{{ $vl->stats_name }}</td>
                    <td  width="85">

                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: left;">


                                <a href="{{ URL("users_e") }}/{{ $vl->id }}" class="tabledit-edit-button btn btn-sm btn-default" style="float: left;"><span class="glyphicon glyphicon-pencil"></span></a>
                                <button type="button" onclick="getdelete({{ $vl->id }})" class="tabledit-delete-button btn btn-sm btn-default" style="float: left;"><span class="glyphicon glyphicon-trash"></span></button>
                            </div>
                        </div></td>
                    </tr>
@endforeach
                    </tbody>



                </table>

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