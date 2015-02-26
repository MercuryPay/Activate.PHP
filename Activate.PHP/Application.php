<?php
	include("Model/Submission.php");
	include("Model/MerchantData.php");
	include("View/AppDoc.php");
	include("Helpers/ActivateServiceHelper.php");

	$contextName = 'Lead';
	$view = 'basic';
	
	switch ($_REQUEST["view"]){
		case "detailed":
			$contextName = 'Qualified';
			$view = 'detailed';
			break;
		case "status":
			$view = 'status';
			break;
		default:
			$view = 'basic';
			break;
	}
	$model = new MerchantData($contextName);
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($view == 'status'){
			$submission = ActivateServiceHelper::getStatusRequestFromActivate(new Submission());
		}
		else{
			$submission = ActivateServiceHelper::postSubmissionToActivate($model);
		}
				
		if($submission->cmdStatus == "Success") $view = 'status';
		
	}
	else{
		$submission = new Submission();
		$submission->model = $model;
	}
	$submission->view = $view;
	
	$doc = new AppDoc($submission);

	echo $doc->buidDocument();
	
?>