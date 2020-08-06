/**
 * Load all the javascript by using Vue.js and write all your JS code
 * in this file.
 */

require('./bootstrap');
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import 'vue-date-pick/dist/vueDatePick.css';
import datePicker from 'vue-bootstrap-datetimepicker';
import '../../public/js/tinymce/tinymce.min.js';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
import SmoothScrollbar from 'vue-smooth-scrollbar';
import VueSweetalert2 from 'vue-sweetalert2';
import {VueStars} from "vue-stars";
import {Printd} from "printd";
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';
import Vuebar from 'vuebar';
import Event from './event.js';
import * as VueGoogleMaps from 'vue2-google-maps'
import Verte from 'verte';
import 'verte/dist/verte.css';
import vuecal from 'vue-cal';
import CalendarEvents from './components/CalendarEvents/CalendarEvents.vue';
import moment from 'moment'

import Multiselect from 'vue-multiselect'

Vue.component('multiselect', Multiselect)

import VueTimepicker from 'vue2-timepicker'

import 'vue2-timepicker/dist/VueTimepicker.css'

Vue.use(VueTimepicker);


Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

Vue.filter('two_digits', function (value) {
    if (value.toString().length <= 1) {
        return "0" + value.toString();
    }
    return value.toString();
});

Vue.use(VueGoogleMaps, {
    load: {
        key: Map_key,
        libraries: 'places',
    },
})

Vue.use(VueIziToast);
Vue.use(SmoothScrollbar)
Vue.use(VueSweetalert2);
Vue.use(Vuebar);

window.Vue = require('vue');
window.flashVue = new Vue();
window.deleteVue = new Vue();
window.flashMessageVue = new Vue();

Vue.use(datePicker);
Vue.use(BootstrapVue);

Vue.component('verte', Verte);
Vue.component('upload-file', require('./components/UploadFileComponent.vue').default);
Vue.component('upload-image', require('./components/UploadImageComponent.vue').default);
Vue.component('upload-image-cv', require('./components/UploadImageCvComponent.vue').default);
Vue.component('flash_messages', require('./components/FlashMessages.vue').default);
Vue.component('switch_button', require('./components/SwitchButton.vue').default);
Vue.component('user_skills', require('./components/ProfileSkillComponent.vue').default);
Vue.component('freelancer_experience', require('./components/ProfileExperienceComponent.vue').default);
Vue.component('freelancer_education', require('./components/ProfileEducationComponent.vue').default);
Vue.component('freelancer_project', require('./components/ProfileProjectComponent.vue').default);
Vue.component('freelancer_award', require('./components/ProfileAwardComponent.vue').default);
Vue.component('job_attachments', require('./components/UploadJobAttachmentComponent.vue').default);
Vue.component('job_multiple-attachments', require('./components/JobMultipleAttachmentComponent.vue').default);
Vue.component('job_skills', require('./components/JobSkillComponent.vue').default);
Vue.component('private-message', require('./components/PrivateMessageComponent.vue').default);
Vue.component('rating', require('./components/RatingComponent.vue').default);
Vue.component('search-form', require('./components/SearchComponent.vue').default);
require('./components/FlashMessageComponent.vue').default
Vue.component("vue-stars", VueStars)
Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('chat-users', require('./components/ChatUserComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessageComponent.vue').default);
Vue.component('chat-area', require('./components/ChatAreaComponent.vue').default);
Vue.component('message-center', require('./components/ChatComponent.vue').default);
Vue.component('emoji-textarea', require('./components/EmojiTexeareaComponent.vue').default);
Vue.component('delete', require('./components/DeleteRecordComponent.vue').default);
Vue.component('countdown', require('./components/CountDownComponent.vue').default);
Vue.component('experience', require('./components/FreelancerExperienceComponent.vue').default);
Vue.component('education', require('./components/FreelancerEducationComponent.vue').default);
Vue.component('crafted_project', require('./components/FreelancerCraftedProjetcsComponent.vue').default);
Vue.component('custom-map', require('./components/Map.vue').default);
Vue.component('dashboard-icon', require('./components/DashboardIconUploadComponent.vue').default);
Vue.component('image-attachments', require('./components/UploadServiceAttachmentComponent.vue').default);
Vue.component('freelancer-reviews', require('./components/FreelancerReviewsComponent.vue').default);
Vue.component('location-selector', require('./components/LocationSelector.vue').default);
Vue.component('fullcalendar', require('./components/FullCalendar').default);
Vue.component('calendar-events', require('./components/CalendarEvents/CalendarEvents.vue').default);

var itsoftware_options = [
    'Adastra',
    'Cerna',
    'Cerna Millenium',
    'Cleo',
    'DGL',
    'Docman',
    'Edis & A&E System',
    'Emis Community',
    'Emis LV',
    'Emis PCS',
    'Emis Web',
    'Frontdesk',
    'Heydoc',
    'Infoslex',
    'Microtest',
    'Premiere',
    'Symphony',
    'Synergy',
    'SystmOne',
    'Torex',
    'Vision',
    'Vision Anywhere'
];

jQuery(document).ready(function () {
    jQuery(document).on('click', '.wt-back', function (e) {
        e.preventDefault();
        jQuery('.wt-back').parents('.wt-messages-holder').removeClass('wt-openmsg');
    });

    jQuery(document).on('click', '.wt-respsonsive-search', function (e) {
        e.preventDefault();
        jQuery('.wt-headervtwo').addClass('wt-search-have show-sform');
    });

    jQuery(document).on('click', '.wt-search-remove', function (e) {
        e.preventDefault();
        jQuery('.wt-search-have').removeClass('show-sform');
    })

    jQuery(document).on('click', '.wt-ad', function (e) {
        e.preventDefault();
        jQuery('.wt-ad').parents('.wt-messages-holder').addClass('wt-openmsg');
    });
    jQuery('.wt-navigation ul li.menu-item-has-children, .wt-navdashboard ul li.menu-item-has-children').prepend('<span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>');
    jQuery('.wt-navigation ul li.menu-item-has-children span').on('click', function () {
        jQuery(this).parent('li').toggleClass('wt-open');
        jQuery(this).next().next().slideToggle(300);
    });

    jQuery('.wt-navigation ul li.menu-item-has-children > a, .wt-navigation ul li.page_item_has_children > a').on('click', function () {
        if (location.href.indexOf("#") != -1) {
            jQuery(this).parent('li').toggleClass('wt-open');
            jQuery(this).next().slideToggle(300);
        } else {
            //do nothing
        }
    });

    jQuery('.wt-navdashboard ul li.menu-item-has-children').on('click', function () {
        jQuery(this).toggleClass('wt-open');
        jQuery(this).find('.sub-menu').slideToggle(300);
    });


    function fixedNav() {
        let isDashboardPages = jQuery("body").hasClass("dashboard-pages-body");

        $(window).scroll(function () {
            var $pscroll = $(window).scrollTop();
            if ($pscroll > 76) {
                $('.wt-sidebarwrapper').addClass('wt-fixednav');
            } else {
                $('.wt-sidebarwrapper').removeClass('wt-fixednav');
            }

            if (isDashboardPages && ($pscroll + $(window).height() > $(document).height() - 120)) {
                jQuery('.wt-verticalscrollbar').mCustomScrollbar('scrollTo','bottom');
            }
        });
    }

    fixedNav();

    jQuery('.filter-records').on('keyup', function () {
        var content = jQuery(this).val();
        console.log(content);
        jQuery(this).parents('fieldset').siblings('fieldset').find('.wt-checkbox:contains(' + content + ')').show();
        jQuery(this).parents('fieldset').siblings('fieldset').find('.wt-checkbox:not(:contains(' + content + '))').hide();
    });

    jQuery('#wt-btnclosechat, #wt-getsupport').on('click', function () {
        jQuery('.wt-chatbox').slideToggle();
    });

    if (jQuery('.wt-verticalscrollbar').length > 0) {
        var _wt_verticalscrollbar = jQuery('.wt-verticalscrollbar');
        _wt_verticalscrollbar.mCustomScrollbar({
            axis: "y",
        });
    }

    jQuery('#wt-loginbtn, .wt-loginheader a').on('click', function (event) {
        event.preventDefault();
        jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
    });

    if (jQuery('#wt-btnmenutoggle').length > 0) {
        jQuery("#wt-btnmenutoggle").on('click', function (event) {
            event.preventDefault();
            jQuery('#wt-wrapper').toggleClass('wt-openmenu');
            jQuery('body').toggleClass('wt-noscroll');
            jQuery('.wt-navdashboard ul.sub-menu').hide();
        });
    }

    tinymce.init({
        selector: 'textarea.wt-tinymceeditor',
        height: 300,
        theme: 'modern',
        plugins: ['code advlist autolink lists link image charmap print preview hr anchor pagebreak'],
        menubar: false,
        statusbar: false,
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify code',
        image_advtab: true,
        remove_script_host: false,
    });

});

// jQuery(document).ready(function () {
// if (document.getElementById("booking_data")) {
//     console.log('booking_data');
//     const booking_data = new Vue({
//         el: '#booking_data',
//         components: {
//             CalendarEvents
//         },
//     });
//
//    // console.log(mHeaderAAA);
// }
// });


/*support calendar*/
if (document.getElementById("support_availability")) {
    var role = 'support';
    const vmHeader = new Vue({
        el: '#support_availability',
        components: {'vue-cal': vuecal, VueTimepicker},
        data: {
            calendarPlugins: [],
            events: [],
            availability_title: "",
            availability_content: "",
            availability_start_time: "",
            availability_end_time: "",
            availability_selected_date: "",
            availability_selected_end_date: "",
            clickedDate: "",
            clickedEndDate: "",
            user_id: "",
            skill_id: "",
            start: "",
            end: "",
            is_recurring: false,
            recurring_date: "",
            recurring_end_date: "",
            event_id: "",
            event_class: "",
            addedToEvents: false,
            selectedEvent: null,
            selectedEventDrag: false,
            addDay:1,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    }
                }
            },
        },
        created() {
            var events = [];
            let self = this;
            axios.get('/' + role + '/getCalendarEvents').then(function (response) {
                if (self.events.length > 0) {
                    self.events.splice(0);
                }

                if (response && Array.isArray(response.data)) {
                    response.data.forEach(item => {
                        item.end = self.convertDateForFormatCalendar(item.end);
                        item.start = self.convertDateForFormatCalendar(item.start);
                        if (item.end !== null && item.start !== null) {
                            self.events.push(item);
                        }
                    });
                }
            });
        },

        methods: {

            convertDateForFormatCalendar(date) {
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            convertDateForFormatView(date) {
                if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            customEventCreation() {
                const dateTime = prompt('Create event on (yyyy-mm-dd hh:mm)', '2018-11-20 13:15')
                // Check if date format is correct before creating event.
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(dateTime)) {
                    this.$refs.vuecal.createEvent(
                        // Formatted start date and time or JavaScript Date object.
                        dateTime,
                        // Custom event props (optional).
                        {title: 'New Event', content: 'yay! �', classes: ['leisure']}
                    )
                } else if (dateTime) alert('Wrong date format.')
            },
            formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            },
            onEventCreate (event, deleteEventFunction) {
                this.addedToEvents = false;
                console.log('onEventCreate', event)
                // this.createNewEvent(event);
            },
            onEventFocus() {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                this.onEventClick(event)
                event.stopPropagation();
                // return event;
            },
            onEventDragCreate(event) {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                // return this.createNewEvent(event)
                event.stopPropagation();
                return event;
            },
            reloadCalendar(){
                var events = [];
                // console.log(events);
                // console.log(this.events);
                let self = this;
                axios.get('/' + role + '/getCalendarEvents').then(function (response) {
                    if (self.events.length > 0) {
                        self.events.splice(0);
                    }

                    if (response && Array.isArray(response.data)) {
                        response.data.forEach(item => {
                            item.end = self.convertDateForFormatCalendar(item.end);
                            item.start = self.convertDateForFormatCalendar(item.start);
                            if (item.end !== null && item.start !== null) {
                                self.events.push(item);
                            }
                        });
                    }
                });
            },
            logEvents(name,context){
                console.log(name,context)
            },
            onEventDurationChange(event) {
                this.addedToEvents = false;
                console.log('onEventDurationChange', event);
                this.onEventClick(event);
                event.stopPropagation();
                return event;
            },
            createNewEvent(event) {
                console.log('createNewEvent');
                console.log(event);

                if (this.selectedEvent) {
                    event = this.selectedEvent;
                    var startdate = event.start.split(' ');
                    var enddate = event.end.split(' ');
                    this.clickedDate = true;
                    this.clickedEndDate = "";
                    // var formatdatestart = moment(startdate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                    // var formatdateend = moment(enddate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                    this.availability_selected_date = startdate[0];
                    this.availability_selected_end_date = enddate[0];
                    this.start = this.availability_start_time = startdate[1];
                    this.end = this.availability_end_time = enddate[1];
                    this.availability_content = event.contentFull;
                    this.availability_title = event.title;
                    this.recurring_date = event.recurring_date;
                    this.skill_id = event.skill_id;
                    this.event_id = event.id;
                    this.user_id = event['user_id'];
                    this.event_class = event['class'];
                    this.selectedEvent = null;
                    event = null;
                } else {
                    this.clickedDate = new Date(event);
                    this.clickedEndDate = new Date(event);
                    this.availability_selected_date = this.formatDate(event);
                    this.availability_selected_end_date = this.formatDate(event);
                    this.start = this.availability_start_time = "00:01";
                    this.end = this.availability_end_time = "23:59";
                    this.recurring_date = '';
                    this.skill_id = '';
                    this.event_id = '';
                    this.user_id = '';
                    this.event_class = '';
                    this.availability_content = '';
                    this.availability_title = '';
                    this.availability_selected_end_date = this.formatDate(event);
                }
                setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                })

            },
            changeSelectedDate(date) {

                this.clickedDate = true;
                this.selecteddate = date.getDate() + "/" + (date.getMonth() + 1) + '/' + date.getFullYear();
                jQuery('#calendar_small').hide();

            },
            onEventClick(event) {
                console.log(event)
                this.selectedEvent = event;
            },
            onEdeditableEvents(event) {
                this.confButton();
                console.log('onEdeditableEvents', event);
                event.stopPropagation();
            },
            updateEvent(e){
                e.preventDefault();
                console.log(this);
                var thistoast = this.$toast;
                thistoast.options.position = 'center';
                var self = this;
                let register_Form = document.getElementById('availability_dashboard_form');
                let form_data = new FormData(register_Form);
                //this.events.push(newObj);
                axios.post('/' + role + '/updateCalendarAvailability', form_data)
                    .then(function (response) {
                        self.reloadCalendar();
                        thistoast.success(' ', "Updated : <br>" +
                            self.availability_title + " " + self.availability_content + "<br>" +
                            self.start + " - " + self.end);
                        setTimeout(function (self) {
                            $('html, body').animate({
                                scrollTop: ($(".scrolToCalend").offset().top)
                            }, 1000);

                        });
                        self.clickedDate = false;
                    })
                    .catch(function (error) {
                        if(typeof error.response != "undefined") {
                            if (error.response.data.errors.title) {
                                thistoast.error(' ', error.response.data.errors.title[0]);
                            }
                            if (error.response.data.errors.availability_content) {
                                thistoast.error(' ', error.response.data.errors.availability_content[0]);
                            }
                            if (error.response.data.errors.start_date) {
                                thistoast.error(' ', error.response.data.errors.start_date[0]);
                            }
                            if (error.response.data.errors.booking_start) {
                                thistoast.error(' ', error.response.data.errors.booking_start[0]);
                            }
                            if (error.response.data.errors.booking_end) {
                                thistoast.error(' ', error.response.data.errors.booking_end[0]);
                            }
                        }

                    });
                e.stopPropagation()
            },
            saveNewEventBusy(e) {
                this.saveNewEventAvailability(e, true);
            },
            saveNewEventAvailability(e, busy) {
                e.preventDefault();
                var word = '•';
                var title_word = 'Available'
                var class_type = 'available_class';
                var thistoast = this.$toast;
                if (busy) {
                    class_type = 'busy_class';
                    word = title_word = 'Busy/Holiday';
                }
                thistoast.options.position = 'center';
                var self = this;

                let register_Form = document.getElementById('availability_dashboard_form');
                let form_data = new FormData(register_Form);
                form_data.append('class',class_type);
                //this.events.push(newObj);
                axios.post('/' + role + '/saveCalendarAvailability', form_data)
                    .then(function (response) {
                        self.reloadCalendar();
                        if (busy) {
                            thistoast.error(' ', "Success <br>" +
                                self.availability_title + " " + self.availability_content + "<br>" +
                                self.start + " - " + self.end);
                        } else {
                            thistoast.success(' ', "Success <br>" +
                                self.availability_title + " " + self.availability_content + "<br>" +
                                self.start + " - " + self.end);
                        }
                        setTimeout(function () {
                            $('html, body').animate({
                                scrollTop: ($(".scrolToCalend").offset().top)
                            }, 1000);
                        })
                        self.clickedDate = false;
                    })
                    .catch(function (error) {
                        if(typeof error.response != "undefined" && error.response.data.errors != undefined) {
                            if (error.response.data.errors.title) {
                                thistoast.error(' ', error.response.data.errors.title[0]);
                            }
                            if (error.response.data.errors.availability_content) {
                                thistoast.error(' ', error.response.data.errors.availability_content[0]);
                            }
                            if (error.response.data.errors.start_date) {
                                thistoast.error(' ', error.response.data.errors.start_date[0]);
                            }
                            if (error.response.data.errors.booking_start) {
                                thistoast.error(' ', error.response.data.errors.booking_start[0]);
                            }
                            if (error.response.data.errors.booking_end) {
                                thistoast.error(' ', error.response.data.errors.booking_end[0]);
                            }
                        }
                    });
                e.stopPropagation()
            },
            confButton() {
                this.ckickedDate = true;
                $(document).on('click', '.confirmButton', function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                });
            },
            createList(event) {
                var parent = document.getElementById('listDates'),
                    newElem = parent.querySelector('.getIsDay'),
                    elem = parent.querySelectorAll('.isDay');
                newElem.classList.remove('getIsDay');
                newElem.classList.add('isDay');
                newElem.style.display = '';
                newElem.children[0].querySelector('input').setAttribute("name","start_date[" + (elem.length) + "]");
                newElem.children[1].querySelector('input').setAttribute("name","end_date[" + (elem.length) + "]");
                // newElem.children[0].querySelector('input').value = '';
                newElem.children[1].querySelector('input').value = '';
                this.addDay = elem.length;
                // event.preventDefault();
            },
        }
    });
}

