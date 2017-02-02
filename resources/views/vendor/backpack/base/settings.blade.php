@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="row">
   <div class="col-md-8 col-md-offset-2">
      <!-- Default box -->
      {!! Form::model($setting, ['url' => 'admin/settings', 'method' => 'PATCH', 'id' => 'settings-form']) !!}
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body row">
               <div class="form-group col-md-12">
                  <label>Address Line</label>
                  {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => "Enter Address"]) !!}
               </div>
               <div class="form-group col-md-12">
                  <label>Postal Code</label>
                  {!! Form::text('postal_code', null, ['class' => 'form-control', 'placeholder' => "Enter Postal Code"]) !!}
               </div>
               <div class="form-group col-md-12">
                  <label>Phone Number</label>
                  {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => "Enter Phone Number"]) !!}
               </div>
            </div>
            <div class="box-footer">
               <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-save"></i> Save</span></button>   
            </div>
            <!-- /.box-footer-->
         </div>
      {!! Form::close() !!}
      <!-- /.box -->
   </div>
</div>
@endsection
