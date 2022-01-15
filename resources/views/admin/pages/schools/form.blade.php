

<x-inputs.text label="Title" name="title"  :required="true" />
<x-inputs.textarea label="Description" name="description" />

<x-inputs.select label="level_count" name="level_count" :data="['1' => '1' , '2' => '2' , '3' => '3']" 
    :value="null" placeholder="----select level Count----" />

<x-inputs.checkbox name="is_active" :model="$school ?? null"/>

<div class="form-group">
    <x-inputs.btn type="save"/>
</div>
