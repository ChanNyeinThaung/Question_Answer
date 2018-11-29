@extends('layouts/app')

@section('content')
<div class="container">

	<table>
				<tr>
					<td width="150px" style="text-align: center;">
						<a href="{{ url('questions/up/'.$question->id) }}"><i class="fa fa-chevron-up"></i></a><br>
						<span style="font-size: 15pt;" class="  

							@if($question->vote>0) badge badge-success text-light @endif
							@if($question->vote==0) badge badge-primary text-light @endif
							@if($question->vote<0) badge badge-danger text-light @endif
						">
							
							{{ $question->vote }}<br>
							
							<em><span style="font-size: 9pt;">votes</span></em>
						</span><br>
						
						<a href="{{ url('questions/down/'.$question->id) }}"><i class="fa fa-chevron-down"></i></a>

					</td>
					<td>
						<h4>{{ $question->subject }}</h4>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<p>{!! $question->detail !!}</p>
						<small>{{ $question->created_at->diffForHumans() }}</small>
					</td>
				</tr>
	</table>
	<hr>
	<h4>Answers ({{ count($question->answers) }})</h4>
	<table>
		<tr>
			<td width="150px">
				
			</td>
			<td>
				@foreach($question->answers as $answer)
					<div calss="card">
						<div class="card-body">
							<p>{!! $answer->detail  !!}</p> <!-- show html style -->
							<small>{{ $answer->created_at->diffForHumans() }}</small>
							<hr>
						</div>
					</div>
				@endforeach

				<form action="{{ url('answers/add') }}" method="post">
					{{ csrf_field() }}

					<input type="hidden" name="question_id" value="{{ $question->id }}">
					<textarea name="detail" class="form-control"></textarea><br>
					<input type="submit" value="Add Answer" class="btn btn-info">
				</form>
			</td>
		</tr>
	</table>

</div>
@endsection
