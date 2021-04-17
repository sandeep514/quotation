@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('coreadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($items, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('coreadmin.route').'.items.update', $items->id))) !!}

<div class="form-group">
    {!! Form::label('item_name', 'Item Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('item_name', old('item_name',$items->item_name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('item_model', 'Item Model*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('item_model', old('item_model',$items->item_model), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('attachment1', 'Image 1', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('attachment1') !!}
        {!! Form::hidden('attachment1_w', 4096) !!}
        {!! Form::hidden('attachment1_h', 4096) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('attachment2', 'Image 2', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('attachment2') !!}
        {!! Form::hidden('attachment2_w', 4096) !!}
        {!! Form::hidden('attachment2_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('attachment3', 'Image 3', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('attachment3') !!}
        {!! Form::hidden('attachment3_w', 4096) !!}
        {!! Form::hidden('attachment3_h', 4096) !!}        
    </div>
</div>
<div class="form-group">
    {!! Form::label('attachment4', 'Image 4', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('attachment4') !!}
        {!! Form::hidden('attachment4_w', 4096) !!}
        {!! Form::hidden('attachment4_h', 4096) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Description*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', old('description',$items->description), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('technical_spec', 'Technical spec*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('technical_spec', old('technical_spec',$items->technical_spec), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('other_terms', 'Other terms*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('other_terms', old('other_terms',$items->other_terms), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('commercial_terms_condition', 'Commercial terms and condition*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('commercial_terms_condition', old('commercial_terms_condition',$items->commercial_terms_condition), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('coreadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('coreadmin.route').'.items.index', trans('coreadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection