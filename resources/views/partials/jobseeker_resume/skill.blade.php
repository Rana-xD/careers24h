<div class="progress-sec with-edit">
    <input type="hidden" name="percentage" class="percentage" value="{{ $item['percentage']  }}">
    <span class="skill">{{ $item['skill'] }}</span>
   <div class="progressbar"> <div class="progress" style="width: {{ $item['percentage'] }}%;"><span>{{ $item['percentage'] }}%</span></div> </div>
   <ul class="action_job">
       <li><span>Edit</span><a class="editSkillset" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
       <li><span>Delete</span><a class="removeSkillset" data-index="{{ $index }}"><i class="la la-trash-o"></i></a></li>
   </ul>
</div>