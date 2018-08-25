 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script><div class="container">
  <br />
  <br />
  <h3 align="center">Autocomplete Search Box using Typeahead in Codeigniter</h3>
  <br />
  <div id="prefetch">
   <input type="text" name="search_box" id="search_box" class="form-control input-lg typeahead" placeholder="Search Here" /><input type="text" name="email" id="email">
  </div>
 </div>
</body>
</html>
<script>
$(document).ready(function(){
  var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>test/fetch',
   remote:{
    url:'<?php echo base_url(); ?>test/fetch/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .typeahead').typeahead(null, {
   name: 'sample_data',
   display: 'name',
   source:sample_data,
   limit:10,
   templates:{
    suggestion:Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-3" style="padding-right:5px; padding-left:5px;">{{name}}</div><div class="col-md-3" style="padding-right:5px; padding-left:5px;">{{email}}</div></div>')
   }
  });
  console.log(name);
  $('#email').val(name);
});
</script>