
@section("title")
    Заказ
@endsection

@section("content")


<div class="container-fluid">

    <section class="tabs-section">
        <div class="tabs-section-nav tabs-section-nav-inline">
            <ul class="nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab">
                        Биринчи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab">
                        Иккинчи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tabs-4-tab-3" role="tab" data-toggle="tab">
                        Десерт
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tabs-4-tab-4" role="tab" data-toggle="tab">
                        Ичимликлар
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tabs-4-tab-5" role="tab" data-toggle="tab">
                        Кошимча
                    </a>
                </li>

            </ul>
        </div><!--.tabs-section-nav-->

        <div class="tab-content" id="birtb">
            <div role="tabpanel" class="tab-pane fade in active" id="tabs-4-tab-1">


                <div class="row">
                    <div class="col-md-3"  v-for="vl in json">

                            <div class="col-xl-12">
                                <img src="{{ URL("/uploads") }}/@{{ vl.url }}" width="100%" height="100%">
                            </div>
                            <div class="col-xl-12" style="padding: 5px; text-align: center;background-color: whitesmoke"><span><strong>@{{ vl.taom_nomi }}</strong></span><span> @{{ vl.narxi }}сум</span> <span><button class="btn btn-danger" onclick="getelement('@{{ vl.id }}')">Буюртма</button></span> </div>

                    </div>







                </div>

            </div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2"><div class="row">
                    <div class="col-md-3"  v-for="vl in jsoni">

                        <div class="col-xl-12">
                            <img src="{{ URL("/uploads") }}/@{{ vl.url }}" width="100%" height="100%">
                        </div>
                        <div class="col-xl-12" style="padding: 5px; text-align: center;background-color: whitesmoke"><span><strong>@{{ vl.taom_nomi }}</strong></span><span> @{{ vl.narxi }}сум</span> <span><button class="btn btn-danger" onclick="getelement('@{{ vl.id }}')">Буюртма</button></span> </div>

                    </div>







                </div></div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-3"><div class="row">
                    <div class="col-md-3"  v-for="vl in jsonii">

                        <div class="col-xl-12">
                            <img src="{{ URL("/uploads") }}/@{{ vl.url }}" width="100%" height="100%">
                        </div>
                        <div class="col-xl-12" style="padding: 5px; text-align: center;background-color: whitesmoke"><span><strong>@{{ vl.taom_nomi }}</strong></span><span> @{{ vl.narxi }}сум</span> <span><button class="btn btn-danger" onclick="getelement('@{{ vl.id }}')">Буюртма</button></span> </div>

                    </div>







                </div></div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-4"><div class="row">
                    <div class="col-md-3"  v-for="vl in jsoniii">

                        <div class="col-xl-12">
                            <img src="{{ URL("/uploads") }}/@{{ vl.url }}" width="100%" height="100%">
                        </div>
                        <div class="col-xl-12" style="padding: 5px; text-align: center;background-color: whitesmoke"><span><strong>@{{ vl.taom_nomi }}</strong></span><span> @{{ vl.narxi }}сум</span> <span><button class="btn btn-danger" onclick="getelement('@{{ vl.id }}')">Буюртма</button></span> </div>

                    </div>







                </div></div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-5"><div class="row">
                    <div class="col-md-3"  v-for="vl in jsonv">

                        <div class="col-xl-12">
                            <img src="{{ URL("/uploads") }}/@{{ vl.url }}" width="100%" height="100%">
                        </div>
                        <div class="col-xl-12" style="padding: 5px; text-align: center;background-color: whitesmoke"><span><strong>@{{ vl.taom_nomi }}</strong></span><span> @{{ vl.narxi }}сум</span> <span><button class="btn btn-danger" onclick="getelement('@{{ vl.id }}')">Буюртма</button></span> </div>

                    </div>







                </div></div><!--.tab-pane-->

        </div><!--.tab-content-->
    </section>
