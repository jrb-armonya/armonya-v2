<?php

namespace App;

use Auth;
use App\Role;
use App\Fiche;
use App\Services\Groups\Models\Group;
use Illuminate\Notifications\Notifiable;
use App\Services\Groups\Models\GroupRole;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'fictif', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $rappel_id = 29;

    /**
     * Roles and permissions
     *  - role()
     *  - hasRole()
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    //Return if user is exp: admin, Report ...
    public function is($role)
    {
        $roleObj = Role::where('name', $role)->first();
        return $this->role_id == $roleObj->id;
    }
    
    //Return if user have permissions
    public function havePerm($permission) {
        $role = $this->role;
        return $role->permission($permission);
    }

    public function roleName() {
        return $this->role->name;
    }
    //Group relations 
    public function groupRole()
    {
        return $this->hasMany(GroupRole::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot(['role_id']);
    }
    public function inGroup($groupId)
    {
        foreach($this->groups()->get() as $group)
        {
            if($group->id == $groupId)
            {
                return true ;
            }
        }

        return false;
       
    }

    /**
     * Report Relation (from the extra table)
     * User can have multiple Reports
     *
     * @return void
     */
    public function reports()
    {
        return $this->hasMany(ReportManager::class);
    }

    //Mes Fiches
    public function fiches() {
        return $this->hasMany('App\Fiche')->where('status_id', '!=', $this->rappel_id);
    }
    
    public function mesFichesThisMonth($month = null, $year = null) {
        
        return $this->fiches()
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year);
    }
    
    public function mesFichesToday() {
        return $this->fiches()
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'));
    }
    //Mes rappel
    public function rappels() {
        return $this->hasMany('App\Fiche')->where('status_id', '=', $this->rappel_id);
    }

    /**
     * Created
     */
    public function fichesTthisMonthByStatus($status) {
        return $this->mesFichesThisMonth()->where('status_id', $status);
    }
    public function fichesTodayByStatus ($status) {
        return $this->mesFichesToday()->where('status_id', $status);
    }

    public function fichesThisMonthValidAfterEcoute() {
        return $this->mesFichesThisMonth()->where('valid_after_ecoute', 1);
    }
    public function fichesThisMonthNoValidAfterEcoute() {
        return $this->mesFichesThisMonth()->where('no_valid_after_ecoute', 1);
    }
    public function fichesTodayValidAfterEcoute() {
        return $this->mesFichesToday()->where('valid_after_ecoute', 1);
    }
    public function fichesTodayNoValidAfterEcoute() {
        return $this->mesFichesToday()->where('no_valid_after_ecoute', 1);
    }
    public function fichesTodayADomicile() {
        return $this->mesFichesToday()->where('l_rv', 1);
    }
    public function fichesThisMonthADomicile() {
        return $this->mesFichesThisMonth()->where('l_rv', 1);
    }

    /**
     * Ecouted
     */
    public function ecoutedMonth(int $month = null) {
        $f = new Fiche();
        return  $f->ecoutedMonth($month)->where('ecoute_id', $this->id);
    }

    /**
     * Confirmed
     */

    public function confirmedMonth($month) {
        $f = new Fiche();
        // return $f->confirmedMonth($month)->where('conf_id', $this->id);
        return $f->whereMonth('d_confirm', $month )->whereYear('d_confirm', '2019')->where('conf_id', Auth::user()->id);
    }

    public function confirmedToday() {
        $f = new Fiche();
        return $f->confirmedToday()->where('conf_id', $this->id);
    }

    public function confimedCibled($month) {
        return $this->confirmedMonth($month)->where('d_cible', '!=', null);
    }

    public function reportedMonth(int $month = null) {
        $f = new Fiche();
        return $f->reportedMonth($month)->where('repo_id', $this->id);
    }

    // public function reportedLastMonth(int $month = null) {
    //     $f = new Fiche();
    //     return $f->reportedMonth($month-1)->whereMonth('d_confirm', '=', $month)->where('repo_id', $this->id);
    // }

}
