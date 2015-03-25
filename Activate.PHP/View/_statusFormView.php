<?php
	include_once("Helpers/FormHelper.php");
	include_once("Model/Submission.php");
	
	class _statusFormView{
		public static function buildForm(Submission $submission){
			
			$form = _statusFormView::buildInnerForm($submission);
			
			return  "
		<section class='content-wrapper main-content clear-fix'>
			<div
				style='width: 100%; padding: 25px; -moz-box-sizing: border-box; box-sizing: border-box; -webkit-box-sizing: border-box;'>
				<h1 class='editor-h1' style='text-align: center;'>Application Status Check</h1>
				<h2 class='editor-h2' style='text-align: center;'>FOR MERCURY CREDIT CARD PROCESSING SERVICES</h2>
			</div>
$form
		</section>
		";
			
		} 
		
		private static function buildInnerForm(Submission $submission){
			$view = $submission->view;
			$layout = _statusFormView::buildLayout($submission);
			
			if($submission->cmdStatus != "Success" && $submission->textResponse != null){
			
				$error = "
				<div>
				<span class='field-validation-error'>$submission->textResponse</span>
				</div>
				";
			}

			return "
			<form action='Application.php?view=status' method='post'>
				<fieldset>
					<input name='view' id='view' type='hidden' value='$view' />
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
		
		private static function buildLayout(Submission $submission){
			$list = array(
					'applicationId', 'cmdStatus', 'textResponse', 'merchantId', 'terminalId'
			);
			//
			$fields = FormHelper::getFormItemsDisplay($submission, $list);
			
			
			return "
			<div class='panelDiv'>
				<h2 class='editor-h2'>Application Status</h2>
$fields
			</div>
			";
		}
		
	}
?>
