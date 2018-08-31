<div class="modal fade light-blue-modal in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block; padding-right: 17px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-big choose-last-tax" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title text-center black">Add a Tax</h4>
			</div>
			<div class="modal-body">
				
				
<div id="tax-rates">
	



	<br>
	
	<div class="row bold">
		
	
		<div class="col-xs-4"><strong>Tax Name</strong></div>
		
		<div class="col-xs-4 text-center"><strong>Tax Rate %</strong></div>
				
		
		<div class="col-xs-4 text-center"></div>

	</div>

	<br>
		

	<div class="row row-highlight">
		
		<a class="choose-tax acts-as-link darkblue bold" data-index="972285" data-name="gst 12.0%">
			<div class="col-xs-4 pad underline">gst</div>
			<div class="col-xs-4 pad text-center">12.0 %</div>
		</a>

			
	
		<div class="col-xs-4 pad text-right" style="padding-right: 20px;">
			<a data-confirm="Are you sure?" class="" data-remote="true" rel="nofollow" data-method="delete" href="/tax_rates/972285?item_id=27113272">
			<i class="fa fa-times icon-666 red" title="Delete Tax"></i>
</a>		</div>
		
	</div>
	  
	

</div>




				<div id="new-tax-rate" class="text-center">

	<a class="btn btn-link darkblue bold underline medium" data-toggle="collapse" href="#collapse-tax-rate" aria-expanded="false" aria-controls="collapseExample" id="add-new-tax">Add New Tax</a>
	<br>
	<br>
	
	<div class="collapse" id="collapse-tax-rate">		

		<form class="new_tax_rate" id="new_tax_rate" action="/tax_rates" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓">
		
		<input type="hidden" name="item_id" id="item_id" value="27113272">

		<div class="row">
	
			<div class="col-xs-4 form-group text-center">
				<label>Tax Name</label>
				<input class="form-control" placeholder="Tax Name" maxlength="100" size="100" type="text" name="tax_rate[name]" id="tax_rate_name">
			</div>
	
			<div class="col-xs-4 form-group text-center">
				<label>Tax Rate %</label>
				<input class="form-control tax-rate" placeholder="Tax Rate %" maxlength="100" size="100" type="text" value="0.0" name="tax_rate[rate]" id="tax_rate_rate">
			</div>
			
			<div class="col-xs-4 form-group text-center">
				<label for="tax_rate_compound" data-toggle="tooltip" data-placement="top" title="" class="tax-compound-label" data-original-title="Used in the rare event you need a compound (or stacked) tax calculated in addition to the primary tax (only if applicable in your territory and you need two taxes for one item).">Compound Tax?</label><br>
				<input name="tax_rate[compound]" type="hidden" value="0"><input class="input-lg" style="margin: 0; height: 40px;" type="checkbox" value="1" name="tax_rate[compound]" id="tax_rate_compound">
			</div>
	
		</div>

		<div class="row text-center">
			<div class="col-xs-12 form-group">
				<button name="button" type="button" class="btn btn-primary btn-lg submit-tax-rate" data-disable-with="Save Tax">Save Tax</button>
			</div>
		</div>

</form>
	</div>

</div>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link close-window-link" data-dismiss="modal">Close</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>