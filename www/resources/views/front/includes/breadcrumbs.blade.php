@if( isset($breadcrumbs ) && count($breadcrumbs) )
 <div class="slide-inner">
 	<p class="breadcrumbs">
 		@foreach( $breadcrumbs as $item)
			<a href="{{$item->url}}">{{$item->text}}</a>
 		@endforeach
	</p><!-- /.breadcrumbs -->
 </div><!-- /.slide-inner --> 
@endif