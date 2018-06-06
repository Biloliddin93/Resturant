
@section("title")
    Таомлар
@endsection

@section("content")




    <div class="container-fluid">
        <section class="card">
            <header class="card-header">
               Таомни тахрирлаш

            </header>
            <div class="card-block">
<form method="post" action="{{ URL("taom_edit") }}" enctype="multipart/form-data">
    @foreach($db as $vl)
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <input type="hidden" name="id" value="{!! $vl->id !!}">
        <p class="card-text"><label>*Таом номи</label><input class="form-control" name="taom_nomi" value="{!! $vl->taom_nomi !!}"></p>
        <p> <img src="{{ URL("/uploads") }}/{!! $vl->url !!}" width="70" height="70"></p>
        <p class="card-text"><label>*Расм</label><input  class="form-control" type="file" name="url" value=""></p>
        <p class="card-text"><label>*Нархи</label><input class="form-control" type="number" name="narxi" value="{!! $vl->narxi !!}" required></p>

        <p class="card-text"><label>*Тури</label>

            <select name="type_id" class="form-control">
                @foreach($types as $vlx)

                    @if($vl->type_id == $vlx->id)
                    <option value="{!! $vlx->id !!}" selected>{!! $vlx->type_name !!}</option>
                    @endif

                    @if($vl->type_id != $vlx->id)
                            <option value="{!! $vlx->id !!}">{!! $vlx->type_name !!}</option>
                     @endif
                @endforeach
            </select>



        </p>

        <p class="card-text"><label>*Олчами</label>

            <select name="size_id" class="form-control">
                @foreach($size as $vlx)

                    @if($vl->size_id == $vlx->id)
                        <option value="{!! $vlx->id !!}" selected>{!! $vlx->size_name !!}</option>
                    @endif

                    @if($vl->size_id != $vlx->id)
                        <option value="{!! $vlx->id !!}">{!! $vlx->size_name !!}</option>
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