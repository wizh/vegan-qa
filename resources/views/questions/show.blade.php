@extends('base')
@section('content')
<div class="container">
    <h1 class="display-4 text-center">{{$question->question_text}}</h1>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Answers</th>
          </tr>
        </thead>
        <tbody>
          @foreach($question->answers as $answer)
          <tr>
            <td>{{$answer}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <form method="post" action="{{ route('questions.update', $question->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-inline">
          <textarea type="text" class="form-control" name="answer_text" placeholder="Write your answer here">{{ old('answer_text') }}</textarea>
            <button class="btn btn-primary m-3" type="submit">Submit answer</button>
        </div>
      </form>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <small><font color="red">{{ $error }}</font></small>
        @endforeach
    @endif
</div>
@endsection
