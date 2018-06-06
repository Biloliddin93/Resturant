
@section("title")
    Таомлар
@endsection

@section("content")




    <div class="container-fluid">
        <section class="card">
            <header class="card-header">
               Таом кошиш

            </header>
            <div class="card-block">
<form method="post" action="{{ URL("taom_add") }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p class="card-text"><label>*Таом номи</label><input class="form-control" name="taom_nomi" ></p>
                <p class="card-text"><label>*Расм</label><input  class="form-control" type="file" name="url" required></p>
                <p class="card-text"><label>*Нархи</label><input class="form-control" type="number" name="narxi" required></p>

                <p class="card-text"><label>*Тури</label>

                    <select name="type_id" class="form-control">
                        @foreach($types as $vl)
                            <option value="{!! $vl->id !!}">{!! $vl->type_name !!}</option>
                        @endforeach
                    </select>



                </p>

                <p class="card-text"><label>*Олчами</label>

                    <select name="size_id" class="form-control">
                        @foreach($size as $vl)
                            <option value="{!! $vl->id !!}">{!! $vl->size_name !!}</option>
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
                Таомлар

            </header>
            <div class="card-block" id="tb">

                <table class="table table-bordered table-hover">
                    <thead>
                    <td >#</td>
                    <td >Расм</td>
                    <td >Таом номи</td>

                    <td >Тури</td>
                    <td >Олчами</td>
                    <td >Нархи</td>
                    <td >#</td>
                    </thead>

                    <tbody>

                    @foreach($db as $key => $vl)
                    <tr>
                    <td >{{ $key+1 }}</td>
                    <td width="72"><img src="{{ URL("/uploads") }}/{{ $vl->url }}" width="70" height="70"></td>
                    <td >{{$vl->taom_nomi }}</td>

                    <td >{{ $vl->type_name }}</td>
                    <td >{{ $vl->size_name }}</td>
                    <td >{{$vl->narxi }}</td>
                    <td  width="85">

                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: left;">


                                <a href="{{ URL("taom_e") }}/{{ $vl->id }}" class="tabledit-edit-button btn btn-sm btn-default" style="float: left;"><span class="glyphicon glyphicon-pencil"></span></a>
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

                window.location.assign("{{ URL("/deletetaom") }}"+"/"+$id);
            }

        }

    </script>


    @endsection