/*freelancer calendar*/
if (document.getElementById("freelancer_availability")) {
    var role = 'freelancer';
    const vmHeader = new Vue({
        el: '#freelancer_availability',
        components: {'vue-cal': vuecal, VueTimepicker},
        data: {
            calendarPlugins: [],
            events: [],
            availability_title: "",
            availability_content: "",
            availability_start_time: "",
            availability_end_time: "",
            availability_selected_date: "",
            availability_selected_end_date: "",
            clickedDate: "",
            clickedEndDate: "",
            user_id: "",
            skill_id: "",
            start: "",
            end: "",
            is_recurring: false,
            recurring_date: "",
            recurring_end_date: "",
            event_id: "",
            event_class: "",
            addedToEvents: false,
            selectedEvent: null,
            selectedEventDrag: false,
            addDay:1,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    }
                }
            },
        },
        created() {
            var events = [];
            let self = this;
            axios.get('/' + role + '/getCalendarEvents').then(function (response) {
                if (self.events.length > 0) {
                    self.events.splice(0);
                }

                if (response && Array.isArray(response.data)) {
                    response.data.forEach(item => {
                        item.end = self.convertDateForFormatCalendar(item.end);
                        item.start = self.convertDateForFormatCalendar(item.start);
                        if (item.end !== null && item.start !== null) {
                            self.events.push(item);
                        }
                    });
                }
            });
        },

        methods: {

            convertDateForFormatCalendar(date) {
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            convertDateForFormatView(date) {
                if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            customEventCreation() {
                const dateTime = prompt('Create event on (yyyy-mm-dd hh:mm)', '2018-11-20 13:15')
                // Check if date format is correct before creating event.
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(dateTime)) {
                    this.$refs.vuecal.createEvent(
                        // Formatted start date and time or JavaScript Date object.
                        dateTime,
                        // Custom event props (optional).
                        {title: 'New Event', content: 'yay! �', classes: ['leisure']}
                    )
                } else if (dateTime) alert('Wrong date format.')
            },
            formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            },
            onEventCreate (event, deleteEventFunction) {
                this.addedToEvents = false;
                console.log('onEventCreate', event)
                // this.createNewEvent(event);
            },
            onEventFocus() {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                this.onEventClick(event)
                event.stopPropagation();
                // return event;
            },
            onEventDragCreate(event) {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                // return this.createNewEvent(event)
                event.stopPropagation();
                return event;
            },
            reloadCalendar(){
                var events = [];
                // console.log(events);
                // console.log(this.events);
                let self = this;
                axios.get('/' + role + '/getCalendarEvents').then(function (response) {
                    if (self.events.length > 0) {
                        self.events.splice(0);
                    }

                    if (response && Array.isArray(response.data)) {
                        response.data.forEach(item => {
                            item.end = self.convertDateForFormatCalendar(item.end);
                            item.start = self.convertDateForFormatCalendar(item.start);
                            if (item.end !== null && item.start !== null) {
                                self.events.push(item);
                            }
                        });
                    }
                });
            },
            logEvents(name,context){
                console.log(name,context)
            },
            onEventDurationChange(event) {
                this.addedToEvents = false;
                console.log('onEventDurationChange', event);
                this.onEventClick(event);
                event.stopPropagation();
                return event;
            },
            createNewEvent(event) {
                console.log('createNewEvent');
                console.log(event);

                if (this.selectedEvent) {
                    event = this.selectedEvent;
                    var startdate = event.start.split(' ');
                    var enddate = event.end.split(' ');
                    this.clickedDate = true;
                    this.clickedEndDate = "";
                    // var formatdatestart = moment(startdate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                    // var formatdateend = moment(enddate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                    this.availability_selected_date = startdate[0];
                    this.availability_selected_end_date = enddate[0];
                    this.start = this.availability_start_time = startdate[1];
                    this.end = this.availability_end_time = enddate[1];
                    this.availability_content = event.contentFull;
                    this.availability_title = event.title;
                    this.recurring_date = event.recurring_date;
                    this.skill_id = event.skill_id;
                    this.event_id = event.id;
                    this.user_id = event['user_id'];
                    this.event_class = event['class'];
                    this.selectedEvent = null;
                    event = null;
                } else {
                    this.clickedDate = new Date(event);
                    this.clickedEndDate = new Date(event);
                    this.availability_selected_date = this.formatDate(event);
                    this.availability_selected_end_date = this.formatDate(event);
                    this.start = this.availability_start_time = "00:01";
                    this.end = this.availability_end_time = "23:59";
                    this.recurring_date = '';
                    this.skill_id = '';
                    this.event_id = '';
                    this.user_id = '';
                    this.event_class = '';
                    this.availability_content = '';
                    this.availability_title = '';
                    this.availability_selected_end_date = this.formatDate(event);
                }
                setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                })

            },
            changeSelectedDate(date) {

                this.clickedDate = true;
                this.selecteddate = date.getDate() + "/" + (date.getMonth() + 1) + '/' + date.getFullYear();
                jQuery('#calendar_small').hide();

            },
            onEventClick(event) {
                console.log(event)
                this.selectedEvent = event;
            },
            onEdeditableEvents(event) {
                this.confButton();
                console.log('onEdeditableEvents', event);
                event.stopPropagation();
            },
            updateEvent(e){
                e.preventDefault();
                console.log(this);
                var thistoast = this.$toast;
                thistoast.options.position = 'center';
                var self = this;
                let register_Form = document.getElementById('availability_dashboard_form');
                let form_data = new FormData(register_Form);
                //this.events.push(newObj);
                axios.post('/' + role + '/updateCalendarAvailability', form_data)
                    .then(function (response) {
                        self.reloadCalendar();
                        thistoast.success(' ', "Updated : <br>" +
                            self.availability_title + " " + self.availability_content + "<br>" +
                            self.start + " - " + self.end);
                        setTimeout(function (self) {
                            $('html, body').animate({
                                scrollTop: ($(".scrolToCalend").offset().top)
                            }, 1000);

                        });
                        self.clickedDate = false;
                    })
                    .catch(function (error) {
                        if(typeof error.response != "undefined") {
                            if (error.response.data.errors.title) {
                                thistoast.error(' ', error.response.data.errors.title[0]);
                            }
                            if (error.response.data.errors.availability_content) {
                                thistoast.error(' ', error.response.data.errors.availability_content[0]);
                            }
                            if (error.response.data.errors.start_date) {
                                thistoast.error(' ', error.response.data.errors.start_date[0]);
                            }
                            if (error.response.data.errors.booking_start) {
                                thistoast.error(' ', error.response.data.errors.booking_start[0]);
                            }
                            if (error.response.data.errors.booking_end) {
                                thistoast.error(' ', error.response.data.errors.booking_end[0]);
                            }
                        }

                    });
                e.stopPropagation()
            },
            saveNewEventBusy(e) {
                this.saveNewEventAvailability(e, true);
            },
            saveNewEventAvailability(e, busy) {
                e.preventDefault();
                var word = '•';
                var title_word = 'Available'
                var class_type = 'available_class';
                var thistoast = this.$toast;
                if (busy) {
                    class_type = 'busy_class';
                    word = title_word = 'Busy/Holiday';
                }
                thistoast.options.position = 'center';
                var self = this;

                let register_Form = document.getElementById('availability_dashboard_form');
                let form_data = new FormData(register_Form);
                form_data.append('class',class_type);
                //this.events.push(newObj);
                axios.post('/' + role + '/saveCalendarAvailability', form_data)
                    .then(function (response) {
                        self.reloadCalendar();
                        if (busy) {
                            thistoast.error(' ', "Success <br>" +
                                self.availability_title + " " + self.availability_content + "<br>" +
                                self.start + " - " + self.end);
                        } else {
                            thistoast.success(' ', "Success <br>" +
                                self.availability_title + " " + self.availability_content + "<br>" +
                                self.start + " - " + self.end);
                        }
                        setTimeout(function () {
                            $('html, body').animate({
                                scrollTop: ($(".scrolToCalend").offset().top)
                            }, 1000);
                        })
                        self.clickedDate = false;
                    })
                    .catch(function (error) {
                        if(typeof error.response != "undefined" && error.response.data.errors != undefined) {
                            if (error.response.data.errors.title) {
                                thistoast.error(' ', error.response.data.errors.title[0]);
                            }
                            if (error.response.data.errors.availability_content) {
                                thistoast.error(' ', error.response.data.errors.availability_content[0]);
                            }
                            if (error.response.data.errors.start_date) {
                                thistoast.error(' ', error.response.data.errors.start_date[0]);
                            }
                            if (error.response.data.errors.booking_start) {
                                thistoast.error(' ', error.response.data.errors.booking_start[0]);
                            }
                            if (error.response.data.errors.booking_end) {
                                thistoast.error(' ', error.response.data.errors.booking_end[0]);
                            }
                        }
                    });
                e.stopPropagation()
            },
            confButton() {
                this.ckickedDate = true;
                $(document).on('click', '.confirmButton', function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                });
            },
            createList(event) {
                var parent = document.getElementById('listDates'),
                    newElem = parent.querySelector('.getIsDay'),
                    elem = parent.querySelectorAll('.isDay');
                newElem.classList.remove('getIsDay');
                newElem.classList.add('isDay');
                newElem.style.display = '';
                newElem.children[0].querySelector('input').setAttribute("name","start_date[" + (elem.length) + "]");
                newElem.children[1].querySelector('input').setAttribute("name","end_date[" + (elem.length) + "]");
                // newElem.children[0].querySelector('input').value = '';
                newElem.children[1].querySelector('input').value = '';
                this.addDay = elem.length;
                // event.preventDefault();
            },
        }
    });
}

/*employer calendar*/
if (document.getElementById("employer_availability")) {
    var role = 'employer';
    const vmHeader = new Vue({
        el: '#employer_availability',
        components: {'vue-cal': vuecal, VueTimepicker},
        data: {
            calendarPlugins: [],
            events: [],
            availability_title: "",
            availability_content: "",
            availability_start_time: "",
            availability_end_time: "",
            availability_selected_date: "",
            availability_selected_end_date: "",
            clickedDate: "",
            clickedEndDate: "",
            recurring_date: "",
            user_id: "",
            skill_id: "",
            id: "",
            addedToEvents: false,
            selectedEvent: null,
            selectedEventDrag: false
        },
        created() {
            var events = [];
            let self = this;
            axios.get('/' + role + '/getCalendarEvents').then(function (response) {
                if (self.events.length > 0) {
                    self.events.splice(0);
                }

                if (response && Array.isArray(response.data)) {
                    response.data.forEach(item => {
                        item.end = self.convertDateForFormatCalendar(item.end);
                        item.start = self.convertDateForFormatCalendar(item.start);
                        if (item.end !== null && item.start !== null) {
                            self.events.push(item);
                        }
                    });
                }
            });
        },

        methods: {

            convertDateForFormatCalendar(date) {
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            convertDateForFormatView(date) {
                if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            customEventCreation() {
                const dateTime = prompt('Create event on (yyyy-mm-dd hh:mm)', '2018-11-20 13:15')
                // Check if date format is correct before creating event.
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(dateTime)) {
                    this.$refs.vuecal.createEvent(
                        // Formatted start date and time or JavaScript Date object.
                        dateTime,
                        // Custom event props (optional).
                        {title: 'New Event', content: 'yay! �', classes: ['leisure']}
                    )
                } else if (dateTime) alert('Wrong date format.')
            },
            formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [day, month, year].join('-');
            },
            onEventCreate (event, deleteEventFunction) {
                this.addedToEvents = false;
                console.log('onEventCreate', event)
                // this.createNewEvent(event);
            },
            onEventFocus() {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                this.onEventClick(event)
                // return event;
            },
            onEventDragCreate(event) {
                this.addedToEvents = false;
                console.log('eventDragCreate', event);
                // return this.createNewEvent(event)
                return event;
            },
            onEventDurationChange(event) {
                this.addedToEvents = false;
                console.log('onEventDurationChange', event);
                this.onEventClick(event);
                return event;
            },
            createNewEvent(date) {
                console.log('createNewEvent');
                console.log(date);
                this.selectedEventDrag = false;
                if (date.start != null && typeof date.start != 'undefined') {
                    date.start = this.convertDateForFormatView(date.start);
                    this.selectedEventDrag = true;
                }
                if (date.end != null && typeof date.end != 'undefined') {
                    date.end = this.convertDateForFormatView(date.end);
                    this.selectedEventDrag = true;
                }

                if (!this.selectedEventDrag && (this.clickedDate == "" && this.clickedEndDate == '') || (this.clickedDate != "" && this.clickedEndDate != '')) {
                    this.clickedDate = new Date(date);
                    this.clickedEndDate = new Date(date);
                    this.availability_selected_date = this.formatDate(date);
                    this.availability_selected_end_date = '';
                    this.start = this.availability_start_time = "00:01";
                    this.end = this.availability_end_time = "23:59";
                } else if (this.selectedEventDrag) {
                    var startdate = date.start.split(' ');
                    var enddate = date.end.split(' ');
                    this.availability_selected_date = startdate[0];
                    this.availability_selected_end_date = enddate[0];
                    this.start = this.availability_start_time = startdate[1];
                    this.end = this.availability_end_time = enddate[1];
                    this.selectedEventDrag = false
                }
                else {
                    this.clickedEndDate = new Date(date);
                    this.availability_selected_end_date = this.formatDate(date);
                }
                // this.availability_start_time = (this.availability_start_time != "") ? this.availability_start_time : "00:01";
                // this.availability_end_time = (this.availability_end_time != "") ? this.availability_end_time : "23:59";

                var newObj =
                    {
                        start: this.availability_selected_date + " " + this.availability_start_time,
                        end: this.availability_selected_end_date + " " + this.availability_end_time,
                        title: this.availability_title != "" ? this.availability_title : "•",
                        content: this.availability_content != "" ? this.availability_content : "•",
                        skill_id: this.skill_id,
                        contentFull: this.availability_content,
                        class: 'selected_class'
                    };
                console.log(newObj);
                // if (busy) {
                //     newObj.class = 'busy_class';
                // }
                if (!this.addedToEvents) {
                    this.events.push(newObj);
                    this.addedToEvents = true;
                }
                else {
                    this.events.pop();
                    this.events.push(newObj);
                    this.addedToEvents = true;
                }

            },
            saveNewEventBusy(e) {
                this.saveNewEventAvailability(e, true);
            },
            saveNewEventAvailability(e, busy) {
                e.preventDefault();
                var word = '•';
                var title_word = 'Available'
                var class_type = 'available_class';
                if (busy) {
                    class_type = 'busy_class';
                    word = title_word = 'Busy/Holiday';
                }
                e.target.classList.remove(class_type)
                var
                    availability_start_time = this.availability_start_time,
                    availability_end_time = this.availability_end_time,
                    availability_title = this.availability_title,
                    availability_content = this.availability_content,
                    thistoast = this.$toast,
                    newObj =
                        {
                            start: this.availability_selected_date + " " + (availability_start_time != "" ? availability_start_time : "00:01"),
                            end: (this.availability_selected_end_date != '' ? this.availability_selected_end_date : this.availability_selected_date) + " " + (availability_end_time != "" ? availability_end_time : "23:59"),
                            title: availability_title != "" ? availability_title : word,
                            content: availability_content != "" ? availability_content : word,
                            contentFull: availability_content != "" ? availability_content : word,
                            recurring_date: (this.recurring_date == true) ? 'week' : null,
                            skill_id: this.skill_id,
                            class: class_type
                        };
                thistoast.options.position = 'center';

                //this.events.push(newObj);
                axios.post('/' + role + '/saveCalendarAvailability', newObj)
                    .then(function (response) {
                        availability_start_time = '';
                        availability_end_time = '';
                        availability_title = '';
                        availability_content = '';
                        // console.log(response.data.status)
                        // console.log('Success ' + word + ': ' + newObj.start + '-' + newObj.end)
                        if (busy) {
                            thistoast.error(' ', "Success " + title_word + ": \n" + newObj.start + " - " + newObj.end);
                        } else {
                            thistoast.success(' ', "Success " + title_word + ": \n" + newObj.start + " - " + newObj.end);
                        }
                    })
                    .catch(function (error) {
                        // console.log(error);
                        if (typeof error.response.data.errors != 'undefined') {
                            thistoast.error('Error', error.status);
                        }
                    });
            },
            updateEvent(e){
                e.preventDefault();
                console.log(this);
                var availability_start_time = this.availability_start_time,
                    availability_end_time = this.availability_end_time,
                    availability_title = this.availability_title,
                    class_type = this.class_type,
                    availability_content = this.availability_content,
                    thistoast = this.$toast,
                    id = this.id,
                    user_id = this.user_id,
                    recurring_date = (this.recurring_date == true) ? 'week' : null,
                    updObj =
                        {
                            id: id,
                            user_id: user_id,
                            recurring_date: recurring_date,
                            start: this.availability_selected_date + " " + (availability_start_time != "" ? availability_start_time : "00:01"),
                            end: (this.availability_selected_end_date != '' ? this.availability_selected_end_date : this.availability_selected_date) + " " + (availability_end_time != "" ? availability_end_time : "23:59"),
                            title: availability_title,
                            content: availability_content,
                            skill_id: this.skill_id,
                            contentFull: availability_content,
                            class: class_type
                        };
                thistoast.options.position = 'center';

                //this.events.push(newObj);
                axios.post('/' + role + '/updateCalendarAvailability', updObj)
                    .then(function (response) {
                        // availability_start_time = '';
                        // availability_end_time = '';
                        // availability_title = '';
                        // availability_content = '';
                        // skill = '';
                        // id = '';
                        // user_id = '';
                        // recurring_date = '';
                        thistoast.success(' ', "Updated : \n" + updObj.start + " - " + updObj.end);
                    })
                    .catch(function (error) {
                        // console.log(error);
                        if (typeof error.response != 'undefined') {
                            thistoast.error('Error', error.status);
                        }
                    });
            },
            onEventClick(event) {
                // this.confButton();
                this.selectedEvent = event;
                var startdate = event.start.split(' ');
                var enddate = event.end.split(' ');

                var formatdatestart = moment(startdate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                var formatdateend = moment(enddate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');

                this.availability_selected_date = formatdatestart;
                this.availability_selected_end_date = formatdateend;
                this.availability_start_time = startdate[1];
                this.availability_end_time = enddate[1];
                this.availability_content = event.contentFull;
                this.skill_id = event.skill_id;
                this.availability_title = event.title;
                this.recurring_date = event.recurring_date;
                this.user_id = event.user_id;
                this.id = event.id;

            },
            onEdeditableEvents(event) {
                this.confButton();
                console.log('onEdeditableEvents', event);
                // this.selectedEvent = event;
                // var startdate = event.start.split(' ');
                // var enddate = event.end.split(' ');
                //
                // var formatdatestart = moment(startdate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                // var formatdateend = moment(enddate[0], 'YYYY-MM-DD').format('DD-MM-YYYY');
                //
                // this.availability_selected_date = formatdatestart;
                // this.availability_selected_end_date = formatdateend;
                // this.availability_start_time = startdate[1];
                // this.availability_end_time = enddate[1];
                // this.availability_content = event.contentFull;
                // this.skill_id = event.skill_id;
                // this.availability_title = event.title;
                // this.recurring_date = event.recurring_date;
                // this.user_id = event.user_id;
                // this.id = event.id;
                // e.stopPropagation()
            },
            confButton(e) {
                console.log(e);
                console.log(this);
                this.ckickedDate = true;
                this.createNewEvent(e);
                $(document).on('click', '.confirmButton', function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                });
            }
        }
    });
}


if (document.getElementById("wt-header")) {
    const vmHeader = new Vue({
        el: '#wt-header',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
    });

}

if (document.getElementById("message_center")) {
    const vmpassReset = new Vue({
        el: '#message_center',
        mounted: function () {
        },
        data: {},
        methods: {}
    });
}

var page = document.getElementById("searchHomePage");

if (page) {
    const searchHomePage = new Vue({
        el: '#searchHomePage',
        components: {'vue-cal': vuecal, Multiselect},
        mounted: function () {
            if (this.$refs['radius']) {
                this.radius = this.$refs['radius'].attributes['data-value'].value;
            }
        },
        data: {
            events: [],
            skills: [],
            skill: "",
            location: "",
            selecteddate: '',
            selectedDate: '',
            selectedSkills: "",
            selectedLocation: "",
            search_type: (page.attributes['attr-type'] ? page.attributes['attr-type'].value : "freelancer"),
            radius: ''
        },
        methods: {
            changeSearchType(type) {
                this.search_type = type;
            },
            changeSelectedDate(date) {
                //this.$refs.searchfield.inputValue = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() ;
                this.selectedDate = date.getDate() + "/" + (date.getMonth() + 1) + '/' + date.getFullYear();
                jQuery('#calendar_small').hide();
                //this.getSearchableData(this.types), this.emptyField(this.types), this.changeFilter()
                // window.location.replace(APP_URL+'/search-results?type=job&start_date='+this.$refs.searchfield.inputValue);
            },
            onSkillSelect(option) {

            },
            submit_search() {
                var url = APP_URL + '/search-results?type=' + this.search_type;
                var location = document.getElementById('straddress').value;

                if (location != '') {
                    url += '&location=' + encodeURIComponent(location);

                    var latitude = document.getElementById('latitude').value;
                    var longitude = document.getElementById('longitude').value;

                    if (latitude != '' && longitude != '') {
                        url += '&latitude=' + latitude + '&longitude=' + longitude;
                    }
                }

                if (this.skill != '') {
                    url += '&skill=' + encodeURIComponent(this.skill);
                }

                if (this.radius != '') {
                    url += '&radius=' + this.radius;
                }

                if (this.selectedDate != '') {
                    url += '&' + (this.search_type == 'freelancer' ? 'avail_date' : 'start_date') + '=' + this.selectedDate;
                }

                window.location.replace(url);
            },
            updateAddressLocation: function (place) {
                var data = {};
                for (var i in place.address_components) {
                    data[place.address_components[i].types[0]] = place.address_components[i].long_name;
                }

                var addr = '';

                if (data.street_number) {
                    addr += data.street_number + ', ';
                }

                if (data.route) {
                    addr += data.route;
                    document.getElementById('straddress').value = addr;
                }

                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            }
        },
        created: function () {
            let self = this;
            axios.get('/employer/getCalendarEvents').then(function (response) {
                console.log(this);
                if (response) {
                    self.events = response.data;
                }
            });
            axios.get('/get-skills').then(function (response) {

                if (response.data.type == 'success') {
                    self.skills = response.data.skills;
                }
            });
        }
    });
}

if (document.getElementById("home")) {
    const vmstripePass = new Vue({
        el: '#home',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            show: false,
        },
        methods: {}
    });
}

