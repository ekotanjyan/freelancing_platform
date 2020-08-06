<template>
    <form class="wt-formtheme wt-formbanner wt-formbannertwo" id="main-search-form" v-if="this.widget_type == 'home'">
        <fieldset>
            <div class="wt-dropdown" @click="toggleDropdown">
                <span><em class="selected-search-type">{{selected_type}} </em><i
                        class="lnr lnr-chevron-down"></i></span>
            </div>
            <div class="wt-radioholder" v-bind:style='{"display" : (isActive? "block" : "none" )}'>
                <span class="wt-radio" v-for="(filter, index) in filters" :key="index">
                    <input :id="'wt-'+filter.value" type="radio" name="searchtype" :value="filter.value" v-model="types"
                           v-on:change="getSearchableData(types), emptyField(types)">
                    <label :for="'wt-'+filter.value">{{filter.title}}</label>
                </span>
            </div>
            <div class="form-group">
                <vue-bootstrap-typeahead
                        class="mb-4"
                        size="sm"
                        v-model="query"
                        :data="searchable_data"
                        :placeholder=placeholder
                        :serializer="item => item.name"
                        ref="searchfield"
                        @input="watchSearchResults(types)"
                        inputClass="search-field"
                        @hit="recordSelected"
                >
                    <template slot="suggestion" slot-scope="{ data, htmlText }">
                        <div class="d-flex align-items-center">
                            <span class="ml-4" v-html="htmlText"></span>
                        </div>
                        <input type="hidden" name="keyword" :value="data.slug" id="hidden_field">
                    </template>
                </vue-bootstrap-typeahead>
                <span v-if="is_show" class="no-record-span">{{no_record}}</span>
                <div class="wt-formoptions">
                    <a href="#" class="wt-searchbtn" v-on:click.prevent="submitSearchForm(types)"><i
                            class="lnr lnr-magnifier"></i></a>
                </div>
            </div>
        </fieldset>
    </form>
    <!--<form class="wt-formtheme wt-formbanner wt-formbannervtwo topmenusearch"   v-else>-->
        <!--<fieldset>-->
            <!--<div class="form-group">-->
                <!--<vue-bootstrap-typeahead-->
                        <!--class="mb-4"-->
                        <!--size="sm"-->
                        <!--v-model="query"-->
                        <!--:data="searchable_data"-->
                        <!--:placeholder=placeholder-->
                        <!--:serializer="item => item.name"-->
                        <!--ref="searchfield"-->
                        <!--@input="watchSearchResults(types)"-->
                        <!--inputClass="search-field"-->
                        <!--@hit="recordSelected"-->
                <!--&gt;-->
                    <!--<template slot="suggestion" slot-scope="{ data, htmlText }">-->
                        <!--<div class="d-flex align-items-center">-->
                            <!--<span class="ml-4" v-html="htmlText"></span>-->
                        <!--</div>-->
                        <!--<input type="hidden" name="keyword" :value="data.slug" id="hidden_field">-->
                    <!--</template>-->
                <!--</vue-bootstrap-typeahead>-->
                <!--<span v-if="is_show" class="no-record-span">{{no_record}}</span>-->
                <!--<div class="wt-formoptions" style="left: 156px;">-->
                    <!--<div class="wt-dropdown" @click="toggleDropdown" style="width: 158px;">-->
                        <!--<span style="width: 176px;">In: <em class="selected-search-type">{{selected_type}} </em><i-->
                                <!--class="lnr lnr-chevron-down"></i></span>-->
                    <!--</div>-->
                    <!--<div class="wt-radioholder" v-bind:style='{"display" : (isActive? "block" : "none" )}'>-->
                        <!--<span class="wt-radio" v-for="(filter, index) in filters" :key="index">-->
                            <!--<input :id="filter.value" type="radio" name="searchtype" :value="filter.value"-->
                                   <!--v-model="types"-->
                                   <!--v-on:change="getSearchableData(types), emptyField(types), changeFilter()">-->
                            <!--<label :for="filter.value">{{filter.title}}</label>-->
                        <!--</span>-->
                    <!--</div>-->
                    <!--<input type="text" v-model="selectedDate" class="selectDatePicker"-->
                           <!--placeholder="Date"  style="width:80px;">-->
                    <!--<vue-cal id="calendar_small"-->
                             <!--style="display:none;z-index:5; background-color:white;width:230px;position: absolute; height: 290px;"-->
                             <!--class=" vuecal&#45;&#45;green-theme"-->
                             <!--xsmall-->
                             <!--hide-view-selector-->
                             <!--:time="false"-->
                             <!--default-view="month"-->
                             <!--:disable-views="['week', 'day', 'year']"-->
                             <!--@cell-click="changeSelectedDate"-->
                             <!--:events="events"-->
                    <!--&gt;-->
                    <!--</vue-cal>-->
                    <!--&lt;!&ndash;<a href="#" class="wt-searchbtn"  style="float:none" id="calendar_btn"><i class="lnr lnr-calendar-full"></i><span>{{trans('lang.search_now')}}</span></a>&ndash;&gt;-->
                    <!--<input type="text" v-model="selectedLocation" placeholder="Location" style="width:70px;">-->

                    <!--<multiselect-->
                            <!--track-by="title"-->
                            <!--label="title"-->
                            <!--v-model="selectedSkills"-->
                            <!--placeholder="Select skills"-->
                            <!--:options="skills"-->
                            <!--:searchable="false"-->
                            <!--:allow-empty="false"-->
                            <!--:multiple="true"-->
                            <!--:close-on-select="false"-->
                            <!--:clear-on-select="false"-->
                            <!--:preserve-search="true"-->
                            <!--@select="onSkillSelect">-->
                    <!--</multiselect>-->

                    <!--<a href="#" class="wt-searchbtn" v-on:click.prevent="submitSearchForm(types)"><i-->
                            <!--class="lnr lnr-magnifier"></i><span>{{trans('lang.search_now')}}</span></a>-->
                <!--</div>-->
            <!--</div>-->

            <!--<div class="wt-btn-remove-holder">-->
                <!--<a href="javascript:;" class="wt-search-remove">{{trans('lang.cancel')}}</a>-->
                <!--<a href="javascript:;" class="wt-search-remove"><i class="fa fa-close"></i></a>-->
            <!--</div>-->
        <!--</fieldset>-->
    <!--</form>-->
