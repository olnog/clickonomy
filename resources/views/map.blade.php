@extends ('main')
@section('content')
<table>
@foreach ($map as $cell)
<?php
switch ($cell->terrain){
	case(0):	
		$class='empty';
		break;
	case(1):
		$class='forest';
		break;
	case(2):
		$class='plains';
		break;
	case(3):
		$class='mountains';
		break;
}
if (auth() && $cell->userID==Auth::id()){
	$class=$class . ' owned';
	if($cell->home){
		$class = $class . ' home';
	}
}
?>
@if ($cell->x==0)
<tr>
@endif
<td class='{{$class}}'>
@if (auth() && $cell->userID==Auth::id())
	{{$cell->security}}

@else
&nbsp;
@endif

</td>
@if ($cell->x==9)
</tr>
@endif

</div>
@endforeach
</table>

@endsection
