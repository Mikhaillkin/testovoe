<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentSubject
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @method static \Database\Factories\StudentSubjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentSubject whereSubjectId($value)
 * @mixin \Eloquent
 */
class StudentSubject extends Model
{
    use HasFactory;

    protected $table = 'student_subject';

    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'subject_id',
    ];
}