if (document.getElementById("registration")) {

    const registration = new Vue({
        el: '#registration',
        components: {Multiselect},
        created: function () {
            var url_string = window.location.href
            var url = new URL(url_string);
            var role = url.searchParams.get("role");
            if (role && role != "") {
                //jQuery('.role-'+role.toLowerCase()).trigger("click"); //TODO

                this.user_role = role;
                this.selectedRole(role);
                this.checkStep1();
            }

            // if (role.toLowerCase() == 'employer') {
            //     this.is_show = true;
            // } else if(role.toLowerCase()=='freelancer') {
            //     this.is_show_freelancer = true;
            //     this.is_show = false;
            // }
            // else {
            //     this.is_show_freelancer = false;
            //     this.is_show = false;
            // }

            this.initBackgroundImages();
        },
        data: {
            notificationSystem: {
                options: {
                    error: {
                        position: "topRight",
                        timeout: 4000
                    }
                }
            },
            step: 0,
            user_email: '',
            first_name: '',
            last_name: '',
            limitedCompany: false,
            choosen_payment: "",
            choosen_payment_mehod: "",
            form_step1: {
                email_error: '',
                is_email_error: false,
                first_name_error: '',
                is_first_name_error: false,
                last_name_error: '',
                is_last_name_error: false,
                password_error: '',
            },
            form_step2: {
                locations_error: '',
                is_locations_error: false,
                is_password_error: false,
                password_confirm_error: '',
                is_password_confirm_error: false,
                termsconditions_error: '',
                is_termsconditions_error: false,
                title_error: '',
                telno_error: '',
                dob_error: '',
                date_available_error: '',
                emp_contact_error: '',
                emp_telno_error: '',
                emp_website_error: '',
                emp_cqc_rating_error: '',
                practice_code_error: '',
                pin_error: '',
                itsoftware_error: '',

            },
            form_step3:
                {
                    payment_option_error: '',
                    isPaypalEmail_error: '',
                },
            loading: false,
            user_role: 'employer',
            is_show: true,
            is_show_freelancer: false,
            error_message: '',
            subscription: "",
            stripe_token: new Date().getTime(),
            paypal_show: false,
            cheque_show: false,
            P60upload: false,
            payment_method: "",
            setting: "",
            appoSlotTime: "",
            adm_catch_time: "",
            insurancecheckbox: "",
            timeAllocated: "",
            paymentTerm: "",
            specialInterest: "",
            dbscheck: "",
            itsoftware: '',
            itsoftware_options: itsoftware_options,
            all_background_classes: '',
            max_background_images: 0,
        },
        methods: {
            checkoutStripe(plan_id) {
                var stripe = Stripe('pk_test_RMNWdU6nBgL1DAw9AtGOV1X100UKwPylmJ');

                // When the customer clicks on the button, redirect
                // them to Checkout.
                stripe.redirectToCheckout({
                    items: [{plan: plan_id, quantity: 1}],

                    // Do not rely on the redirect to the successUrl for fulfilling
                    // purchases, customers may not always reach the success_url after
                    // a successful payment.
                    // Instead use one of the strategies described in
                    // https://stripe.com/docs/payments/checkout/fulfillment
                    successUrl: APP_URL + '/register/checkout_complete/' + this.stripe_token,
                    cancelUrl: APP_URL,
                })
                    .then(function (result) {
                        if (result.error) {
                            // If `redirectToCheckout` fails due to a browser or network
                            // error, display the localized error message to your customer.
                            var displayError = document.getElementById('error-message');
                            displayError.textContent = result.error.message;
                        }
                    });
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            prev: function () {
                this.step--;
                this.changeBkgroundImages(this.step);
            },
            next: function () {
                this.step++;
                this.changeBkgroundImages(this.step);
            },
            initBackgroundImages () {
                this.max_background_images = 4;
                this.all_background_classes = '';
                for (let i = 1; i <= this.max_background_images; i++) {
                    this.all_background_classes += " main-wrapper-register-" + i;
                }
            },
            changeBkgroundImages (step) {
                let element = jQuery('.main-wrapper');
                if (element.length > 0) {
                    let currentImg = 1;
                    if (step >= 1 && step <= this.max_background_images) {
                        currentImg = step;
                    } else {
                        currentImg = (step % this.max_background_images) > 0 ? step % this.max_background_images : 1;
                    }

                    element.removeClass(this.all_background_classes).addClass('main-wrapper-register-' + currentImg);
                }
            },
            selectedRole: function (role) {
                if (role.toLowerCase() == 'employer') {
                    this.is_show = true;
                    this.is_show_freelancer = false;
                } else if (role.toLowerCase() == 'freelancer') {
                    this.is_show_freelancer = true;
                    this.is_show = false;
                }
                else {
                    this.is_show_freelancer = false;
                    this.is_show = false;
                }
                console.log(role);
            },
            selectedPayment: function (payment_name) {
                switch (payment_name) {
                    case "BACS":
                        this.P60upload = true;
                        this.cheque_show = false;
                        this.paypal_show = false;

                        break;
                    case "Paypal":
                        this.paypal_show = true;
                        this.P60upload = false;
                        this.cheque_show = false;

                        break;
                    case "Cheque":
                        this.cheque_show = true;
                        this.paypal_show = false;
                        this.P60upload = false;
                }
            },
            selectedSubscription: function (subscription) {
                this.subscription = subscription;
            },
            checkStep1: function (e) {
                this.form_step1.first_name_error = '';
                this.form_step1.is_first_name_error = false;
                this.form_step1.last_name_error = '';
                this.form_step1.is_last_name_error = false;
                this.form_step1.email_error = '';
                this.form_step1.is_email_error = false;
                this.form_step2.password_error = '';
                this.form_step2.is_password_error = false;
                this.form_step2.password_confirm_error = '';
                this.form_step2.is_password_confirm_error = false;
                var self = this;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);
                axios.post(APP_URL + '/register/form-step1-custom-errors', form_data)
                    .then(function (response) {
                        self.next();
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.form_step1.first_name_error = error.response.data.errors.first_name[0];
                            self.form_step1.is_first_name_error = true;
                        }
                        if (error.response.data.errors.last_name) {
                            self.form_step1.last_name_error = error.response.data.errors.last_name[0];
                            self.form_step1.is_last_name_error = true;
                        }
                        if (error.response.data.errors.email) {
                            self.form_step1.email_error = error.response.data.errors.email[0];
                            self.form_step1.is_email_error = true;
                        }
                        if (error.response.data.errors.password) {
                            self.form_step2.password_error = error.response.data.errors.password[0];
                            self.form_step2.is_password_error = true;
                        }
                        if (error.response.data.errors.password_confirmation) {
                            self.form_step2.password_confirm_error = error.response.data.errors.password_confirmation[0];
                            self.form_step2.is_password_confirm_error = true;
                        }
                    });
            },
            checkStep2: function (error_message) {
                this.error_message = error_message;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);

                this.form_step2.termsconditions_error = '';
                this.form_step2.is_termsconditions_error = false;

                this.form_step2.emp_website_error = '';
                this.form_step2.is_emp_website_error = false;
                this.form_step2.pin_error = '';
                this.form_step2.is_pin_error = false;
                this.form_step2.pin_date_revalid_error = '';
                this.form_step2.is_pin_date_revalid_error = false;
                this.form_step2.straddress_error = '';
                this.form_step2.is_straddress_error = false;
                this.form_step2.city_error = '';
                this.form_step2.is_city_error = false;
                this.form_step2.postcode_error = '';
                this.form_step2.is_postcode_error = false;
                this.form_step2.emp_contact_error = '';
                this.form_step2.is_emp_contact_error = false;
                this.form_step2.emp_telno_error = '';
                this.form_step2.is_emp_telno_error = false;
                this.form_step2.emp_email_error = '';
                this.form_step2.is_emp_email_error = false;
                this.form_step2.practice_code_error = '';
                this.form_step2.is_practice_code_error = false;
                this.form_step2.emp_cqc_rating_date_error = '';
                this.form_step2.is_emp_cqc_rating_date_error = false;
                this.form_step2.emp_cqc_rating_error = '';
                this.form_step2.is_emp_cqc_rating_error = false;
                this.form_step2.org_type_error = '';
                this.form_step2.is_org_type_error = false;
                this.form_step2.direct_booking_error = '';
                this.form_step2.is_direct_booking_error = false;
                this.form_step2.prof_ind_cert = '';
                this.form_step2.is_prof_ind_cert = false;
                this.form_step2.passport_visa = '';
                this.form_step2.is_passport_visa = false;
                var self = this;
                axios.post(APP_URL + '/register/form-step2-custom-errors', form_data).then(function (response) {
                    self.next();
                })
                    .catch(function (error) {
                        var error_data = error.response.data.errors;
                        if (error_data.prof_ind_cert) {
                            self.form_step2.prof_ind_cert = error_data.prof_ind_cert[0];
                            self.form_step2.is_prof_ind_cert = true;
                        }
                        if (error_data.passport_visa) {
                            self.form_step2.passport_visa = error_data.passport_visa[0];
                            self.form_step2.is_passport_visa = true;
                        }
                        if (error_data.emp_website) {
                            self.form_step2.emp_website_error = error_data.emp_website[0];
                            self.form_step2.is_emp_website_error = true;
                        }
                        if (error_data.pin) {
                            self.form_step2.pin_error = error_data.pin[0];
                            self.form_step2.is_pin_error = true;
                        }
                        if (error_data.pin_date_revalid) {
                            self.form_step2.pin_date_revalid_error = error_data.pin_date_revalid[0];
                            self.form_step2.is_pin_date_revalid_error = true;
                        }
                        if (error_data.straddress) {
                            self.form_step2.straddress_error = error_data.straddress[0];
                            self.form_step2.is_straddress_error = true;
                        }
                        if (error_data.city) {
                            self.form_step2.city_error = error_data.city[0];
                            self.form_step2.is_city_error = true;
                        }
                        if (error_data.postcode) {
                            self.form_step2.postcode_error = error_data.postcode[0];
                            self.form_step2.is_postcode_error = true;
                        }
                        if (error_data.emp_contact) {
                            self.form_step2.emp_contact_error = error_data.emp_contact[0];
                            self.form_step2.is_emp_contact_error = true;
                        }
                        if (error_data.emp_telno) {
                            self.form_step2.emp_telno_error = error_data.emp_telno[0];
                            self.form_step2.is_emp_telno_error = true;
                        }
                        if (error_data.emp_email) {
                            self.form_step2.emp_email_error = error_data.emp_email[0];
                            self.form_step2.is_emp_email_error = true;
                        }
                        if (error_data.practice_code) {
                            self.form_step2.practice_code_error = error_data.practice_code[0];
                            self.form_step2.is_practice_code_error = true;
                        }
                        if (error_data.emp_cqc_rating_date) {
                            self.form_step2.emp_cqc_rating_date_error = error_data.emp_cqc_rating_date[0];
                            self.form_step2.is_emp_cqc_rating_date_error = true;
                        }
                        if (error_data.emp_cqc_rating) {
                            self.form_step2.emp_cqc_rating_error = error_data.emp_cqc_rating[0];
                            self.form_step2.is_emp_cqc_rating_error = true;
                        }
                        if (error_data.org_type) {
                            self.form_step2.org_type_error = error_data.org_type[0];
                            self.form_step2.is_org_type_error = true;
                        }
                        if (error_data.direct_booking) {
                            self.form_step2.direct_booking_error = error_data.direct_booking[0];
                            self.form_step2.is_direct_booking_error = true;
                        }

                        if (error_data.termsconditions) {
                            self.form_step2.termsconditions_error = error_data.termsconditions[0];
                            self.form_step2.is_termsconditions_error = true;
                        }
                    });
            },
            checkStep3: function (error_message) {


                if (this.user_role == 'employer') {

                    if ($('.paypalemail').val() && $('.paypalemail').val() != '') {
                        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                        if (reg.test($('.paypalemail').val()) == false) {
                            this.form_step3.isPaypalEmail_error = true;
                            $('.paypalemail').addClass('is-invalid');
                            return false;
                        }
                        else {
                            this.form_step3.isPaypalEmail_error = false;
                            $('.paypalemail').removeClass('is-invalid');
                        }

                    }

                    this.submitUser(true);
                } else {
                    this.next();
                }
            },
            checkStep4: function (error_message) {
                if (this.user_role == 'support') {
                    this.next();
                } else {
                    this.submitUser();
                }
            },
            submitUser: function (ajax) {
                if (this.user_role == 'freelancer') {
                    ajax = false;
                }
                this.loading = true;
                let register_Form = document.getElementById('register_form');
                let form_data = new FormData(register_Form);
                // form_data.append('email', this.user_email);
                // form_data.append('first_name', this.first_name);
                // form_data.append('last_name', this.last_name);
                var self = this;
                axios.post(APP_URL + '/register', form_data)
                    .then(function (response) {
                        console.log(response.data.type);
                        self.loading = false;
                        if (response.data.type == 'success') {
                            if (response.data.email == 'not_configured' && !ajax) {
                                window.location.replace(response.data.url);
                            } else {
                                if (self.subscription != "") {
                                    self.checkoutStripe(self.subscription);
                                }
                                else {
                                    self.loginRegisterUser();
                                    // self.next();
                                }
                            }
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.custom_error = true;
                            if (response.data.email_error) self.form_errors.push(response.data.email_error);
                            if (response.data.password_error) self.form_errors.push(response.data.password_error);
                        }
                        else if (response.data.type == 'server_error') {
                            self.loading = false;
                            self.custom_error = true;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                        // if (error.response.status == 500) {
                        //     self.showError(self.error_message);
                        // }
                    });
            },
            verifyCode: function () {
                this.loading = true;
                let register_Form = document.getElementById('verification_form');
                let form_data = new FormData(register_Form);
                var self = this;
                axios.post(APP_URL + '/register/verify-user-code', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.next();
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loginRegisterUser: function () {
                var self = this;
                axios.post(APP_URL + '/register/login-register-user')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            window.location.href = APP_URL + '/' + response.data.role + '/dashboard';
                        } else if (response.data.type == 'error') {
                            self.error_message = response.data.message;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            scrollTop: function () {
                var _scrollUp = jQuery('html, body');
                _scrollUp.animate({scrollTop: 0}, 'slow');
                jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
            },
            updateAddressLocation: function (place) {
                var data = {};
                for (var i in place.address_components) {
                    data[place.address_components[i].types[0]] = place.address_components[i].long_name;
                }

                var addr = '';

                if (data.street_number) {
                    addr += data.street_number + ', ';
                }

                if (data.route) {
                    addr += data.route;
                    document.getElementById('straddress').value = addr;
                }

                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
                document.getElementById('city').value = (data.postal_town ? data.postal_town : (data.locality ? data.locality : ''));
                document.getElementById('postcode').value = data.postal_code ? data.postal_code : '';
            },
            validatePracticeCode: function(){
                this.insurancecheckbox = true;
                validate_practice_code(this);
            }
        }
    });

}

if (document.getElementById("skill-list")) {
    const vmskillList = new Vue({
        el: '#skill-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            skillID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-skills").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-skills', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/skills');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("pass-reset")) {
    const vmpassReset = new Vue({
        el: '#pass-reset',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {},
        methods: {}
    });
}

if (document.getElementById("dpt-list")) {
    const vmdptList = new Vue({
        el: '#dpt-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            dptID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-dpts").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-dpts', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/departments');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("pages-list")) {
    const vmpageList = new Vue({
        el: '#pages-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getPageOption();
        },
        data: {
            show_page_banner: true,
            show_page: false,
            page_banner: false,
            pageID: "",
            is_show: false,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                }
            },
        },
        methods: {
            removeImage: function (id) {
                this.page_banner = true;
                document.getElementById(id).value = '';
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitPage: function (msg) {
                let page_Form = document.getElementById('pages');
                let form_data = new FormData(page_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('content', description);
                var self = this;
                axios.post(APP_URL + '/admin/store-page', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(msg);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/pages');
                            }, 4000)
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.content) {
                            self.showError(error.response.data.errors.content[0]);
                        }
                    });
            },
            getPageOption: function () {
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var id = segment_array[segment_array.length - 1];
                if (segment_str == '/admin/pages/edit-page/' + id) {
                    let self = this;
                    axios.post(APP_URL + '/admin/get-page-option', {
                        page_id: id
                    })
                        .then(function (response) {
                            if (response.data.type == 'success') {
                                if (response.data.show_page == 'true') {
                                    self.show_page = true;
                                } else {
                                    self.show_page = false;
                                }
                                if (response.data.show_banner == 'true') {
                                    self.show_page_banner = true;
                                } else {
                                    self.show_page_banner = false;
                                }
                            }
                        });
                }
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-pages").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-pages', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/pages');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("reviews")) {
    const vmdptList = new Vue({
        el: '#reviews',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-rev-options").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-rev-options', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/review-options');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("delivery-time")) {
    const vmdeliverytime = new Vue({
        el: '#delivery-time',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-delivery-time").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-delivery-time', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/delivery-time');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("response-time")) {
    const responsetime = new Vue({
        el: '#response-time',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            optionID: "",
            is_show: false,
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-response-time").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-response-time', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/response-time');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("cat-list")) {
    const vmcatList = new Vue({
        el: '#cat-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            uploaded_image: false,
            color: '',
            rgb: '',
            wheel: '',
            is_show: false
        },
        components: {Verte},
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-cats").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                console.log(deleteIDs);
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-cats', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/categories');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("badge-list")) {
    const vmbadge = new Vue({
        el: '#badge-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getBadgeColor();
        },
        components: {Verte},
        data: {
            uploaded_image: false,
            color: '',
            is_show: false
        },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            getBadgeColor: function () {
                var self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var id = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/badge/get-color', {
                    id: id,
                })
                    .then(function (response) {
                        if (response.data.type = 'success') {
                            self.color = response.data.color;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-badges").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-badges', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/badges');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("lang-list")) {
    const vmdptList = new Vue({
        el: '#lang-list',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            langID: "",
            is_show: false
        },
        methods: {
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-langs").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-langs', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/languages');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    });
}

if (document.getElementById("location")) {
    var location = new Vue({
        el: '#location',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: {
            locationID: "",
            message: '',
            alert_message: '',
            custom_error: false,
            uploaded_image: false,
            is_show: false,
        },
        methods: {
            removeImage: function (id) {
                this.uploaded_image = true;
                document.getElementById(id).value = '';
            },
            selectAll: function () {
                this.is_show = !this.is_show;
                jQuery("#wt-locs").change(function () {
                    jQuery("input:checkbox").prop('checked', jQuery(this).prop("checked"));
                });
            },
            selectRecord: function () {
                if (document.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                    this.is_show = true;
                } else {
                    this.is_show = false;
                }
            },
            deleteChecked: function (msg, text) {
                var deleteIDs = jQuery("#checked-val input:checkbox:checked").map(function () {
                    return jQuery(this).val();
                }).get();
                var self = this;
                this.$swal({
                    title: msg,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-checked-locs', {
                            ids: deleteIDs
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: text,
                                            type: "success"
                                        })
                                    }, 500);
                                    window.location.replace(APP_URL + '/admin/locations');
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            }
        }
    })
}

if (document.getElementById("user_profile")) {

    const freelancerProfile = new Vue({
        el: '#user_profile',
        components: {Multiselect},
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }

            if (this.$refs['input']) {
                this.itsoftware = JSON.parse(this.$refs['input'].$attrs['data-value']);
            }
        },
        created: function () {
            Event.$on('award-component-render', (data) => {
                this.server_error = data.error;
            })
            Event.$on('experience-component-render', (data) => {
                this.experience_server_error = data.error;
            })
        },
        data: {
            loading: false,
            server_error: '',
            experience_server_error: '',
            disable_btn: '',
            saved_class: 'far fa-heart',
            job_saved_class: 'far fa-heart',
            click_to_save: '',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_job_save: '',
            disable_follow: '',
            job_click_to_save: '',
            avater_id: 'profile_image',
            banner_id: 'profile_banner',
            avater_ref: 'profile_image_ref',
            banner_ref: 'profile_banner_ref',
            uploaded_image: false,
            uploaded_cv: false,
            uploaded_banner: false,
            payment_method: "",
            setting: "",
            appoSlotTime: "",
            adm_catch_time: "",
            timeAllocated: "",
            paymentTerm: "",
            specialInterest: "",
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\User',
                report_type: '',
            },
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        class: 'complete_notification'
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        class: 'info_notification',
                        onClosing: function (instance, toast, closedBy) {
                            freelancerProfile.showCompleted(Vue.prototype.trans('lang.profile_update_success'));
                        }
                    }
                }
            },
            is_popup: false,
            itsoftware: [],
            itsoftware_options: itsoftware_options,
            subscription: ''
        },
        ready: function () {

        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitProfileSettings: function () {
                this.loading = true;
                var self = this;
                var profile_form = document.getElementById('profile_form');
                let form_data = new FormData(profile_form);
                axios.post(APP_URL + '/freelancer/profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.next();
                        } else if (response.data.type == 'error') {
                            self.custom_error = true;
                            if (response.data.email_error) self.form_errors.push(response.data.email_error);
                            if (response.data.password_error) self.form_errors.push(response.data.password_error);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            removeImage: function (event) {
                this.uploaded_image = true;
                document.getElementById("hidden_avater").value = '';
            },
            removeCv: function (event) {
                this.uploaded_cv = true;
                document.getElementById("hidden_cv").value = '';
            },
            selectedSubscription: function (subscription) {
                this.subscription = subscription;
            },
            removeBanner: function (event) {
                this.uploaded_banner = true;
                document.getElementById("hidden_banner").value = '';
            },
            submitFreelancerProfile: function () {
                var self = this;
                var profile_data = document.getElementById('freelancer_profile');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/freelancer/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.saving_profile'));
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.gender) {
                            self.showError(error.response.data.errors.gender[0]);
                        }
                        if (error.response.data.errors.pin) {
                            self.showError(error.response.data.errors.pin[0]);
                        }
                        if (error.response.data.errors.pin_date_revalid) {
                            self.showError(error.response.data.errors.pin_date_revalid[0]);
                        }
                        if (error.response.data.errors.prof_ind_cert) {
                            self.showError(error.response.data.errors.prof_ind_cert[0]);
                        }
                        if (error.response.data.errors.passport_visa) {
                            self.showError(error.response.data.errors.passport_visa[0]);
                        }
                    });
            },
            submitSupportProfile: function () {
                var self = this;
                var profile_data = document.getElementById('freelancer_profile');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/support/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.saving_profile'));
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.gender) {
                            self.showError(error.response.data.errors.gender[0]);
                        }
                    });
            },
            submitExperienceEduction: function () {
                var self = this;
                var exp_edu_data = document.getElementById('experience_form');
                let form_data = new FormData(exp_edu_data);
                axios.post(APP_URL + '/freelancer/store-experience-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            self.showError(self.experience_server_error);
                        }
                    });
            },
            submitPaymentSettings: function () {
                var self = this;
                var payment = document.getElementById('payment_settings');
                let form_data = new FormData(payment);
                axios.post(APP_URL + '/freelancer/store-payment-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.processing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/dashboard');
                            }, 4000);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.payout_id) {
                            self.showError(error.response.data.errors.payout_id[0]);
                        }
                    });
            },
            submitAwardsProjects: function () {
                var self = this;
                var awards_projects = document.getElementById('awards_projects');
                let form_data = new FormData(awards_projects);
                axios.post(APP_URL + '/freelancer/store-project-award-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            self.showError(self.server_error);
                        }
                    });
            },
            submitEmployerProfile: function () {
                var self = this;
                var profile_data = document.getElementById('employer_data');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/employer/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.process);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/employer/dashboard');
                            }, 4000);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                    });
            },
            submitAdminProfile: function () {
                var self = this;
                var profile_data = document.getElementById('admin_data');
                let form_data = new FormData(profile_data);
                axios.post(APP_URL + '/admin/store-profile-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.process);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/profile');
                            }, 4000);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.first_name) {
                            self.showError(error.response.data.errors.first_name[0]);
                        }
                        if (error.response.data.errors.last_name) {
                            self.showError(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.email) {
                            self.showError(error.response.data.errors.email[0]);
                        }
                    });
            },
            sendOffer: function (auth_user) {
                if (auth_user == 1) {
                    this.$refs.myModalRef.show();
                } else {
                    //jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
                    window.location.replace(APP_URL+'/login');
                }
            },
            submitProjectOffer: function (id) {
                this.loading = true;
                let offer_form = document.getElementById('send-offer-form');
                let form_data = new FormData(offer_form);
                form_data.append('freelancer_id', id);
                var self = this;
                axios.post(APP_URL + '/store/project-offer', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.$refs.myModalRef.hide();
                            self.showInfo(response.data.progressing);
                            self.success_message = response.data.message;
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.projects) {
                            self.showError(error.response.data.errors.projects[0]);
                        }
                        if (error.response.data.errors.desc) {
                            self.showError(error.response.data.errors.desc[0]);
                        }
                    });
            },
            openChatBox: function () {
                if (this.is_popup == false) {
                    this.is_popup = true;
                } else {
                    this.is_popup = false;
                }
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }

                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            add_wishlist: function (element_id, id, column, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (response.data.type == 'success') {
                                if (column == 'saved_freelancer') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                    self.disable_btn = 'wt-btndisbaled';
                                    self.text = Vue.prototype.trans('lang.btn_save');
                                    self.saved_class = 'fa fa-heart';
                                    self.click_to_save = 'wt-clicksave'
                                }
                                else if (column == 'saved_employers') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    jQuery('#' + element_id).text(saved_text);
                                    jQuery('#' + element_id).parents('.wt-clicksavearea').find('i').addClass('fa fa-heart');
                                    self.disable_follow = 'wt-btndisbaled';
                                    self.follow_text = saved_text;
                                }
                                else if (column == 'saved_jobs') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                }
                                self.showMessage(response.data.message);
                            } else {
                                self.showError(response.data.message);
                            }
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getWishlist: function () {
                var self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/profile/get-wishlist', {
                    slug: slug
                })
                    .then(function (response) {
                        if (response.data.user_type == 'freelancer') {
                            if (response.data.current_freelancer == 'true') {
                                self.disable_btn = 'wt-btndisbaled';
                                self.text = Vue.prototype.trans('lang.saved');
                                self.saved_class = 'fa fa-heart';
                            }
                        } else if (response.data.user_type == 'employer') {
                            if (response.data.employer_jobs == 'true') {
                                self.disable_btn = 'wt-btndisbaled';
                                self.text = Vue.prototype.trans('lang.saved');
                                self.saved_class = 'fa fa-heart';
                            }
                            if (response.data.current_employer == 'true') {
                                self.disable_follow = 'wt-btndisbaled';
                                self.follow_text = Vue.prototype.trans('lang.following');
                            }
                        }
                    });
            },
            validatePracticeCode: validate_practice_code
        }
    });
}

