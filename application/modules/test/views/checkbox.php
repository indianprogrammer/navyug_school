<label><input type="checkbox" name="sample" class="selectalls"/> Select all</label>



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
<script>

$('.selectalls').click(function() {
    console.log("ff");
});
</script>