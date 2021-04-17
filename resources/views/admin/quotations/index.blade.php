@extends('admin.layouts.master')

@section('content')

{{-- <p>{!! link_to_route(config('coreadmin.route').'.quotations.create',
    trans('coreadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
<p> --}}
    <a href="{{ route('generate.excel') }}" class="btn btn-info btn-sm">
        <i class="fa fa-users"></i>
        <span class="title">Genarate Quotation</span>
    </a>
</p>
@if ($quotations->count())
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">{{ trans('coreadmin::templates.templates-view_index-list') }}</div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-hover table-responsive datatable" id="datatable">
            <thead>
                <tr>
                    <th>
                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                    </th>
                    <th>Name Of Company</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Contact Person Name</th>
                    <th>Item Name</th>
                    <th>Item Model</th>
                    <th>Price</th>
                    <th>Image 1</th>


                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($quotations as $row)
                <tr>
                    <td>
                        {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                    </td>
                    <td>{{ $row->name_of_company }}</td>
                    <td>{{ $row->address }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->contact_person_name }}</td>
                    <td>{{ $row->item_name }}</td>
                    <td>{{ $row->item_model }}</td>
                    <td>{{ $row->price }}</td>
                    <td>
                        <img src="{{ asset('/uploads/'.$row->attachement1) }}" alt="" width="100">
                    </td>

                    <td>

                        <a href="{{ route('generate.quotaion',$row->id) }}" target="_blank" class="btn btn-success btn-sm">Generate</a>
                        
                        {!! link_to_route(config('coreadmin.route').'.quotations.edit',
                        trans('coreadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn
                        btn-xs btn-info')) !!}
                        {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' =>
                        "return confirm('".trans("coreadmin::templates.templates-view_index-are_you_sure")."');",
                        'route' => array(config('coreadmin.route').'.quotations.destroy', $row->id))) !!}
                        {!! Form::submit(trans('coreadmin::templates.templates-view_index-delete'), array('class' =>
                        'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-danger" id="delete">
                    {{ trans('coreadmin::templates.templates-view_index-delete_checked') }}
                </button>
            </div>
        </div>
        {!! Form::open(['route' => config('coreadmin.route').'.quotations.massDelete', 'method' => 'post', 'id' =>
        'massDelete']) !!}
        <input type="hidden" id="send" name="toDelete">
        {!! Form::close() !!}
    </div>
</div>
@else
{{ trans('coreadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
<script>
    $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('coreadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
</script>
@stop