//Settings
if (document.getElementById("settings")) {
    const VueSettings = new Vue({
        el: "#settings",
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
            //Delete Social
            var count_social_length = jQuery('.social-icons-content').find('.wrap-social-icons').length;
            count_social_length = count_social_length - 1;
            this.social.count = count_social_length;
            jQuery(document).on('click', '.delete-social', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.wrap-social-icons').remove();
            });
            //Delete Search
            var count_social_length = jQuery('.search-content').find('.wrap-search').length;
            count_social_length = count_social_length - 1;
            this.social.count = count_social_length;
            jQuery(document).on('click', '.delete-search', function (e) {
                e.preventDefault();
                var _this = jQuery(this);
                _this.parents('.wrap-search').remove();
            });
        },
        components: {Verte},
        data: {
            enable_sandbox: false,
            show_reg_form_banner: false,
            enable_breadcrumbs: false,
            show_emplyr_inn_sec: false,
            show_f_banner: false,
            employer_package: true,
            enable_packages: false,
            show_emp_banner: false,
            show_job_banner: false,
            show_service_banner: false,
            primary_color: '#ff5851',
            enable_theme_color: false,
            enable_color_text: '',
            cat_section_display: false,
            home_section_display: false,
            show_services_section: true,
            chat_display: false,
            app_section_display: false,
            uploaded_logo: false,
            uploaded_banner: false,
            uploaded_avatar: false,
            uploaded_banner_bg: false,
            uploaded_banner_image: false,
            uploaded_section_bg: false,
            uploaded_download_app_img: false,
            footer_logo: false,
            logo: false,
            register_image: false,
            f_inner_banner: false,
            e_inner_banner: false,
            job_inner_banner: false,
            service_inner_banner: false,
            clear_cache: false,
            clear_views: false,
            clear_routes: false,
            favicon: false,
            reg_form_banner: false,
            success_message: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            VueSettings.showCompleted(VueSettings.success_message);
                        }
                    }
                }
            },
            social: {
                social_name: Vue.prototype.trans('lang.select_socials'),
                social_url: '',
                count: 0,
                success_message: '',
                loading: false
            },
            search: {
                search_name: Vue.prototype.trans('lang.add_title'),
                search_url: '',
                count: 0,
                success_message: '',
                loading: false
            },
            socials: [],
            first_social_name: '',
            first_social_url: '',
            searches: [],
            first_search_title: '',
            first_search_url: '',
            loading: false,
        },
        created: function () {
            this.getHomeSectionDisplaySetting();
            this.getChatDisplaySetting();
            this.getPrimaryColorDisplaySetting();
            this.getInnerPageSettings();
            this.getRegistrationSettings();
            this.getSitePaymentOptions();
            this.getBreadcrumbsSettings();
        },
        ready: function () {
        },
        methods: {
            getHomeSectionDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-section-display-setting')
                    .then(function (response) {
                        if ((response.data.home_section_display == 'true')) {
                            self.home_section_display = true;
                        } else {
                            self.home_section_display = false;
                        }
                        if ((response.data.app_section_display == 'true')) {
                            self.app_section_display = true;
                        } else {
                            self.app_section_display = false;
                        }
                        if ((response.data.show_services_section == 'true')) {
                            self.show_services_section = true;
                        } else {
                            self.show_services_section = false;
                        }
                    });
            },
            getPrimaryColorDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-theme-color-display-setting')
                    .then(function (response) {
                        if ((response.data.enable_theme_color == 'true')) {
                            self.enable_theme_color = true;
                            self.enable_color_text = Vue.prototype.trans('lang.primary_color');
                            if (response.data.color) {
                                self.primary_color = response.data.color;
                            }
                        } else {
                            self.enable_theme_color = false;
                        }
                    });
            },
            getChatDisplaySetting: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get-chat-display-setting')
                    .then(function (response) {
                        if ((response.data.chat_display == 'true')) {
                            self.chat_display = true;
                        } else {
                            self.chat_display = false;
                        }
                    });
            },
            addSocial: function () {
                this.socials.push(Vue.util.extend({}, this.social, this.social.count++))
            },
            removeSocial: function (index) {
                Vue.delete(this.socials, index);
            },
            addSearchItem: function () {
                this.searches.push(Vue.util.extend({}, this.search, this.search.count++))
            },
            removeSearchItem: function (index) {
                Vue.delete(this.searches, index);
            },
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(Vue.prototype.trans('lang.success'), message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitGeneralSettings: function () {
                let settings_form = document.getElementById('general-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitChatSettings: function () {
                let chatForm = document.getElementById('submit-chat-form');
                let form_data = new FormData(chatForm);
                var self = this;
                axios.post(APP_URL + '/admin/store/chat-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            uploadDashboardIcons: function () {
                let upload_icon_form = document.getElementById('upload_dashboard_icon');
                let form_data = new FormData(upload_icon_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/upload-icons', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitThemeStylingSettings: function () {
                let settings_form = document.getElementById('styling-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/theme-styling-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/admin/settings');
                            }, 4000)
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitFooterSettings: function () {
                let footersettings = document.getElementById('footer-setting-form');
                let data = new FormData(footersettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/footer-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitAccessType: function () {
                let footersettings = document.getElementById('acces_types_form');
                let data = new FormData(footersettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/access-type-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitSocialSettings: function () {
                let socialsettings = document.getElementById('social-management');
                let data = new FormData(socialsettings);
                var self = this;
                axios.post(APP_URL + '/admin/store/social-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitSearchMenu: function () {
                let searchMenu = document.getElementById('search-menu');
                let data = new FormData(searchMenu);
                var self = this;
                axios.post(APP_URL + '/admin/store/search-menu', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.menu_title) {
                            self.showError(error.response.data.errors.menu_title[0]);
                        }
                    });
            },
            submitCommisionSettings: function () {
                let commision_settings = document.getElementById('comission-form');
                let data = new FormData(commision_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/commision-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }

                    })
                    .catch(function (error) {
                    });
            },
            submitPaypalSettings: function () {
                let payment_settings = document.getElementById('payment-form');
                let data = new FormData(payment_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/payment-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.client_id) {
                            self.showError(error.response.data.errors.client_id[0]);
                        }
                        if (error.response.data.errors.paypal_password) {
                            self.showError(error.response.data.errors.paypal_password[0]);
                        }
                        if (error.response.data.errors.paypal_secret) {
                            self.showError(error.response.data.errors.paypal_secret[0]);
                        }
                    });
            },
            submitStripeSettings: function () {
                let payment_settings = document.getElementById('stripe-form');
                let data = new FormData(payment_settings);
                var self = this;
                axios.post(APP_URL + '/admin/store/stripe-payment-settings', data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.errors.stripe_key) {
                            self.showError(error.response.data.errors.stripe_key[0]);
                        }
                        if (error.response.data.errors.stripe_secret) {
                            self.showError(error.response.data.errors.stripe_secret[0]);
                        }
                    });
            },
            emailContent: function (reference) {
                this.$refs[reference].show();
            },
            submitEmailSettings: function () {
                let settings_form = document.getElementById('email-setting-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/email-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitHomeSettings: function () {
                let settings_form = document.getElementById('home-settings-form');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('app_desc', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/home-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitSectionSettings: function () {
                let settings_form = document.getElementById('section-settings-form');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('app_desc_wt_tinymceeditor').getContent();
                console.log(description);
                // return false;
                form_data.append('app_desc', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/section-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitServicesSectionSettings: function () {
                let settings_form = document.getElementById('services-sec-settings');
                let form_data = new FormData(settings_form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/admin/store/service-section-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            removeImage: function (id) {
                if (id == 'hidden_site_logo') {
                    this.logo = true;
                }
                if (id == 'hidden_logo') {
                    this.uploaded_logo = true;
                }
                if (id == 'hidden_banner') {
                    this.uploaded_banner = true;
                }
                if (id == 'hidden_avatar') {
                    this.uploaded_avatar = true;
                }
                if (id == 'hidden_home_banner') {
                    this.uploaded_banner_bg = true;
                }
                if (id == 'hidden_banner_image') {
                    this.uploaded_banner_image = true;
                }
                if (id == 'hidden_section_bg') {
                    this.uploaded_section_bg = true;
                }
                if (id == 'hidden_download_app_img') {
                    this.uploaded_download_app_img = true;
                }
                if (id == 'hidden_site_footer_logo') {
                    this.footer_logo = true;
                }
                if (id == 'hidden_site_register_image') {
                    this.register_image = true;
                }
                if (id == 'hidden_f_inner_banner') {
                    this.f_inner_banner = true;
                }
                if (id == 'hidden_e_inner_banner') {
                    this.e_inner_banner = true;
                }
                if (id == 'hidden_job_inner_banner') {
                    this.job_inner_banner = true;
                }
                if (id == 'hidden_service_inner_banner') {
                    this.service_inner_banner = true;
                }
                if (id == 'hidden_site_favicon') {
                    this.favicon = true;
                }
                if (id == 'hidden_reg_form_banner') {
                    this.reg_form_banner = true;
                }
                document.getElementById(id).value = '';
            },
            importDemo: function (text) {
                var self = this;
                this.$swal({
                    title: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        self.loading = true;
                        window.location.replace(APP_URL + '/admin/import-demo');
                    } else {
                        this.$swal.close()
                    }
                })
            },
            removeDemoContent: function (text) {
                var self = this;
                this.$swal({
                    title: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        self.loading = true;
                        window.location.replace(APP_URL + '/admin/remove-demo');
                    } else {
                        this.$swal.close()
                    }
                })
            },
            clearCache: function () {
                var self = this;
                var clear_cache_form = document.getElementById('form-cache-clear');
                let form_data = new FormData(clear_cache_form);
                this.$swal({
                    title: Vue.prototype.trans('lang.clear_selected_cache'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        self.loading = true;
                        axios.post(APP_URL + '/admin/clear-cache', form_data)
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(Vue.prototype.trans(lang.deleted), Vue.prototype.trans(lang.cache_cleared), Vue.prototype.trans(lang.success))
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            clearAllCache: function () {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.clr_all_cache'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    self.loading = true;
                    if (result.value) {
                        axios.get(APP_URL + '/admin/clear-allcache')
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(Vue.prototype.trans(lang.cleared), Vue.prototype.trans(lang.cache_cleared), Vue.prototype.trans(lang.success))
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            importUpdate: function (success_title, success_text) {
                this.$swal({
                    title: Vue.prototype.trans('lang.imprt_tables'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        self.loading = true;
                        axios.get(APP_URL + '/admin/import-updates')
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    self.loading = false;
                                    self.$swal(success_title, success_text, 'success')
                                    window.location.replace(APP_URL + '/admin/settings');
                                } else {
                                    self.loading = false;
                                }
                            })
                    } else {
                        self.$swal.close()
                    }
                })
            },
            submitTemplateFilter: function () {
                document.getElementById("template_filter_form").submit();
            },
            submitInnerPage: function () {
                let settings_form = document.getElementById('inner-page-form');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/innerpage-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            getInnerPageSettings: function () {
                let self = this;
                axios.post(APP_URL + '/admin/get/innerpage-settings')
                    .then(function (response) {
                        if ((response.data.show_f_banner == 'true')) {
                            self.show_f_banner = true;
                        } else {
                            self.show_f_banner = false;
                        }
                        if ((response.data.show_emp_banner == 'true')) {
                            self.show_emp_banner = true;
                        } else {
                            self.show_emp_banner = false;
                        }
                        if ((response.data.show_job_banner == 'true')) {
                            self.show_job_banner = true;
                        } else {
                            self.show_job_banner = false;
                        }
                        if ((response.data.show_service_banner == 'true')) {
                            self.show_service_banner = true;
                        } else {
                            self.show_service_banner = false;
                        }
                    });
            },
            getRegistrationSettings: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get/registration-settings')
                    .then(function (response) {
                        if (response.data.show_emplyr_inn_sec == 'true') {
                            self.show_emplyr_inn_sec = true;
                        } else {
                            self.show_emplyr_inn_sec = false;
                        }
                        if (response.data.show_reg_form_banner == 'true') {
                            self.show_reg_form_banner = true;
                        } else {
                            self.show_reg_form_banner = false;
                        }
                    });
            },
            getSitePaymentOptions: function () {
                let self = this;
                axios.get(APP_URL + '/admin/get/site-payment-option')
                    .then(function (response) {
                        if (response.data.enable_packages == 'true') {
                            self.enable_packages = true;
                        } else {
                            self.enable_packages = false;
                        }
                        if (response.data.employer_package == 'true') {
                            self.employer_package = true;
                        } else {
                            self.employer_package = false;
                        }
                        if (response.data.enable_sandbox == 'true') {
                            self.enable_sandbox = true;
                        } else {
                            self.enable_sandbox = false;
                        }
                    });
            },
            submitBreadcrumbs: function () {
                let settings_form = document.getElementById('breadcrumb-option');
                let form_data = new FormData(settings_form);
                var self = this;
                axios.post(APP_URL + '/admin/store/breadcrumbs-settings', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.success_message = response.data.message;
                            self.showInfo(response.data.progressing);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            getBreadcrumbsSettings: function () {
                let self = this;
                axios.post(APP_URL + '/admin/get/breadcrumbs-settings')
                    .then(function (response) {
                        if ((response.data.breadcrumbs_settings == 'true')) {
                            self.enable_breadcrumbs = true;
                        } else {
                            self.enable_breadcrumbs = false;
                        }
                    });
            },
        }
    });
}
//Profile Settings
if (document.getElementById("profile_settings")) {
    const switchButton = new Vue({
        el: "#profile_settings",
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        data: function () {
            return {
                profile_blocked: true,
                profile_searchable: true,
                weekly_alerts: true,
                message_alerts: false,
                success_message: '',
                notificationSystem: {
                    options: {
                        success: {
                            position: "topRight",
                            timeout: 4000
                        },
                        error: {
                            position: "topRight",
                            timeout: 7000
                        },
                        completed: {
                            position: 'center',
                            timeout: 1000,
                            progressBar: false
                        },
                        info: {
                            overlay: true,
                            zindex: 999,
                            position: 'center',
                            timeout: 3000,
                            onClosing: function (instance, toast, closedBy) {
                                VueSettings.showCompleted(VueSettings.success_message);
                            }
                        }
                    }
                }

            };
        },
        created: function () {
            this.getUserEmailNotification();
            this.getSearchableSettings();
        },
        ready: function () {
            this.deleteAccount();
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success('Success', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            deleteAccount: function (event) {
                var self = this;
                var delete_acc_form = document.getElementById('delete_acc_form');
                let form_data = new FormData(delete_acc_form);
                this.$swal({
                    title: Vue.prototype.trans('lang.delete_account'),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/profile/settings/delete-user', form_data)
                            .then(function (response) {
                                if (response.data.type === 'warning') {
                                    self.showError(response.data.msg);
                                } else {
                                    setTimeout(function () {
                                            swal({
                                                type: "success"
                                            })
                                        },
                                        self.showInfo(response.data.acc_del), 1000);
                                    window.location.href = APP_URL + '/';
                                }
                            })
                            .catch(function (error) {
                                if (error.response.data.errors.old_password) {
                                    self.showError(error.response.data.errors.old_password[0]);
                                }
                                if (error.response.data.errors.retype_password) {
                                    self.showError(error.response.data.errors.retype_password[0]);
                                }
                            });
                    } else {
                        this.$swal.close()
                    }
                })
            },
            deleteUser: function (id) {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.delete_user'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/admin/delete-user', {
                            user_id: id
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: Vue.prototype.trans('lang.ph_user_delete_message'),
                                            type: "success"
                                        })
                                    }, 100);
                                    setTimeout(function () {
                                        jQuery('.del-user-' + id).remove();
                                        window.location.replace(APP_URL + '/users');
                                    }, 500);
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
            getUserEmailNotification: function () {
                let self = this;
                axios.get(APP_URL + '/profile/settings/get-user-notification-settings')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.weekly_alerts == 'true')) {
                                self.weekly_alerts = true;
                            } else {
                                self.weekly_alerts = false;
                            }
                            if ((response.data.message_alerts == 'true')) {
                                self.message_alerts = true;
                            } else {
                                self.message_alerts = false;
                            }
                        }
                    });
            },
            getSearchableSettings: function () {
                let self = this;
                axios.get(APP_URL + '/profile/settings/get-user-searchable-settings')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.profile_blocked == 'true')) {
                                self.profile_blocked = true;
                            } else {
                                self.profile_blocked = false;
                            }
                        }
                    });
            },
        }

    });
}

