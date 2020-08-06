<template>
    <div v-if="renderComponent">
        <div class="wt-tabscontent tab-content" >
            <vue-cal v-if="renderComponent" ref="vuecal" style="height: 650px"
                     :time-from="0 * 60"
                     :time-to="24 * 60"
                     :disable-views="['years', 'year']"
                     :events="events"
                     default-view="month"
                     :events-on-month-view="[true, 'short'][true * 1]"
                     @cell-click="createNewEvent">
            </vue-cal>
            <div class="wt-tabscontenttitle" style="margin-top: 50px; ">
                <h2>
                    Green equals free this day<br>
                    Blue equals booking on this day<br>
                    Red equals away on holiday<br>
                </h2>
            </div>

            <div v-if="clickedDate != ''">
                <div class="wt-tabcompanyinfo wt-tabsinfo" style="margin-top:50px">
                    <div class="wt-tabscontenttitle">
                        <h2>Create new availability</h2>
                    </div>
                </div>
                <div class="wt-accordiondetails">


                    <form>
                        <div class="form-group form-group-half classScrollTo" style="margin-top: 25px;">
                            <label>Picked <span v-if="availability_selected_end_date != ''">Start</span> Date </label>

                            <input type="text" disabled class="form-control" placeholder="Booking Date"
                                   v-model="availability_selected_date">
                        </div>
                        <div class="form-group form-group-half classScrollTo" style="margin-top: 25px;"
                             v-if="availability_selected_end_date != ''">
                            <label>Picked End Date </label>

                            <input type="text" disabled class="form-control"
                                   placeholder="Booking End Date"
                                   v-model="availability_selected_end_date">
                        </div>
                        <div class="form-group">
                            <div class="form-group form-group-half">
                                <label>Start Time</label>
                                <vue-timepicker name="availability_start_time" required format="HH:mm"
                                                v-model="availability_start_time"></vue-timepicker>
                            </div>
                            <div class="form-group form-group-half">
                                <label>End Time</label>
                                <vue-timepicker name="availability_end_time" required format="HH:mm"
                                                v-model="availability_end_time"></vue-timepicker>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="availability_title1">Title:</label>
                            <input id="availability_title1" class="form-control" placeholder="Availability Title" v-model="availability_title"/>
                        </div>
                        <div class="form-group">
                            <label for="availability_title2">Content:</label>
                            <input id="availability_title2" class="form-control" placeholder="Availability Content" v-model="availability_content"/>
                        </div>
                        <div class="form-group">
                            <h2>{{ trans('lang.skills') }}</h2>
                            <div class="wt-checkboxholder wt-verticalscrollbar" v-for="(item, index) in getSkills">
                                {{item}} - {{index}}
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" @click="saveNewEventAvailability">Create
                                Availability
                            </button>
                            <button class="btn btn-success" @click="saveNewEventBusy">Create
                                Holiday/Busy
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<!--<script>-->
    <!--import VueTimepicker from 'vue2-timepicker';-->
    <!--import vuecal from 'vue-cal';-->

    <!--export default {-->
        <!--components: {-->
            <!--'vue-cal': vuecal,-->
            <!--VueTimepicker-->
        <!--},-->

        <!--data() {-->
            <!--return {-->
                <!--calendarPlugins: [],-->
                <!--events: [],-->
                <!--availability_title: "",-->
                <!--availability_content: "",-->
                <!--availability_start_time: "",-->
                <!--availability_end_time: "",-->
                <!--availability_selected_date: "",-->
                <!--availability_selected_end_date: "",-->
                <!--clickedDate: "",-->
                <!--clickedEndDate: "",-->
                <!--addedToEvents: false,-->
                <!--renderComponent: false,-->
            <!--}-->
        <!--},-->
        <!--created() {-->
            <!--this.rerender();-->
        <!--},-->
        <!--methods: {-->
            <!--getCalendarEvents() {-->
                <!--let self = this;-->
                <!--axios.get('/employer/getCalendarEvents').then(function (response) {-->
                    <!--if (self.events.length > 0) {-->
                        <!--self.events.splice(0);-->
                    <!--}-->

                    <!--if (response && Array.isArray(response.data)) {-->
                        <!--response.data.forEach(item => {-->
                            <!--item.end = self.convertDateForFormatCalendar(item.end);-->
                            <!--item.start = self.convertDateForFormatCalendar(item.start);-->
                            <!--if (item.end !== null && item.start !== null) {-->
                                <!--self.events.push(item);-->
                            <!--}-->
                        <!--});-->
                    <!--}-->
                <!--});-->
            <!--},-->
            <!--customEventCreation() {-->
                <!--const dateTime = prompt('Create event on (yyyy-mm-dd hh:mm)', '2018-11-20 13:15')-->
                <!--// Check if date format is correct before creating event.-->
                <!--if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(dateTime)) {-->
                    <!--this.$refs.vuecal.createEvent(-->
                        <!--// Formatted start date and time or JavaScript Date object.-->
                        <!--dateTime,-->
                        <!--// Custom event props (optional).-->
                        <!--{title: 'New Event', content: 'yay! 🎉', classes: ['leisure']}-->
                    <!--)-->
                <!--} else if (dateTime) alert('Wrong date format.')-->
            <!--},-->
            <!--formatDate(date) {-->
                <!--var d = new Date(date),-->
                    <!--month = '' + (d.getMonth() + 1),-->
                    <!--day = '' + d.getDate(),-->
                    <!--year = d.getFullYear();-->

                <!--if (month.length < 2)-->
                    <!--month = '0' + month;-->
                <!--if (day.length < 2)-->
                    <!--day = '0' + day;-->

                <!--return [day, month, year].join('-');-->
            <!--},-->
            <!--createNewEvent(date) {-->
                <!--console.log(date);-->
                <!--if ((this.clickedDate == "" && this.clickedEndDate == '') || (this.clickedDate != "" && this.clickedEndDate != '')) {-->
                    <!--this.clickedDate = new Date(date);-->
                    <!--this.clickedEndDate = "";-->
                    <!--this.availability_selected_date = this.formatDate(date);-->
                <!--}-->
                <!--else {-->
                    <!--this.clickedEndDate = new Date(date);-->
                    <!--this.availability_selected_end_date = this.formatDate(date);-->


                <!--}-->
                <!--var newObj =-->
                    <!--{-->
                        <!--start: this.availability_selected_date + " " + (this.availability_start_time != "" ? this.availability_start_time : "00:01"),-->
                        <!--end: this.formatDate(date) + " " + (this.availability_end_time != "" ? this.availability_end_time : "23:59"),-->
                        <!--title: this.availability_title != "" ? this.availability_title : "•",-->
                        <!--content: this.availability_content != "" ? this.availability_content : "•",-->
                        <!--contentFull: this.availability_content,-->
                        <!--class: 'selected_class'-->
                    <!--};-->
                <!--console.log(newObj);-->
                <!--// if (busy) {-->
                <!--//     newObj.class = 'busy_class';-->
                <!--// }-->
                <!--if (!this.addedToEvents) {-->
                    <!--this.events.push(newObj);-->
                    <!--this.addedToEvents = true;-->
                <!--}-->
                <!--else {-->
                    <!--this.events.pop();-->
                    <!--this.events.push(newObj);-->
                    <!--this.addedToEvents = true;-->
                <!--}-->

            <!--},-->
            <!--saveNewEventBusy(e) {-->
                <!--this.saveNewEventAvailability(e, true);-->
            <!--},-->
            <!--saveNewEventAvailability(e, busy) {-->
                <!--e.preventDefault();-->
                <!--var word = '•';-->
                <!--var title_word = 'Available'-->
                <!--var class_type = 'available_class';-->
                <!--if (busy) {-->
                    <!--class_type = 'busy_class';-->
                    <!--word = title_word = 'Busy/Holiday';-->
                <!--}-->

                <!--var-->
                    <!--availability_start_time = this.availability_start_time,-->
                    <!--availability_end_time = this.availability_end_time,-->
                    <!--availability_title = this.availability_title,-->
                    <!--availability_content = this.availability_content,-->
                    <!--thistoast = this.$toast,-->
                    <!--newObj =-->
                        <!--{-->
                            <!--start: this.availability_selected_date + " " + (availability_start_time != "" ? availability_start_time : "00:01"),-->
                            <!--end: (this.availability_selected_end_date != '' ? this.availability_selected_end_date : this.availability_selected_date) + " " + (availability_end_time != "" ? availability_end_time : "23:59"),-->
                            <!--title: availability_title != "" ? availability_title : word,-->
                            <!--content: availability_content != "" ? availability_content : word,-->
                            <!--contentFull: availability_content != "" ? availability_content : word,-->
                            <!--class: class_type-->
                        <!--};-->
                <!--thistoast.options.position = 'center';-->

                <!--//this.events.push(newObj);-->

                <!--let self = this;-->
                <!--axios.post('/freelancer/saveCalendarAvailability', newObj)-->
                    <!--.then(function (response) {-->
                        <!--self.getCalendarEvents();-->
                        <!--availability_start_time = '';-->
                        <!--availability_end_time = '';-->
                        <!--availability_title = '';-->
                        <!--availability_content = '';-->
                        <!--// console.log(response.data.status)-->
                        <!--// console.log('Success ' + word + ': ' + newObj.start + '-' + newObj.end)-->
                        <!--if (busy) {-->
                            <!--thistoast.error(' ', "Success " + title_word + ": \n" + newObj.start + " - " + newObj.end);-->
                        <!--} else {-->
                            <!--thistoast.success(' ', "Success " + title_word + ": \n" + newObj.start + " - " + newObj.end);-->
                        <!--}-->
                    <!--})-->
                    <!--.catch(function (error) {-->
                        <!--// console.log(error);-->
                        <!--if (typeof error.response.data.errors != 'undefined') {-->
                            <!--thistoast.error('Error', error.status);-->
                        <!--}-->
                    <!--});-->
            <!--},-->
            <!--convertDateForFormatCalendar(date) {-->
                <!--if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(date)) {-->
                    <!--return date;-->
                <!--} else if (/^\d{2}-\d{2}-\d{4} \d{2}:\d{2}$/.test(date)) {-->
                    <!--let all_date_parts = date.split(' ');-->
                    <!--let date_parts = all_date_parts[0].split('-');-->
                    <!--return date_parts[2] + '-' + date_parts[1] + '-' + date_parts[0] + ' ' + all_date_parts[1];-->
                <!--}-->

                <!--return null;-->
            <!--},-->
            <!--rerender() {-->
                <!--this.renderComponent = false;-->
                <!--this.$nextTick(() => {-->
                    <!--this.renderComponent = true;-->
                    <!--this.getCalendarEvents();-->
                <!--});-->
            <!--}-->
        <!--}-->

    <!--}-->
<!--</script>-->
<style>
    /*#booking_data .slide-fade--right-enter {
        opacity: 1;
    }*/
     .vuecal__event {
         background-color: rgba(76, 172, 175, 0.35);}
     .vuecal__cell--selected {
         background-color: rgba(235,255,245,1) !important;
         border: 1px solid #6698c5 !important;
     }
    .vuecal__event--focus, .vuecal__event:focus {
        box-shadow: 1px 1px 6px rgba(0, 0, 0, .2);
        z-index: 3;
        outline: none;
    }
    .vuecal__cell:hover, .vuecal__event:hover {
        border: 1px solid #6698c5 !important;
    }
    .vuecal__event {
        text-align: center !important;
        cursor: pointer;
    }
    .vuecal__event--dragging{
        background-color:#ff0000;
    }
    .vuecal__event--focus, .vuecal__event:focus {
        box-shadow: 1px 1px 6px rgba(0, 0, 0, .2);
        z-index: 3;
        outline: none;
    }
</style>