<?php

	require_once "model.BRDRequirement.php";
	require_once "model.TechDevNeed.php";
	require_once "model.ContentNeed.php";
	require_once "model.TrainingNCommunicationPlan.php";
	require_once "model.CapabilitiesEnhancement.php";
	require_once "model.CostBenefit.php";
	require_once "model.RiskMitigationPlan.php";
	require_once "model.GoLivePlan.php";
	require_once "model.ClosureModel.php";
	require_once "model.BaseModel.php";

	class LineItem extends BaseModel {
		public $id, $name;
		public $BRDRequirementObject;
		public $TechDevNeedObject;
		public $ContentNeedObject;
		public $TrainingNCommunicationPlanObject;
		public $CapabilitiesEnhancementObject;
		public $CostBenefitObject;
		public $RiskMitigationPlanObject;
		public $GoLivePlanObject;
		public $ClosureModelObject;

		public function __construct( $id = -1 )		// 1. get the name by id ; 2. Invoke getMemberVariables
		{
			parent::__construct();
			$q = "SELECT * FROM lineitems WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );

			if ( $res && $res->num_rows > 0 )
				while ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					// put the not NULL checks on $row[<members>] before initializing the classes
					// $this->name = $row['name'];
					$this->name = $row['name'] == "_PROJECT_" ? "OVERALL PROJECT" : $row['name'];
					$this->BRDRequirementObject = new BRDRequirement( $row['brdrequirements_id'] );
					$this->TechDevNeedObject = new TechDevNeed( $row['techdevneed_id'] );
					$this->ContentNeedObject = new ContentNeed( $row['contentneed_id'] );
					$this->TrainingNCommunicationPlanObject = new TrainingNCommunicationPlan( $row['trainingncommunicationplan_id'] );
					$this->CapabilitiesEnhancementObject = new CapabilitiesEnhancement( $row['capabilitiesenhancement_id'] );
					$this->CostBenefitObject = new CostBenefit( $row['costbenefit_id'] );
					$this->RiskMitigationPlanObject = new RiskMitigationPlan( $row['riskmitigationplan_id'] );
					$this->GoLivePlanObject = new GoLivePlan( $row['goliveplan_id'] );
					$this->ClosureModelObject = new ClosureModel( $row['closure_id'] );
				}
			
		}
	}
?>