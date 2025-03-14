<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Addmission extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'addmission';
    protected $primarykey = 'id';
    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'country_id',
        'address',
        'village',
        'adhaar_number',
        'nationality',
        'is_any_illness',
        'illness_description',
        'vehicle',
        'is_have_helmet',
        'vehicle_number',
        'licence_doc_url',
        'rcbook_front_doc_url',
        'rcbook_back_doc_url',
        'father_full_name',
        'father_phone',
        'father_occupation',
        'mother_full_name',
        'mother_phone',
        'mother_occupation',
        'annual_income',
        'guardian_name',
        'guardian_relation',
        'guardian_phone',
        'course_id',
        'semester',
        'institute_name',
        'year_of_addmission',
        'addmission_date',
        'college_start_time',
        'college_end_time',
        'college_fees_receipt_no',
        'college_fees_receipt_date',
        'arriving_date',
        'student_photo_url',
        'parent_photo_url',
        'is_fees_paid',
        'is_admission_confirm',
        'note'
    ];

    public function student(): BelongsTo{
        return $this->belongsTo(Students::class,'student_id','id');
    }
    public function fees(): BelongsTo{
        return $this->belongsTo(Fees::class,'fees_id','id');
    }

    protected static $logAttributes = ['*'];
    protected static $logFillable = true;
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logUnguarded = true;
    protected static $logName = 'Admission';

    public function getActivitylogOptions(): LogOptions
    {
        if (Auth::user()) {
            $userName = Auth::user()->name;
        } else {
            $userName = 'Super Admin';
            # code...
        }
        

        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Admission')
            ->setDescriptionForEvent(function (string $eventName) use ($userName) {
                return "{$userName} has {$eventName} Admissions";
            });
    }
}