if (document.getElementById("post_job")) {
    const vmpostJob = new Vue({
        el: '#post_job',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        components: {'vue-cal': vuecal, VueTimepicker},
        data: {
            calendarPlugins: [],
            events: [],
            availability_title: "",
            availability_content: "",
            availability_start_time: "",
            availability_end_time: "",
            clickedDate: "",
            title: '',
            project_level: '',
            job_duration: '',
            freelancer_level: '',
            english_level: '',
            message: '',
            form_errors: [],
            custom_error: false,
            is_show: false,
            loading: false,
            show_attachments: false,
            recurring_date: false,
            is_featured: false,
            is_progress: false,
            is_completed: false,
            errors: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    }
                }
            },
            selecteddate: "",
            selecteddate_end: "",
            start: "",
            end: "",
            description: "",
            currentEvent: {},
        },
        created: function () {
            this.getSettings();
            var events = [];
            let self = this;
            axios.get('/employer/getCalendarEvents').then(function (response) {
                console.log(this);
                if (response) {
                    self.events = response.data;
                }
            });


        },
        methods: {
            setBooking(e) {
                e.preventDefault();

                console.log({
                    start: this.selecteddate + ' ' + this.start,
                    end: this.selecteddate_end + ' ' + this.end,
                    title: this.title,
                    content: this.description,
                    class: 'booking_calendar',
                });
                this.events.push({
                    start: this.selecteddate + ' ' + this.start,
                    end: this.selecteddate_end + ' ' + this.end,
                    title: this.title,
                    content: this.description,
                    class: 'booking_calendar',
                });
            },
            changeSelectedDate(date) {
                this.selectedDate = date.getDate() + "-" + (date.getMonth() + 1) + '-' + date.getFullYear();
                // this.start = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() + ' ' + this.start;
                // this.end = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() + ' ' + this.end;
            },
            changeSelectedDateEnd(date) {
                this.selectedDateEnd = date.getDate() + "-" + (date.getMonth() + 1) + '-' + date.getFullYear();
                // this.start = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() + ' ' + this.start;
                // this.end = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() + ' ' + this.end;
            },
            preventClick() {

            },
            changeview(e) {
                e.preventDefault();
                vuecal.switchView('day');
            },
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(Vue.prototype.trans('lang.success'), message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitJob: function () {
                this.loading = true;
                let register_Form = document.getElementById('post_job_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/job/post-job', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showInfo(Vue.prototype.trans('lang.job_submitting'));
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                            }, 4000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        // if (error.response.data.errors.job_duration) {
                        //     self.showError(error.response.data.errors.job_duration[0]);
                        // }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        if (error.response.data.errors.freelancer_type) {
                            self.showError(error.response.data.errors.freelancer_type[0]);
                        }
                        // if (error.response.data.errors.project_cost) {
                        //     self.showError(error.response.data.errors.project_cost[0]);
                        // }
                        // if (error.response.data.errors.description) {
                        //     self.showError(error.response.data.errors.description[0]);
                        // }
                        if (error.response.data.errors.booking_start) {
                            self.showError(error.response.data.errors.booking_start[0]);
                        }
                        if (error.response.data.errors.booking_end) {
                            self.showError(error.response.data.errors.booking_end[0]);
                        }

                    });
            },
            updateJob: function (id) {
                this.loading = true;
                let register_Form = document.getElementById('job_edit_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                form_data.append('id', id);
                var self = this;
                axios.post(APP_URL + '/job/update-job', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.job_updating'));
                            setTimeout(function () {
                                if (response.data.role == 'employer') {
                                    window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                                } else if (response.data.role == 'admin') {
                                    window.location.replace(APP_URL + '/admin/jobs');
                                }
                            }, 4000);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        // if (error.response.data.errors.job_duration) {
                        //     self.showError(error.response.data.errors.job_duration[0]);
                        // }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        // if (error.response.data.errors.project_cost) {
                        //     self.showError(error.response.data.errors.project_cost[0]);
                        // }
                        // if (error.response.data.errors.description) {
                        //     self.showError(error.response.data.errors.description[0]);
                        // }
                    });
            },
            getSettings: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/job/get-job-settings', {
                    slug: slug
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.is_featured == 'true')) {
                                self.is_featured = true;
                            } else {
                                self.is_featured = false;
                            }
                            if ((response.data.show_attachments == 'true')) {
                                self.show_attachments = true;
                            } else {
                                self.show_attachments = false;
                            }
                            if ((response.data.recurring_date == 'true')) {
                                self.recurring_date = true;
                            } else {
                                self.recurring_date = false;
                            }
                        }
                    });
            },
            deleteAttachment: function (id) {
                jQuery('#' + id).remove();
            }
        }
    });
}

