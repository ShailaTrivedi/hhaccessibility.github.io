<h2>{{ $question_category->name }}</h2>

<div>
	<div class="questions">
		@foreach ( $question_category->questions()->get() as $question )
			<div class="row" data-question-id="{{ $question->id }}">
				<div class="col-xs-6">
					{!! $question->question_html !!}
				</div>
				<div class="col-xs-6">
					<div class="row answers">
						<div class="col-xs-3 @if ( $answer_repository->getAnswerForQuestion($question->id) === 1 )
							selected
						@endif">
							<div>
							Yes
							</div>
						</div>
						<div class="col-xs-3 @if ( $answer_repository->getAnswerForQuestion($question->id) === 0 )
							selected
						@endif">
							<div>
							No
							</div>
						</div>
						<div class="col-xs-6 @if ( $answer_repository->getAnswerForQuestion($question->id) === 2 )
							selected
						@endif" title="Location does not require this">
							<div>
							Not Applicable
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<textarea class="clean" placeholder="Comment on {{ $question_category->name }} at {{ $location->name }}"
	>{{ $answer_repository->getComment() }}</textarea>
	<div class="pull-right">
		@if ( $next_question_category_id )
		<a class="clean" href="/location-rating/{{ $location->id }}/{{ $next_question_category_id }}">Next</a>
		@else
		@include('pages.location_rating.submit',
					array(
						'location_id' => $location->id
					))
		@endif
	</div>
</div>