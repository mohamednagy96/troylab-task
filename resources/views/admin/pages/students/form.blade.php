

<x-inputs.text label="Name" name="name"  :required="true" />
<x-inputs.text label="Email" name="email"  :required="true" />
<x-inputs.text label="Code" name="code"  :required="true" />

<x-inputs.text label="Parent Mobile" name="parent_number" required="true" />
<x-inputs.text label="Mobile" name="mobile" required="true" />
<x-inputs.select label="School" name="school_id" :data="$schools" 
    :value="null" placeholder="----select School----" />
<x-inputs.select label="Level" name="level" :data="['1' => '1 pk' , '2' => '2 pk' , '3' => '3 pk']" 
    :value="null" placeholder="----select level----" />
    <x-inputs.select label="Gender" name="gender" :data="['male' => 'male' , 'female' => 'female']" 
        :value="null" placeholder="----select gender----" />
<x-inputs.date label="Date" name="dob" :required="true" />
<x-inputs.date label="Join Date" name="join_date" :required="true" />

<x-inputs.checkbox name="is_active" :model="$student ?? null"/>

<div class="form-group">
    <x-inputs.btn type="save"/>
</div>
