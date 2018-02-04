<div class="">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="page-content" style="min-height:602px">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        <span class="fa fa-plus"></span>Order Management
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="/hrm_demo/admin/employees">Order</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">New Order</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->

                    <hr>

                    <div id="drop">Drop an Excel file here to Register sheet data</div>

                    <hr>

                    <div class="clearfix">
                    </div>
                    <form id="orderCreate" action="{{ route('production.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{--<input name="_method" type="hidden" value="PUT">--}}
                        <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" id="order_number" readonly name="order_number">
                        <div class="row ">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet box purple-wisteria">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Order Details
                                        </div>
                                        <span id="findOrUp" style="border-radius: 0px 0px 5px 5px; border: 1px solid white; border-top: 0px" class="pull-right btn btn-primary" data-toggle="tooltip" title="Single click and Double click">
                                                Find or Update
                                            </span>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <div id="orderTxtHide" class="form-group">
                                                <label class="col-md-3 control-label">Find Order <span class="required">* </span></label>
                                                <div class="col-md-8 input-group">
                                                    <input id="orderNumberForJs" type="text" class="form-control" placeholder="Order Number" autocomplete="off" @if(isset($order_number)){ value="{{ $order_number }}" } @endif >
                                                    <p id="foundTxt" class="text-center text-danger"><b>Not Registered Order No !</b></p>
                                                    <span id="orderEdit" style="cursor: pointer" class="input-group-addon">Edit</span>
                                                </div>
                                                <hr>
                                            </div>


                                            <span id="orderDetails">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Cutting <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCut" placeholder="Cutting" @if(isset($customer_name)){ value="{{ $customer_name }}" } @endif >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prDate" placeholder="Date" autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Swing In</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwIn" placeholder=" Swing In">
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Swing Out</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwOut" placeholder="Swing Out" value="{{Input::old('order_quantity')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Iron</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prIron" placeholder="Iron">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Carton</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCarton" placeholder="">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button style="display: none" id="formModify" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn btn-danger">
                                                                <i class="fa fa-pencil-square-o"></i>	Modify CostSheet
                                                            </button>
                                                            <button id="saveOrder" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save Order
                                                            </button>
                                                            <button style="display: none;" id="saveEditOrder" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-pencil-square-o"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div id="infoArea" class="portlet box red-sunglo">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Information Area
                                        </div>

                                    </div>
                                    <div class="portlet-body">

                                        <div class="form-body">

                                            <a data-toggle="modal" data-target="#myModal" class="btn btn-block btn-social btn-adn">
                                                <span class="fa fa-home"></span>PO  Information
                                            </a>

                                            <a data-toggle="modal" data-target="#myModalS" class="btn btn-block btn-social btn-bitbucket">
                                                <span class="fa fa-plus-square-o"></span> Size & Color Wise Breakdown
                                            </a>

                                            {{--<a data-toggle="modal" data-target="#myModalU" class="btn btn-block btn-social btn-dropbox">
                                                <span class="fa fa-camera "></span> Photo Attachement
                                            </a>--}}

                                            <a data-toggle="modal" data-target="#fabricInfoModal" class="btn btn-block btn-social btn-pinterest">
                                                <span class="fa fa-opera "></span>Fabric Information
                                            </a>
                                            <a data-toggle="modal" data-target="#sampleInfoModal" class="btn btn-block btn-social btn-foursquare">
                                                <span class="fa fa-tag"></span>Sample Information
                                            </a>
                                            <a data-toggle="modal" data-target="#lapdipInfoModal" class="btn btn-block btn-social btn-google">
                                                <span class="fa fa-thumb-tack "></span>Lapdip Information
                                            </a>
                                            <a data-toggle="modal" data-target="#accessoriesInfoModal" class="btn btn-block btn-social btn-instagram">
                                                <span class="fa fa-shopping-basket"></span>Accessories Information
                                            </a>
                                            <a data-toggle="modal" data-target="#YarnInfoModal" class="btn btn-block btn-social btn-pinterest">
                                                <span class="fa fa-forumbee"></span>Yarn Information
                                            </a>


                                            <a class="btn btn-block btn-social btn-facebook">
                                                <span class="fa fa-money "></span>Cost Information
                                            </a>
                                            <a class="btn btn-block btn-social btn-flickr">
                                                <span class="fa fa-cubes"></span>Kniting/Dying Information
                                            </a>

                                            <a class="btn btn-block btn-social btn-linkedin">
                                                <span class="fa fa-barcode "></span>Inspection Information
                                            </a>
                                            <a class="btn btn-block btn-social btn-microsoft">
                                                <span class="fa fa-ship"></span>Shipment Information
                                            </a>

                                            <a class="btn btn-block btn-social btn-reddit">
                                                <span class="fa fa-columns"></span>Work Order information
                                            </a>

                                            <a class="btn btn-block btn-social btn-odnoklassniki">
                                                <span class="fa fa-file-archive-o "></span>Document information
                                            </a>

                                            <a class="btn btn-block btn-social btn-openid">
                                                <span class="fa fa-database"></span>Others information
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix form-horizontal">

                        <div class="clearfix">
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <!-- Modal Start -->
                                            <form id="poData" action="{{ route('po.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="po[order_number]">
                                                @include('orderInformation.po_info')
                                            </form>
                                            {{--Size and Color--}}
                                            <form id="siData" action="{{ route('sizeNcolor.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="si[order_number]">
                                                @include('orderInformation.sizeColorBreakdown')
                                            </form>

                                            {{--fabricInfo--}}
                                            <form id="fabricData" action="{{ route('fabric.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="fab[order_number]">
                                                @include('orderInformation.fabricInfo')
                                            </form>
                                            {{--fabricInfo--}}
                                            <form id="sampleData" action="{{ route('sample.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="sample[order_number]">
                                                @include('orderInformation.sampleInformation')
                                            </form>

                                            {{--labdipInformation--}}
                                            <form id="labdipData" action="{{ route('labdip.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="labdip[order_number]">
                                                @include('orderInformation.labdipInformation')
                                            </form>

                                            {{--accessoriesInformation--}}
                                            <form id="accessData" action="{{ route('access.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="accessories[order_number]">
                                                @include('orderInformation.accessoriesInformation')
                                            </form>

                                            {{--accessoriesInformation--}}
                                            <form id="yarnData" action="{{ route('yarn.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="yarn[order_number]">
                                                @include('orderInformation.yarnInformation')
                                            </form>

                                        @include('orderInformation.photoUpload')

                                        @include('orderInformation.color')
                                        <!-- Modal Start -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>


                </div>
            </div>
            <!-- /.box-body -->
            <!-- Modal Start -->

            <!-- Modal Start -->
            <div id="aj_test" class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<script>
    var D           = new Date();
    var date        = String("0" + D.getDate()).slice(-2);
    var month       = String("0" + (1 + D.getMonth())).slice(-2);
    var yr          = String(D.getFullYear().toString());
    var todayDate   = date  + "/" +  month  + "/" +  yr;


    var drop = document.getElementById('drop');
    function handleDrop(e) {
        e.stopPropagation();
        e.preventDefault();
        var files = e.dataTransfer.files;
        var i,f;
        for (i = 0, f = files[i]; i != files.length; ++i) {
            var reader = new FileReader();
            var name = f.name;
            reader.onload = function(e) {
                var data = e.target.result;

                var workbook = XLSX.read(data, {type: 'binary'});
                var first_sheet_name = workbook.SheetNames[0];

                var worksheet = workbook.Sheets[first_sheet_name];

                function valAppend(cell, scope) {
                    var v = typeof worksheet[cell];
                    if (v !== 'undefined') {
                        $(scope).val(worksheet[cell].w);
                        $(scope).attr('readOnly', true);
                        $('input[name="date_of_entry"]').val(todayDate);
                        $("#formModify").css('display', 'inline');
                    } else {
                        $(scope).val('');
                        $(scope).attr('readOnly', false);
                    }
                }
                valAppend('C3', 'input[name="customer_name"]');
                valAppend('C4', 'input[name="orderID"]');
                valAppend('C5', 'input[name="article_no"]');

                valAppend('C7', 'input[name="date_of_ship"]');
                valAppend('C8', 'input[name="order_quantity"]');
                valAppend('C9', 'input[name="unit_price"]');
                valAppend('C12', 'select[name="order_type"]');
                valAppend('C13', 'select[name="season"]');
                valAppend('C14', 'select[name="order_status"]');
                valAppend('C15', 'select[name="apparel_type"]');
                valAppend('C6', 'textarea[name="style_description"]');
                valAppend('C17', 'textarea[name="fabric_description"]');
                valAppend('C18', 'input[name="smv"]');
                valAppend('C19', 'input[name="sales_person"]');
            };
            reader.readAsBinaryString(f);
        }
    }
    $('input[name="date_of_entry"]').val(todayDate);
    function handleDragover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.dataTransfer.dropEffect = 'copy';
    }
    if(drop.addEventListener) {
        drop.addEventListener('dragenter', handleDragover, false);
        drop.addEventListener('dragover', handleDragover, false);
        drop.addEventListener('drop', handleDrop, false);
    }

    $("#formModify").click(function () {
        $("input").attr('readOnly', false);
        $("select").attr('readOnly', false);
        $("textarea").attr('readOnly', false);
        $('input[name="date_of_entry"]').attr('readOnly', true);
    });

    $( function() {
        $( ".dPick" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy'
        });
    } );

    {{--Hide Field--}}
    $("#orderEdit").hide();
    $("#foundTxt").hide();
    $("#orderTxtHide").hide();
    $("#infoArea, #infoArea a").css('display', 'none');

    function reformatDateString(date) {
        var Date = date.split('-');
        return Date[2] +'/'+ Date[1] +'/'+ Date[0];
    }

    var ordNo = "@if(isset($isData->order_number)){{ $isData->order_number }}@endif";
    if (ordNo != '') {
        $('#orderNumberForJs').val(ordNo);
        var url = '{{ route('production.show', ':order_number||getData') }}';
        url = url.replace(':order_number', ordNo);
        //alert(ordNo);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                //alert(data.order_number);
                $('#grmntImgPreview').removeAttr("src").attr('src', "{{ asset('') }}assets/garmentsImage/" + data.garmentImg);
                //$('[name="garmentImg"]').val(data.garmentImg);
                $('[name="order_number"]').val(data.order_number).attr('disabled', 'disabled');
                $('[name="prDate"]').val(data.prDate);
                $('[name="prCut"]').val(data.prCut);
                $('[name="prSwIn"]').val(data.prSwIn);
                $('[name="prSwOut"]').val(data.prSwOut);
                $('[name="prIron"]').val(data.prIron);
                $('[name="prCarton"]').val(data.prCarton);

                $("#infoArea, #infoArea a").css('display', 'block');

                $("#saveOrder").remove();
                $("#saveEditOrder").removeAttr("style");

                var ordNumFrUpdate = data.order_number;
                //var url = "{{ route('production.update', ':order_number') }}";
                var url = "{{ route('production.store') }}";
                //url = url.replace(':order_number', ordNumFrUpdate);

                $("#orderCreate").attr("action", url);
                        //.prepend('<input name="_method" type="hidden" value="PUT">');
                //$("#csrfField").remove();
            },
            error: function(){
                alert('er');
            }
        });
    }

    {{--Click Buton to edit Order Info--}}
    $("#findOrUp").click(function () {
        $(this).text('Order create');
        $("#orderDetails").hide('linear', function () {
            $('#orderTxtHide').show();
            $('#orderNumberForJs').keyup(function () {
                var orderVal = $('#orderNumberForJs').val();
                var url = '{{ route('Order.show', ':order_number||EditReq') }}';
                url = url.replace(':order_number', orderVal);
                $.ajax({
                    url: url,
                    cache: false,
                    global: false,     // this makes sure ajaxStart is not triggered
                    success: function(data){
                        $("#orderEdit").show();
                        $("#foundTxt").hide();
                    },
                    error: function(){
                        $("#infoArea, #infoArea a").css('display', 'none');
                        $('#orderDetails input').val('');
                        $("#orderEdit").hide();
                        $("#foundTxt").show();
                        if (orderVal == '') {
                            $("#foundTxt").hide();
                        }
                    }
                });
            });
            $("#findOrUp").attr('custom', 'orderCre');
            $("[custom='orderCre']").dblclick(function () {
                $('[name="order_number"]').attr('disabled', false);
                $(this).text('Find or Update');
                $("input").val('');
                $("textarea").val('');
                $('#orderTxtHide').hide();
                $("#orderDetails").show(500, 'linear');
                $("#orderCre").attr('id', 'findOrUp');
            });
        });
    });

    $("#orderEdit").click(function () {
        $("#orderDetails").show(300);
        $("#findOrUp").text('Find or Update');
        var orderVal = $('#orderNumberForJs').val();
        var url = '{{ route('Order.show', ':order_number||getData') }}';
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('[name="order_number"]').val(data.order_number).attr('disabled', 'disabled');
                $('[name="customer_name"]').val(data.customer_name);
                $('[name="date_of_entry"]').val(data.date_of_entry);
                $('[name="order_type"]').val(data.order_type);
                $('[name="season"]').val(data.season);
                $('[name="order_status"]').val(data.order_status);
                $('[name="apparel_type"]').val(data.apparel_type);
                $('[name="order_quantity"]').val(data.order_quantity);
                $('[name="unit_price"]').val(data.unit_price);
                $('[name="article_no"]').val(data.article_no);
                $('[name="style_description"]').val(data.style_description);
                $('[name="fabric_description"]').val(data.fabric_description);
                $('[name="date_of_ship"]').val(data.date_of_ship);
                $('[name="smv"]').val(data.smv);
                $('[name="sales_person"]').val(data.sales_person);

                $("#infoArea, #infoArea a").css('display', 'block');
            },
            error: function(){
                //
            }
        });

    });

    $(document).click(function () {
        var orderVal = $('#order_number').val();
        $('[name="po[order_number]"]').val(orderVal);
        $('[name="si[order_number]"]').val(orderVal);
        $('[name="fab[order_number]"]').val(orderVal);
        $('[name="sample[order_number]"]').val(orderVal);
        $('[name="labdip[order_number]"]').val(orderVal);
        $('[name="accessories[order_number]"]').val(orderVal);
        $('[name="yarn[order_number]"]').val(orderVal);
    });

    $('#order_number').keyup(function () {
        var orderVal = $(this).val();
        var url = '{{ route('Order.show', ':order_number||getData') }}';
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $("#alreadyReg").html('Already register Order no !');
                //$("#infoArea, #infoArea a").css('display', 'none');
                //$("#saveOrder").hide();
            },
            error: function(){
                $("#alreadyReg").text('');
                $("#saveOrder").show();
                //$("#infoArea, #infoArea a").css('display', 'block');
                var order_number = $('[name="order_number"]').val();
                if (order_number == '') {
                    $("#infoArea, #infoArea a").css('display', 'none');
                }
            }
        });
    });

    {{--info Area Section--}}
    //PO
    $("#myModal").hover(function () {
        var url = '{{ route('po.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#poTable').html(data);
            }
        });
    });
    $('[name="po[btn_add]"]').click(function () {
        var orderVal = $('#order_number').val();
        var url = '{{ route('po.show', ':order_number') }}';
        url = url.replace(':order_number', orderVal);
        $('#poData').ajaxSubmit({
            success: function (data) {
                $('#poTable').load(url);
                $("#myModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    //Size & Color Breakdown Details
    $("#myModalS").hover(function () {
        var url = '{{ route('sizeNcolor.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#siTable').html(data);
            }
        });
    });
    $('[name="si[btn_add]"]').click(function () {
        var orderVal = $('#order_number').val();
        var url = '{{ route('sizeNcolor.show', ':order_number') }}';
        url = url.replace(':order_number', orderVal);
        $('#siData').ajaxSubmit({
            success: function (data) {
                $('#siTable').load(url);
                $("#myModalS").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    //Fabric Details
    $("#fabricInfoModal").hover(function () {
        var url = '{{ route('fabric.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#fabTable').html(data);
            }
        });
    });
    $('[name="fab[btn_add]"]').click(function () {
        var orderVal = $('#order_number').val();
        var url = '{{ route('fabric.show', ':order_number') }}';
        url = url.replace(':order_number', orderVal);
        $('#fabricData').ajaxSubmit({
            success: function (data) {
                $('#fabTable').load(url);
                $("#fabricInfoModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    //Sample Details
    $("#sampleInfoModal").hover(function () {
        var url = '{{ route('sample.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#sampleTable').html(data);
            }
        });
    });
    $('[name="sample[btn_add]"]').click(function () {
        var orderVal = $('#order_number').val();
        var url = '{{ route('sample.show', ':order_number') }}';
        url = url.replace(':order_number', orderVal);
        //$('#sampleData').submit();
        $('#sampleData').ajaxSubmit({
            success: function (data) {
                $('#sampleTable').load(url);
                $("#sampleInfoModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });

            }
        });
    });

    //Labdip Details
    $("#lapdipInfoModal").hover(function () {
        var url = '{{ route('labdip.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#labdipTable').html(data);
            }
        });
    });
    $('[name="labdip[btn_add]"]').click(function () {
        var url = '{{ route('labdip.show', ':order_number') }}';
        var orderVal = $('#order_number').val();
        url = url.replace(':order_number', orderVal);
        //$('#labdipData').submit();
        $('#labdipData').ajaxSubmit({
            success: function (data) {
                $('#labdipTable').load(url);
                $("#lapdipInfoModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    //accessories Details
    $("#accessoriesInfoModal").hover(function () {
        var url = '{{ route('access.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#accessTable').html(data);
            }
        });
    });
    $('[name="accessories[btn_add]"]').click(function () {
        var url = '{{ route('access.show', ':order_number') }}';
        var orderVal = $('#order_number').val();
        url = url.replace(':order_number', orderVal);
        //$('#labdipData').submit();
        $('#accessData').ajaxSubmit({
            success: function (data) {
                $('#accessTable').load(url);
                $("#accessoriesInfoModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    //yarn Details
    $("#YarnInfoModal").hover(function () {
        var url = '{{ route('yarn.show', ':order_number') }}';
        var orderVal = $('#orderNumberForJs').val();
        url = url.replace(':order_number', orderVal);
        $.ajax({
            url: url,
            cache: false,
            global: false,     // this makes sure ajaxStart is not triggered
            success: function(data){
                $('#yarnTable').html(data);
            }
        });
    });
    $('[name="yarn[btn_add]"]').click(function () {
        var url = '{{ route('yarn.show', ':order_number') }}';
        var orderVal = $('#order_number').val();
        url = url.replace(':order_number', orderVal);
        $('#yarnData').ajaxSubmit({
            success: function (data) {
                $('#yarnTable').load(url);
                $("#YarnInfoModal").animate({scrollTop: 500}, 'slow');
                swal({
                    title: "",
                    text: "<span style='color: #00a157'>Successfully information add !</span>",
                    timer: 1200,
                    showConfirmButton: false,
                    html: true
                });
            }
        });
    });

    $("#saveOrder").click(function () {
        var order_number = $('[name="order_number"]').val();
        if (order_number == '') {
            alert('order number missing !');
            return false;
        }

        //$("#orderCreate").submit();
        $("#orderCreate").ajaxSubmit({
            success : function (data) {
                alert(data);
                /*$("#saveOrder").hide();
                $('[name="order_number"]').attr('disabled', true);
                $("html, body").animate({scrollTop: 100}, 'slow');
                $("#infoArea, #infoArea a").css('display', 'block');
                $("#drop").remove();
                swal("Done!", data, "success");*/
            }
        });
    });

    $("#saveEditOrder").click(function () {
        var order_number = $('[name="order_number"]').val();
        if (order_number == '') {
            alert('order number missing !');
            return false;
        }

        $("#orderCreate").ajaxSubmit({
            success : function (data) {
                alert('ada');
                console.log(data);
                //swal("Done !", "Information Updated Successfully !", "success");
                /*$("#saveOrder").hide();
                 $('[name="order_number"]').attr('disabled', true);
                 $("html, body").animate({scrollTop: 100}, 'slow');
                 $("#infoArea, #infoArea a").css('display', 'block');
                 $("#drop").remove();
                 */
            },
            error: function() { alert('tError'); }
        });
    });

    function unique_number() {

        var D = new Date();
        var hours   = String("0" + D.getHours()).slice(-2);
        var minute  = String("0" + D.getMinutes()).slice(-2);
        var date    = String("0" + D.getDate()).slice(-2);
        var month   = String("0" + (1 + D.getMonth())).slice(-2);
        var second  = String("0" + D.getSeconds()).slice(-2);
        var yr = String(D.getFullYear().toString().substring(2));

        var uniNum = yr + month + date + '-' + hours + minute + second;

        return uniNum;
    }

    $('[name="order_number"]').val(unique_number);


    $('[name="garmentImg"]').on('change', function(event) {
        $('#grmntImgPreview').attr('src', URL.createObjectURL(event.target.files[0]));
    });

    $('[data-dismiss="fileinput"]').click(function () {
        var url = "{{ asset('') }}assets/garmentsImage/tShirt.png";
        $('[name="garmentsImage"]').val('');
        $('#grmntImgPreview').attr('src', url);
    });
    /*$( function() {
     $( ".datepicker" ).datepicker({
     changeMonth: true,
     changeYear: true,
     dateFormat: 'dd-mm-yy',
     });
     } );


     var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

     $.fn.modal.Constructor.prototype.enforceFocus = function() {};

     $confModal.on('hidden', function() {
     $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
     });

     $confModal.modal({ backdrop : false });*/
</script>