</div>




<div class="modal fade bd-example-modal-lg"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog modal-lg" id="modalx" >
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="modal-close" id="closes" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Буюртма бэриш</h4>
            </div>
            <div class="modal-body" align="center">

                <input type="hidden" value="@{{ tbs[0].id }}" v-model="tbs[0].id" id="ids">
                <div class="col-md-8">
                <div class="col-md-8" style="margin-bottom: 5px;" >
                    <img src="{{ URL("/uploads") }}/@{{ tbs[0].url }}" width="250" height="250">

                </div>
                    <div class="col-md-8" style="margin-bottom: 5px;">
                       <span> <strong> @{{ tbs[0].narxi }}</strong></span>
                       <span> <strong> @{{ tbs[0].taom_nomi }}</strong></span>

                    </div>

                    <div class="col-md-8" style="margin-bottom: 5px;">
                        <select id="stolx" class="col-md-8 form-control" v-model="stols">
                            @foreach($stol as $vl)
                            <option value="{!! $vl->id !!}">{!! $vl->stol_name !!}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-8" style="margin-bottom: 5px;">
                        <input id="demo2" type="text" value="0" name="demo2" v-model="countx" class="col-md-8 form-control">
                        <button type="button" class="btn btn-inline btn-primary" onclick="inserttt()" style="width: 200px;margin-top: 5px;">ОК</button>
                    </div>


                </div>


            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>



@endsection

@section("js")
    <script>
        $(document).ready(function(){
            $("input[name='demo2']").TouchSpin({
                min: 1,
                max: 100,
                step: 0.5,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                prefix: 'PROTSIYA'
            });
        });
    </script>
    <script>
        function getdelete($id) {

            if(confirm("Учирмокчимисиз?")){

                window.location.assign("{{ URL("/deletetaom") }}"+"/"+$id);
            }

        }
function inserttt() {
    modals.inserttaom();
}
        function getelement(str) {

           modals.getelement(str);

            $(".bd-example-modal-lg").modal();

        }

        var modals = new Vue({
            el:'#modalx',
            data:{
                tbs:null,
                countx:0,
                stols:0
            },
            created:function () {
                
            },
            methods:{
                getelement:function (str) {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/gettaom/'+str, function (json) {
                        _this.tbs = json;

                    });
                },

                inserttaom:function () {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//this.stols = $( "#stolx option:selected" ).val();
                    $.ajax({
                        url: '{{ URL("zakaz_add") }}',
                        type: 'POST',
                        data: {_token: CSRF_TOKEN,taom_id:this.tbs[0].id,count:this.countx,stol:this.stols},
                        success: function (data) {
                            console.log(data);
                            //$(".bd-example-modal-lg").modal('hide');
                            $('#closes').click();
                            this.tbs = null;
                            this.countx = 0;
                            this.stols = 0;

                        }
                    });
                }
            }
        });

        var birinchi = new Vue({
            el:'#birtb',
            data:{
                json:null,
                jsoni:null,
                jsonii:null,
                jsoniii:null,
                jsonv:null,
            },
            created:function () {
                this.getbirinchi();
                this.getikkinchi();
                this.getuchinchi();
                this.gettortinchi();
                this.getbeshinchi();
            },
            methods:{
                getbirinchi:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/taom/1', function (json) {
                        _this.json = json;


                    });
                },
                getikkinchi:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/taom/2', function (json) {
                        _this.jsoni = json;


                    });
                },
                getuchinchi:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/taom/3', function (json) {
                        _this.jsonii = json;


                    });
                },
                gettortinchi:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/taom/4', function (json) {
                        _this.jsoniii = json;


                    });
                },
                getbeshinchi:function () {
                    var _this = this;
                    $.getJSON('{{ URL("/api") }}/taom/5', function (json) {
                        _this.jsonv = json;


                    });
                }

            }
            

        });

    </script>


    @endsection