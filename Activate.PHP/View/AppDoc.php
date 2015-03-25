<?php
	include_once('Model/Submission.php');
	include_once('Model/MerchantData.php');
	include_once('View/_submissionFormView.php');
	include_once('View/_statusFormView.php');
				
	class AppDoc{
		function __construct(Submission $submission){
			$this->submission = $submission;
		}

		private $submission;
		
		public function buidDocument(){
			$body = $this->buildBody();

			return "<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8' />
		<title>Business Profile Signup Form - Contact Request - Merchant Application</title>
		<meta name='viewport' content='width=device-width' />
		<link href='css/site.css' rel='stylesheet' />
		<link href='css/default.css' rel='stylesheet' />
		<script src='scripts/modernizr-2.7.1.js'></script>
		<script src='scripts/jquery-2.0.3.js'></script>
		<script src='scripts/jquery.validate.js'></script>
		<script src='scripts/jquery.validate.unobtrusive.js'></script>
	</head>
$body
</html>
			";
		}

		private function buildBody(){
			
			$view = $this->submission->view;
			
			$contextName = $this->submission->model->ContextName;

			$basicLink = "<a href='Application.php?view=basic'>Basic Application</a>";
			$detailedLink = "<a href='Application.php?view=detailed'>Detailed Application</a>";
			$statusLink = "<a href='Application.php?view=status'>Check Status</a>";

			switch ($view){
				case "basic":
					$basicLink = "Basic Application";
					break;
				case "detailed":
					$detailedLink = "Detailed Application";
					break;
				case "status":
					$statusLink = "Check Status";
					break;
				default:
					break;
						
			}

			if($view=="status"){
				$form = _statusFormView::buildForm($this->submission);
			}
			else
			{
				$form = _submissionFormView::buildForm($this->submission);
			}
				
			return "<body>
	<header>
		<div class='content-wrapper'>
			<div class='float-left'>
				<p class='site-title'>
					<a href='Application.php?view=basic'>Merchant Application</a>
				</p>
			</div>
			<div class='float-right'>
				<nav>
					<ul id='menu'>
						<li>$basicLink</li>
						<li>$detailedLink</li>
						<li>$statusLink</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div id='body'>
$form
	</div>
	
	<footer> 
		<div class='content-wrapper'>
			<div class='float-left'>
				<p>&copy; 2014 - Mercury</p>
			</div>
		</div>
	</footer>
</body>
";
		}
		
	}
?>
