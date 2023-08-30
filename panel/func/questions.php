<?php

echo '
<div id="radio_opt_clone" style="">
								<div class="callout callout-info">
								<table width="100%" class="table">
									<colgroup>
										<col width="10%">
										<col width="80%">
										<col width="10%">
									</colgroup>
									<thead>
										<tr class="">
											<th class="text-center"></th>

											<th class="text-center">
												<label for="" class="control-label">Label</label>
											</th>
											<th class="text-center"></th>
										</tr>
									</thead>
									<tbody>
										<tr class="">
											<td class="text-center">
												<div class="icheck-primary d-inline" data-count = "1">
													<input type="radio" id="radioPrimary1" name="radio" checked="">
													<label for="radioPrimary1">
													</label>
												</div>
											</td>

											<td class="text-center">
												<input type="text" class="form-control form-control-sm check_inp"  name="label[]">
											</td>
											<td class="text-center"></td>
										</tr>
										<tr class="">
											<td class="text-center">
												<div class="icheck-primary d-inline" data-count = "2">
													<input type="radio" id="radioPrimary2" name="radio" >
													<label for="radioPrimary2">
													</label>
												</div>
											</td>

											<td class="text-center">
												<input type="text" class="form-control form-control-sm check_inp"  name="label[]">
											</td>
											<td class="text-center"></td>
										</tr>
									</tbody>
								</table>
								<div class="row">
								<div class="col-sm-12 text-center">
									<button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))"><i class="fa fa-plus"></i> Add</button>
								</div>
								</div>
								</div>
							</div>
'
?>