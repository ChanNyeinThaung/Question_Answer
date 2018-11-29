@extends('layouts/app')

@section('content')
	<div class="container">

		@if(session('info'))
			<div class="alert alert-danger">
				{{ session('info') }}
			</div>
		@endif

		<div class="btn-group float-right">
  			<a href="{{ url('questions/sort/answer') }}" class="btn btn-light border">Answered</a>
  			<a href="{{ url('questions/sort/vote') }}" class="btn btn-light border">Vote</a>
  			<a href="{{ url('questions/sort/latest') }}" class="btn btn-light border">Latest</a>
		</div>
		<br><br>

		@foreach($questions as $question)

			<table>
				<tr>
					<td width="100px">
						<p style="text-align: center;"><span  style="font-size: 15pt;" class="
							@if(count($question->answers)>0) badge badge-success text-light @endif
							@if(count($question->answers)==0) badge badge-primary text-light @endif
							">
							{{ count($question->answers) }}
						</span>	<br>
						<em><span style="font-size: 12pt;">answers</span></em></p>
					</td>
					<td>
						<p style="text-align: center;"><span style="font-size: 15pt;" class="  
							@if($question->vote>0) badge badge-success text-light @endif
							@if($question->vote==0) badge badge-primary text-light @endif
							@if($question->vote<0) badge badge-danger text-light @endif
						">
							{{ $question->vote }}
						</span>	<br>
						<em><span style="font-size: 12pt;">votes</span></em></p>
					</td>

					<td>
						<em><span style="font-size: 12pt;">Q:</em></span> <a href="{{ url('questions/view/'.$question->id)  }}">
						{{ $question->subject }}</a> <span style="color:blue">
					</td>
				</tr>
				<tr>
					<td width="100px"></td>
					<td width="100px"></td>
					<td>
						<p>{!! $question->detail !!}</p>
					</td>
				</tr>
				<tr>
					<td width="100px"></td>
					<td width="100px"></td>
					<td>
						<span>{{ $question->created_at->diffForHumans() }}</span>
					</td>
				</tr>
			</table>
			<hr>
		@endforeach
		{{ $questions->links() }} <!-- page link -->
	</div>
@endsection
