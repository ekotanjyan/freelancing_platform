<?php

/**
 * Class Job.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use File;
use Storage;
use DB;
use Auth;
use App\Proposal;
use App\Location;
use App\Language;
use App\User;

/**
 * Class Job
 *
 */
class Job extends Model
{
    /**
     * Get all of the categories for the job.
     *
     * @return relation
     */
    public function categories()
    {
        return $this->morphToMany('App\Category', 'catable');
    }

    /**
     * Get all of the languages for the user.
     *
     * @return relation
     */
    public function languages()
    {
        return $this->morphToMany('App\Language', 'langable');
    }

    /**
     * The skills that belong to the job.
     *
     * @return relation
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    /**
     * Get the location that owns the job.
     *
     * @return relation
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * Get the employer that owns the job.
     *
     * @return relation
     */
    public function employer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the proposals associated with job.
     *
     * @return relation
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal');
    }

    /**
     * Get all of the job's reports.
     *
     * @return relation
     */
    public function reports()
    {
        return $this->morphMany('App\Report', 'reportable');
    }

    /**
     * Uppload Attcahments.
     *
     * @param mixed $uploadedFile uploaded file
     *
     * @return relation
     */
    public function uploadTempattachments($uploadedFile, $path)
    {
        $filename = $uploadedFile->getClientOriginalName();
        if (!file_exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        Storage::disk('local')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );
        return 'success';
    }

    /**
     * Set slug before saving in DB
     *
     * @param string $value value
     *
     * @access public
     *
     * @return string
     */
    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $temp = str_slug($value, '-');
            if (!Job::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Job::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * Store Jobs.
     *
     * @param mixed $request request->attr
     *
     * @return relation
     */
    public function storeJobs($request)
    {
        $json = array();
        if (!empty($request)) {
            $random_number = Helper::generateRandomCode(8);
            $code = strtoupper($random_number);
            $user_id = Auth::user()->id;
            $location = $request['locations'];
            $this->location()->associate($location);
            $this->employer()->associate($user_id);
            $this->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->price = "0";//filter_var($request['project_cost'], FILTER_SANITIZE_STRING);
            $this->project_level = filter_var($request['project_levels'], FILTER_SANITIZE_STRING);
            $this->description = $request['description'];
            $this->english_level = filter_var($request['english_level'], FILTER_SANITIZE_STRING);
            $this->home_visits = filter_var($request['home_visits'], FILTER_SANITIZE_STRING);
            $this->duration = ''; //filter_var($request['job_duration'], FILTER_SANITIZE_STRING);
            $this->freelancer_type = filter_var($request['freelancer_type'], FILTER_SANITIZE_STRING);
            $this->is_featured = filter_var($request['is_featured'], FILTER_SANITIZE_STRING);
            $this->show_attachments = filter_var($request['show_attachments'], FILTER_SANITIZE_STRING);
            $this->address = filter_var($request['address'], FILTER_SANITIZE_STRING);
            $this->radius = $request['radius'] ?? null;
            $this->longitude = filter_var($request['longitude'], FILTER_SANITIZE_STRING);
            $this->latitude = filter_var($request['latitude'], FILTER_SANITIZE_STRING);
            $this->project_rates = filter_var($request['project_rates'], FILTER_SANITIZE_STRING);
            $this->project_rates_type = filter_var($request['project_rates_type'], FILTER_SANITIZE_STRING);
            $this->start_date = filter_var(is_array($request['start_date']) ? Carbon::parse($request['start_date'][0])->format('Y-m-d') : Carbon::parse($request['start_date'])->format('Y-m-d'), FILTER_SANITIZE_STRING);
            $this->maximum_distance = filter_var($request['maximum_distance'] ? $request['maximum_distance']  : "0" , FILTER_SANITIZE_STRING);
            $this->skills = (count(array_filter($request['skills']))) ? serialize(array_filter($request['skills']))  : "";

            $this->days_avail = (isset($request['days_avail']) && is_array($request['days_avail']) && !empty($request['days_avail'])) ? json_encode($request['days_avail']) : "";
            $this->hours_avail = filter_var(isset($request['hours_avail']) ? $request['hours_avail'] : "", FILTER_SANITIZE_STRING);
            $old_path = 'uploads\jobs\temp';
            $job_attachments = array();
            if (!empty($request['attachments'])) {
                $attachments = $request['attachments'];
                foreach ($attachments as $key => $attachment) {
                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {
                        $new_path = 'uploads/jobs/' . $user_id;
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . '-' . $attachment;
                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);
                        $job_attachments[] = $filename;
                    }
                }
                $this->attachments = serialize($job_attachments);
            }
            $this->code = $code;
            $this->save();
            $job_id = $this->id;

            $arrNewEvent = [];
            $arrNewEvent['user_id'] = Auth::user()->id;
            $arrNewEvent['job_id'] = $job_id;
            $arrNewEvent['title'] = $request['title'];
            $arrNewEvent['recurring_date'] = $request['recurring_date'];
            $arrNewEvent['content'] = ($request['booking_content'])?$request['booking_content']:'';
            $arrNewEvent['class'] = 'booking_calendar';
            $booking_start = ($request['booking_start']) ? $request['booking_start'] : '23:59';
            $booking_end = ($request['booking_end']) ? $request['booking_end'] : '00:00';
            array_filter($request['start_date']);
            array_filter($request['end_date']);
            //$arrNewEvent['start'] = $request['start_date'] . ' ' . $request['booking_start'];
            //$arrNewEvent['end'] = (($request['end_date']) ? $request['end_date'] : $request['start_date']) . ' ' . $request['booking_end'];
            //dd($request['start_date'],count($request['start_date']));
            for($d=0;$d<count($request['start_date']);$d++) {
                if ($request['start_date']) {
                    if ($request['recurring_date']) {
                        $reqStart = $request['start_date'][$d];
                        $reqEnd = ($request['end_date'][$d]) ? $request['end_date'][$d] : $request['start_date'][$d];
                        $recurringEndDay = Carbon::parse($request['recurring_end_date']);
                        $carbStart = new Carbon($reqStart);
                        $carbEnd = Carbon::parse($reqEnd);
                        if ($request['recurring_date'] == 'day') {
                            $difference = ($carbStart->diff($recurringEndDay)->days < 1) ? 'today' : $carbStart->diffInDays($recurringEndDay);
                            echo $difference;
                            for ($g = 0; $g <= $difference; $g++) {
                                $arrNewEvent['start'] = Carbon::parse($reqStart)->addDay($g)->format('Y-m-d') . ' ' . $booking_start;
                                $arrNewEvent['end'] = Carbon::parse($reqEnd)->addDay($g)->format('Y-m-d') . ' ' . $booking_end;
                                //echo $arrNewEvent['start'] . '=>' . $arrNewEvent['end'] . '<br>';
                                DB::table('calendar_events')->insert($arrNewEvent);
                            }
                        } else {
                            if ($request['recurring_date'] == 'week') {
                                $difference = ($carbStart->diff($recurringEndDay)->days < 1) ? 'today' : $carbStart->diffInWeeks($recurringEndDay);
                                for ($g = 0; $g <= $difference; $g++) {
                                    $arrNewEvent['start'] = Carbon::parse($reqStart)->addDay($g * 7)->format('Y-m-d') . ' ' . $booking_start;
                                    $arrNewEvent['end'] = Carbon::parse($reqEnd)->addDay($g * 7)->format('Y-m-d') . ' ' . $booking_end;
                                    //echo $arrNewEvent['start'] . '=>' . $arrNewEvent['end'] . '<br>';
                                    DB::table('calendar_events')->insert($arrNewEvent);
                                }
                            } else {
                                if ($request['recurring_date'] == 'month') {
                                    $difference = ($carbStart->diff($recurringEndDay)->days < 1) ? 'today' : $carbStart->diffInMonths($recurringEndDay);
                                    for ($g = 0; $g <= $difference; $g++) {
                                        $arrNewEvent['start'] = Carbon::parse($reqStart)->addMonth($g)->format('Y-m-d') . ' ' . $booking_start;
                                        $arrNewEvent['end'] = Carbon::parse($reqEnd)->addMonth($g)->format('Y-m-d') . ' ' . $booking_end;
                                        //echo $arrNewEvent['start'] . '=>' . $arrNewEvent['end'] . '<br>';
                                        DB::table('calendar_events')->insert($arrNewEvent);
                                    }
                                }
                            }
                        }

                    }
                    else {
                        $arrNewEvent['start'] = Carbon::parse($request['start'][$d])->addDay($request['start'][$d])->format('Y-m-d') . $booking_end;
                        $arrNewEvent['end'] = Carbon::parse($request['end'][$d])->addDay($request['end'][$d])->format('Y-m-d') . $booking_start;
                        //echo $arrNewEvent['start'] . '=>' . $arrNewEvent['end'] . '<br>';
                        DB::table('calendar_events')->insert($arrNewEvent);
                    }
                }
            }
            //dd($arrNewEvent);
            $skills = $request['skills'];
            $this->skills()->detach();
            if (!empty($skills)) {
                foreach ($skills as $skill) {
                    $this->skills()->attach($skill['id']);
                }
            }
            $job = Job::find($job_id);
            $languages = $request['languages'];
            $job->languages()->sync($languages);
            $categories = $request['categories'];
            $job->categories()->sync($categories);
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }

    /**
     * Update Jobs.
     *
     * @param mixed   $request request
     * @param integer $id      ID
     *
     * @return $request, ID
     */
    public function updateJobs($request, $id)
    {
        $json = array();
        if (!empty($request)) {
            $job = self::find($id);
            $random_number = Helper::generateRandomCode(8);
            $user_id = $job->user_id;
            $location = $request['locations'];
            $job->location()->associate($location);
            $job->employer()->associate($user_id);
            if ($job->title != $request['title']) {
                $job->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);
            }
            $job->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $job->price = '0'; //filter_var($request['project_cost'], FILTER_SANITIZE_STRING);
            $job->project_level = filter_var($request['project_levels'], FILTER_SANITIZE_STRING);
            $job->description = $request['description'];
            $job->english_level = filter_var($request['english_level'], FILTER_SANITIZE_STRING);
            $job->home_visits = filter_var($request['home_visits'], FILTER_SANITIZE_STRING);
            $job->duration = '';// filter_var($request['job_duration'], FILTER_SANITIZE_STRING);
            $job->freelancer_type = filter_var($request['freelancer_type'], FILTER_SANITIZE_STRING);
            $job->is_featured = filter_var($request['is_featured'], FILTER_SANITIZE_STRING);
            $job->show_attachments = filter_var($request['show_attachments'], FILTER_SANITIZE_STRING);
            $job->address = filter_var($request['address'], FILTER_SANITIZE_STRING);
            $job->longitude = filter_var($request['longitude'], FILTER_SANITIZE_STRING);
            $job->latitude = filter_var($request['latitude'], FILTER_SANITIZE_STRING);
            $job->maximum_distance = filter_var($request['maximum_distance'] ? $request['maximum_distance']  : 0 , FILTER_SANITIZE_STRING);

            $job->days_avail = (isset($request['days_avail']) && is_array($request['days_avail']) && !empty($request['days_avail'])) ? json_encode($request['days_avail']) : "";
            $job->hours_avail = filter_var(isset($request['hours_avail']) ? $request['hours_avail'] : "", FILTER_SANITIZE_STRING);
            $old_path = 'uploads\jobs\temp';
            $job_attachments = array();
            if (!empty($request['attachments'])) {
                $attachments = $request['attachments'];
                foreach ($attachments as $key => $attachment) {
                    $filename = $attachment;
                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {
                        $new_path = 'uploads/jobs/' . $user_id;
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . '-' . $attachment;
                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);
                    }
                    $job_attachments[] = $filename;
                }
                $job->attachments = serialize($job_attachments);
            } else {
                $job->attachments = null;
            }
            if (empty($job->code)) {
                $code = strtoupper($random_number);
                $job->code = $code;
            }
            $job->save();
            $job_id = $job->id;
            $skills = $request['skills'];
            $job->skills()->detach();
            if (!empty($skills)) {
                foreach ($skills as $skill) {
                    $job->skills()->attach($skill['id']);
                }
            }
            $job = Job::find($job_id);
            $languages = $request['languages'];
            $job->languages()->sync($languages);
            $categories = $request['categories'];
            $job->categories()->sync($categories);
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }

    /**
     * Get all of the categories for the job.
     *
     * @param string $keyword                keyword
     * @param string $search_categories      search_categories
     * @param string $search_locations       search_locations
     * @param string $search_skills          search_skills
     * @param string $search_project_lengths search_project_lengths
     * @param string $search_languages       search_languages
     *
     * @return relation
     */
    public static function getSearchResult(
        $user, $keyword, $search_categories, $search_locations,
        $search_skills, $search_project_lengths,
        $search_languages, $days_avail, $hours_avail, $job_date, $location,
        $latitude, $longitude, $radius
    ) {

        $json = array();
        $filters = array();
        $jobs = Job::select('jobs.*');

        $query_radius = $radius ?: 'jobs.radius';

        if ($radius != null) {
            $filters['radius'] = $radius;
        }

        if ($location != null) {
            $filters['location'] = $location;
            if ($latitude != null && $longitude != null) {
                $filters['latitude'] = $latitude;
                $filters['longitude'] = $longitude;
                $distance = self::distanceQuery($latitude, $longitude);
                $jobs->addSelect(DB::raw('(' . $distance . ') AS distance'));
                $jobs->whereRaw(DB::raw('(' . $distance . '<=' . $query_radius . ')'));
            } else {
                $jobs->where('address', 'like', '%'.$location.'%');
            }
        } else {
            if (!empty($user->profile->latitude) && !empty($user->profile->longitude)) {
                $distance = self::distanceQuery($user->profile->latitude, $user->profile->longitude);
                $jobs->addSelect(DB::raw('(' . $distance . ') AS distance'));
                $jobs->whereRaw(DB::raw('(' . $distance . '<=' . $query_radius . ')'));
            }
        }

        $job_id = array();
        $filters['type'] = 'job';

        if (!empty($keyword)) {
            $filters['s'] = $keyword;
            $jobs->where('title', 'like', '%' . $keyword . '%');
        };

        $jobs->where('is_active', '1');

        if (!empty($search_categories)) {
            $filters['category'] = $search_categories;
            foreach ($search_categories as $key => $search_category) {
                $categor_obj = Category::where('slug', $search_category)->first();
                $category = Category::find($categor_obj->id);
                if (!empty($category->jobs)) {
                    $category_jobs = $category->jobs->pluck('id')->toArray();
                    foreach ($category_jobs as $id) {
                        $job_id[] = $id;
                    }
                }
            }
            $jobs->whereIn('id', $job_id);
        }

        if (!empty($search_locations)) {
            $filters['locations'] = $search_locations;
            $locations = Location::select('id')->whereIn('slug', $search_locations)->get()->pluck('id')->toArray();
            $jobs->whereIn('location_id', $locations);
        }

        if (!empty($search_skills)) {
            $filters['skills'] = $search_skills;
            foreach ($search_skills as $key => $search_skill) {
                $skill_obj = Skill::where('title', $search_skill)->first();
                $skill = Skill::find($skill_obj->id);
                if (!empty($skill->jobs)) {
                    $skill_jobs = $skill->jobs->pluck('id')->toArray();
                    foreach ($skill_jobs as $id) {
                        $job_id[] = $id;
                    }
                }
            }
            $jobs->whereIn('id', $job_id);
        }

        if (!empty($search_project_lengths)) {
            $filters['project_lengths'] = $search_project_lengths;
            $jobs->whereIn('duration', $search_project_lengths);
        }

        if (!empty($search_languages)) {
            $filters['languages'] = $search_languages;
            $languages = Language::whereIn('slug', $search_languages)->get();
            foreach ($languages as $key => $language) {
                if (!empty($language->jobs[$key]->id)) {
                    $job_id[] = $language->jobs[$key]->id;
                }
            }
            $jobs->whereIn('id', $job_id);
        }

        if (!empty($days_avail)) {
            $arrjobs = DB::table('jobs');//Profile::where('days_avail', 'like', '%' . Input::get('name') . '%');
            $filters['days_avail'] = json_encode($days_avail);

            foreach($days_avail as $day)
            {
                $jobs->where('days_avail', 'like', '%' . $day . '%');
            }
            $arrjobs = $jobs->get();
            foreach ($arrjobs as $key => $job) {
                if (!empty($job->id)) {
                    $job_id[] = $job->id;
                }
            }
            $jobs->whereIn('id', $job_id);
        }

        if(!empty($job_date))
        {
//            $events = DB::table('calendar_events')
//                ->where('class', '=', 'booking_calendar')
//                ->where('start', 'like', '%'.$job_date.'%')
//                ->where('end', 'like', '%'.$job_date.'%')->get()->toArray();
//            if(!empty($events))
//            {
//                $user_id = array();
//                foreach ($events as $event)
//                {
//                    $user_id[] = $event->user_id;
//                }
//                $jobs->whereIn('jobs.user_id', $user_id);
//            }
            $jobs->where('start_date', '=', $job_date);

        }

        //$jobs->where('start_date', "!=","0000-00-00");
        $jobs->where('start_date', '>=', DB::raw('CURDATE()'));

        $jobs = $jobs->orderByRaw("is_featured DESC, updated_at DESC")->paginate(7)->setPath('');

        foreach ($filters as $key => $filter ) {
            $pagination = $jobs->appends(
                array(
                    $key => $filter
                )
            );
        }

        $json['jobs'] = $jobs;
        return $json;
    }

    /**
     * Delete recoed from storage
     *
     * @param int $id id
     *
     * @return relation
     */
    public static function deleteRecord($id)
    {
        $job = self::find($id);
        if (!empty($job->proposals)) {
            foreach ($job->proposals as $key => $proposal) {
                $proposal = Proposal::find($proposal->id);
                $proposal->delete();
            }
        }
        $job->skills()->detach();
        $job->languages()->detach();
        $job->categories()->detach();
        return $job->delete();
    }

    /**
     * Returns distance query
     *
     * @param numeric $latitude
     * @param numeric $longitude
     *
     * @return string
     */
    public static function distanceQuery($latitude, $longitude)
    {
        return '(3959 * acos (
          cos (radians(' . $latitude . '))
          * cos(radians(jobs.latitude))
          * cos(radians(jobs.longitude) - radians(' . $longitude . '))
          + sin(radians(' . $latitude . '))
          * sin(radians(jobs.latitude))
        ))';
    }
}
