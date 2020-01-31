<ul class="list-group">
    @foreach ($project->activity as $activity)
        <li class="list-group-item">
            @if ($activity->description === 'created')
                Created the project
            @elseif ($activity->description === 'updated')
                @if (count($activity->changes['after']) == 1)
                    {{ $activity->user->name}} updated the {{ key($activity->changes['after']) }} of the project
                @else
                {{ $activity->user->name}} udated the project 
                @endif
            @elseif ($activity->description === 'task_created')
                Created: {{ $activity->subject->body }}
            @elseif($activity->description === 'task_completed')
                Completed: {{ $activity->subject->body }}
            @elseif($activity->description === 'task_incompleted')
                Incompleted: {{ $activity->subject->body }}
            @elseif ($activity->description === 'task_deleted')
                Deleted: {{ $activity->subject->body }}
            @endif
            <small>{{ $activity->created_at->diffForHumans()}}</small>
        </li>
    @endforeach
</ul>