if (document.getElementById("post_job_dashboard")) {
    const vmpostJob = new Vue({
        el: '#post_job_dashboard',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        components: {'vue-cal': vuecal, VueTimepicker},
        data: {
            calendarPlugins: [],
            events: [],
            jobs: [],
            availability_title: "",
            availability_content: "",
            availability_start_time: "",
            availability_end_time: "",
            availability_selected_date: "",
            availability_selected_end_date: "",
            clickedDate: "",
            clickedEndDate: "",
            recurring_date: "",
            user_id: "",
            skill_id: "",
            id: "",
            event_id: "",
            job_id: "",
            addedToEvents: false,
            selectedEvent: null,
            selectedEventDrag: false,
            title: '',
            project_level: '',
            job_duration: '',
            appo_slot_times: '',
            freelancer_level: '',
            home_visits: '',
            english_level: '',
            message: '',
            booking_title: '',
            booking_content: '',
            form_errors: [],
            custom_error: false,
            is_show: false,
            loading: false,
            show_attachments: false,
            recurring_end_date: "",
            is_recurring: false,
            is_featured: false,
            is_progress: false,
            is_completed: false,
            dayslist: [],
            addDay: 1,
            errors: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        progressBar: false
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    }
                }
            },
            selecteddate: "",
            selecteddate_end: "",
            start: "",
            end: "",
            description: "",
            currentEvent: {},
        },
        created: function () {
            this.getSettings();
            var events = [];
            let self = this;
            axios.get('/employer/getCalendarEvents').then(function (response) {
                // console.log(this);
                // if (response) {
                //     self.events = response.data;
                // }

                if (self.events.length > 0) {
                    self.events.splice(0);
                }
                // self.jobs = response.data.jobs;
                // console.log(response.data);
                // response.data.splice(response.data.length, 1, 'jobs');
                // console.log(response.data);

                if (response && Array.isArray(response.data)) {


                    response.data.forEach(item => {
                        item.end = self.convertDateForFormatCalendar(item.end);
                        item.start = self.convertDateForFormatCalendar(item.start);
                        if (item.end !== null && item.start !== null) {
                            self.events.push(item);
                        }
                    });
                }

            });


        },
        methods: {
            convertDateForFormatCalendar(date) {
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            convertDateForFormatView(date) {
                if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {
                    return date;
                } else if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {
                    let all_date_parts = date.split(' ');
                    let date_parts = all_date_parts[0].split('-');
                    return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];
                }

                return null;
            },
            customEventCreation() {
                const dateTime = prompt('Create event on (yyyy-mm-dd hh:mm)', '2018-11-20 13:15')
                // Check if date format is correct before creating event.
                if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(dateTime)) {
                    this.$refs.vuecal.createEvent(
                        // Formatted start date and time or JavaScript Date object.
                        dateTime,
                        // Custom event props (optional).
                        {title: 'New Event', content: 'yay! �', classes: ['leisure']}
                    )
                } else if (dateTime) alert('Wrong date format.')
            },
            formatDate(date,calendar = false) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;
                if(calendar === true) {
                    return [year, month, day].join('-');
                } else {
                    return [day, month, year].join('-');
                }
            },
            setBooking(e) {
                e.preventDefault();

                console.log({
                    start: this.selecteddate + ' ' + this.start,
                    end: this.selecteddate_end + ' ' + this.end,
                    title: this.title,
                    content: this.description,
                    class: 'booking_calendar',
                });
                this.events.push({
                    start: this.convertDateForFormatCalendar(this.selecteddate) + ' ' + this.start,
                    end: this.convertDateForFormatCalendar(this.selecteddate_end) + ' ' + this.end,
                    title: this.title,
                    content: this.description,
                    class: 'booking_calendar',
                });
            },
            reloadCalendar(){
                var events = [];
                // console.log(events);
                // console.log(this.events);
                let self = this;
                axios.get('/employer/getCalendarEvents').then(function (response) {
                    if (self.events.length > 0) {
                        self.events.splice(0);
                    }

                    if (response && Array.isArray(response.data)) {
                        response.data.forEach(item => {
                            item.end = self.convertDateForFormatCalendar(item.end);
                            item.start = self.convertDateForFormatCalendar(item.start);
                            if (item.end !== null && item.start !== null) {
                                self.events.push(item);
                            }
                        });
                    }
                });
            },
            changeSelectedDate(date) {
                console.log(date);
                this.clickedDate = true;
                if(this.selectedEvent){
                    var selDateStart = this.selectedEvent.start.split(' ');
                    var selDateEnd = this.selectedEvent.end.split(' ');
                    this.selecteddate = this.formatDate(selDateStart[0]);
                    this.selecteddate_end = this.formatDate(selDateEnd[0]);


                    this.event_id = this.selectedEvent.id;
                    this.job_id = this.selectedEvent.job_id;
                    this.booking_title = this.selectedEvent.title;
                    this.booking_content = this.selectedEvent.content;

                    this.start = selDateStart[1];
                    this.end = selDateEnd[1];
                    this.selectedEvent = false;
                } else {
                    // this.selecteddate = date.getDate() + "-" + (date.getMonth() + 1) + '-' + date.getFullYear();
                    this.selecteddate = this.formatDate(date);
                    if (this.selecteddate < this.selecteddate_end) {
                        this.selecteddate_end = this.formatDate(date);
                    }

                    this.event_id = '';
                    this.job_id = '';
                    this.booking_title = '';
                    this.booking_content = '';

                    this.start = '00:00';
                    this.end = '23:59';
                }
                setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: ($(".classScrollTo").offset().top)
                    }, 1000);
                })

            },
            createList(event) {
                var parent = document.getElementById('listDates'),
                    newElem = parent.querySelector('.getIsDay'),
                    elem = parent.querySelectorAll('.isDay');
                newElem.classList.remove('getIsDay');
                newElem.classList.add('isDay');
                newElem.style.display = '';
                newElem.children[0].querySelector('input').setAttribute("name","start_date[" + (elem.length) + "]");
                newElem.children[1].querySelector('input').setAttribute("name","end_date[" + (elem.length) + "]");
                // newElem.children[0].querySelector('input').value = '';
                newElem.children[1].querySelector('input').value = '';
                this.addDay = elem.length;
                // event.preventDefault();
            },
            changeSelectedDateEnd(date) {
                this.selecteddate_end = this.formatDate(date);
                this.start = (this.start!='')?this.start:'00:00';
                this.end = (this.end!='')?this.end:'23:59';
            },
            preventClick() {

            },
            changeview(e) {
                e.preventDefault();
                vuecal.switchView('day');
            },
            changeSelectedLastrecurringDate(event){
                //this.$refs.searchfield.inputValue = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() ;
                // this.selecteddate = ('0' + date.getDate()).slice(-2) + "/" + ('0' + (date.getMonth()+1)).slice(-2) + '/' + date.getFullYear();
                this.selecteddate =  this.formatDate(date,true);
                jQuery('#calendar_small').hide();
                //this.getSearchableData(this.types), this.emptyField(this.types), this.changeFilter()
                // window.location.replace(APP_URL+'/search-results?type=job&start_date='+this.$refs.searchfield.inputValue);

            },
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(Vue.prototype.trans('lang.success'), message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            onEventClick(event){
                console.log(event);
                this.selectedEvent = event;
            },

            submitJob: function () {
                this.loading = true;
                let register_Form = document.getElementById('post_job_dashboard_form');
                let form_data = new FormData(register_Form);
                // var description = tinyMCE.get('wt-tinymceeditor').getContent();
                // form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/job/post-job', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showInfo(Vue.prototype.trans('lang.job_submitting'));
                            // setTimeout(function (self) {
                            //     window.location.replace(APP_URL + '/employer/dashboard');
                            //     self.clickedDate = false;
                            // }, 4000);
                            self.reloadCalendar();
                            self.clickedDate = false;
                            setTimeout(function (self) {
                                $('html, body').animate({
                                    scrollTop: ($(".scrolToCalend").offset().top)
                                }, 1000);
                            });

                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        // if (error.response.data.errors.job_duration) {
                        //     self.showError(error.response.data.errors.job_duration[0]);
                        // }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        if (error.response.data.errors.freelancer_type) {
                            self.showError(error.response.data.errors.freelancer_type[0]);
                        }
                        // if (error.response.data.errors.project_cost) {
                        //     self.showError(error.response.data.errors.project_cost[0]);
                        // }
                        // if (error.response.data.errors.description) {
                        //     self.showError(error.response.data.errors.description[0]);
                        // }
                        if (error.response.data.errors.booking_start) {
                            self.showError(error.response.data.errors.booking_start[0]);
                        }
                        if (error.response.data.errors.booking_end) {
                            self.showError(error.response.data.errors.booking_end[0]);
                        }

                    });
            },
            updateJob: function (id) {
                this.loading = true;
                let register_Form = document.getElementById('post_job_dashboard_form');
                let form_data = new FormData(register_Form);
                // var description = tinyMCE.get('wt-tinymceeditor').getContent();
                // form_data.append('description', description);
                form_data.append('id', id);
                var self = this;
                axios.post(APP_URL + '/job/update-job', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.showInfo(Vue.prototype.trans('lang.job_updating'));
                            // setTimeout(function () {
                            //     if (response.data.role == 'employer') {
                            //         window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                            //     } else if (response.data.role == 'admin') {
                            //         window.location.replace(APP_URL + '/admin/jobs');
                            //     }
                            // }, 4000);

                            self.reloadCalendar();
                            self.clickedDate = false;
                            setTimeout(function (self) {
                                $('html, body').animate({
                                    scrollTop: ($(".scrolToCalend").offset().top)
                                }, 1000);
                            });
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        // if (error.response.data.errors.job_duration) {
                        //     self.showError(error.response.data.errors.job_duration[0]);
                        // }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.project_levels) {
                            self.showError(error.response.data.errors.project_levels[0]);
                        }
                        // if (error.response.data.errors.project_cost) {
                        //     self.showError(error.response.data.errors.project_cost[0]);
                        // }
                        // if (error.response.data.errors.description) {
                        //     self.showError(error.response.data.errors.description[0]);
                        // }
                    });
            },
            updateEvent(e){
                e.preventDefault();
                console.log(this);
                var thistoast = this.$toast;
                thistoast.options.position = 'center';
                var self = this;
                let register_Form = document.getElementById('post_job_dashboard_form');
                let form_data = new FormData(register_Form);
                //this.events.push(newObj);
                axios.post('/employer/updateCalendarEvent', form_data)
                    .then(function (response) {
                        self.reloadCalendar();
                        self.showInfo(Vue.prototype.trans('lang.job_updating'));
                        self.clickedDate = false;
                        setTimeout(function () {
                            $('html, body').animate({
                                scrollTop: ($(".scrolToCalend").offset().top)
                            }, 1000);
                        })
                    })
                    .catch(function (error) {
                        if(typeof error.response != "undefined") {
                            if (error.response.data.errors.title) {
                                thistoast.error(' ', error.response.data.errors.title[0]);
                            }
                            if (error.response.data.errors.availability_content) {
                                thistoast.error(' ', error.response.data.errors.availability_content[0]);
                            }
                            if (error.response.data.errors.start_date) {
                                thistoast.error(' ', error.response.data.errors.start_date[0]);
                            }
                            if (error.response.data.errors.booking_start) {
                                thistoast.error(' ', error.response.data.errors.booking_start[0]);
                            }
                            if (error.response.data.errors.booking_end) {
                                thistoast.error(' ', error.response.data.errors.booking_end[0]);
                            }
                        }

                    });
                e.stopPropagation()
            },
            getSettings: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                axios.post(APP_URL + '/job/get-job-settings', {
                    slug: slug
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if ((response.data.is_featured == 'true')) {
                                self.is_featured = true;
                            } else {
                                self.is_featured = false;
                            }
                            if ((response.data.show_attachments == 'true')) {
                                self.show_attachments = true;
                            } else {
                                self.show_attachments = false;
                            }
                            if ((response.data.recurring_date == 'true')) {
                                self.recurring_date = true;
                            } else {
                                self.recurring_date = false;
                            }
                        }
                    });
            },
            deleteAttachment: function (id) {
                jQuery('#' + id).remove();
            }
        }
    });
}

if (document.getElementById("jobs")) {
    const jobVue = new Vue({
        el: '#jobs',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
        },
        data: {
            refundable_user: '',
            refundable_payment_method: '',
            proposal: {
                amount: Vue.prototype.trans('lang.enter_proposal_amount'),
                deduction: '00.00',
                total: '00.00',
                completion_time: '',
                description: '',
            },
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\Job',
                report_type: '',
            },
            form_errors: [],
            custom_error: false,
            loading: false,
            message: '',
            disable_btn: '',
            saved_class: '',
            heart_class: 'far fa-heart',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_follow: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        onClosing: function (instance, toast, closedBy) {
                            vmpostJob.showCompleted(Vue.prototype.trans('lang.process_cmplted_success'));
                        }
                    },
                    message: {
                        position: 'center',
                        timeout: 900,
                        progressBar: false
                    }
                }
            },
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.message);
            },
            add_wishlist: function (element_id, id, column, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (column == 'saved_jobs') {
                                jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                jQuery('#' + element_id).addClass('wt-clicksave');
                                jQuery('#' + element_id).find('.save_text').text(saved_text);
                                self.disable_btn = 'wt-btndisbaled wt-clicksave';
                                self.text = saved_text;
                                self.heart_class = 'fa fa-heart';
                            }
                            if (column == 'saved_employers') {
                                self.disable_follow = 'wt-btndisbaled';
                                self.follow_text = saved_text;
                            }
                            self.showMessage(response.data.message);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            check_auth: function (job) {
                axios.get(APP_URL + '/check-proposal-auth-user', {params: {job}})
                    .then((response) => {
                        if (response.data.auth) {
                            window.location.pathname = `/job/proposal/${job}`;
                        } else {
                            this.showError(response.data.message);
                        }
                    })
                    .catch((error) => {

                    });
            },
            calculate_amount: function (commission) {
                console.log(commission);
                this.proposal.deduction = (this.proposal.amount / 100) * commission;
                this.proposal.total = this.proposal.amount - this.proposal.deduction;
            },
            submitJobProposal: function (id, user_id) {
                this.loading = true;
                this.custom_error = false;
                let propsal_form = document.getElementById('send-propsal');
                let form_data = new FormData(propsal_form);
                form_data.append('id', id);
                form_data.append('user_id', user_id);
                var self = this;
                axios.post(APP_URL + '/proposal/submit-proposal', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showCompleted(response.data.message);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/proposals');
                            }, 1050);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.amount) {
                            self.showError(error.response.data.errors.amount[0]);
                        }
                        // if (error.response.data.errors.completion_time) {
                        //     self.showError(error.response.data.errors.completion_time[0]);
                        // }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                    });
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            hireFreelancer: function (id) {
                this.$swal({
                    title: Vue.prototype.trans('lang.want_to_hire'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location.replace(APP_URL + '/payment-process/' + id);
                    } else {
                        this.$swal.close()
                    }
                })
            },
            showCoverLetter: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            showRefoundForm: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            submitRefund: function (job_id) {
                this.loading = true;
                var self = this;
                var job_id = $('#refundable-job-id-' + job_id).val();
                var selected_user = $("#refundable_user_id-" + job_id).val();
                var refundable_amount = $('#refundable-amount-' + job_id).val();
                var order_id = $('#refundable-order-id-' + job_id).val();
                let form = document.getElementById('submit_refund_' + job_id);
                let form_data = new FormData(form);
                form_data.append('refundable_user_id', selected_user);
                form_data.append('amount', refundable_amount);
                form_data.append('order_id', order_id);
                form_data.append('job_id', job_id);
                form_data.append('type', 'job');
                axios.post(APP_URL + '/admin/submit-user-refund', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            window.location.replace(APP_URL + '/admin/jobs');
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            self.loading = false;
                            if (error.response.data.errors.payment_method) {
                                self.showError(error.response.data.errors.payment_method[0]);
                            }
                        }
                    });
            },
            downloadAttachments: function (form_id) {
                document.getElementById(form_id).submit();
            },
            jobStatus: function (id, proposal_id, cancel_text, confirm_button, validation_error, popup_title) {
                var job_status = document.getElementById("job_status");
                var status = job_status.options[job_status.selectedIndex].value;
                if (status == "cancelled") {
                    this.$swal({
                        title: popup_title,
                        text: cancel_text,
                        type: 'info',
                        input: 'textarea',
                        confirmButtonText: confirm_button,
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        inputValidator: (textarea) => {
                            return new Promise((resolve) => {
                                if (textarea != '') {
                                    resolve()
                                } else {
                                    resolve(validation_error)
                                }
                            })
                        },
                        preConfirm: (textarea) => {
                            var self = this;
                            return axios.post(APP_URL + '/submit-report', {
                                reason: 'proposal cancel',
                                report_type: 'proposal_cancel',
                                description: textarea,
                                id: id,
                                model: 'App\\Job',
                                proposal_id: proposal_id
                            })
                                .then(function (response) {
                                    if (response.data.type == 'success') {
                                        self.showCompleted(response.data.message);
                                        setTimeout(function () {
                                            window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                                        }, 1500);
                                    } else if (response.data.type == 'error') {
                                        self.showError(response.data.message);
                                    }
                                })
                                .catch(error => {
                                    if (error.response.status == 422) {
                                        if (error.response.data.errors.description) {
                                            self.$swal.showValidationMessage(
                                                error.response.data.errors.description[0]
                                            )
                                        }
                                    }
                                })
                        },
                        allowOutsideClick: () => !this.$swal.isLoading()
                    }).then((result) => {
                    })
                }
                if (status == "completed") {
                    this.$refs.myModalRef.show()
                }
            },
            viewReason: function (description) {
                this.$swal({
                    width: 600,
                    padding: '3em',
                    text: description
                })
            },
            submitFeedback: function (id, job_id) {
                this.loading = true;
                let review_form = document.getElementById('submit-review-form');
                let form_data = new FormData(review_form);
                form_data.append('freelancer_id', id);
                form_data.append('job_id', job_id);
                var self = this;
                axios.post(APP_URL + '/user/submit-review', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                self.$refs.myModalRef.hide()
                                window.location.replace(APP_URL + '/employer/dashboard/manage-jobs');
                            }, 1000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            submitDispute: function (id) {
                this.loading = true;
                let dispute_form = document.getElementById('dispute-form');
                let form_data = new FormData(dispute_form);
                form_data.append('proposal_id', id);
                var self = this;
                axios.post(APP_URL + '/freelancer/store-dispute', form_data)
                    .then(function (response) {
                        console.log(response.data);
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                window.location.replace(APP_URL + '/freelancer/dashboard');
                            }, 2000);
                        }
                        if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            deleteJob: function (id) {
                var self = this;
                this.$swal({
                    title: Vue.prototype.trans('lang.del_job'),
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    var self = this;
                    if (result.value) {
                        axios.post(APP_URL + '/job/delete-job', {
                            job_id: id
                        })
                            .then(function (response) {
                                if (response.data.type == "success") {
                                    setTimeout(function () {
                                        self.$swal({
                                            title: this.title,
                                            text: Vue.prototype.trans('lang.job_deleted'),
                                            type: "success"
                                        })
                                        jQuery('.del-job-' + id).remove();
                                    }, 500);
                                } else {
                                    self.showError(response.data.message);
                                }
                            })
                    } else {
                        this.$swal.close()
                    }
                })
            },
        }
    });
}

