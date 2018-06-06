
@section("title")
    Менинг буюртмаларим
@endsection

@section("content")


<div class="container-fluid">

    <section class="tabs-section">
        <div class="tabs-section-nav tabs-section-nav-inline">
            <ul class="nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab">
                        Буюртмалар
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab">
                        Буюртмалар тарихи
                    </a>
                </li>


            </ul>
        </div><!--.tabs-section-nav-->

        <div class="tab-content" id="birtb">
            <div role="tabpanel" class="tab-pane fade in active" id="tabs-4-tab-1">


                <div class="row">


                    <table class="table table-bordered table-hover">
                        <thead>
                        <td >#</td>
                        <td >Расм</td>
                        <td >Таом номи</td>
                        <td >Стол</td>
                        <td >Портция</td>
                        <td >Сана</td>
                        <td ></td>


                        </thead>

                        <tbody>

                        <tr v-for="(index,vlx) in tbs">

                            <td >@{{ index+1 }}</td>
                            <td width="72"><img src="{{ URL("/uploads") }}/@{{ vlx.url }}" width="70" height="70"></td>
                            <td >@{{ vlx.taom_nomi }}</td>
                            <td >@{{ vlx.stol_name }}</td>
                            <td >@{{ vlx.qancha }}</td>
                            <td >@{{ vlx.created_at }}</td>

                            <td style="width:80px;"><div class="col-md-8" v-if="stolcurrent != 'all'" style="margin-top: 15px;">
                                    <button class="btn btn-danger" onclick="offorder('@{{ vlx.id }})')">Тайёр</button> </div></td>
                        </tr>
                        </tbody>
                    </table>





                </div>








            </div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2">

                <div class="row">









                </div>


            </div><!--.tab-pane-->


        </div><!--.tab-content-->
    </section>


</div>






@endsection

@section("js")

    <script>
        function offorder($id) {

            if(confirm("Буюртма тайёрми?")){

                window.location.assign("{{ URL("/povarready/") }}"+"/"+$id);
            }

        }


        var els = new Vue({
            el:'#birtb',
            data:{
                tbs:null,


            },
            created:function () {

                this.gettable();

                setInterval(function () {
                    this.gettable();
                }.bind(this), 5000);

            },
            methods:{
                gettable:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/povar/', function (json) {
                        _this.tbs = json;



                    });
                },

                check:function () {

                    window.location.assign("{{ URL("check") }}"+"/"+this.stolcurrent);

                }





            }

        });




    </script>


    @endsection