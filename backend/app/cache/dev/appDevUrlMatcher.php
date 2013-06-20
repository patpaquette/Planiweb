<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::showAction',));
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

        }

        if (0 === strpos($pathinfo, '/student')) {
            // student
            if (rtrim($pathinfo, '/') === '/student') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'student');
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::indexAction',  '_route' => 'student',);
            }

            // student_show
            if (preg_match('#^/student/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'student_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::showAction',));
            }

            // student_create
            if ($pathinfo === '/student/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_student_create;
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::createAction',  '_route' => 'student_create',);
            }
            not_student_create:

            // student_update
            if (preg_match('#^/student/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_student_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'student_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::updateAction',));
            }
            not_student_update:

            // student_delete
            if (preg_match('#^/student/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_student_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'student_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\StudentController::deleteAction',));
            }
            not_student_delete:

        }

        if (0 === strpos($pathinfo, '/course')) {
            // course
            if (rtrim($pathinfo, '/') === '/course') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'course');
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::indexAction',  '_route' => 'course',);
            }

            // course_show
            if (preg_match('#^/course/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::showAction',));
            }

            // course_create
            if ($pathinfo === '/course/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_course_create;
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::createAction',  '_route' => 'course_create',);
            }
            not_course_create:

            // course_update
            if (preg_match('#^/course/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_course_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::updateAction',));
            }
            not_course_update:

            // course_delete
            if (preg_match('#^/course/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_course_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseController::deleteAction',));
            }
            not_course_delete:

            if (0 === strpos($pathinfo, '/course_activity')) {
                // course_activity
                if (rtrim($pathinfo, '/') === '/course_activity') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'course_activity');
                    }

                    return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::indexAction',  '_route' => 'course_activity',);
                }

                // course_activity_show
                if (preg_match('#^/course_activity/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_activity_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::showAction',));
                }

                // course_activity_create
                if ($pathinfo === '/course_activity/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_course_activity_create;
                    }

                    return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::createAction',  '_route' => 'course_activity_create',);
                }
                not_course_activity_create:

                // course_activity_update
                if (preg_match('#^/course_activity/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_course_activity_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_activity_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::updateAction',));
                }
                not_course_activity_update:

                // course_activity_delete
                if (preg_match('#^/course_activity/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_course_activity_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'course_activity_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\CourseActivityController::deleteAction',));
                }
                not_course_activity_delete:

            }

        }

        if (0 === strpos($pathinfo, '/timetable_event')) {
            // timetable_event
            if (rtrim($pathinfo, '/') === '/timetable_event') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'timetable_event');
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::indexAction',  '_route' => 'timetable_event',);
            }

            // timetable_event_show
            if (preg_match('#^/timetable_event/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::showAction',));
            }

            // timetable_event_create
            if ($pathinfo === '/timetable_event/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_timetable_event_create;
                }

                return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::createAction',  '_route' => 'timetable_event_create',);
            }
            not_timetable_event_create:

            // timetable_event_update
            if (preg_match('#^/timetable_event/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_timetable_event_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::updateAction',));
            }
            not_timetable_event_update:

            // timetable_event_delete
            if (preg_match('#^/timetable_event/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_timetable_event_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventController::deleteAction',));
            }
            not_timetable_event_delete:

            if (0 === strpos($pathinfo, '/timetable_event_activity')) {
                // timetable_event_activity
                if (rtrim($pathinfo, '/') === '/timetable_event_activity') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'timetable_event_activity');
                    }

                    return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::indexAction',  '_route' => 'timetable_event_activity',);
                }

                // timetable_event_activity_show
                if (preg_match('#^/timetable_event_activity/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_activity_show')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::showAction',));
                }

                // timetable_event_activity_create
                if ($pathinfo === '/timetable_event_activity/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_timetable_event_activity_create;
                    }

                    return array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::createAction',  '_route' => 'timetable_event_activity_create',);
                }
                not_timetable_event_activity_create:

                // timetable_event_activity_update
                if (preg_match('#^/timetable_event_activity/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_timetable_event_activity_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_activity_update')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::updateAction',));
                }
                not_timetable_event_activity_update:

                // timetable_event_activity_delete
                if (preg_match('#^/timetable_event_activity/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_timetable_event_activity_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetable_event_activity_delete')), array (  '_controller' => 'Planiweb\\ModelBundle\\Controller\\TimetableEventActivityController::deleteAction',));
                }
                not_timetable_event_activity_delete:

            }

        }

        if (0 === strpos($pathinfo, '/student')) {
            // PlaniwebRESTBundle_students_add
            if ($pathinfo === '/student') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_PlaniwebRESTBundle_students_add;
                }

                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentAddAction',  '_route' => 'PlaniwebRESTBundle_students_add',);
            }
            not_PlaniwebRESTBundle_students_add:

            // PlaniwebRESTBundle_students_getAll
            if ($pathinfo === '/student') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_PlaniwebRESTBundle_students_getAll;
                }

                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentsGetAllAction',  '_route' => 'PlaniwebRESTBundle_students_getAll',);
            }
            not_PlaniwebRESTBundle_students_getAll:

            // PlaniwebRESTBundle_students_get
            if (preg_match('#^/student/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_PlaniwebRESTBundle_students_get;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'PlaniwebRESTBundle_students_get')), array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::studentsGetAction',));
            }
            not_PlaniwebRESTBundle_students_get:

        }

        if (0 === strpos($pathinfo, '/user/comment')) {
            // PlaniwebRESTBundle_user_comment_add
            if ($pathinfo === '/user/comment') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_PlaniwebRESTBundle_user_comment_add;
                }

                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::teacherCommentAddAction',  '_route' => 'PlaniwebRESTBundle_user_comment_add',);
            }
            not_PlaniwebRESTBundle_user_comment_add:

            // PlaniwebRESTBundle_user_comment_get
            if ($pathinfo === '/user/comment') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_PlaniwebRESTBundle_user_comment_get;
                }

                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\HEntitiesController::teacherCommentGetAction',  '_route' => 'PlaniwebRESTBundle_user_comment_get',);
            }
            not_PlaniwebRESTBundle_user_comment_get:

        }

        if (0 === strpos($pathinfo, '/account')) {
            // PlaniwebRESTBundle_account_create
            if ($pathinfo === '/account/create') {
                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::createAccountAction',  '_route' => 'PlaniwebRESTBundle_account_create',);
            }

            // PlaniwebRESTBundle_account_logout
            if ($pathinfo === '/account/logout') {
                return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'PlaniwebRESTBundle_account_logout',);
            }

        }

        // PlaniwebRESTServicesbundle_isLogged
        if ($pathinfo === '/user/logged') {
            return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::isLoggedAction',  '_route' => 'PlaniwebRESTServicesbundle_isLogged',);
        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
        }

        // Planiweb_user_create
        if ($pathinfo === '/user') {
            return array (  '_controller' => 'Planiweb\\RESTBundle\\Controller\\UserController::userCreateAction',  '_route' => 'Planiweb_user_create',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
