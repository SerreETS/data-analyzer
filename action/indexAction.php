<?php
	require_once("CommonAction.php");
	require_once("DAO/Content.php");

	class IndexAction extends CommonAction {

		public $temperature;
		public $humidity;
		public $data = [];

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			$hours = 6;
			$status = 'DRY';
			$role = 'T';

			$temperature = Content::getData($hours, $role, $status);

			$role = 'H';
			$humidity = Content::getData($hours, $role, $status);

			$role = 'VL';
			$visibleLight = Content::getData($hours, $role, $status);

			$role = 'IR';
			$infraRed = Content::getData($hours, $role, $status);

			foreach($temperature as &$val){
			    $val['Temperature'] = $val['DataValue'];
			    unset($val['DataValue']);
			}
			foreach($humidity as &$val){
			    $val['Humidity'] = $val['DataValue'];
			    unset($val['DataValue']);
			}
			foreach($visibleLight as &$val){
			    $val['VisibleLight'] = $val['DataValue'];
			    unset($val['DataValue']);
			}
			foreach($infraRed as &$val){
			    $val['InfraRed'] = $val['DataValue'];
			    unset($val['DataValue']);
			}


			for($i = 0; $i < count($temperature); $i++) {
                array_push($this->data, $temperature[$i]);
            }
           	for($i = 0; $i < count($humidity); $i++) {
                array_push($this->data, $humidity[$i]);
            }
            for($i = 0; $i < count($visibleLight); $i++) {
                array_push($this->data, $visibleLight[$i]);
            }
            for($i = 0; $i < count($infraRed); $i++) {
                array_push($this->data, $infraRed[$i]);
            }
		}
	}