if (document.getElementById("proposals")) {
    const vproposals = new Vue({
        el: '#proposals',
        mounted: function () {
        },
        data: {},
        methods: {}
    });
}

if (document.getElementById("packages")) {
    const packages = new Vue({
        el: '#packages',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getOptions();
        },
        data: {
            user_role: '',
            selected_role: '',
            employer_options: false,
            freelancer_options: false,
            banner_option: false,
            private_chat: false,
            packageID: '',
            loading: false,
            package: {
                conneects: '',
                skills: '',
                jobs: '',
                featured_jobs: '',
                services: '',
                featured_services: '',
            },
            form_errors: [],
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000
                    },
                }
            },
        },
        methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            selectedRole: function (role) {
                this.selected_role = role;
                if (role == 2) {
                    this.employer_options = true;
                    this.freelancer_options = false;
                } else if (role == 3) {
                    this.employer_options = false;
                    this.freelancer_options = true;
                }
            },
            submitPackage: function () {
                if (this.selected_role == 3) {
                    if (this.package.conneects, this.package.skills) {
                        this.form_errors = [];
                        jQuery("#package_form").submit();
                    } else {
                        if (!this.package.conneects) this.form_errors.push(Vue.prototype.trans('lang.connects_required'));
                        if (!this.package.skills) this.form_errors.push(trans('lang.skills_required'));
                        this.form_errors.forEach(element => {
                            this.showError(element);
                        });
                    }
                }
                else if (this.selected_role == 2) {
                    if (this.package.jobs, this.package.featured_jobs) {
                        this.form_errors = [];
                        jQuery("#package_form").submit();
                    } else {
                        if (!this.package.jobs) this.form_errors.push(Vue.prototype.trans('lang.no_jobs_required'));
                        if (!this.package.featured_jobs) this.form_errors.push(Vue.prototype.trans('lang.no_featurejobs_required'));
                        this.form_errors.forEach(element => {
                            this.showError(element);
                        });
                    }
                }
            },
            getOptions: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var slug = segment_array[segment_array.length - 1];
                if (window.location.pathname == '/admin/packages/edit/' + slug) {
                    axios.post(APP_URL + '/package/get-package-options', {
                        slug: slug
                    })
                        .then(function (response) {
                            console.log(response.data);
                            if (response.data.type == 'success') {
                                if ((response.data.banner_option == 'true')) {
                                    self.banner_option = true;
                                } else {
                                    self.banner_option = false;
                                }
                                if ((response.data.private_chat == 'true')) {
                                    self.private_chat = true;
                                } else {
                                    self.private_chat = false;
                                }
                            }
                        }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            getPurchasePackage: function (id) {
                var self = this;
                axios.get(APP_URL + '/package/get-purchase-package')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            window.location.replace(APP_URL + '/user/package/checkout/' + id);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        } else if (response.data.type == 'server_error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                    });
            },
            getStriprForm: function () {
                this.$refs.myModalRef.show()
            },
            submitStripeFrom: function () {
                this.loading = true;
                let stripe_payment = document.getElementById('stripe-payment-form');
                let data = new FormData(stripe_payment);
                var self = this;
                axios.post(APP_URL + '/addmoney/stripe', data)
                    .then(function (response) {
                        console.log(response.data);
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            setTimeout(function () {
                                window.location.replace(response.data.url);
                            }, 3000);
                        } else if (response.data.type == 'error') {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        console.log(error);
                    });
            },
        }
    });
}

if (document.getElementById("invoice_list")) {
    new Vue({
        el: '#invoice_list',
        created() {
            this.getUserPayoutSettings();
        },
        data: {
            show_paypal_fields: false,
            show_bank_fields: false,
            loading: false,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000
                    },
                }
            },
        },
        methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            print: function () {
                const cssText = `
                .wt-transactionhold{
                    float: left;
                    width: 100%;
                }
                .wt-borderheadingvtwo a{font-size: 18px;}
                .wt-transactiondetails{
                    float: left;
                    width: 100%;
                    list-style:none;
                    margin-bottom:20px;
                    line-height: 28px;
                }
                .wt-transactiondetails li{
                    float: left;
                    width: 100%;
                    margin-bottom: 10px;
                    line-height: inherit;
                    list-style-type:none;
                }
                .wt-transactiondetails li:last-child{margin: 0;}
                .wt-transactiondetails li span{
                    font-size: 16px;
                    line-height: inherit;
                }
                .wt-transactiondetails li span.wt-grossamount {float: right;}
                .wt-transactiondetails li span em{
                    font-weight:500;
                    font-style:normal;
                    line-height: inherit;
                }
                .wt-transactionid{
                    margin-left:80px;
                    padding-left:10px;
                    border-left:2px solid #ddd;
                }
                .wt-grossamountusd{font-size: 24px !important;}
                .wt-paymentstatus{
                    color: #21ce93;
                    padding:3px 10px;
                    margin-left:10px;
                    font-size: 14px !important;
                    text-transform: uppercase;
                    border:1px solid #21ce93;
                }
                .wt-createtransactionhold{
                    float: left;
                    width: 100%;
                }
                .wt-createtransactionholdvtwo{
                    padding:0 20px;
                }
                .wt-createtransactionheading{
                    float: left;
                    width: 100%;
                    padding-bottom:15px;
                    border-bottom:1px solid #ddd;
                }
                .wt-createtransactionheading span{
                    display: block;
                    color: #1070c4;
                    font-size: 16px;
                    line-height: 20px;
                }
                .wt-createtransactioncontent{
                    float: left;
                    width: 100%;
                    padding:27px 0;
                    border-bottom: 1px solid #ddd;
                }
                .wt-createtransactioncontent a{
                    padding:0 10px;
                    color: #1070c4;
                    font-size: 14px;
                    line-height: 16px;
                    display: inline-block;
                    vertical-align: middle;
                    border-left:1px solid #ddd;
                }
                .wt-createtransactioncontent a:first-child{
                    border-left:0;
                    padding-left:0;
                }
                .wt-addresshold{
                    float: left;
                    width: 100%;
                    padding:18px 0;
                }
                .wt-addresshold h4{
                    margin: 0;
                    display: block;
                    font-size: 16px;
                    font-weight: 500;
                }
                table.wt-carttable{ margin-bottom:0;}
                table.wt-carttable thead{
                    border:0;
                    font-size:14px;
                    line-height:18px;
                    background: #f5f7fa;
                }
                table.wt-carttable thead tr th{
                    border:0;
                    text-align:left;
                    font-weight: 500;
                    font-weight:normal;
                    padding:20px 4px 20px 160px;
                    font:500 16px/18px 'Montserrat', Arial, Helvetica, sans-serif;
                }
                table.wt-carttable thead tr th + th{
                    text-align:center;
                    padding:20px 4px;
                }
                table.wt-carttable tbody td{
                    width:50%;
                    border:0;
                    font-size:16px;
                    text-align:left;
                    line-height: 20px;
                    display:table-cell;
                    vertical-align:middle;
                    padding:10px 4px 10px 0;
                }
                table.wt-carttable tbody td span,
                table.wt-carttable tbody td img{
                    display:inline-block;
                    vertical-align:middle;
                }
                table.wt-carttable tbody td em{
                    margin: 0;
                    font-size: 16px;
                    line-height: 16px;
                    font-style: normal;
                    vertical-align: middle;
                    display: inline-block;
                }
                table.wt-carttable > thead > tr > th{
                    padding: 6px 20px;
                    width: 25%;
                }
                table.wt-carttable > thead:first-child > tr:first-child > th{
                    border:0;
                    width: 25%;
                    padding: 6px 20px;
                }
                table.wt-carttable tbody td > em{
                    display: block;
                    text-align: center;
                }
                table.wt-carttable tbody td img{
                    width: 116px;
                    height: 116px;
                    margin-right:20px;
                    border-radius:10px;
                }
                table.wt-carttable tbody td + td{
                    width:15%;
                    text-align:center;
                }
                table.wt-carttable tbody td:last-child{
                    width:10%;
                    text-align:right;
                    padding:20px 20px 20px 4px;
                }
                table.wt-carttable tbody td .btn-delete-item{
                    float:right;
                    font-size:24px;
                }
                table.wt-carttable tbody td .btn-delete-item a{color: #fe6767}
                table.wt-carttable tbody td .quantity-sapn{
                    padding:0;
                    width:80px;
                    position:relative;
                    border-radius: 10px;
                    border: 1px solid #e7e7e7;
                }
                table.wt-carttable tbody td .quantity-sapn input[type="text"]{
                    width: 100%;
                    height: 42px;
                    padding: 0 15px;
                    border-radius: 0;
                    box-shadow: none;
                    background: none;
                    line-height: 42px;
                }
                table.wt-carttable tbody td .quantity-sapn input{border:0;}
                table.wt-carttable tbody td .quantity-sapn em{
                    width:10px;
                    display:block;
                    position:absolute;
                    right:10px;
                    cursor:pointer;
                }
                table.wt-carttable tbody td .quantity-sapn em.fa-caret-up{top:8px;}
                table.wt-carttable tbody td .quantity-sapn em.fa-caret-down{ bottom:8px;}
                table.wt-carttable tfoot tr td{ width:50%;}
                table.wt-carttable tbody tr{border-bottom: 1px solid #ddd;}
                table.wt-carttable tbody tr:last-child{border-bottom:0; }
                table.wt-carttablevtwo tbody td > em{
                    color: #636c77;
                    font-weight:500;
                    text-align: left;
                    display: inline-block;
                }
                table.wt-carttablevtwo tbody td > span{
                    float: right;
                }
                table.wt-carttablevtwo tbody td{padding:20px;}

                .wt-refundscontent{
                    float: left;
                    width: 100%;
                }
                .wt-refundsdetails{
                    float: left;
                    width: 100%;
                    list-style:none;
                }
                .wt-refundsdetails li{
                    float: left;
                    width: 100%;
                    padding:15px 0;
                    list-style-type:none;
                }
                .wt-refundsdetails li + li{border-top: 1px solid #ddd;}
                .wt-refundsdetails li strong{
                    width: 300px;
                    float:left;
                }
                .wt-refundsdetails li .wt-rightarea{float: left;}
                .wt-refundsdetails li .wt-rightarea span{
                    display: block;
                }
                .wt-refundsdetails li .wt-rightarea em{
                    font-weight:500;
                    font-style: normal;
                }
                .wt-refundsdetails li:nth-child(3){
                    border:0;
                    padding-top:0;
                }
                .wt-refundsinfo{
                        width:100%;
                        clear:both;
                    display: block;
                }
                table.wt-carttable tbody tr:nth-child(6){border:0;}
                table.wt-carttablevtwo tbody tr:nth-child(6) td{padding: 20px 20px 0px;}
              `
                const d = new Printd()
                d.print(document.getElementById('printable_area'), cssText)
            },
            changePayout(payment_method) {
                if (payment_method == 'paypal') {
                    this.show_paypal_fields = true;
                    this.show_bank_fields = false;
                } else if (payment_method == 'bacs') {
                    this.show_paypal_fields = false;
                    this.show_bank_fields = true;
                } else {
                    this.show_paypal_fields = false;
                    this.show_bank_fields = false;
                }
            },
            submitPayoutsDetail: function (id) {
                this.loading = true;
                var self = this;
                let Form = document.getElementById('profile_payout_detail');
                let form_data = new FormData(Form);
                form_data.append('id', id);
                axios.post(APP_URL + '/user/update-payout-detail', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            getUserPayoutSettings: function () {
                var self = this;
                axios.get(APP_URL + '/user/get-payout-detail')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            if (response.data.payouts.type == 'paypal') {
                                self.show_paypal_fields = true;
                            } else if (response.data.payouts.type == 'bacs') {
                                self.show_bank_fields = true;
                            }
                        } else {

                        }
                    })
                    .catch(function (error) {

                    });
            },
            getPayouts: function () {
                var year = document.getElementById('payout_year').value;
                var month = document.getElementById('payout_month').value;
                if (year && month) {
                    document.getElementById('payout_year_filter').submit();
                }

            }
        }
    });
}

