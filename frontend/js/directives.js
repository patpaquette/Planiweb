angular.module("UIComponents", [])
    .directive("fullCalendar", function(){
        return {
            restrict : "A",
            replace : true,
            transclude : true,
            scope: {
                events: '='
            },   
            link : function(scope, $element, $attrs ) {
                //Call the fullCalendar Method. 
                scope.calendar = $('#' + $attrs.id).fullCalendar({
                    theme: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    editable: true,
                    slotMinutes: 15,

                    // add event name to title attribute on mouseover
                    eventMouseover: function(event, jsEvent, view) {
                        if (view.name !== 'agendaDay') {
                            $(jsEvent.target).attr('title', event.title);
                        }
                    },

                    // Calling the events from the scope.  :)
                    events: scope.events,
                });      
            }
        }
    })
    .directive("fullCalendarScholarWeek", function(){
        return {
            restrict : "A",
            replace : true,
            transclude : true,
            scope: {
                events: '='
            },
            link : function(scope, $element, $attrs ) {
                var noOfDays = $attrs.days || 9;
                var daysArray = [];
                for(var i = 1; i <= noOfDays; i++){
                    daysArray.push('Jour ' + i);
                }
                console.log(daysArray);

                //Call the fullCalendar Method. 
                scope.calendar = $('#' + $attrs.id).fullCalendar({
                    theme: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    editable: true,
                    slotMinutes: 15,

                    dayNamesShort: daysArray,


                    // add event name to title attribute on mouseover
                    eventMouseover: function(event, jsEvent, view) {
                        if (view.name !== 'agendaDay') {
                            $(jsEvent.target).attr('title', event.title);
                        }
                    },

                    // Calling the events from the scope.  :)
                    events: scope.events,
                });      
            }
        }
    })
    .directive("studentDetailForm", function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: "js/partials/student_detail_form.html"
        }
    })

