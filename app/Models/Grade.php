<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property int $score
 * @property int $student_id
 * @property int $subject_id
 * @property int $teacher_id
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\Teacher $teacher
 * @method static Builder|Grade dateFromFilter(string $dateFrom)
 * @method static Builder|Grade dateToFilter(string $dateTo)
 * @method static \Database\Factories\GradeFactory factory($count = null, $state = [])
 * @method static Builder|Grade newModelQuery()
 * @method static Builder|Grade newQuery()
 * @method static Builder|Grade query()
 * @method static Builder|Grade whereCreatedAt($value)
 * @method static Builder|Grade whereDate($value)
 * @method static Builder|Grade whereId($value)
 * @method static Builder|Grade whereScore($value)
 * @method static Builder|Grade whereStudentId($value)
 * @method static Builder|Grade whereSubjectId($value)
 * @method static Builder|Grade whereTeacherId($value)
 * @method static Builder|Grade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'score',
        'student_id',
        'subject_id',
        'teacher_id'
    ];

    public function scopeDateFromFilter(Builder $query, string $dateFrom): Builder
    {
        return $query->where('date', '>=', $dateFrom);
    }

    public function scopeDateToFilter(Builder $query, string $dateTo): Builder
    {
        return $query->where('date', '<=', $dateTo);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
