<div class="edu-history">
    <input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
    <input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
   <i class="la la-graduation-cap"></i>
   <div class="edu-hisinfo">
       <h3 class="title">{{  $item['title'] }}</h3>
       <i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
       <span class="school_name">{{ $item['school'] }}</span>
       <p class="description">{{ $item['description'] }}</p>
   </div>
   <ul class="action_job">
       <li><span>Edit</span><a class="editEducation" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
       <li><span>Delete</span><a class="removeEducation" data-index="{{ $index }}"><i class="la la-trash-o" ></i></a></li>
   </ul>
</div>