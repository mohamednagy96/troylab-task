<?php

namespace App\Repositories\Teacher;

use App\Models\Teacher;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    private $model;

    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    function list(array $data = [], $paginate = null)
    {
        $q = $this->model->query();

        if (isset($data['parent_id'])) {
            $q->where('parent_id', $data['parent_id'] == 0 ? null : $data['parent_id']);
        }else{
            $q->where('parent_id', null);
        }

        if (isset($data['teacher_id'])) {
            $q->where('id', $data['teacher_id']);
        }

        if (isset($data['email'])) {
            $q->where('email', $data['email']);
        }

        if (isset($data['mobile'])) {
            $q->where('mobile', $data['mobile']);
        }

        if(isset($data['grade_id'])){
            $grade_id = $data['grade_id'];
            $q->whereHas('grades', function($q) use($grade_id){
                $q->where('grade_id', $grade_id);
            });
        }
        if(isset($data['subject_id'])){
            $subject_id = $data['subject_id'];
            $q->whereHas('subjects', function($q) use($subject_id){
                $q->where('subject_id', $subject_id);
            });
        }
        if (isset($data['status'])) {
            $q->where('status',$data['status']);

        }
        if (isset($data['assistant_id'])) {
            $q->where('id','!=',$data['assistant_id'])->where('parent_id', $data['assistant_id']);
        }
        if (isset($data['search'])) {
            $q->whereTranslationLike('name','%'.$data['search'].'%')->orWhereTranslationLike('description','%'.$data['search'].'%');
        }

        if ($paginate != null) {
            $q = $q->paginate(15);
        } elseif(isset($data['take'])) {
            $q = $q->latest('created_at')->take(10)->get();
        }else{
            $q = $q->get();
        }
        return $q;
    }

    public function create(array $data)
    {

        $data['password'] = Hash::make($data['password']);

        $teacher = $this->model->create($data);
        if(isset($data['grades']))
        {
           $teacher->grades()->attach($data['grades']);
        }
        if(isset($data['subjects']))
        {
           $teacher->subjects()->attach($data['subjects']);
        }
        if (isset($data['image'])) {
            $teacher->saveFiles($data['image']);
        }

        if (isset($data['cv'])) {
            $teacher->saveFiles($data['cv'],'cv',null,'teachers');
        }
        return $teacher;

    }

    public function update(array $data, $id): Teacher
    {
        $teacher = $this->show($id);

        $password = $data['password'];
        $data['password'] = $password ? Hash::make($password) : $teacher->password;


        $teacher->update($data);
        if(isset($data['grades']))
        {
           $teacher->grades()->sync($data['grades']);
        }
        if(isset($data['subjects']))
        {
           $teacher->subjects()->sync($data['subjects']);
        }

        if (isset($data['image'])) {
            $teacher->updateFile($data['image']);
        }

        if (isset($data['cv'])) {
            $teacher->clearMediaCollection('cv');
            $teacher->saveFiles($data['cv'],'cv',null,'teachers');
        }
        return $teacher;

    }

    public function delete($id): void
    {
        $teacher = $this->show($id);

        $teacher->delete();
    }
    public function show($id): Teacher
    {
        $teacher = $this->model->findOrFail($id);

        return $teacher;
    }

    public function statuses()
    {
        return $this->model->statuses;
    }
}
