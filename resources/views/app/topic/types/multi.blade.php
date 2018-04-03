@if($answers = $question->answers) @endif
@for($i = 0; $i < $answers->count(); $i++)
    @if($answer = $answers[$i]) @endif
    <label><input name="answer[]" type="checkbox" value="{{$i}}"> {{ $answer->text }}</label>
@endfor