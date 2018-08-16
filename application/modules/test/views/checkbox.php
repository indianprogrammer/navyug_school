<label><input type="checkbox" name="sample" class="selectall"/> Select all</label>



    <label><input type="checkbox" name="sample[]"/>checkbox1</label><br />
    <label><input type="checkbox" name="sample[]"/>checkbox2</label><br />
    <label><input type="checkbox" name="sample[]"/>checkbox3</label><br />
    <label><input type="checkbox" name="sample[]"/>checkbox4</label><br />


<script>

$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('input').attr('checked', true);
    } else {
        $('input').attr('checked', false);
    }
});
</script>