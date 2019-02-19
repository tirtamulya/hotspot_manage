<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiusAccounting extends Model
{
	protected $fillable = ['radacctid','acctsessionid','acctuniqueid','username','groupname','realm','nasipaddress','nasportid','nasporttype','acctstarttime','acctstoptime','acctsessiontime','acctauthentic','connectinfo_start','connectinfo_stop','acctinputoctets','acctoutputoctets','calledstationid','callingstationid','acctterminatecause','servicetype','framedprotocol','framedipaddress','acctstartdelay','acctstopdelay','xascendsessionsvrkey'];

	public $table ='radacct';

	public $timestamps = false;

	protected $primaryKey = 'radacctid';

	public function rad_check()
	{
		return $this->hasMany('App\RadiusCheck', 'username','username');
	}
}