</template>
<script>

    import VueCal from 'vue-cal';
    import 'vue-cal/dist/vuecal.css';
    import Multiselect from 'vue-multiselect'

    Vue.component('multiselect', Multiselect)

    export default {
        components: {'vue-cal': VueCal, Multiselect},

        props: ['widget_type', 'no_record_message', 'placeholder', 'freelancer_placeholder', 'employer_placeholder', 'job_placeholder', 'service_placeholder', 'job_date_placeholder', 'avail_date_placeholder', 'location_placeholder', 'skill_placeholder'],
        data() {
            return {
                filters: [],
                isActive: false,
                searchable_data: [],
                freelancers: [],
                employers: [],
                jobs: [],
                query: '',
                types: 'freelancer',
                selected_type: '',
                no_record: this.no_record_message,
                is_show: false,
                related_results: false,
                url: APP_URL + '/search-results',
                type_change: false,
                events: [],
                skills: [],
                selecteddate: '',
                selectedDate: '',
                selectedSkills: "",
                selectedLocation: "",
            }
        },
        methods: {
            onSkillSelect(option) {
                //console.log(this.selectedSkills);
            },
            changeSelectedDate(date) {
                //this.$refs.searchfield.inputValue = date.getFullYear() + "-" + (date.getMonth()+1) + '-' + date.getDate() ;
                this.selectedDate = date.getDate() + "-" + (date.getMonth() + 1) + '-' + date.getFullYear();
                jQuery('#calendar_small').hide();
                //this.getSearchableData(this.types), this.emptyField(this.types), this.changeFilter()
                // window.location.replace(APP_URL+'/search-results?type=job&start_date='+this.$refs.searchfield.inputValue);
            },
            displayFiltersName(type) {
                if (type == 'freelancer') {
                    this.selected_type = this.freelancer_placeholder;
                } else if (type == 'employer') {
                    this.selected_type = this.employer_placeholder;
                } else if (type == 'job') {
                    this.selected_type = this.job_placeholder;
                } else if (type == 'service') {
                    this.selected_type = this.service_placeholder;
                } else if (type == 'location') {
                    this.selected_type = this.location_placeholder;
                } else if (type == 'skill') {
                    this.selected_type = this.skill_placeholder;
                } else if (type == 'job_date') {
                    this.selected_type = this.job_date_placeholder;
                } else if (type == 'avail_date') {
                    this.selected_type = this.avail_date_placeholder;
                }
            },
            getFilters() {
                let self = this;
                axios.get(APP_URL + '/search/get-search-filters')
                    .then(function (response) {
                        if (response.data.type == 'success') {
                            self.filters = response.data.result;
                        }
                    });
            },
            changeFilter() {
                this.type_change = true;
            },
            getSearchableData: function (type, newQuery) {
                this.displayFiltersName(type);
                let self = this;
                axios.post(APP_URL + '/search/get-searchable-data', {
                    type: type
                })
                    .then(function (response) {
                        if (type == 'freelancer') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'employer') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'job') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'service') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'location') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'skill') {
                            self.searchable_data = response.data.searchables;
                        } else if (type == 'job_date') {
                            self.searchable_data = [];
                        } else if (type == 'avail_date') {
                            self.searchable_data = [];
                        }
                    });
            },
            emptyField: function (types) {
                this.$refs.searchfield.inputValue = '';
                this.isActive = false;
            },
            watchSearchResults: function (types) {
                if (jQuery('.wt-radioholder').css('display') == 'block') {
                    jQuery('.wt-radioholder').css("display", "none");
                }
                if (!(jQuery('.list-group').hasClass("input-searching"))) {
                    jQuery('.list-group').addClass('input-searching');
                }
                if (this.$refs.searchfield.$children[0].matchedItems == '') {
                    jQuery('.search-field').parents('.form-group').find('span.no-record-span').css("display", "block");
                    jQuery('.wt-related-result').remove();
                    this.is_show = true;
                } else {
                    let keyword = this.query;
                    var urlParams = new URLSearchParams(window.location.search);
                    if (urlParams.get('type') && this.type_change == false) {
                        var type = urlParams.get('type');
                    } else {
                        var type = types;
                    }
                    if (type == 'Freelancers') {
                        type = 'freelancer';
                    } else if (type == 'Employers') {
                        type = 'employer';
                    } else if (type == 'Jobs') {
                        type = 'job';
                    } else if (type == 'Services') {
                        type = 'service';
                    } else if (type == 'skill') {
                        type = 'skill';
                    } else if (type == 'location') {
                        type = 'location';
                    } else if (type == 'job_date') {
                        type = 'job_date';
                    } else if (type == 'avail_date') {
                        type = 'avail_date';
                    }
                    jQuery('.search-field').parents('.form-group').find('span.no-record-span').css("display", "none");
                    jQuery('.wt-related-result').remove();
                    var html = '<a href="' + this.url + '?s=' + keyword + '&type=' + type + '" class="wt-related-result"><span v-if="related_results">show all result related to' + ' <em>' + keyword + '</em></span></a>';
                    jQuery(".list-group").append(html);
                    this.related_results = true;
                    this.is_show = false;
                }
            },
            recordSelected: function () {
                if (jQuery('.list-group').hasClass("input-searching")) {
                    jQuery('.list-group').removeClass('input-searching');
                }
            },
            toggleDropdown: function () {
                if (this.isActive == false) {
                    this.isActive = true;
                    jQuery('.wt-related-result').remove();
                } else {
                    this.isActive = false;
                }
            },
            submitSearchForm: function (type) {
                var urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('type') && this.type_change == false) {
                    var type = urlParams.get('type');
                } else {
                    if (type == 'Freelancers') {
                        type = 'freelancer';
                    } else if (type == 'Employers') {
                        type = 'employer';
                    } else if (type == 'Jobs') {
                        type = 'job';
                    } else if (type == 'Services') {
                        type = 'service';
                    } else if (type == 'skill') {
                        type = 'skill';
                    } else if (type == 'location') {
                        type = 'location';
                    } else if (type == 'job_date') {
                        type = 'job_date';
                    } else if (type == 'avail_date') {
                        type = 'avail_date';
                    }
                }
                if (this.$refs.searchfield.inputValue != '') {
                    let keyword = this.query;
                    if (type == 'job') {
                        let slug = document.getElementById('hidden_field').value;
                        window.location.replace(APP_URL + '/job/' + slug);
                    } else if (type == 'service') {
                        let slug = document.getElementById('hidden_field').value;
                        window.location.replace(APP_URL + '/service/' + slug);
                    } else if (type == 'skill') {
                        window.location.replace(APP_URL + '/search-results?type=freelancer&skill=' + this.$refs.searchfield.inputValue);
                    } else if (type == 'location') {
                        window.location.replace(APP_URL + '/search-results?type=freelancer&location=' + this.$refs.searchfield.inputValue);
                    } else if (type == 'job_date') {
                        window.location.replace(APP_URL + '/search-results?type=job&start_date=' + this.$refs.searchfield.inputValue);
                    } else if (type == 'avail_date') {
                        window.location.replace(APP_URL + '/search-results?type=freelancer&avail_date=' + this.$refs.searchfield.inputValue);
                    }
                    else {
                        window.location.replace(APP_URL + '/profile/' + slug);
                    }
                } else {
                    var getParams = '';
                    if (this.selectedLocation != "") {
                        getParams += '&location=' + this.selectedLocation;
                    }
                    if (this.selectedDate != "") {
                        getParams += '&start_Date=' + this.selectedDate;
                    }
                    if (this.selectedSkills != "") {
                        for (var i = 0; i < this.selectedSkills.length; i++) {
                            getParams += '&skills[]=' + this.selectedSkills[i].title;

                        }

                    }
                    window.location.replace(APP_URL + '/search-results?type=' + type + getParams);
                }

            },
        },
        watch: {
            query: _.debounce(function (newQuery) {
                this.getSearchableData(newQuery)
            }, 250)
        },
        mounted: function () {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('type')) {
                var type = urlParams.get('type');
                this.displayFiltersName(type);
            }
            jQuery(".search-field").keydown(function () {
                var input = jQuery('.search-field');
                input.on('keydown', function () {
                    var key = event.keyCode || event.charCode;
                    if (key == 8 || key == 46) {
                        if (!jQuery(this).val()) {
                            jQuery(this).parents('.form-group').find('span.no-record-span').css("display", "none");
                        } else {
                            jQuery('.wt-related-result').remove();
                            this.is_show = true;
                        }
                    }
                });
            });
        },
        created: function () {
            this.getFilters();
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('type')) {
                var type = urlParams.get('type');
                this.displayFiltersName(type);
                this.getSearchableData(type);
            } else {
                this.getSearchableData('freelancer');
            }

            var events = [];
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
    }
</script>
<style>
    .wt-radioholder {
        transition: 1s;
    }
</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang='scss'>

    @import '~@fullcalendar/core/main.css';
    @import '~@fullcalendar/daygrid/main.css';

</style>