<?=form_open('enquiry/add',array("class"=>"form-horizontal")); ?>
<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= base_url() ?>school/index">Home</a></li>
  <li class="breadcrumb-item ">Enquiry</li>
  <li class="breadcrumb-item active">Add Enquiry</li>
</ul>
<h2 > ENQUIRY FORM </h2>
	<div class="form-group">
		<label for="trainer_Name" class="col-md-4 control-label"><span class="text-danger">*</span> Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?=$this->input->post('name'); ?>" class="form-control" id="Name" />
			<span class="text-danger"><?=form_error('name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" maxlength="13" value="<?=$this->input->post('mobile'); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?=form_error('mobile');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?=$this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?=form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-8">
			<textarea name="address" class="form-control" id="address"><?=$this->input->post('address'); ?></textarea>
			<span class="text-danger"><?=form_error('address');?></span>
		</div>
	</div>
            <div class="form-group" >
	               <label for="latlong" class="control-label col-md-4 col-sm-12"><span class="text-danger">*</span>Location</label>
	                     <div class="col-md-8" id="showlat">
                            <input type="text" name="latlong" class="form-control" id="latlong" onclick="latMap();"  />
                            <span class="text-danger"><?= form_error('latlong') ?></span>
                         <div class="col-md-2" id="dvMap" style="height: 100px;" > </div>
                        </div>
            </div>
		      <div class="form-group">
				<label for="remarks" class="col-md-4 control-label"><span class="text-danger">*</span>Remarks</label>
				<div class="col-md-8">
					<input type="text" name="remarks" value="<?=$this->input->post('remarks'); ?>" class="form-control" id="remarks" />
					<span class="text-danger"><?=form_error('remarks');?></span>
				</div>
			</div>      
		                    
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?=form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
       function latMap() {
            $(document).ready(function()
            {
            var mapOptions = {
                center: new google.maps.LatLng(21.198548, 81.259178),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                var Latitude=e.latLng.lat();
                var Longitude=e.latLng.lng();
              var latlang='<input type="text" id="latlong" onclick="latMap()" class="form-control" name="latlong"  value="'+Latitude+' / '+Longitude+'" >';
                    $('#showlat').html(latlang);
                    // $("input:text").value(Latitude);
                 // console.log(latlang);
            });
        });
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 107)  ) {
            e.preventDefault();
        }
    });
    });
</script>