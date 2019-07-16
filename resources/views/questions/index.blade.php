@extends('base')
@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="{{ route('questions.store') }}">
      @csrf
      <div class="form-inline">
        <textarea type="text" class="form-control" name="question_text"></textarea>
          <button style="margin: 19px;" class="btn btn-primary" type="submit">Submit question</button>
      </div>
    </form>
  </div>
  <div class="row" style="margin-top:20px">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Questions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($questions->sortByDesc('created_at') as $question)
        <tr>
          <td><a href="{{ url('questions/'.$question->id) }}">{{$question->question_text}}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
