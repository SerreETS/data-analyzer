<?php 
	require_once("action/DAO/Connection.php");

	session_start();
	
	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_ADMIN = 1;

		private $pageVisibility;

		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {
			if (!empty($_GET["logout"])) {

				session_unset();
				session_destroy();
				session_start();
			}

			// Si variable n'existe pas...
			if (empty($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] < $this->pageVisibility) {
				header("location:index.php");
				exit;
			}

			$this->executeAction(); // Template method pattern
			Connection::closeConnection();
		}

		protected abstract function executeAction();

		public function getUsername() {
			$username = "invité";

			if ($this->isLoggedIn()) {
				$username = $_SESSION["username"];
			}

			return $username;
		}

		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}
	}