if (document.getElementById("services")) {
    const vservices = new Vue({
        el: '#services',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                flashVue.$emit('showFlashMessage');
            }
        },
        created: function () {
            this.getSettings();
        },
        data: {
            report: {
                reason: '',
                description: '',
                id: '',
                model: 'App\\Service',
                report_type: '',
            },
            title: '',
            delivery_time: '',
            price: '',
            response_time: '',
            english_level: '',
            message: '',
            form_errors: [],
            custom_error: false,
            is_show: false,
            loading: false,
            show_attachments: false,
            is_featured: false,
            is_progress: false,
            is_completed: false,
            redirect_url: '',
            errors: '',
            disable_btn: '',
            saved_class: '',
            heart_class: 'fa fa-heart',
            text: Vue.prototype.trans('lang.click_to_save'),
            follow_text: Vue.prototype.trans('lang.click_to_follow'),
            disable_follow: '',
            refundable_user: '',
            refundable_payment_method: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "center",
                        timeout: 4000
                    },
                    error: {
                        position: "topRight",
                        timeout: 7000
                    },
                    completed: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        progressBar: false,
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        class: 'iziToast-info',
                        id: 'info_notify',
                    }
                }
            }
        },
        methods: {
            showCompleted(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.completed);
            },
            showInfo(message) {
                return this.$toast.info(' ', message, this.notificationSystem.options.info);
            },
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(error) {
                return this.$toast.error(' ', error, this.notificationSystem.options.error);
            },
            submitService: function () {
                this.loading = true;
                let Form = document.getElementById('post_service_form');
                let form_data = new FormData(Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                var self = this;
                axios.post(APP_URL + '/services/post-service', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showInfo(response.data.progress);
                            document.addEventListener('iziToast-closing', function (data) {
                                if (data.detail.id == 'info_notify') {
                                    self.showCompleted(response.data.message);
                                    window.location.replace(APP_URL + '/freelancer/services/posted');
                                }
                            });
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.delivery_time) {
                            self.showError(error.response.data.errors.delivery_time[0]);
                        }
                        if (error.response.data.errors.service_price) {
                            self.showError(error.response.data.errors.service_price[0]);
                        }
                        if (error.response.data.errors.response_time) {
                            self.showError(error.response.data.errors.response_time[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                    });
            },
            changeStatus: function (id) {
                this.loading = true;
                var status = document.getElementById(id + '-service_status').value;
                var self = this;
                axios.post(APP_URL + '/services/change-status', {
                    status: status,
                    id: id,
                })
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            getSettings: function () {
                let self = this;
                var segment_str = window.location.pathname;
                var segment_array = segment_str.split('/');
                var id = segment_array[segment_array.length - 1];
                if (segment_str == '/freelancer/dashboard/edit-service/' + id) {
                    axios.post(APP_URL + '/service/get-service-settings', {
                        id: id
                    })
                        .then(function (response) {
                            if (response.data.type == 'success') {
                                if ((response.data.is_featured == 'true')) {
                                    self.is_featured = true;
                                } else {
                                    self.is_featured = false;
                                }
                                if ((response.data.show_attachments == 'true')) {
                                    self.show_attachments = true;
                                } else {
                                    self.show_attachments = false;
                                }
                            }
                        });
                }
            },
            updateService: function (id) {
                this.loading = true;
                let register_Form = document.getElementById('update_service_form');
                let form_data = new FormData(register_Form);
                var description = tinyMCE.get('wt-tinymceeditor').getContent();
                form_data.append('description', description);
                form_data.append('id', id);
                var self = this;
                axios.post(APP_URL + '/service/update-service', form_data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.type == 'success') {
                            self.showInfo(response.data.progress);
                            document.addEventListener('iziToast-closing', function (data) {
                                if (data.detail.id == 'info_notify') {
                                    self.showCompleted(response.data.message);
                                    if (response.data.role == 'freelancer') {
                                        window.location.replace(APP_URL + '/freelancer/services/posted');
                                    } else if (response.data.role == 'admin') {
                                        //window.location.replace(APP_URL+'/admin/jobs');
                                    }
                                }
                            });
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                        if (error.response.data.errors.title) {
                            self.showError(error.response.data.errors.title[0]);
                        }
                        if (error.response.data.errors.delivery_time) {
                            self.showError(error.response.data.errors.delivery_time[0]);
                        }
                        if (error.response.data.errors.service_price) {
                            self.showError(error.response.data.errors.service_price[0]);
                        }
                        if (error.response.data.errors.response_time) {
                            self.showError(error.response.data.errors.response_time[0]);
                        }
                        if (error.response.data.errors.description) {
                            self.showError(error.response.data.errors.description[0]);
                        }
                        if (error.response.data.errors.english_level) {
                            self.showError(error.response.data.errors.english_level[0]);
                        }
                    });
            },
            deleteAttachment: function (id) {
                jQuery('#' + id).remove();
            },
            submitReport: function (id, report_type) {
                this.report.report_type = report_type;
                this.report.id = id;
                var self = this;
                axios.post(APP_URL + '/submit-report', self.report)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.showMessage(response.data.message);
                        } else if (response.data.type == 'error') {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            if (error.response.data.errors.description) {
                                self.showError(error.response.data.errors.description[0]);
                            }
                            if (error.response.data.errors.reason) {
                                self.showError(error.response.data.errors.reason[0]);
                            }
                        }
                    });
            },
            add_wishlist: function (element_id, id, column, seller_id, saved_text) {
                var self = this;
                axios.post(APP_URL + '/user/add-wishlist', {
                    id: id,
                    column: column,
                    seller_id: seller_id,
                })
                    .then(function (response) {
                        if (response.data.authentication == true) {
                            if (response.data.type == 'success') {
                                if (column == 'saved_freelancer') {
                                    jQuery('#' + element_id).parents('li').addClass('wt-btndisbaled');
                                    jQuery('#' + element_id).addClass('wt-clicksave');
                                    jQuery('#' + element_id).find('.save_text').text(saved_text);
                                    self.disable_btn = 'wt-btndisbaled';
                                    self.text = 'Save';
                                    self.saved_class = 'fa fa-heart';
                                    self.click_to_save = 'wt-clicksave'
                                }
                                else if (column == 'saved_employers') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    jQuery('#' + element_id).text(saved_text);
                                    jQuery('#' + element_id).parents('.wt-clicksavearea').find('i').addClass('fa fa-heart');
                                    self.disable_follow = 'wt-btndisbaled';
                                    self.follow_text = saved_text;
                                }
                                else if (column == 'saved_services') {
                                    jQuery('#' + element_id).addClass('wt-btndisbaled wt-clicksave');
                                    // self.saved_class = 'wt-clicksave';
                                    self.text = saved_text;
                                }
                                self.showMessage(response.data.message);
                            } else {
                                self.showError(response.data.message);
                            }
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            hireFreelancer: function (id, title, text) {
                this.$swal({
                    title: title,
                    text: text,
                    type: "warning",
                    customContainerClass: 'hire_popup',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location.replace(APP_URL + '/service/payment-process/' + id);
                    } else {
                        this.$swal.close()
                    }
                })
            },
            serviceStatus: function (id, pivot_id, employer_id, cancel_text, confirm_button, validation_error, popup_title) {
                var job_status = document.getElementById("employer_service_status");
                var status = job_status.options[job_status.selectedIndex].value;
                if (status == "cancelled") {
                    this.$swal({
                        title: popup_title,
                        text: cancel_text,
                        type: 'info',
                        input: 'textarea',
                        confirmButtonText: confirm_button,
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        inputValidator: (textarea) => {
                            return new Promise((resolve) => {
                                if (textarea != '') {
                                    resolve()
                                } else {
                                    resolve(validation_error)
                                }
                            })
                        },
                        preConfirm: (textarea) => {
                            var self = this;
                            return axios.post(APP_URL + '/submit-report', {
                                reason: 'service cancel',
                                report_type: 'service_cancel',
                                description: textarea,
                                id: id,
                                pivot_id: pivot_id,
                                model: 'App\\Service',
                                employer_id: employer_id
                            })
                                .then(function (response) {
                                    if (response.data.type == 'success') {
                                        self.loading = false;
                                        self.showInfo(response.data.progress);
                                        document.addEventListener('iziToast-closing', function (data) {
                                            if (data.detail.id == 'info_notify') {
                                                self.showCompleted(response.data.message);
                                                window.location.replace(APP_URL + '/employer/services/cancelled');
                                            }
                                        });
                                    } else if (response.data.type == 'error') {
                                        self.showError(response.data.message);
                                    }
                                })
                                .catch(error => {
                                    if (error.response.status == 422) {
                                        if (error.response.data.errors.description) {
                                            self.$swal.showValidationMessage(
                                                error.response.data.errors.description[0]
                                            )
                                        }
                                    }
                                })
                        },
                        allowOutsideClick: () => !this.$swal.isLoading()
                    }).then((result) => {
                    })
                } else if (status == "completed") {
                    this.$refs.myModalRef.show()
                }
            },
            submitFeedback: function (id, job_id) {
                this.loading = true;
                let review_form = document.getElementById('submit-review-form');
                let form_data = new FormData(review_form);
                form_data.append('freelancer_id', id);
                form_data.append('job_id', job_id);
                form_data.append('type', 'service');
                var self = this;
                axios.post(APP_URL + '/user/submit-review', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            var message = response.data.message;
                            self.showMessage(message);
                            setTimeout(function () {
                                self.$refs.myModalRef.hide()
                                window.location.replace(APP_URL + '/employer/services/completed');
                            }, 1000);
                        } else {
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {
                        self.loading = false;
                    });
            },
            check_auth: function (url) {
                var self = this;
                axios.get(APP_URL + '/check-service-auth-user')
                    .then(function (response) {
                        if (response.data.auth == 1) {
                            window.location.replace(url);
                        } else {
                            self.showError(response.data.message);
                        }
                    })
                    .catch(function (error) {

                    });
            },
            showReview: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            showReason: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            showRefoundForm: function (id) {
                var modal_ref = 'myModalRef-' + id;
                this.$refs[modal_ref].show();
            },
            submitRefund: function (order_id) {
                this.loading = true;
                var self = this;
                var refundable_amount = $('#refundable-amount-' + order_id).val();
                var selected_user = $("#refundable_user_id-" + order_id).val();
                let form = document.getElementById('submit_refund_' + order_id);
                let form_data = new FormData(form);
                form_data.append('amount', refundable_amount);
                form_data.append('refundable_user_id', selected_user);
                form_data.append('order_id', order_id);
                form_data.append('type', 'service');
                axios.post(APP_URL + '/admin/submit-user-refund', form_data)
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.loading = false;
                            self.showMessage(response.data.message);
                            window.location.replace(APP_URL + '/admin/service-orders');
                        } else if (response.data.type == 'error') {
                            var modal_ref = 'myModalRef-' + order_id;
                            self.$refs[modal_ref].hide();
                            self.loading = false;
                            self.showError(response.data.message);
                        }
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            self.loading = false;
                            var modal_ref = 'myModalRef-' + order_id;
                            self.$refs[modal_ref].hide();
                            if (error.response.data.errors.refundable_user_id) {
                                self.showError(error.response.data.errors.refundable_user_id[0]);
                            }
                        }
                    });
            },
        }
    });
}

jQuery('#plusQual').click(function () {
    var htmlstring = '<tr>\n' +
        '                                                                            <td><input type="text"\n' +
        '                                                                                       class="form-control"\n' +
        '                                                                                       name="profQualLevel[]"\n' +
        '                                                                                       placeholder="Level"></td>\n' +
        '                                                                            <td> <input type="text"\n' +
        '                                                                                        class="form-control"\n' +
        '                                                                                        name="profQualName[]"\n' +
        '                                                                                        placeholder="Name"></td>\n' +
        '                                                                            <td><input type="text"\n' +
        '                                                                                       class="form-control"\n' +
        '                                                                                       name="profQualPlace[]"\n' +
        '                                                                                       placeholder="Place of Study"></td>\n' +
        '                                                                            <td><input type="number"\n' +
        '                                                                                       class="form-control"\n' +
        '                                                                                       name="profQualYear[]"\n' +
        '                                                                                       placeholder="Year"></td>\n' +
        '                                                                        </tr>';
    jQuery('.profQualif_block table').append(htmlstring);
})
var $ = jQuery;

jQuery(function () {
    jQuery('#multiselect').multiselect({
        buttonWidth: '100%',
        includeSelectAllOption: true,
        nonSelectedText: 'Select Days'
    });
    var jsonValue = jQuery('#multiselect').attr('data-dbvalue');
    if (jsonValue && jsonValue != "") {
        var jsonValue = jsonValue.replace("&#34;", '"');

        var arrSelected = JSON.parse(jsonValue);
        jQuery('#multiselect').val(arrSelected);
        jQuery("#multiselect").multiselect("refresh");
    }
});

var timerangeWindow = false;
$('.timerange').on('click', function (e) {
    e.stopPropagation();
    if (!timerangeWindow) {
        var input = $(this).find('input');

        var now = new Date();
        var hours = now.getHours();
        var period = "PM";
        if (hours < 12) {
            period = "AM";
        } else {
            hours = hours - 11;
        }
        var minutes = now.getMinutes();

        var range = {
            from: {
                hour: hours,
                minute: minutes,
                period: period
            },
            to: {
                hour: hours,
                minute: minutes,
                period: period
            }
        };

        if (input.val() !== "") {
            var timerange = input.val();
            var matches = timerange.match(/([0-9]{1}):([0-9]{2}) (\bAM\b|\bPM\b)-([0-9]{1}):([0-9]{2}) (\bAM\b|\bPM\b)/);
            if (!matches) {
                matches = timerange.match(/([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)-([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)/);
            }
            if (!matches) {
                matches = timerange.match(/([0-9]{1}):([0-9]{2}) (\bAM\b|\bPM\b)-([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)/);
            }
            if (!matches) {
                matches = timerange.match(/([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)-([0-9]{1}):([0-9]{2}) (\bAM\b|\bPM\b)/);
            }
            if (matches.length === 7) {
                range = {
                    from: {
                        hour: matches[1],
                        minute: matches[2],
                        period: matches[3]
                    },
                    to: {
                        hour: matches[4],
                        minute: matches[5],
                        period: matches[6]
                    }
                }
            }
        }
        ;
        console.log(range);

        var html = '<div class="timerangepicker-container">' +
            '<div class="timerangepicker-from">' +
            '<label class="timerangepicker-label">From:</label>' +
            '<div class="timerangepicker-display hour">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">' + ('0' + range.from.hour).substr(-2) + '</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            ':' +
            '<div class="timerangepicker-display minute">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">' + ('0' + range.from.minute).substr(-2) + '</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            ':' +
            '<div class="timerangepicker-display period">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">PM</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            '</div>' +
            '<div class="timerangepicker-to">' +
            '<label class="timerangepicker-label">To:</label>' +
            '<div class="timerangepicker-display hour">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">' + ('0' + range.to.hour).substr(-2) + '</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            ':' +
            '<div class="timerangepicker-display minute">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">' + ('0' + range.to.minute).substr(-2) + '</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            ':' +
            '<div class="timerangepicker-display period">' +
            '<span class="increment fa fa-angle-up"></span>' +
            '<span class="value">PM</span>' +
            '<span class="decrement fa fa-angle-down"></span>' +
            '</div>' +
            '</div>' +
            '</div>';

        $(html).insertAfter(this);
        timerangeWindow = true;
        $('.timerangepicker-container').on(
            'click',
            '.timerangepicker-display.hour .increment',
            function () {
                var value = $(this).siblings('.value');
                value.text(
                    incrementHour(value.text(), 12, 1)
                );
            }
        );

        $('.timerangepicker-container').on(
            'click',
            '.timerangepicker-display.hour .decrement',
            function () {
                var value = $(this).siblings('.value');
                value.text(
                    decrementHour(value.text(), 12, 1)
                );
            }
        );

        $('.timerangepicker-container').on(
            'click',
            '.timerangepicker-display.minute .increment',
            function () {
                var value = $(this).siblings('.value');
                value.text(
                    increment(value.text(), 59, 0, 2)
                );
            }
        );

        $('.timerangepicker-container').on(
            'click',
            '.timerangepicker-display.minute .decrement',
            function () {
                var value = $(this).siblings('.value');
                value.text(
                    decrement(value.text(), 59, 0, 2)
                );
            }
        );

        $('.timerangepicker-container').on(
            'click',
            '.timerangepicker-display.period .increment, .timerangepicker-display.period .decrement',
            function () {
                var value = $(this).siblings('.value');
                var next = value.text() == "PM" ? "AM" : "PM";
                value.text(next);
            }
        );

    }


});


$(document).on('click', e => {

    if (!$(e.target).closest('.timerangepicker-container').length) {
        if ($('.timerangepicker-container').is(":visible")) {
            var timerangeContainer = $('.timerangepicker-container');
            if (timerangeContainer.length > 0) {
                var timeRange = {
                    from: {
                        hour: timerangeContainer.find('.value')[0].innerText,
                        minute: timerangeContainer.find('.value')[1].innerText,
                        period: timerangeContainer.find('.value')[2].innerText
                    },
                    to: {
                        hour: timerangeContainer.find('.value')[3].innerText,
                        minute: timerangeContainer.find('.value')[4].innerText,
                        period: timerangeContainer.find('.value')[5].innerText
                    },
                };

                timerangeContainer.parent().find('input').val(
                    timeRange.from.hour + ":" +
                    timeRange.from.minute + " " +
                    timeRange.from.period + "-" +
                    timeRange.to.hour + ":" +
                    timeRange.to.minute + " " +
                    timeRange.to.period
                );
                timerangeContainer.remove();
                timerangeWindow = false;
            }
        }
    }

});

function increment(value, max, min, size) {
    var intValue = parseInt(value);
    if (intValue == max) {
        return ('0' + min).substr(-size);
    } else {
        var next = intValue + 1;
        return ('0' + next).substr(-size);
    }
}

function incrementHour(value, max, min) {
    var intValue = parseInt(value);
    if (intValue == max) {
        return min;
    } else {
        var next = intValue + 1;
        return next;
    }
}

function decrement(value, max, min, size) {
    var intValue = parseInt(value);
    if (intValue == min) {
        return ('0' + max).substr(-size);
    } else {
        var next = intValue - 1;
        return ('0' + next).substr(-size);
    }
}

function decrementHour(value, max, min) {
    var intValue = parseInt(value);
    if (intValue == min) {
        return max;
    } else {
        var next = intValue - 1;
        return next
    }
}

$(document).ready(function () {

    setTimeout(function () {
        $('#post_job .vuecal__cell-date').after('<button class="bookbutton">+</button>');
        // $('#employer_availability .vuecal__cell-date').after('<button class="availButton">+</button>');
        // $('#post_job_dashboard .vuecal__cell-date').after('<button class="availButton">+</button>');
        // $('#support_availability .vuecal__cell-date').after('<button class="availButton">+</button>');
        // $('#freelancer_availability .vuecal__cell-date').after('<button v-on:click="createNewEvent" class="availButton">+</button>');
    }, 2000);

    $(document).on('click', '#post_job .vuecal__menu, #post_job.vuecal__title-bar', function () {
        $('#post_job .bookbutton').remove();
        // $('#post_job .vuecal__cell-date').after('<button class="bookbutton">Book</button>');

    });
    $('#calendar_btn, .selectDatePicker').click(function (event) {
        event.stopPropagation();

        $('#calendar_small').toggle("slow", function () {
        });
    });
    $(window).click(function () {
        $('#calendar_small').slideUp('slow');
    });

    $(document).on('click', '#employer_availability .vuecal__menu, #employer_availability .vuecal__title-bar,     #freelancer_availability .vuecal__menu, #freelancer_availability .vuecal__title-bar', function () {
        $('#employer_availability .bookbutton').remove();
        $('#freelancer_availability .bookbutton').remove();
        // $('#freelancer_availability .vuecal__cell-date').after('<button @click="createNewEvent" class="availButton">+</button>');
        // $('#support_availability .vuecal__cell-date').after('<button class="availButton">+</button>');
        // $('#employer_availability .vuecal__cell-date').after('<button class="availButton">+</button>');

    });


    $(document).on('click', '.bookbutton, .availButton', function () {
        // $('.vuecal ').slideUp();

        // $('html, body').animate({
        //     scrollTop: ($(".classScrollTo").offset().top)
        // }, 1000);
    });

    // $(document).on('click', '.vuecal__cell', function () {
    //     $('.confirmButton').slideUp();
    // });

    $(document).on('click', '.confirmButton', function () {
        $('html, body').animate({
            scrollTop: ($(".classScrollTo").offset().top)
        }, 1000);
    });

    $(document).on('click', '.openCal', function () {
        // $('.vuecal ').slideDown();
        $('#post_job .bookbutton').remove();
        $('#post_job .vuecal__cell-date').after('<button class="bookbutton">+</button>');
    });

   $('.ratePicker').on('change', function () {
        console.log('ratePicker')
        if (!isNaN($(this).val())) {
            $(this).val('£ ' + parseFloat($(this).val()));
        }
        else {
            $(this).val('');
        }
    })
});

function validate_practice_code(e) {
    var self = e, val = $.trim($('#practice_code').val());


    e.form_step2.practice_code_error = '';
    e.form_step2.is_practice_code_error = false;

    if (val !== '') {
        $.getJSON('https://directory.spineservices.nhs.uk/ORD/2-0-0/organisations/' + encodeURI(val), {_format: 'json'}, function (result) {
            console.log('[practice_code] SUCCESS');
            let address = result.Organisation.GeoLoc.Location;
            $('#straddress').val(address.AddrLn1);
            $('#postcode').val(address.PostCode);
            $('#city').val(address.Town);
            $('.org-name').val(result.Organisation.Name);
        }).fail(function () {
            self.form_step2.practice_code_error = 'Company not found';
            self.form_step2.is_practice_code_error = true;
        })
    }
}

/*Show full-less block*/
$( document ).ready(function() {
    let btns = $('.content-full-less_link');
    if (btns.length > 0) {
        btns.on('click', function(event){
            let content = $(this).attr("data-content");
            $('#' + content).toggleClass('content-full-less-paragraph__more');

            if ($('#' + content).length > 0 && $('#' + content).hasClass('content-full-less-paragraph__more')) {
                $(this).text($(this).attr("data-less"));
            } else {
                $(this).text($(this).attr("data-more"));
            }
        });
    }
});

