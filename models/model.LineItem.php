<?php

	require_once "model.BRDRequirement.php";
	require_once "model.TechDevNeed.php";
	require_once "model.ContentNeed.php";
	require_once "model.TrainingNCommunicationPlan.php";
	require_once "model.CapabilitiesEnhancement.php";
	require_once "model.CostBenefit.php";
	require_once "model.RiskMitigationPlan.php";
	require_once "model.GoLivePlan.php";
	require_once "model.Closure.php";

	class LineItem {
		public $id, $name;
		public $BRDRequirement;
		public $TechDevNeed;
		public $ContentNeed;
		public $TrainingNCommunicationPlan;
		public $CapabilitiesEnhancement;
		public $CostBenefit;
		public $RiskMitigationPlan;
		public $GoLivePlan;
		public $Closure;

		public function __construct( $id = -1 );		// 1. get the name by id ; 2. Invoke getMemberVariables
		public function getMemberVariables();		// invokes other member functions for populating module objects
		public function getBRDRequirements();
	}
?>