<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),),
        '_profiler_import' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:importAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/import',    ),  ),  4 =>   array (  ),),
        '_profiler_export' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:exportAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.txt',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler/export',    ),  ),  4 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),),
        'user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/',    ),  ),  4 =>   array (  ),),
        'user_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),),
        'user_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/create',    ),  ),  4 =>   array (  ),),
        'user_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),),
        'user_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),),
        'student' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/student/',    ),  ),  4 =>   array (  ),),
        'student_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'student_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/student/create',    ),  ),  4 =>   array (  ),),
        'student_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'student_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'course' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/course/',    ),  ),  4 =>   array (  ),),
        'course_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course',    ),  ),  4 =>   array (  ),),
        'course_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/course/create',    ),  ),  4 =>   array (  ),),
        'course_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course',    ),  ),  4 =>   array (  ),),
        'course_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course',    ),  ),  4 =>   array (  ),),
        'course_activity' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/course_activity/',    ),  ),  4 =>   array (  ),),
        'course_activity_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course_activity',    ),  ),  4 =>   array (  ),),
        'course_activity_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/course_activity/create',    ),  ),  4 =>   array (  ),),
        'course_activity_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course_activity',    ),  ),  4 =>   array (  ),),
        'course_activity_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/course_activity',    ),  ),  4 =>   array (  ),),
        'timetable_event' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/timetable_event/',    ),  ),  4 =>   array (  ),),
        'timetable_event_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event',    ),  ),  4 =>   array (  ),),
        'timetable_event_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/timetable_event/create',    ),  ),  4 =>   array (  ),),
        'timetable_event_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event',    ),  ),  4 =>   array (  ),),
        'timetable_event_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event',    ),  ),  4 =>   array (  ),),
        'timetable_event_activity' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/timetable_event_activity/',    ),  ),  4 =>   array (  ),),
        'timetable_event_activity_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event_activity',    ),  ),  4 =>   array (  ),),
        'timetable_event_activity_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/timetable_event_activity/create',    ),  ),  4 =>   array (  ),),
        'timetable_event_activity_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event_activity',    ),  ),  4 =>   array (  ),),
        'timetable_event_activity_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/timetable_event_activity',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_students_add' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentAddAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_students_getAll' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentsGetAllAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_students_get' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentsGetAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/student',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_user_comment_add' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::teacherCommentAddAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/comment',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_user_comment_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::teacherCommentGetAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/comment',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_account_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::createAccountAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/account/create',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTBundle_account_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/account/logout',    ),  ),  4 =>   array (  ),),
        'PlaniwebRESTServicesbundle_isLogged' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::isLoggedAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/logged',    ),  ),  4 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),),
        'Planiweb_user_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Planiweb\\RESTBundle\\Controller\\UserController::userCreateAction',  ),  2 =>   array (    '_methods' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
