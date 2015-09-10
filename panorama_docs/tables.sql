-- #1
create table BRDRequirements (
	id INT primary key,
	BRD_ref_number VARCHAR(15),
	BRD_date DATETIME,				-- check if DATE is preferrable?
	approved BOOLEAN,
	approved_by VARCHAR(40),
	approval_date DATETIME,			-- check if DATE is preferrable?
	stakeholders VARCHAR(122),
	stakeholder_BU VARCHAR(100),
	expected_impact_BU VARCHAR(100),
	stakeholder_approved BOOLEAN,
	stk_app_date DATETIME,			-- WTF is this?? check if DATE is preferrable?
	responsible VARCHAR(40),
	accountable VARCHAR(40),
	consulted VARCHAR(40),
	informed VARCHAR(40)
);

-- #2
create table TechDevNeed (
	id INT primary key AUTO_INCREMENT,
	tech_requirement BOOLEAN,
	dev_time_estimate VARCHAR(40),
	dev_start_date DATETIME,		-- check if DATE is preferrable?
	dev_end_date DATETIME,			-- check if DATE is preferrable?
	responsible VARCHAR(40),
	accountable VARCHAR(40),
	consulted VARCHAR(40),
	informed VARCHAR(40)
);

-- #3
create table ContentNeed (
	id INT primary key AUTO_INCREMENT,
	content_creation_enquired BOOLEAN,
	content_created_by VARCHAR(40),
	content_approved BOOLEAN,
	content_approval_by VARCHAR(40),
	responsible VARCHAR(40),
	accountable VARCHAR(40),
	consulted VARCHAR(40),
	informed VARCHAR(40)
);

-- #4
create table TrainingNCommunicationPlan (
	id INT primary key AUTO_INCREMENT,
	communicated_to_user BOOLEAN,
	internal_BU_communicated VARCHAR(122),
	communication_sent_date DATETIME,	-- check if DATE is preferrable?
	training_required BOOLEAN,
	training_provided BOOLEAN,
	training_start_date DATETIME,		-- check if DATE is preferrable?
	training_end_date DATETIME,			-- check if DATE is preferrable?
	responsible VARCHAR(40),
	accountable VARCHAR(40),
	consulted VARCHAR(40),
	informed VARCHAR(40)
);

-- #5
create table CapabilitiesEnhancement (
	id INT primary key AUTO_INCREMENT,
	capability_enhancement BOOLEAN,
	capability_enhancement_impact_areas VARCHAR(150),		-- check what this field is about?
	capability_enhancement_measurement VARCHAR(150)		-- check what this field is about?
);

-- #6
create table CostBenefit (
	id INT primary key AUTO_INCREMENT,
	checked_by VARCHAR(122),
	cost_assigned_to_BU BOOLEAN,			-- check if it is boolean field
	pass_on_by VARCHAR(122),
	cost_approval BOOLEAN,
	approved_by VARCHAR(40)
);

-- #7
create table RiskMitigationPlan (
	id INT primary key AUTO_INCREMENT,
	prelaunch_checklist VARCHAR(200),		-- Checklist is attachment. Store the url/storage location in DB
	UAT_required BOOLEAN,					-- User Acceptance Testing
	UAT_conducted_by VARCHAR(122),
	UAT_date DATETIME, 					-- check if DATE is preferrable?
	vetted_by_stakeholders BOOLEAN,
	feedback_taken_from VARCHAR(122),
	feedback VARCHAR(200),
	feedback_incorporated BOOLEAN,
	feedback_incorporation_date DATETIME,	-- check if DATE is preferrable?
	final_UAT VARCHAR(40),
	final_UAT_conducted_by VARCHAR(40),
	final_sign_off BOOLEAN,
	GTM_sign_off BOOLEAN,
	SVP_sign_off BOOLEAN
);

-- #8
create table GoLivePlan (
	id INT primary key AUTO_INCREMENT,
	launch_date DATETIME,				-- check if DATE is preferrable?
	post_launch_support_needed BOOLEAN,
	post_launch_support_provided_by VARCHAR(40),
	program_status VARCHAR(40),
	post_launch_risk_assessment_done BOOLEAN,
	post_launch_risk_assessment_done_by VARCHAR(40),
	remarks VARCHAR(100)
);

-- #9
create table Closure (
	id INT primary key AUTO_INCREMENT,
	program_closure_date DATETIME,		-- check if DATE is preferrable?
	program_closure_comment VARCHAR(100)
);


-- DROP TABLES command
-- DROP TABLE BRDRequirements, CapabilitiesEnhancement, Closure, ContentNeed, CostBenefit, GoLivePlan, RiskMitigationPlan, TechDevNeed, TrainingNCommunicationPlan