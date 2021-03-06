@extends('layouts.app')
@section('content')
<style>
    .modal {
        text-align: center;
        padding: 0!important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="page-content" style="min-height:602px">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        <span class="fa fa-plus"></span>Production Entry
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
                    @if (Session::has('flash_msg'))
                        <span class="help-block">
                            <strong style="color: red; font-size: 1.6em">{{ Session::get('flash_msg') }}</strong>
                        </span>
                    @endif
                    <!-- END PAGE HEADER-->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="clearfix">
                    </div>
                    <form id="prCreate" action="@if(isset($order->Id)) {{ url('production/storePrData') }} @else {{ route('production.update', $id) }}@endif" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @if(isset($order->Id)) {{ csrf_field() }} @else {{ csrf_field() }} | {{ method_field('PUT') }} @endif
                        <div class="row ">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet box purple-wisteria">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Production Details
                                        </div>
                                        <span id="findOrUp" style="border-radius: 0px 0px 5px 5px; border: 1px solid white; border-top: 0px" class="pull-right btn btn-primary" data-toggle="tooltip" title="Single click and Double click">
                                            .
                                        </span>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-9">

                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Line <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="line" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="Line" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Cutting <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCut" @if(isset($prCut)){ value="{{ $prCut }}" } @endif placeholder="Cutting" >
                                                            <input type="hidden" class="form-control subConNm"  >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio"  checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio" > Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Swing In</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwIn" @if(isset($prSwIn)){ value="{{ $prSwIn }}" } @endif placeholder="Swing In">
                                                            <input type="hidden" class="form-control subConNm"  >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Swing Out</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwOut" @if(isset($prSwOut)){ value="{{ $prSwOut }}" } @endif placeholder="Swing Out" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Iron</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prIron" @if(isset($prIron)){ value="{{ $prIron }}" } @endif placeholder="Iron" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Poly</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCarton" @if(isset($prCarton)){ value="{{ $prCarton }}" } @endif placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button style="display: none" id="formModify" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn btn-danger">
                                                                <i class="fa fa-pencil-square-o"></i>	Modify CostSheet
                                                            </button>
                                                            <button id="" type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	SaveProductionInf
                                                            </button>
                                                        </div>
                                                    </div>

                                                <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.box-body -->
            <!-- Modal Start -->
                @include("modal.line")
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
<script src="{{ asset('') }}assets/js/productJS/prJs.js"></script>
@endsection

