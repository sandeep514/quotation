<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('coreadmin/js') }}/timepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
<script src="{{ url('coreadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('coreadmin/js') }}/main.js"></script>

<script>

    $(document).on('change', '.selectedParty' , function(){
        var id = $(this).val();
        $.ajax({
            url : 'get/party/details/'+id,
            type: 'GET',
            success: function(res){
                $('.name_of_company').val(res.data.name_of_company);
                $('.address').val(res.data.address);
                $('.phone').val(res.data.phone);
                $('.email').val(res.data.email);
                $('.contact_person_name').val(res.data.contact_person_name);
                $('.contact_person_mobile').val(res.data.contact_person_mobile);
            },
            error: function(err){
                console.log(err);
            }
        });
    })
    $(document).on('change', '.selectedItem' , function(){
        var id = $(this).val();
        $.ajax({
            url : 'get/item/details/'+id,
            type: 'GET',
            success: function(res){
                $('.item_name').val(res.data.item_name);
                $('.item_model').val(res.data.item_model);
                $('.description').val(res.data.description);
                CKEDITOR.instances['technical_spec'].insertHtml(res.data.technical_spec);
                CKEDITOR.instances['other_terms'].insertHtml(res.data.other_terms);
                CKEDITOR.instances['commercial_terms_condition'].insertHtml(res.data.commercial_terms_condition);
            },
            error: function(err){
                console.log(err);
            }
        });
    })

    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: "{{ config('coreadmin.date_format_jquery') }}"
    });

    $('.datetimepicker').datetimepicker({
        autoclose: true,
        dateFormat: "{{ config('coreadmin.date_format_jquery') }}",
        timeFormat: "{{ config('coreadmin.time_format_jquery') }}"
    });

    $('#datatable').dataTable( {
        "language": {
            "url": "{{ trans('coreadmin::strings.datatable_url_language') }}"
        }
    });

</script>
