<?php

/**
 * Class User.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use DB;
use App\Payout;
use Illuminate\Support\Facades\Schema;
use App\Location;
use App\Profile;
use Auth;
use App\Package;
use App\Helper;
use App\Job;
use Carbon\Carbon;
use canResetPassword;
use App\Notifications;
use Event;

/**
 * Class User
 *
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'slug', 'email', 'password',
        'avatar', 'banner', 'tagline', 'description',
        'location_id', 'verification_code', 'address',
        'longitude', 'latitude',
        'emp_contact',
        'emp_telno',
        'emp_website',
        'emp_cqc_rating',
        'emp_cqc_rating_date',
    ];

    /**
     * For creating event.
     *
     * @return event
     */
    public static function boot()
    {
        parent::boot();
        static::created(
            function ($user) {
                Event::fire('user.created', $user);
            }
        );
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The skills that belong to the user.
     *
     * @return relation
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill')->withPivot('skill_rating');
    }

    /**
     * Get all of the categories for the user.
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
     * Get the location that owns the user.
     *
     * @return relation
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * Get the profile record associated with the user.
     *
     * @return relation
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * Get the payout record associated with the user.
     *
     * @return relation
     */
    public function payout()
    {
        return $this->hasOne('App\Payout');
    }

    /**
     * Get the jobs for the employer.
     *
     * @return relation
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    /**
     * Get the services for the freelancer.
     *
     * @return relation
     */
    public function services()
    {
        return $this->belongsToMany('App\Service')->withPivot('type', 'status', 'seller_id');
    }

    /**
     * Get the employer purchased services
     *
     * @return relation
     */
    public function purchasedServices()
    {
        return $this->belongsToMany('App\Service')->withPivot('id', 'type', 'status', 'seller_id')->wherePivot('status', 'hired');
    }

    /**
     * Get the employer completed services
     *
     * @return relation
     */
    public function completedServices()
    {
        return $this->belongsToMany('App\Service')->withPivot('id', 'type', 'status', 'seller_id')->wherePivot('status', 'completed');
    }

    /**
     * Get the employer cancelled services
     *
     * @return relation
     */
    public function cancelledServices()
    {
        return $this->belongsToMany('App\Service')->withPivot('id', 'type', 'status', 'seller_id')->wherePivot('status', 'cancelled');
    }

    /**
     * Get the proposals for the freelancer.
     *
     * @return relation
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal', 'freelancer_id');
    }

    /**
     * Get the reviews for the user.
     *
     * @return relation
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'user_id');
    }

    /**
     * Get the user that owns the offer.
     *
     * @return offers
     */
    public function offers()
    {
        return $this->hasOne('App\Offer');
    }

    /**
     * Get all of reported employers.
     *
     * @return relation
     */
    public function reports()
    {
        return $this->morphMany('App\Report', 'reportable');
    }

    /**
     * Get the message for the user.
     *
     * @return relation
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    /**
     * Get the item record associated with the user.
     *
     * @return relation
     */
    public function item()
    {
        return $this->hasMany('App\item', 'subscriber');
    }

    /**
     * Get the calendar events associated with the user.
     *
     * @return relation
     */
    public function calendars()
    {
        return $this->hasMany(CalendarEvent::class, 'user_id', 'id');
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
            if (!User::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!User::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * Store user
     *
     * @param \Illuminate\Http\Request $request           code
     * @param code                     $verification_code verification code
     *
     * @access public
     *
     * @return \Illuminate\Http\Response
     */
    public function storeUser($request, $verification_code)
    {
        if (!empty($request)) {
            $this->first_name = filter_var($request['first_name'], FILTER_SANITIZE_STRING);
            $this->last_name = filter_var($request['last_name'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['first_name'], FILTER_SANITIZE_STRING) . '-' .
                filter_var($request['last_name'], FILTER_SANITIZE_STRING);
            $this->email = filter_var($request['email'], FILTER_VALIDATE_EMAIL);
            $this->password = Hash::make($request['password']);
            //passing email verification process
            $this->verification_code = "";//$verification_code;
            $this->user_verified = 1;//0;
            $this->assignRole($request['role']);
            if (!empty($request['locations'])) {
                $location = Location::find($request['locations']);
                $this->location()->associate($location);
            }
            $this->badge_id = null;
            $this->expiry_date = null;
            $this->telno = filter_var(isset($request['telno']) ? $request['telno'] : "", FILTER_SANITIZE_STRING);;
            $this->title = filter_var(isset($request['title']) ? $request['title'] : "", FILTER_SANITIZE_STRING);;
            $this->dob = filter_var(isset($request['dob']) ? $request['dob'] : date('Y-m-d H:i:s', strtotime(null)), FILTER_SANITIZE_STRING);;
            $this->straddress = filter_var(isset($request['straddress']) ? $request['straddress'] : "", FILTER_SANITIZE_STRING);;
            $this->number = filter_var(isset($request['number']) ? $request['number'] : "", FILTER_SANITIZE_STRING);;
            $this->postcode = filter_var(isset($request['postcode']) ? $request['postcode'] : "", FILTER_SANITIZE_STRING);;
            $this->city = filter_var(isset($request['city']) ? $request['city'] : "", FILTER_SANITIZE_STRING);;
            $this->date_available = filter_var(isset($request['date_available']) ? $request['date_available'] : date('Y-m-d H:i:s', strtotime(null)), FILTER_SANITIZE_STRING);;
            $this->emp_contact = filter_var(isset($request['emp_contact']) ? $request['emp_contact'] : "" , FILTER_SANITIZE_STRING);;
            $this->emp_telno = filter_var(isset($request['emp_telno']) ? $request['emp_telno'] : "", FILTER_SANITIZE_STRING);;
            $this->emp_website = filter_var(isset($request['emp_website']) ? $request['emp_website'] : "", FILTER_SANITIZE_URL);;
            $this->emp_cqc_rating = filter_var(isset($request['emp_cqc_rating']) ? $request['emp_cqc_rating'] : "", FILTER_SANITIZE_STRING);;
            $this->emp_cqc_rating_date = filter_var(isset($request['emp_cqc_rating_date']) ? $request['emp_cqc_rating_date'] : "", FILTER_SANITIZE_STRING);;
            $this->paypal = filter_var(isset($request['paypal']) ? $request['paypal'] : "", FILTER_SANITIZE_STRING);;
            $this->payment_option = filter_var(isset($request['payment_option']) ? $request['payment_option'] : "", FILTER_SANITIZE_STRING);;
            $this->cheque = filter_var(isset($request['cheque']) ? $request['cheque'] : "", FILTER_SANITIZE_STRING);;
            $this->limitied_company_number = filter_var(isset($request['limitied_company_number']) ? $request['limitied_company_number'] : "", FILTER_SANITIZE_STRING);;
            $this->stripe_token = filter_var(isset($request['stripe_token']) ? $request['stripe_token'] : "", FILTER_SANITIZE_STRING);
            $this->plan_id = filter_var(isset($request['plan_id']) ? $request['plan_id'] : "", FILTER_SANITIZE_STRING);

            // New fields functionality
            $this->org_desc = filter_var(isset($request['org_desc']) ? $request['org_desc'] : "", FILTER_SANITIZE_STRING);
            $this->pin = filter_var(isset($request['pin']) ? $request['pin'] : "", FILTER_SANITIZE_STRING);
            $this->pin_date_revalid = filter_var(isset($request['pin_date_revalid']) ? $request['pin_date_revalid'] : date('Y-m-d H:i:s', strtotime(null)), FILTER_SANITIZE_STRING);
            $this->emp_pos = filter_var(isset($request['emp_pos']) ? $request['emp_pos'] : "", FILTER_SANITIZE_STRING);
            $this->emp_email = filter_var(isset($request['emp_email']) ? $request['emp_email'] : "", FILTER_SANITIZE_STRING);
            $this->backup_emp_contact = filter_var(isset($request['backup_emp_contact']) ? $request['backup_emp_contact'] : "", FILTER_SANITIZE_STRING);
            $this->backup_emp_email = filter_var(isset($request['backup_emp_email']) ? $request['backup_emp_email'] : "", FILTER_SANITIZE_STRING);
            $this->backup_emp_pos = filter_var(isset($request['backup_emp_pos']) ? $request['backup_emp_pos'] : "", FILTER_SANITIZE_STRING);
            $this->backup_emp_tel = filter_var(isset($request['backup_emp_tel']) ? $request['backup_emp_tel'] : "", FILTER_SANITIZE_STRING);
            $this->insurance = filter_var(isset($request['insurance']) ? $request['insurance'] : "", FILTER_SANITIZE_STRING);
            $this->org_name = filter_var(isset($request['org_name']) ? $request['org_name'] : "", FILTER_SANITIZE_STRING);
            $this->policy_number = filter_var(isset($request['policy_number']) ? $request['policy_number'] : "", FILTER_SANITIZE_STRING);
            $this->prof_required = filter_var(isset($request['prof_required']) ? $request['prof_required'] : "", FILTER_SANITIZE_STRING);
            //With Others
            $this->special_interests = filter_var((isset($request['special_interests']) && $request['special_interests'][0] != "Other") ? $request['special_interests'][0] :
                (isset($request['special_interests']) && $request['special_interests'][0] == "Other" ? $request['special_interests'][1] : ""), FILTER_SANITIZE_STRING);
            $this->setting = filter_var((isset($request['setting']) && $request['setting'][0] != "Other") ? $request['setting'][0] :
                (isset($request['setting']) && $request['setting'][0] == "Other" ? $request['setting'][1] : ""), FILTER_SANITIZE_STRING);
            $this->appo_slot_times = filter_var((isset($request['appo_slot_times']) && $request['appo_slot_times'][0] != "Other") ? $request['appo_slot_times'][0] :
                (isset($request['appo_slot_times']) && $request['appo_slot_times'][0] == "Other" ? $request['appo_slot_times'][1] : ""), FILTER_SANITIZE_STRING);
            $this->time_allowed = filter_var((isset($request['time_allowed']) && $request['time_allowed'][0] != "Other") ? $request['time_allowed'][0] :
                (isset($request['time_allowed']) && $request['time_allowed'][0] == "Other" ? $request['time_allowed'][1] : ""), FILTER_SANITIZE_STRING);
            $this->payment_terms = filter_var((isset($request['payment_terms']) && $request['payment_terms'][0] != "Other") ? $request['payment_terms'][0] :
                (isset($request['payment_terms']) && $request['payment_terms'][0] == "Other" ? $request['payment_terms'][1] : ""), FILTER_SANITIZE_STRING);
            $this->endorsements = filter_var(isset($request['endorsements']) ? $request['endorsements'] : "", FILTER_SANITIZE_STRING);
            $this->drive_license = filter_var(isset($request['drive_license']) ? $request['drive_license'] : "", FILTER_SANITIZE_STRING);
            //End With Others

            $this->adm_catch_time = filter_var(isset($request['adm_catch_time']) ? $request['adm_catch_time'] : "", FILTER_SANITIZE_STRING);

            $this->breaks = filter_var(isset($request['breaks']) ? $request['breaks'] : "", FILTER_SANITIZE_STRING);
            $this->direct_booking = filter_var(isset($request['direct_booking']) ? $request['direct_booking'] : "", FILTER_SANITIZE_STRING);
            $this->session_ad_by = filter_var(isset($request['session_ad_by']) ? $request['session_ad_by'] : "", FILTER_SANITIZE_STRING);
            $this->session_ad_by_position = filter_var(isset($request['session_ad_by_position']) ? $request['session_ad_by_position'] : "", FILTER_SANITIZE_STRING);
            $this->session_ad_by_email = filter_var(isset($request['session_ad_by_email']) ? $request['session_ad_by_email'] : "", FILTER_SANITIZE_STRING);
            $this->session_ad_by_contact = filter_var(isset($request['session_ad_by_contact']) ? $request['session_ad_by_contact'] : "", FILTER_SANITIZE_STRING);

            $this->org_name = filter_var(isset($request['org_name']) ? $request['org_name'] : "", FILTER_SANITIZE_STRING);
            $this->organisation_position = filter_var(isset($request['organisation_position']) ? $request['organisation_position'] : "", FILTER_SANITIZE_STRING);
            $this->organisation_email = filter_var(isset($request['organisation_email']) ? $request['organisation_email'] : "", FILTER_SANITIZE_STRING);
            $this->organisation_contact = filter_var(isset($request['organisation_contact']) ? $request['organisation_contact'] : "", FILTER_SANITIZE_STRING);


            $this->nationality = filter_var(isset($request['nationality']) ? $request['nationality'] : "", FILTER_SANITIZE_STRING);
            $this->profession = filter_var(isset($request['profession']) ? $request['profession'] : "", FILTER_SANITIZE_STRING);
            $this->right_of_work = filter_var(isset($request['right_of_work']) ? $request['right_of_work'] : "", FILTER_SANITIZE_STRING);
            $this->c_prof_ind_insurance = filter_var(isset($request['c_prof_ind_insurance']) ? $request['c_prof_ind_insurance'] : "", FILTER_SANITIZE_STRING);
            $this->c_payment_methods = filter_var(isset($request['c_payment_methods']) ? $request['c_payment_methods'] : "", FILTER_SANITIZE_STRING);
            $this->c_ltd_comp_name = filter_var(isset($request['c_ltd_comp_name']) ? $request['c_ltd_comp_name'] : "", FILTER_SANITIZE_STRING);
            $this->c_ltd_comp_number = filter_var(isset($request['c_ltd_comp_number']) ? $request['c_ltd_comp_number'] : "", FILTER_SANITIZE_STRING);

            $this->practice_code = filter_var(isset($request['practice_code']) ? $request['practice_code'] : "", FILTER_SANITIZE_STRING);



            //It software
            $this->itsoftware = !empty($request['itsoftware']) ? serialize($request['itsoftware']) : "";

            //new files fields

            if(isset($request['prof_ind_cert']) && $file = $request['prof_ind_cert'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->prof_ind_cert = $newfiename;
            }
            if(isset($request['certs']) && $file = $request['certs'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->certs = $newfiename;
            }

            if(isset($request['passport_visa']) && $file = $request['passport_visa'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->passport_visa = $newfiename;
            }
            if(isset($request['profQualLevel']) &&
                isset($request['profQualName']) &&
                isset($request['profQualPlace']) &&
                isset($request['profQualYear']))
            {
                $arr['Level'] = $request['profQualLevel'];
                $arr['Name'] = $request['profQualName'];
                $arr['Place'] = $request['profQualPlace'];
                $arr['Year'] = $request['profQualYear'];
                $newFinalArr = [];
                for ($j=0; $j<count($request['profQualLevel']); $j++)
                {
                    $newFinalArr[$j] = array(
                        isset($arr['Level'][$j]) ? $arr['Level'][$j] : "" ,
                        isset($arr['Name'][$j]) ? $arr['Name'][$j] : "" ,
                        isset($arr['Place'][$j]) ? $arr['Place'][$j] : "" ,
                        isset($arr['Year'][$j]) ? $arr['Year'][$j] : "" ,
                    );
                }
                $this->prof_qualifications = json_encode($newFinalArr);
            }
            if(isset($request['prof_qual_cert']) && $file = $request['prof_qual_cert'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->prof_qual_cert = $newfiename;
            }
            if(isset($request['mand_training']) && $file = $request['mand_training'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->mand_training = $newfiename;
            }
            if(isset($request['cert_of_crbdbs']) && $file = $request['cert_of_crbdbs'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->cert_of_crbdbs = $newfiename;
            }
            if(isset($request['occup_health']) && $file = $request['occup_health'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $this->occup_health = $newfiename;
            }

            $this->save();
            $user_id = $this->id;
            $profile = new Profile();
            $profile->user()->associate($user_id);
            if (!empty($request['employees'])) {
                $profile->no_of_employees = intval($request['employees']);
            }
            if (!empty($request['department_name'])) {
                $department = Department::find($request['department_name']);
                $profile->department()->associate($department);
            }

            $profile->org_type = isset($request['org_type']) ? filter_var($request['org_type'], FILTER_SANITIZE_STRING) : "";
            $profile->hourly_rate = isset($request['hourly_rate']) ? filter_var($request['hourly_rate'], FILTER_SANITIZE_STRING) : NULL;
            $profile->hourly_rate_negotiable = isset($request['hourly_rate_negotiable']) ? filter_var($request['hourly_rate_negotiable'], FILTER_SANITIZE_STRING) : "";
            $profile->hourly_rate_desc = isset($request['hourly_rate_desc']) ? filter_var($request['hourly_rate_desc'], FILTER_SANITIZE_STRING) : "";


            if(isset($request['cvfile']) && $file = $request['cvfile'])
            {
                $destinationPath = 'uploads/cvs';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $profile->cvFile = $newfiename;
            }

            if(isset($request['p60']) && $p60File = $request['p60'])
            {
                $destinationPath = 'uploads/p60';
                $newfiename = time().$p60File->getClientOriginalName();
                $p60File->move($destinationPath,$newfiename);
                $profile->p60 = $newfiename;
            }

            if (!empty($request['latitude'])) {
              $profile->latitude = $request['latitude'];
            }

            if (!empty($request['longitude']))
            {
              $profile->longitude = $request['longitude'];
            }

            $profile->save();
            $role_id = Helper::getRoleByUserID($user_id);
            $package = Package::select('id', 'title', 'cost')->where('role_id', $role_id)->where('trial', 1)->get()->first();
            $trial_invoice = Invoice::select('id')->where('type', 'trial')->get()->first();
            if (!empty($package) && !empty($trial_invoice)) {
                DB::table('items')->insert(
                    [
                        'invoice_id' => $trial_invoice->id, 'product_id' => $package->id, 'subscriber' => $user_id,
                        'item_name' => $package->title, 'item_price' => $package->cost, 'item_qty' => 1,
                        "created_at" => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()
                    ]
                );
            }
            return $user_id;
        }
    }


    /**
     * Save User employer fields
     * @param $request
     * @param $user_id
     * @return bool
     */
    public function storeEmployerFields($request, $user_id)
    {
        if (!empty($request) && $user_id) {
            $user =  User::find($user_id);
            $user->emp_contact = filter_var(isset($request['emp_contact']) ? $request['emp_contact'] : "" , FILTER_SANITIZE_STRING);;
            $user->emp_telno = filter_var(isset($request['emp_telno']) ? $request['emp_telno'] : "", FILTER_SANITIZE_STRING);;
            $user->emp_website = filter_var(isset($request['emp_website']) ? $request['emp_website'] : "", FILTER_SANITIZE_URL);;
            $user->emp_cqc_rating = filter_var(isset($request['emp_cqc_rating']) ? $request['emp_cqc_rating'] : "", FILTER_SANITIZE_STRING);;
            $user->emp_cqc_rating_date = filter_var(isset($request['emp_cqc_rating_date']) ? $request['emp_cqc_rating_date'] : "", FILTER_SANITIZE_STRING);

            $user->organisation_email = (!empty($request['organisation_email']))?filter_var($request['organisation_email'], FILTER_SANITIZE_EMAIL):"";
            $user->organisation_position = (!empty($request['organisation_position'])) ? filter_var($request['organisation_position'], FILTER_SANITIZE_STRING) : "";
            $user->organisation_contact = (!empty($request['organisation_contact'])) ? filter_var($request['organisation_contact'], FILTER_SANITIZE_STRING) : "";

            $user->org_desc = filter_var(isset($request['org_desc']) ? $request['org_desc'] : "", FILTER_SANITIZE_STRING);
            $user->pin = filter_var(isset($request['pin']) ? $request['pin'] : "", FILTER_SANITIZE_STRING);
            $user->pin_date_revalid = filter_var(isset($request['pin_date_revalid']) ? $request['pin_date_revalid'] : date('Y-m-d H:i:s', strtotime(null)), FILTER_SANITIZE_STRING);
            $user->emp_pos = filter_var(isset($request['emp_pos']) ? $request['emp_pos'] : "", FILTER_SANITIZE_STRING);
            $user->emp_email = filter_var(isset($request['emp_email']) ? $request['emp_email'] : "", FILTER_SANITIZE_STRING);
            $user->backup_emp_contact = filter_var(isset($request['backup_emp_contact']) ? $request['backup_emp_contact'] : "", FILTER_SANITIZE_STRING);
            $user->backup_emp_email = filter_var(isset($request['backup_emp_email']) ? $request['backup_emp_email'] : "", FILTER_SANITIZE_STRING);
            $user->backup_emp_pos = filter_var(isset($request['backup_emp_pos']) ? $request['backup_emp_pos'] : "", FILTER_SANITIZE_STRING);
            $user->backup_emp_tel = filter_var(isset($request['backup_emp_tel']) ? $request['backup_emp_tel'] : "", FILTER_SANITIZE_STRING);
            $user->insurance = filter_var(isset($request['insurance']) ? $request['insurance'] : "", FILTER_SANITIZE_STRING);
            $user->org_name = filter_var(isset($request['org_name']) ? $request['org_name'] : "", FILTER_SANITIZE_STRING);
            $user->policy_number = filter_var(isset($request['policy_number']) ? $request['policy_number'] : "", FILTER_SANITIZE_STRING);
            $user->prof_required = filter_var(isset($request['prof_required']) ? $request['prof_required'] : "", FILTER_SANITIZE_STRING);
            //With Others
            $user->special_interests = filter_var((isset($request['special_interests']) && $request['special_interests'][0] != "Other") ? $request['special_interests'][0] :
                (isset($request['special_interests']) && $request['special_interests'][0] == "Other" ? $request['special_interests'][1] : ""), FILTER_SANITIZE_STRING);
            $user->setting = filter_var((isset($request['setting']) && $request['setting'][0] != "Other") ? $request['setting'][0] :
                (isset($request['setting']) && $request['setting'][0] == "Other" ? $request['setting'][1] : ""), FILTER_SANITIZE_STRING);
            $user->appo_slot_times = filter_var((isset($request['appo_slot_times']) && $request['appo_slot_times'][0] != "Other") ? $request['appo_slot_times'][0] :
                (isset($request['appo_slot_times']) && $request['appo_slot_times'][0] == "Other" ? $request['appo_slot_times'][1] : ""), FILTER_SANITIZE_STRING);
            $user->time_allowed = filter_var((isset($request['time_allowed']) && $request['time_allowed'][0] != "Other") ? $request['time_allowed'][0] :
                (isset($request['time_allowed']) && $request['time_allowed'][0] == "Other" ? $request['time_allowed'][1] : ""), FILTER_SANITIZE_STRING);
            $user->payment_terms = filter_var((isset($request['payment_terms']) && $request['payment_terms'][0] != "Other") ? $request['payment_terms'][0] :
                (isset($request['payment_terms']) && $request['payment_terms'][0] == "Other" ? $request['payment_terms'][1] : ""), FILTER_SANITIZE_STRING);
            //End With Others

            $user->practice_code = filter_var(isset($request['practice_code']) ? $request['practice_code'] : "", FILTER_SANITIZE_STRING);
            $user->plan_id = filter_var(isset($request['plan_id']) ? $request['plan_id'] : "", FILTER_SANITIZE_STRING);


            $user->adm_catch_time = filter_var(isset($request['adm_catch_time']) ? $request['adm_catch_time'] : "", FILTER_SANITIZE_STRING);

            $user->breaks = filter_var(isset($request['breaks']) ? $request['breaks'] : "", FILTER_SANITIZE_STRING);
            $user->direct_booking = filter_var(isset($request['direct_booking']) ? $request['direct_booking'] : "", FILTER_SANITIZE_STRING);
            $user->session_ad_by = filter_var(isset($request['session_ad_by']) ? $request['session_ad_by'] : "", FILTER_SANITIZE_STRING);

            $user->session_ad_by_position = filter_var(isset($request['session_ad_by_position']) ? $request['session_ad_by_position'] : "", FILTER_SANITIZE_STRING);
            $user->session_ad_by_email = filter_var(isset($request['session_ad_by_email']) ? $request['session_ad_by_email'] : "", FILTER_SANITIZE_STRING);
            $user->session_ad_by_contact = filter_var(isset($request['session_ad_by_contact']) ? $request['session_ad_by_contact'] : "", FILTER_SANITIZE_STRING);

            if(isset($request['prof_ind_cert']) && $file = $request['prof_ind_cert'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $user->prof_ind_cert = $newfiename;
            }
            if(isset($request['certs']) && $file = $request['certs'])
            {
                $destinationPath = 'uploads/files';
                $newfiename = time().$file->getClientOriginalName();
                $file->move($destinationPath,$newfiename);
                $user->certs = $newfiename;
            }


            $user->save();
            return $user_id;
        }
        else {
            return false;
        }

    }

    /**
     * Get user role type by user ID
     *
     * @param integer $user_id code
     *
     * @access public
     *
     * @return \Illuminate\Http\Response
     */
    public static function getUserRoleType($user_id)
    {
        if (!empty($user_id) && is_numeric($user_id)) {
            $role_id = DB::table('model_has_roles')->select('role_id')->where('model_id', $user_id)
                ->get()->pluck('role_id')->toArray();
            if (!empty($role_id)) {
                return DB::table('roles')->select('id', 'role_type', 'name')->where('id', $role_id[0])->get()->first();
            } else {
                return '';
            }
        }
    }

    /**
     * Get search results
     *
     * @param User $user                   type
     * @param integer $type                   type
     * @param integer $keyword                keyword
     * @param integer $search_locations       search_locations
     * @param integer $search_employees       search_employees
     * @param integer $search_skills          search_skills
     * @param integer $search_hourly_rates    search_hourly_rates
     * @param integer $search_freelaner_types search_freelaner_types
     * @param integer $search_english_levels  search_english_levels
     * @param integer $search_languages       search_languages
     *
     * @access public
     *
     * @return \Illuminate\Http\Response
     */
    public static function getSearchResult(
        $user,
        $type,
        $keyword,
        $search_locations,
        $search_employees,
        $search_skills,
        $search_hourly_rates,
        $search_freelaner_types,
        $search_english_levels,
        $search_languages,
        $days_avail,
        $hours_avail,
        $avail_date,
        $location,
        $latitude,
        $longitude,
        $radius
    ) {
        // TODO: fix access!!!
        if ($user == null) {
            return ['users' => []];
        }
        $json = array();
        $user_id = array();
        $filters = array('type' => $type);

        $role = Helper::getAuthRoleName();

        $users = User::select('users.*')
            ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_type', '=', 'App\User')
            ->where('users.id','!=', $user->id)
            ->where('roles.role_type', '=', $type);

            if (!empty($keyword)) {
                $filters['s'] = $keyword;
                $users->where('first_name', 'like', '%' . $keyword . '%');
                $users->orWhere('last_name', 'like', '%' . $keyword . '%');
                $users->orWhere('slug', 'like', '%' . $keyword . '%');
                $users->whereIn('users.id', $user_by_role);
                $users->where('is_disabled', 'false');
            }
            if (!empty($search_locations)) {
                $filters['locations'] = $search_locations;
                $locations = Location::select('id')->whereIn('slug', $search_locations)
                    ->get()->pluck('id')->toArray();
                $users->whereIn('location_id', $locations);
            }
            if (!empty($search_employees) && $role == 'Organisation') {
                $filters['employees'] = $search_employees;
                $employees = Profile::whereIn('no_of_employees', $search_employees)->get();
                foreach ($employees as $key => $employee) {
                    if (!empty($employee->user_id)) {
                        $user_id[] = $employee->user_id;
                    }
                }
                $users->whereIn('users.id', $user_id)->get();
            }
            if (!empty($search_skills)) {
                $filters['skills'] = $search_skills;
                $skills = Skill::whereIn('slug', $search_skills)->get();
                foreach ($skills as $key => $skill) {
                    if (!empty($skill->freelancers[$key]->id)) {
                        $user_id[] = $skill->freelancers[$key]->id;
                    }
                }
                $users->whereIn('users.id', $user_id);
            }
            if (!empty($skill)) {
                $filters['skills'] = array($skill);
                $skills = Skill::whereIn('title', array($skill))->whereIn('slug', array($skill), 'or')->get();
                foreach ($skills as $key => $skill) {
                    if (!empty($skill->freelancers[$key]->id)) {
                        $user_id[] = $skill->freelancers[$key]->id;
                    }
                }
                $users->whereIn('users.id', $user_id);
            }

            if (!empty($search_hourly_rates)) {
                $filters['hourly_rate'] = $search_hourly_rates;
                $min = '';
                $max = '';
                foreach ($search_hourly_rates as $search_hourly_rate) {
                    $hourly_rates = explode("-", $search_hourly_rate);
                    $min = $hourly_rates[0];
                    if (!empty($hourly_rates[1])) {
                        $max = $hourly_rates[1];
                    }
                    $user_id = Profile::select('user_id')->whereIn('user_id', $user_by_role)
                        ->whereBetween('hourly_rate', [$min, $max])->get()->pluck('user_id')->toArray();
                }
                $users->whereIn('users.id', $user_id);
            }
            if (!empty($search_freelaner_types) && ($role == 'Professional' || $role == 'Personal')) {
                $filters['freelaner_type'] = $search_freelaner_types;
                $freelancers = Profile::whereIn('freelancer_type', $search_freelaner_types)->get();
                foreach ($freelancers as $key => $freelancer) {
                    if (!empty($freelancer->user_id)) {
                        $user_id[] = $freelancer->user_id;
                    }
                }
                $users->whereIn('users.id', $user_id)->get();
            }
            if (!empty($search_english_levels)) {
                $filters['english_level'] = $search_english_levels;
                $freelancers = Profile::whereIn('english_level', $search_english_levels)->get();
                foreach ($freelancers as $key => $freelancer) {
                    if (!empty($freelancer->user_id)) {
                        $user_id[] = $freelancer->user_id;
                    }
                }
                $users->whereIn('users.id', $user_id)->get();
            }
            if (!empty($search_languages)) {
                $filters['languages'] = $search_languages;
                $languages = Language::whereIn('slug', $search_languages)->get();
                foreach ($languages as $key => $language) {
                    if (!empty($language->users[$key]->id)) {
                        $user_id[] = $language->users[$key]->id;
                    }
                }
                $users->whereIn('users.id', $user_id);
            }

            $query_radius = $radius ?: 'profiles.radius';

            if ($radius != null) {
                $filters['radius'] = $radius;
            }

            if ($location != null) {
                $filters['location'] = $location;

                if ($latitude != null && $longitude != null) {
                    $distance = self::distanceQuery($latitude, $longitude);
                    $users->addSelect(DB::raw('(' . $distance . ') AS distance'));
                    $users->whereRaw(DB::raw('(' . $distance . '<=' . $query_radius . ')'));
                } else {
                    $users->where('straddress', 'like', '%'.$location.'%');
                    $users->orWhere('city', 'like', '%'.$location.'%');
                    $users->orWhere('postcode', 'like', '%'.$location.'%');
                }
            } else {
                if (!empty($user->profile->latitude) && !empty($user->profile->longitude)) {
                    $distance = self::distanceQuery($user->profile->latitude, $user->profile->longitude);
                    $users->addSelect(DB::raw('(' . $distance . ') AS distance'));
                    $users->whereRaw(DB::raw('(' . $distance . '<=' . $query_radius . ')'));
                }
            }

            if(!empty($avail_date))
            {
                $events = DB::table('calendar_events')
                    ->where('class', '=', 'available_class')
                ->where('start', 'like', '%'.$avail_date.'%')
                ->where('end', 'like', '%'.$avail_date.'%')->get()->toArray();
                if(!empty($events))
                {
                    $user_id = array();
                    foreach ($events as $event)
                    {
                        $user_id[] = $event->user_id;
                    }
                    $users->whereIn('users.id', $user_id);

                }
            }

        if ($type = 'freelancer' && ($role == 'Professional' || $role == 'Personal') ) {
            $users = $users->orderByRaw('-badge_id DESC')->orderBy('expiry_date', 'DESC');
        } else {
            $users = $users->orderBy('created_at', 'DESC');
        }

        $users = $users->paginate(8)->setPath('');

        foreach ($filters as $key => $filter) {
            $pagination = $users->appends(
                array(
                    $key => $filter
                )
            );
        }

        $json['users'] = $users;
        return $json;
    }

    /**
     * Save dispute.
     *
     * @param string $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function saveDispute($request)
    {
        $user = User::find(Auth::user()->id);
        DB::table('disputes')->insert(
            [
                'proposal_id' => $request['proposal_id'], 'user_id' => $user->id,
                'reason' => $request['reason'], 'description' => $request['description'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        return 'success';
    }

    /**
     * Update calcel project
     *
     * @param string $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCancelProject($request)
    {
        $job = Job::find($request['job_id']);
        if (!empty($job)) {
            $job->status = trans('lang.completed');
            $job->save();
            $proposal = Proposal::find($request['order_id']);
            if (!empty($proposal)) {
                $proposal->status = trans('lang.completed');
                $proposal->save();
                return 'error';
            }
            return 'success';
        } else {
            return 'error';
        }
    }

    /**
     * Update calcel project
     *
     * @param string $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCancelService($request)
    {
        $order = DB::table('service_user')
            ->where('id', $request['order_id'])
            ->update(['status' => 'completed']);
        return 'success';
    }

    /**
     * Save refound payout.
     *
     * @param string $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function transferRefund($request)
    {
        $json = array();
        if (!empty($request['refundable_user_id'])) {
            $payment_settings = SiteManagement::getMetaValue('commision');
            $currency  = !empty($payment_settings) && !empty($payment_settings[0]['currency']) ? $payment_settings[0]['currency'] : 'USD';
            $user = User::find($request['refundable_user_id']);
            $payout_id = !empty($user->profile->payout_id) ? $user->profile->payout_id : '';
            $payout_detail = !empty($user->profile->payout_settings) ? $user->profile->payout_settings : array();
            if (!empty($payout_id) || !empty($payout_detail)) {
                $payout = new Payout();
                $payout->user()->associate($request['refundable_user_id']);
                $payout->amount = $request['amount'];
                $payout->currency = $currency;
                if (!empty($payout_detail)) {
                    $payment_details  = Helper::getUnserializeData($user->profile->payout_settings);
                    if ($payment_details['type'] == 'paypal') {
                        if (Schema::hasColumn('payouts', 'email')) {
                            $payout->email = $payment_details['paypal_email'];
                        } elseif (Schema::hasColumn('payouts', 'paypal_id')) {
                            $payout->paypal_id = $payment_details['paypal_email'];
                        }
                    } else if ($payment_details['type'] == 'bacs') {
                        $payout->bank_details = $user->profile->payout_settings;
                    } else {
                        $payout->paypal_id = '';
                    }
                    $payout->payment_method = Helper::getPayoutsList()[$payment_details['type']]['title'];
                } else if (!empty($payout_id)) {
                    $payout->payment_method = 'paypal';
                    if (Schema::hasColumn('payouts', 'email')) {
                        $payout->email = $payout_id;
                    } elseif (Schema::hasColumn('payouts', 'paypal_id')) {
                        $payout->paypal_id = $payout_id;
                    }
                }
                $payout->status = 'pending';
                if (!empty($request['order_id'])) {
                    $payout->order_id = intval($request['order_id']);
                }
                $payout->type = $request['type'];
                $payout->save();
                return 'success';
            } else {
                return 'payout_not_available';
            }
        } else {
            return 'error';
        }
    }


    /**
     * Returns distance query
     *
     * @param User $user
     *
     * @return string
     */
    public static function distanceQuery($lat, $lng)
    {
        return '(3959 * acos (
          cos (radians(' . $lat . '))
          * cos(radians(profiles.latitude))
          * cos(radians(profiles.longitude) - radians(' . $lng . '))
          + sin(radians(' . $lat . '))
          * sin(radians(profiles.latitude))
        ))';
    }

    /**
     * Returns users list by location.
     *
     * @param numeric $lat
     * @param numeric $lng
     * @param numeric $radius
     * @param string $role
     *
     * @return Collection
     */
    public static function findByLocation($lat, $lng, $radius, $role=null)
    {
        $query = User::select('users.*')
            ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id');

        $distance = self::distanceQuery($lat, $lng);
        $query->addSelect(DB::raw('(' . $distance . ') AS distance'));
        $query->whereRaw(DB::raw('(' . $distance . '<=' . $radius . ')'));

        if ($role != null) {
            $query->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
              ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
              ->where('model_has_roles.model_type', '=', 'App\User')
              ->where('roles.role_type', '=', $role);
        }

        return $query->get();
    }

    /**
     * Returns itsofare values array
     *
     * @return array
     */
    public function getItsoftware()
    {
      $unserialized = $this->itsoftware ? @unserialize($this->itsoftware) : null;
      return $unserialized ? $unserialized : [$this->itsoftware];
    }

    /**
     * Returns a list of professions by role
     *
     * @param string $role
     *
     * @return array
     */
    public static function getProfessionsByRole (string $role): array
    {
        $professions = config('user-professions');
        return array_key_exists($role, $professions) ? $professions[$role] : [];
    }
}
