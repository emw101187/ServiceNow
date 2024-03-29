<?php


namespace BigCommerce\Container;


use BigCommerce\Accounts\Roles\Customer;
use BigCommerce\Schema\Queue_Table;
use BigCommerce\Schema\Reviews_Table;
use BigCommerce\Schema\User_Roles;
use Pimple\Container;

class Schema extends Provider {
	const TABLE_REVIEWS  = 'schema.table.reviews';
	const TABLE_QUEUES   = 'schema.table.queue';
	const ROLE_SCHEMA    = 'schema.roles';
	const CUSTOMER_ROLE  = 'schema.roles.customer';

	public function register( Container $container ) {
		$this->tables( $container );
		$this->roles( $container );
	}

	private function tables( Container $container ) {
		$container[ self::TABLE_REVIEWS ] = function( Container $container ) {
			return new Reviews_Table();
		};

		$container[ self::TABLE_QUEUES ] = function( Container $container ) {
			return new Queue_Table();
		};

		add_action( 'plugins_loaded', $this->create_callback( 'tables_plugins_loaded', function () use ( $container ) {
			$container[ self::TABLE_REVIEWS ]->register_tables();
			$container[ self::TABLE_QUEUES ]->register_tables();
		} ), 10, 0 );
	}

	private function roles( Container $container ) {
		$container[ self::CUSTOMER_ROLE ] = function ( Container $container ) {
			return new Customer();
		};
		$container[ self::ROLE_SCHEMA ]   = function ( Container $container ) {
			return new User_Roles( [
				$container[ self::CUSTOMER_ROLE ],
			] );
		};
		add_action( 'admin_init', $this->create_callback( 'init_roles', function () use ( $container ) {
			$container[ self::ROLE_SCHEMA ]->register_roles();
		} ), 10, 0 );
	}
}
