<?php
	require_once("CommonAction.php");
	require_once("DAO/Content.php");

	class TablesAction extends CommonAction {

		public $sensors;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			$this->sensors = Content::getSensors();
		}
	}