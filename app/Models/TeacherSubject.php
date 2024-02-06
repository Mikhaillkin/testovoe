<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TeacherSubject
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $subject_id
 * @method static \Database\Factories\TeacherSubjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherSubject whereTeacherId($value)
 * @mixin \Eloquent
 */
class TeacherSubject extends Model
{
    use HasFactory;

    protected $table = 'teacher_subject';

    public $timestamps = false;

    protected $fillable = [
        'teacher_id',
        'subject_id',
    ];
}
