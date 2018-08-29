
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>


<?= $S=$this->uri->segment(1); ?>

<form id="form1" method="post">
  <input type="text" name="vv">
  <input type="button" onclick="submitForm('<?= base_url() ?>test/e')" value="submit 1" />
  <input type="button" onclick="submitForm('page2.php')" value="submit 2" /><?= $S ?>
</form>