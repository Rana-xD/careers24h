<div class="edu-history style2 achieve">
    <input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
    <input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
    <i></i>
    <div class="edu-hisinfo">
        <h3 class="title">{{ $item['title'] }}</h3>
        <i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
        <p class="description">{{ $item['description'] }}</p>
    </div>
    <ul class="action_job">
        <li><span>Edit</span><a class="editAchievement" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
        <li><span>Delete</span><a class="removeAchievement" data-index="{{ $index }}"><i class="la la-trash-o"></i></a></li>
    </ul>
</div>