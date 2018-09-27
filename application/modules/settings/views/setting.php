
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<form action="<?= base_url() ?>settings/changeAutoLogoutStatus" >

<!-- <select name="status">
  <option value="0">off</option>
  <option value="1">on</option>
</select> -->
<div class="col-md-5">
 <label for="search" class="col-md-4 control-label">Auto Refresh Button </label>
<input id="toggle-one" checked type="checkbox" name="status" value="1">
</div><br>

<div class="col-md-3">
<button class="btn  btn-outline-primary">save</button>
</div>

</form> 
<script>
  $(function() {
    $('#toggle-one').bootstrapToggle();
  })
</script>