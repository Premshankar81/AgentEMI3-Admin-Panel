<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">


<!-- START READY FOR NEW PROJECT -->

		<tr>
			<td align="center">
				
				<table width="720" class="col-600" align="center" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					<tbody><tr>
						<td height="50"></td>
					</tr>
					<tr>


						<td align="center" bgcolor="#34495e">
							<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="35"></td>
								</tr>


								<tr>
									<td align="center" style="font-family: 'Raleway', sans-serif; font-size:20px; color:#f1c40f; line-height:24px; font-weight: bold;">IIDD Qatar Daily Report</td>
								</tr>


								<tr>
									<td height="20"></td>
								</tr>


								<tr>
									<td align="center" style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height: 1px; font-weight: 300;">
										<?php echo date('Y M d') ?>
									</td>
								</tr>


								<tr>
									<td height="40"></td>
								</tr>

							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>


<!-- END READY FOR NEW PROJECT -->


<!-- START PRICING TABLE -->

		<tr>
			<td align="center">
				<table width="700" class="col-600" align="center" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					<tbody><tr>
						<td height="50"></td>
					</tr>
					<tr>
						<td>

							<table style="border:1px solid #e2e2e2;" class="col2" width="150" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Expense Credit</td>
								</tr>


								<tr>
									<td align="center">
										<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td height="20"></td>
											</tr>

											<tr align="center" style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 44px;">{{$result['credit']}} QR</td>
											</tr>



										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
							</tbody>
							</table>
						</td>
						<td>

							<table style="border:1px solid #e2e2e2;" class="col2" width="150" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Expense Debit</td>
								</tr>


								<tr>
									<td align="center">
										<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td height="20"></td>
											</tr>

											<tr align="center" style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 44px;">{{$result['debit']}} QR</td>
											</tr>



										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
							</tbody>
							</table>
						</td>
						<td>
						<table style="border:1px solid #e2e2e2;" class="col2" width="150" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Balance</td>
								</tr>


								<tr>
									<td align="center">
										<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td height="20"></td>
											</tr>

											<tr align="center" style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 44px;">{{$result['balance']}} QR</td>
											</tr>


										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
							</tbody>
						</table>

						</td>
					</tr>

					<tr>
						<td>

							<table style="border:1px solid #e2e2e2;" class="col2" width="200" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Customers</td>
								</tr>


								<tr>
									<td >
										<table  width="237" height="300px" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody>

											<tr style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 34px;">
													<?php if(count($result['customers']) != 0){ ?>
													    @foreach($result['customers'] as $customer)
														    <p style="height: 0px;font-size: 15px;margin: 0px;padding: 15px;">- {{$customer['name']}}</>
														@endforeach
														<?php } else { ?>
													        <p style="height: 0px;font-size: 15px;margin: 0px;padding: 15px;">NA</p>
													    <?php } ?>
													
												</td>
											</tr>



										</tbody></table>
									</td>
								</tr>
							
							</tbody>
							</table>
						</td>
						<td>

							<table style="border:1px solid #e2e2e2;" class="col2" width="200" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Projects</td>
								</tr>


								<tr>
									<td align="center">
										<table class="insider" width="237" height="300px" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody>

											<tr style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 44px;">
													 <?php if(count($result['projects']) != 0){ ?>
													 @foreach($result['projects'] as $project)
														    <p style="height: 0px;font-size: 15px;margin: 0px;padding: 15px;">- {{$project['name']}}</>
													@endforeach
													<?php } else { ?>
													    <p style="height: 0px;font-size: 15px;margin: 0px;padding: 15px;">NA</p>
													<?php } ?>
												</td>
											</tr>



										</tbody></table>
									</td>
								</tr>
							
							</tbody>
							</table>
						</td>

						<!--<td>

							<table style="border:1px solid #e2e2e2;" class="col2" width="200" border="0" cellpadding="0" cellspacing="0">


								<tbody><tr>
									<td height="40" align="center" bgcolor="#2b3c4d" style="font-family: 'Raleway', sans-serif; font-size:16px; color:#f1c40f; line-height:30px; font-weight: bold;">Payments Link</td>
								</tr>


								<tr>
									<td align="center">
										<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td height="20"></td>
											</tr>

											<tr align="center" style="line-height:0px;">
												<td style="font-family: 'Lato', sans-serif; font-size:25px; color:#2b3c4d; font-weight: bold; line-height: 44px;">
													<ul>
														<li> <a href="">ASD21212</a> </li>
														<li><a href="">SAFDVF34</a> </li>
													</ul>
												</td>
											</tr>



										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
							</tbody>
							</table>
						</td>-->
						
					</tr>


				</tbody></table>
			</td>
		</tr>


<!-- END PRICING TABLE -->


<!-- START FOOTER -->

		<tr>
			<td align="center">
				<table align="center" width="720" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					<tbody><tr>
						<td height="50"></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#34495e" background="https://designmodo.com/demo/emailtemplate/images/footer.jpg" height="50">
							<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="25"></td>
								</tr>

									<tr>
									<td align="center" style="font-family: 'Raleway',  sans-serif; font-size:26px; font-weight: 500; color:#f1c40f;">IIDD Sales</td>
									</tr>
									<tr>
									<td height="25"></td>
								</tr>

								</tbody></table>



							</td></tr></tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>

<!-- END FOOTER -->

						
					
				</tbody></table>