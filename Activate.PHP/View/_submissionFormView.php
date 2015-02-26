<?php
	include("../Helpers/FormHelper.php");
	include("../Model/MerchantData.php");
	include('_dbaFieldsView.php');
	include('_legalFieldsView.php');
	include('_ownerFieldsView.php');
	include('_businessFieldsView.php');
	include('_bankingFieldsView.php');
	
	class _submissionFormView{
		public static function buildForm(Submission $submission){
			$form = _submissionFormView::buildInnerForm($submission);
			
			return  "
		<section class='content-wrapper main-content clear-fix'>
			<div
				style='width: 100%; padding: 25px; -moz-box-sizing: border-box; box-sizing: border-box; -webkit-box-sizing: border-box;'>
				<h1 class='editor-h1' style='text-align: center;'>BUSINESS PROFILE</h1>
				<h2 class='editor-h2' style='text-align: center;'>FOR MERCURY CREDIT CARD PROCESSING SERVICES</h2>
				<h3 class='editor-h3' style='text-align: center;'>(Information for application purposes only and is not a guarantee of acceptance)</h3>
				<p>
					<strong> <br />Please Note:</strong>
					The personal information you supply will be used for the
					purpose of qualifying you as a merchant account by Mercury. This
					information is held in the strictest confidence and is never sold,
					rented, or shared with any other business or third party.
				</p>
			</div>
$form
			<div class='ofac'>
				<strong>OFAC</strong> rules and regulations along with the Federal
				Banking policies and guidelines require personal owner/officer
				information for all merchant accounts. The information requested is
				in accordance to the USA Patriot Act and is used for the sole
				purpose of verifying ownership identity and qualifying for a
				merchant account.
			</div>
		</section>
		";
			
		} 
		
		private static function buildInnerForm(Submission $submission){
			$layout = _submissionFormView::buildLayout($submission->model);
			$contextName = $submission->model->ContextName;
			$view = $submission->view;
			
			$submitAction = "Basic";
			if($contextName=="Qualified") $submitAction = "Detailed";

			if($submission->cmdStatus != "Success" && $submission->textResponse != null){
				$error = "
				<div>
					<span class='field-validation-error'>$submission->textResponse</span>
				</div>
				";
			}
		
			return "
			<form action='Application.php?view=$view' method='post'>
				<fieldset>
					<input name='ContextName' id='ContextName' type='hidden' value='$contextName' />
					<legend>New Application</legend>
					$error
					<hr />
					$layout
					<hr />
					<div style='text-align: center'>
						<input type='submit' value='Submit' />
					</div>
				</fieldset>
			</form>
			";
		}
		
		private static function buildLayout(MerchantData $model){
			$dbaFields = _dbaFieldsView::buildFields($model);
			$legalFields = _legalFieldsView::buildFields($model);
			$ownerFields = _ownerFieldsView::buildFields($model);
			$businessFields = _businessFieldsView::buildFields($model);
			$bankingFields = _bankingFieldsView::buildFields($model);
				
			return "
			<table style='width: 100%;'>
				<tr>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
						$dbaFields
					</td>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
						$legalFields
					</td>
				</tr>
				<tr>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
						$ownerFields
					</td>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
						$businessFields
					</td>
				</tr>
				<tr>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
						$bankingFields
					</td>
					<td style='width: 50%; padding-left: 25px; padding-right: 25px;'>
					</td>
				</tr>
			</table>
			";
		}
		
	}
?>