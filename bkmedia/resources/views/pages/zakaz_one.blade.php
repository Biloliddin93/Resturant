
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
                   <div class="form-group">
                       <select class="form-control" v-model="stolcurrent" v-on:change="onchanges()">
                           <option value="all">Барчаси</option>
                           @foreach($stol as $vl)
                           <option value="{!! $vl->id !!}">{!! $vl->stol_name !!}</option>
                           @endforeach
                       </select>
                   </div>

                <div class="row">


                    <table class="table table-bordered table-hover">
                        <thead>
                        <td >#</td>
                        <td >Расм</td>
                        <td >Таом номи</td>
                        <td >Буюртма холати</td>
                        <td >Стол</td>
                        <td >Нархи</td>
                        <td ></td>


                        </thead>

                        <tbody>

                        <tr v-for="(index,vlx) in tbs">

                            <td >@{{ index+1 }}</td>
                            <td width="72"><img src="{{ URL("/uploads") }}/@{{ vlx.url }}" width="70" height="70"></td>
                            <td >@{{ vlx.taom_nomi }}</td>
                            <td >@{{ vlx.stats_name }}</td>
                            <td >@{{ vlx.stol_name }}</td>
                            <td >@{{ vlx.narxi }} сўм</td>
                            <td ></td>
                        </tr>
                        </tbody>
                    </table>



                    <div class="col-md-8" v-if="stolcurrent != 'all'" style="margin-top: 15px;">
                        <button class="btn btn-danger" v-on:click="check()">буюртмани ёпиш</button> </div>

                </div>








            </div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2">

                <div class="row">



                    <table class="table table-bordered table-hover">
                        <thead>
                        <td >#</td>
                        <td >Расм</td>
                        <td >Таом номи</td>
                        <td >Буюртма холати</td>
                        <td >Стол</td>
                        <td >Нархи</td>
                        <td ></td>


                        </thead>

                        <tbody>

                        <tr v-for="(index,vlx) in tbsx">

                            <td >@{{ index+1 }}</td>
                            <td width="72"><img src="{{ URL("/uploads") }}/@{{ vlx.url }}" width="70" height="70"></td>
                            <td >@{{ vlx.taom_nomi }}</td>
                            <td >@{{ vlx.stats_name }}</td>
                            <td >@{{ vlx.stol_name }}</td>
                            <td >@{{ vlx.narxi }} сўм</td>
                            <td ></td>
                        </tr>
                        </tbody>
                    </table>





                </div>


            </div><!--.tab-pane-->


        </div><!--.tab-content-->
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


        var els = new Vue({
            el:'#birtb',
            data:{
                tbs:null,
                tbsx:null,
                stolcurrent:'all',
                totalx:0

            },
            created:function () {

                this.gettable(this.stolcurrent,1,2);
                this.gettablex(this.stolcurrent,3);


            },
            methods:{
                gettable:function (str,strx,stt) {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/order/'+str+'/'+strx+'/'+stt, function (json) {
                        _this.tbs = json;



                    });
                },
                gettablex:function (str,strx) {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/order/'+str+'/'+strx, function (json) {
                        _this.tbsx = json;



                    });
                },
                onchanges:function () {

                    this.totalx = 0;

                    this.gettable(this.stolcurrent,1);



                },
                check:function () {

                    window.location.assign("{{ URL("check") }}"+"/"+this.stolcurrent);

                }





            }

        });




    </script>


    @endsection