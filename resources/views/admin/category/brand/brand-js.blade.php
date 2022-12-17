<script type="text/javascript">
    $('body').on('click', '#brand_modal_open', function() {
        let cat_id = $(this).data('id');
        $.get("brand/edit/" + cat_id, function(data) {
            console.log(data.id);
            $('#edit_brand_name').val(data.brand_name);
            $('#old_brand_logo').val(data.brand_logo);
            $('#brand_id').val(data.id);
        });
    });
</script>
