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
</div>
@endsection
