<div class="row" >
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header with-border">
                <h2 class="card-title">Add Organization</h2>
            </div>
            <?php if($status=$this->session->flashdata('status')){?>
               <div class="alert alert-success">
                <?php echo $status ;?>
            </div>                 
        <?php } ?> 
        <?= form_open_multipart('superadmin/add') ?>
        <div class="card-body">
            <div class="row clearfix">
                <div class="col-md-5 col-sm-12">
                    <label for="name" class="control-label"><span class="text-danger">*</span>Organization Name</label>
                    <div class="form-group">
                        <input type="text" name="name" value="<?= $this->input->post('name') ?>"
                        class="form-control" id="name"  autofocus/>
                        <span class="text-danger"><?= form_error('name') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                    <div class="form-group">
                        <input type="text" name="email" value="<?= $this->input->post('email') ?>"
                        class="form-control" id="email"/>
                        <span class="text-danger"><?= form_error('email') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="contact_pri" class="control-label"><span class="text-danger">*</span>Contact Primary</label>
                    <div class="form-group">
                        <input type="text" name="contact_pri" maxlength="13" value="<?= $this->input->post('contact_pri') ?>"
                        class="form-control" id="contact_pri" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                        <span class="text-danger"><?= form_error('contact_pri') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="contact_sec" class="control-label">Contact Secondry</label>
                    <div class="form-group">
                        <input type="text" name="contact_sec"  maxlength="13" value="<?= $this->input->post('contact_sec') ?>"
                        class="form-control" id="contact_sec" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                        <span class="text-danger"><?= form_error('contact_sec') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="country_id" class="control-label"><span class="text-danger">*</span>Country</label>
                    <div class="form-group">
                        <select name="country" id="country" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach ($country as $row) {  ?>
                            <option value="<?= $row['id'] ?>"   <?=set_select('country',  ''.$row['id']).'',true?> ><?= $row['country_name'] ?> </option>
                           <?php  } ?>
                        </select>
                        <span class="text-danger"><?= form_error('country') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="state_id" class="control-label"><span class="text-danger">*</span>State</label>
                    <div class="form-group">
                        <select name="state" id="state" class="form-control">
                            <option value="">Select State</option>

                        </select>
                        <span class="text-danger"><?= form_error('state') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="city_id" class="control-label"><span class="text-danger">*</span>City</label>
                    <div class="form-group">
                        <select name="city" id="city" class="form-control">
                            <option value="">Select City</option>

                        </select>
                        <span class="text-danger"><?= form_error('city') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
                    <div class="form-group">
                        <textarea name="address" class="form-control"
                        id="address"><?= $this->input->post('address') ?></textarea>
                        <span class="text-danger"><?= form_error('address') ?></span>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12">
                    <label for="latlong" class="control-label"><span class="text-danger">*</span>Location</label>
                    <div class="form-group" id="showlat">
                        <input type="text" name="latlong" 
                        class="form-control" id="latlong" onclick="latMap();" data-toggle="tooltip" data-placement="top" title="click on field and select your location in google map " autocomplete="off" />
                        <!-- <a href="#myMapModal" data-toggle="modal">open map</a> -->
                        <span class="text-danger"><?= form_error('latlong') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-md-5" id="dvMap" > </div>
                <div class="col-md-5 col-sm-12">
                    <label for="logo" class="control-label"> Upload Logo</label>
                    <div class="form-group">
                        <input type="file" name="logo" value="<?= $this->input->post('logo') ?>" 
                        class="form-control" id="logo"/>
                        <span class="text-danger"><?= form_error('logo') ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="banner" class="control-label"> Upload
                    Banner</label>
                    <div class="form-group">
                        <input type="file" name="banner" value="<?= $this->input->post('banner') ?>"
                        class="form-control"   id="banner"/>
                        <span class="text-danger"><?= form_error('banner') ?></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
            </button>
        </div>
        <?= form_close() ?>
    </div>
</div>
</div>
<div class="modal fade" id="myMapModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                

            </div>
            <div class="modal-body " id="showMap" style="height: 600px">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript">
    var selectState = '<option value="">Select State</option>';
    var selectCity = '<option value="">Select City</option>';
    $(document).ready(function () {
        $('#country').change(function () {
            var country_id = $('#country').val();
            console.log(country_id);
            if (country_id != '') {
                populateState(country_id);
            }else {
                $('#state').html(selectState);
                $('#city').html(selectCity);
            }
        });
        $('#state').change(function () {
            var state_id = $('#state').val();
            console.log(state_id);
            if (state_id != '') {
                populateCity(state_id);
            }
            else {
                $('#city').html(selectCity);
            }
        });
    });

    function populateCity(state_id){
        console.log(state_id);
        $.ajax({
            url: "<?=base_url() ?>superadmin/fetch_city",
            method: "POST",
            data: {state_id: state_id},
            success: function (data) {
                                // console.log(obj);
                                var obj = JSON.parse(data);
                                if(obj)
                                {
                                        // console.log(obj);
                                        var i;
                                        var city;
                                    // console.log(obj);
                                    for (i = 0; i < obj.length; i++) {
                                        city += '<option value="' + obj[i].id + '">' + obj[i].city_name + '</option>';
                                        $('#city').html(city);
                                    }
                                }
                                else
                                {
                                   $('#city').html('<option value="">city not available</option>');
                               }
                           } 
                       });
    }
    function populateState(country_id)
    {
        $.ajax({
            url: "<?=base_url() ?>superadmin/fetch_state",
            method: "POST",
            data: {country_id: country_id},
            success: function (data) {
                console.log(data);
                            // console.log(data);
                            var obj = JSON.parse(data);
                            if(obj)
                            {
                                var i;
                                var state = selectState;
                                for (i = 0; i < obj.length; i++) {
                                    state += '<option value="' + obj[i].id + '">' + obj[i].state_name + '</option>';
                                    $('#state').html(state);
                                }
                                $('#city').html(selectCity);
                            }
                            else
                            {
                               $('#state').html('<option value="">state not available</option>');
                               $('#city').html('<option value="">city not  avilable</option>');
                           }
                       }
                   });

    }

</script>
<!-- dropdown city and state ajax  end -->

<!-- only number allowed validation -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
 function latMap() {
    $(document).ready(function()
    {
        var mapOptions = {
            center: new google.maps.LatLng(21.198548, 81.259158),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("showMap"), mapOptions);
        $('#myMapModal').modal("show");
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
