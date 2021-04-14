@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <!-- <h1>{{ trans('coreadmin::templates.templates-view_create-add_new') }}</h1> -->

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name_of_company', 'Select Party*', array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                <select class="form-control selectedParty" name="selectedParty" >
                    @foreach( $party as $k => $v )
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 10px">
        <div class="form-group">
            {!! Form::label('name_of_company', 'Name Item*', array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                <select class="form-control selectedItem" name="party">
                    @foreach( $items as $k => $v )
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>



{!! Form::open(array('route' => 'generate.word.file', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

    <div class="row" style="margin-top: 100px">
        <h4 style="text-align: center;font-weight: 700;font-size: 26px;padding: 20px 0px 20px 0">Party Information</h4>
        <div class="col-md-12 selectedParty" >
            <div class="form-group">
                {!! Form::label('name_of_company', 'Name of company*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('name_of_company', old('name_of_company'), array('class'=>'form-control name_of_company')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('address', old('address'), array('class'=>'form-control address')) !!}                
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('phone', old('phone'), array('class'=>'form-control phone')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('email', old('email'), array('class'=>'form-control email')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('contact_person_name', 'Contact person name*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('contact_person_name', old('contact_person_name'), array('class'=>'form-control contact_person_name')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('contact_person_mobile', 'Contact person mobile*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('contact_person_mobile', old('contact_person_mobile'), array('class'=>'form-control contact_person_mobile')) !!}
                </div>
            </div>
        </div>
        <h4 style="text-align: center;font-weight: 700;font-size: 26px;padding: 20px 0px 20px 0">Item Data</h4>
        <div class="col-md-12 selectedItem">
            <div class="form-group">
                {!! Form::label('item_name', 'Item Name*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('item_name', old('item_name'), array( 'id' => 'item_name' ,'class'=>'form-control item_name')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('item_model', 'Item Model*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('item_model', old('item_model'), array( 'id' => 'item_model' ,'class'=>'form-control item_model')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('description', old('description'), array( 'id' => 'description' ,'class'=>'form-control description')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('technical_spec', 'Technical spec*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('technical_spec', old('technical_spec'), array( 'id' => 'technical_spec' ,'class'=>'form-control technical_spec ckeditor')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('other_terms', 'Other terms*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('other_terms', old('other_terms'), array( 'id' => 'other_terms' ,'class'=>'form-control other_terms ckeditor')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('commercial_terms_condition', 'Commercial terms and condition*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('commercial_terms_condition', old('commercial_terms_condition'), array( 'id' => 'commercial_terms_condition' ,'class'=>'form-control commercial_terms_condition ckeditor')) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
          {!! Form::submit( trans('coreadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    
@endsection