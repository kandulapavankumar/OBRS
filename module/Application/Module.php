<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Authentication\AuthenticationService;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {

        return array(
            'factories' => array(

                'Application\Model\AdminAccessLevelsTable' =>  function($sm) {
                        $tableGateway = $sm->get('AdminAccessLevelsTableGateway');
                        $table = new Model\AdminAccessLevelsTable($tableGateway);

                        return $table;
                    },

                'AdminAccessLevelsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\AdminAccessLevels());

                        return new TableGateway('admin_access_levels', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\AdminInfoTable' =>  function($sm) {
                        $tableGateway = $sm->get('AdminInfoTableGateway');
                        $table = new Model\AdminInfoTable($tableGateway);

                        return $table;
                    },

                'AdminInfoTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\AdminInfo());

                        return new TableGateway('admin_info', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\BoardingPointsTable' =>  function($sm) {
                        $tableGateway = $sm->get('BoardingPointsTableGateway');
                        $table = new Model\BoardingPointsTable($tableGateway);

                        return $table;
                    },

                'BoardingPointsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\BoardingPoints());

                        return new TableGateway('boarding_points', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\BusesTable' =>  function($sm) {
                        $tableGateway = $sm->get('BusesTableGateway');
                        $table = new Model\BusesTable($tableGateway);

                        return $table;
                    },

                'BusesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\Buses());

                        return new TableGateway('buses', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\BusPhotosAndVideosTable' =>  function($sm) {
                        $tableGateway = $sm->get('BusPhotosAndVideosTableGateway');
                        $table = new Model\BusPhotosAndVideosTable($tableGateway);

                        return $table;
                    },

                'BusPhotosAndVideosTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\BusPhotosAndVideos());

                        return new TableGateway('bus_photos_and_videos', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\BusTypesTable' =>  function($sm) {
                        $tableGateway = $sm->get('BusTypesTableGateway');
                        $table = new Model\BusTypesTable($tableGateway);

                        return $table;
                    },

                'BusTypesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\BusTypes());

                        return new TableGateway('bus_types', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\CommisionsConfigureTable' =>  function($sm) {
                        $tableGateway = $sm->get('CommisionsConfigureTableGateway');
                        $table = new Model\CommisionsConfigureTable($tableGateway);

                        return $table;
                    },

                'CommisionsConfigureTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\CommisionsConfigure());

                        return new TableGateway('commisions_configure', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\GlobalConstantsTable' =>  function($sm) {
                        $tableGateway = $sm->get('GlobalConstantsTableGateway');
                        $table = new Model\GlobalConstantsTable($tableGateway);

                        return $table;
                    },

                'GlobalConstantsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\GlobalConstants());

                        return new TableGateway('global_constants', $dbAdapter, null, $resultSetPrototype);
                    },
                'Application\Model\OffersTable' =>  function($sm) {
                        $tableGateway = $sm->get('OffersTableGateway');
                        $table = new Model\OffersTable($tableGateway);

                        return $table;
                    },

                'OffersTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\Offers());

                        return new TableGateway('offers', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\OffersUsageTable' =>  function($sm) {
                        $tableGateway = $sm->get('OffersUsageTableGateway');
                        $table = new Model\OffersUsageTable($tableGateway);

                        return $table;
                    },

                'OffersUsageTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\OffersUsage());

                        return new TableGateway('offers_usage', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\PaymentsInfoTable' =>  function($sm) {
                        $tableGateway = $sm->get('PaymentsInfoTableGateway');
                        $table = new Model\PaymentsInfoTable($tableGateway);

                        return $table;
                    },

                'PaymentsInfoTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\PaymentsInfo());

                        return new TableGateway('payments_info', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\SeatsAllocationTable' =>  function($sm) {
                        $tableGateway = $sm->get('SeatsAllocationTableGateway');
                        $table = new Model\SeatsAllocationTable($tableGateway);

                        return $table;
                    },

                'SeatsAllocationTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\SeatsAllocation());

                        return new TableGateway('seats_allocation', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\SeatsAvailableTable' =>  function($sm) {
                        $tableGateway = $sm->get('SeatsAvailableTableGateway');
                        $table = new Model\vTable($tableGateway);

                        return $table;
                    },

                'SeatsAvailableTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\SeatsAvailable());

                        return new TableGateway('seats_available', $dbAdapter, null, $resultSetPrototype);
                    },
                'Application\Model\SecurityQuestionsTable' =>  function($sm) {
                        $tableGateway = $sm->get('SecurityQuestionsTableGateway');
                        $table = new Model\SecurityQuestionsTable($tableGateway);

                        return $table;
                    },

                'SecurityQuestionsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\SecurityQuestions());

                        return new TableGateway('security_questions', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\ServiceAmenitiesTable' =>  function($sm) {
                        $tableGateway = $sm->get('ServiceAmenitiesTableGateway');
                        $table = new Model\ServiceAmenitiesTable($tableGateway);

                        return $table;
                    },

                'ServiceAmenitiesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\ServiceAmenities());

                        return new TableGateway('service_amenities', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\ServicesTable' =>  function($sm) {
                        $tableGateway = $sm->get('ServicesTableGateway');
                        $table = new Model\ServicesTable($tableGateway);

                        return $table;
                    },

                'ServicesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\Services());

                        return new TableGateway('services', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\StaticBoardingPointsTable' =>  function($sm) {
                        $tableGateway = $sm->get('StaticBoardingPointsTableGateway');
                        $table = new Model\StaticBoardingPointsTable($tableGateway);

                        return $table;
                    },

                'StaticBoardingPointsTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\StaticBoardingPoints());

                        return new TableGateway('static_boarding_points', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\StaticCostTimeDistanceTable' =>  function($sm) {
                        $tableGateway = $sm->get('StaticCostTimeDistanceTableGateway');
                        $table = new Model\StaticCostTimeDistanceTable($tableGateway);

                        return $table;
                    },

                'StaticCostTimeDistanceTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\StaticCostTimeDistance());

                        return new TableGateway('static_cost_time_distance', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\StaticPickupPointTable' =>  function($sm) {
                        $tableGateway = $sm->get('StaticPickupPointTableGateway');
                        $table = new Model\StaticPickupPointTable($tableGateway);

                        return $table;
                    },

                'StaticPickupPointTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\StaticPickupPoint());

                        return new TableGateway('static_pickup_point', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\StaticServiceAmenitiesTable' =>  function($sm) {
                        $tableGateway = $sm->get('StaticServiceAmenitiesTableGateway');
                        $table = new Model\StaticServiceAmenitiesTable($tableGateway);

                        return $table;
                    },

                'StaticServiceAmenitiesTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\StaticServiceAmenities());

                        return new TableGateway('static_service_amenities', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\TravelsInfoTable' =>  function($sm) {
                        $tableGateway = $sm->get('TravelsInfoTableGateway');
                        $table = new Model\TravelsInfoTable($tableGateway);

                        return $table;
                    },

                'TravelsInfoTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\TravelsInfo());

                        return new TableGateway('travels_info', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\UserProviderTable' =>  function($sm) {
                        $tableGateway = $sm->get('UserProviderTableGateway');
                        $table = new Model\UserProviderTable($tableGateway);

                        return $table;
                    },

                'UserProviderTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\UserProvider());

                        return new TableGateway('user_provider', $dbAdapter, null, $resultSetPrototype);
                    },

                'Application\Model\UsersInfoTable' =>  function($sm) {
                        $tableGateway = $sm->get('UsersInfoTableGateway');
                        $table = new Model\UsersInfoTable($tableGateway);

                        $authService = $sm->get('zfcuser_auth_service');
                        $userEntity = $authService->getIdentity();

                        $table->setUserEntity($userEntity);

                        return $table;
                    },

                'UsersInfoTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Model\UsersInfo());

                        return new TableGateway('users_info', $dbAdapter, null, $resultSetPrototype);
                    },
            ),
        );
    }
}
